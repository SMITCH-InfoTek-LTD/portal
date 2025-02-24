<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of displaystaffinfoc
 *
 * @author Mitchelle Ateb
 */
class Displaystudentinfoc extends BaseController {

    //put your code here
    public function index() {
        //session_start();
        $data = array('title' => 'Student Profile'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');
        $this->form_validation->set_rules('agree', 'Agree', 'trim|required');
        $this->form_validation->set_rules('gsm', 'GSM', 'trim|required|min_length[11]|max_length[14]'); //|is_unique[tblregistered.phoneno]');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|xss_clean');
        $this->form_validation->set_rules('maritalstatus', 'Marital Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('religion', 'Religion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('permaddr', 'Permanent Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nokname', 'Next of Kin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nokphone', 'Next of Kin Phone', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('secured/displaystudentinfo', $data);
            $this->load->view('template/footer_other');
        } else {
            $data = array(
                'sname' => $_SESSION['sname'],
                'fname' => $_SESSION['fname'],
                'mname' => $_SESSION['mname'],
                'originstate' => $_SESSION['StateOforigin'],
                'originlga' => $_SESSION['LGAOfOrigin'],
                'email' => $_SESSION['email'],
                'agree' => 'Yes',
                'gsm' => $this->input->post('gsm'),
                'sex' => $this->input->post('Sex'),
                'nation' => $this->input->post('nation'),
                'dob' => $this->input->post('dob'),
                'maritalstatus' => $this->input->post('maritalstatus'),
                'religion' => $this->input->post('religion'),
                'permaddr' => $this->input->post('permaddr'),
                'contactaddr' => $this->input->post('contactaddr'),
                'nokname' => $this->input->post('nokname'),
                'nokpermaddr' => $this->input->post('nokpermaddr'),
                'nokphone' => $this->input->post('nokphone')
            );
            $this->session->set_userdata($data);
            $data2 = array(
                'JambID' => $this->session->userdata('JambID'),
                'fname' => $this->session->userdata('fname'),
                'mname' => $this->session->userdata('mname'),
                'sname' => $this->session->userdata('sname'),
                'sex' => $this->session->userdata('sex'),
                'dob' => $this->session->userdata('dob'),
                'gsm' => $this->session->userdata('gsm'),
                'nation' => $this->input->post('nation'),
                'originstate' => $this->session->userdata('StateOforigin'),
                'originlga' => $this->session->userdata('LGAOfOrigin'),
                'maritalstatus' => $this->session->userdata('maritalstatus'),
                'religion' => $this->session->userdata('religion'),
                'permaddr' => $this->session->userdata('permaddr'),
                'contactaddr' => $this->session->userdata('contactaddr'),
                'nokpermaddr' => $this->session->userdata('nokpermaddr'),
                'nokname' => $this->session->userdata('nokname'),
                'nokphone' => $this->session->userdata('nokphone'),
                'password' => $this->session->userdata('password'),
                'declaration' => $this->session->userdata('agree')
            );
            $this->db->where('JambID', $this->session->userdata('JambID'));
            $this->db->update('tblstudents_temp', $data2);
            if ($this->db->affected_rows() > 0) {
                redirect('secured/Mainstudentc', 'refresh');
                return TRUE;
            } else {
                return False;
            }
        }
    }

}
