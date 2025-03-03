<?php

namespace App\Controllers;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of displaystaffinfoc
 *
 * @author Mitchelle Ateb
 */
class UploadOlevelc extends BaseController {

    //put your code here
    public function index() {
        //session_start();
        $data = array('title' => 'Student OLevel Upload'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');
        $this->load->model('secured/Olevels_m');
        $this->form_validation->set_rules('examnumber', 'Exam Number', 'trim|xss_clean|required|callback_param_check');
        $this->form_validation->set_rules('JambID', 'Jamb ID', 'xss_clean|required|callback_param_check_sittings');
        $this->form_validation->set_rules('exambody', 'Exam Body', 'xss_clean|required');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/uploadOlevel', $data);
            echo view('template/footer_other');
        } else {
            $sittings = $this->input->post('sittings');

            if (strcmp($sittings, trim("onesitting")) == 0) {
                $this->Olevels_m->registerOlevels_1_sittings();
                redirect('secured/UpdateSuccess', 'refresh');
            } elseif (strcmp($sittings, trim("doublesittings")) == 0) {
                $this->Olevels_m->registerOlevels_2_sittings();
                redirect('secured/UpdateSuccess', 'refresh');
            } else {
                redirect('secured/UploadOlevelc', 'refresh');
            }
        }
    }

    public function param_check() {
        $this->examnumber = $this->input->post('examnumber');
        $query = $this->db->get_where('tblOlevel', array('examnumber' => $this->examnumber));
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('param_check', 'This {field} is already registered!!! You are not permitted to continue  ' . $this->examnumber);
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function param_check_sittings() {
        $this->JambID = $this->input->post('JambID');
        $query = $this->db->get_where('tblsittings', array('JambID' => $this->JambID));
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('param_check_sittings', 'This {field} is already registered!!! You are not permitted to continue  ' . $this->JambID);
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
