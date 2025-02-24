<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registerstudentc
 *
 * @author Mitchelle Ateb
 */
class Updatecandidateprofilec extends BaseController {

    //put your code here

    public function index() {
        $data = array('title' => 'Update Staff Profile'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('secured/Report_m');
        $this->load->helper('html');
        $this->form_validation->set_rules('JambID', 'JambID', 'trim|required|max_length[12]|xss_clean');
        $this->form_validation->set_rules('sname', 'Surname', 'trim|alpha|min_length[3]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|alpha|min_length[3]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('mname', 'Middle Name', 'trim|alpha|xss_clean');
        $this->form_validation->set_rules('sex', 'Gender', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nation', 'Nationality', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|xss_clean');
        $this->form_validation->set_rules('maritalStatus', 'Marital Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('religion', 'Religion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('permaddr', 'Permanent Addresss', 'trim|required|xss_clean');
        $this->form_validation->set_rules('contactaddr', 'Contact Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
        $this->form_validation->set_rules('gsm', 'GSM', 'required|xss_clean');
        $this->form_validation->set_rules('roleid', 'RoleID', 'xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|xss_clean');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required');
        $this->form_validation->set_rules('originstate', 'State of Origin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('originlga', 'LGA of Origin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nokname', 'Next Of Kin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nokpermaddr', 'Next Of Kin Contact Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nokphone', 'Next of Kin Phone', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/admin/updateCandidateProfile', $data);
            echo view('template/footer_other');
        } else {
            $register = $this->Report_m->updateCandidateProfile();
            if (!$register) {
                redirect('secured/admin/Updatecandidateprofilec', 'refresh');
            } else {
                redirect('secured/admin/Successc', 'refresh');
            }
        }
    }
}

?>
