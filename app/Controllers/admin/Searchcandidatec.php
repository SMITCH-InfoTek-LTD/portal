<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of courseregc
 *
 * @author Mitchelle Ateb
 */
class Searchcandidatec extends BaseController {

    //put your code here
    public function index() {
        $data = array('title' => 'search staff'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('secured/Report_m');
        $this->load->helper('html');
        $this->form_validation->set_rules('JambID', 'JambID', 'trim|required|min_length[6]|max_length[24]|xss_clean|callback_JambID_check');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/admin/searchCandidate', $data);
            echo view('template/footer_other');
        } else {
            //$this->Student->loginStudent();
            $this->JambID = $this->input->post('JambID');
            $query = $this->db->get_where('tblstudents_temp', array('JambID' => $this->JambID));
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $newdata = array(
                    'JambID' => $row['JambID'],
                    'sname' => $row['sname'],
                    'fname' => $row['fname'],
                    'mname' => $row['mname'],
                    'sex' => $row['sex'],
                    'dob' => $row['dob'],
                    'maritalStatus' => $row['maritalStatus'],
                    'religion' => $row['religion'],
                    'permaddr' => $row['permaddr'],
                    'contactaddr' => $row['contactaddr'],
                    'email' => $row['email'],
                    'gsm' => $row['gsm'],
                    'nation' => $row['nation'],
                    'password' => $row['password'],
                    'originstate' => $row['originstate'],
                    'originlga' => $row['originlga'],
                    'nokname' => $row['nokname'],
                    'nokphone' => $row['nokphone'],
                    'nokpermaddr' => $row['nokpermaddr'],
                    'declaration' => $row['declaration'],
                    'password' => $row['password'],
                    'passport' => $row['passport'],
                );
                $this->session->set_userdata($newdata);
                redirect('secured/admin/Displaycandidateinfoc', 'refresh');
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function JambID_check() {
        $this->JambID = $this->input->post('JambID');
        $query = $this->db->get_where('tblstudents_temp', array('JambID' => $this->JambID));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('JambID_check', 'This %s is invalid!!! Check carefully before you continue  ' . $this->JambID);
            return FALSE;
        }
    }

}

?>
