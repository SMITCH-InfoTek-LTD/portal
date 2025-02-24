<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Forgotpwd
 *
 * @author osagiesammy
 */
class Forgotpwd extends BaseController {

    //put your code here 
    public function index() {
        $data = array('title' => 'forgot password');
        $this->load->helper(array('form', 'url', 'string', 'html'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->library('email');
        $this->load->model('secured/Student_m');
        $this->load->model('secured/securedUpdate_m');
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|callback_email_check');
        $this->form_validation->set_rules('JambID', 'JambID', 'trim|xss_clean|callback_JambID_check');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|matches[cpassword]|xss_clean|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|min_length[6]|xss_clean|required');
        

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('secured/forgotpwd', $data);
            $this->form_validation->set_message('rule', 'Error Message');
            $this->load->view('template/footer_other');
        } else {
            $this->securedUpdate_m->updatesecured();
            redirect('secured/Preadmissionloginc', 'refresh');
        }
    }

    public function email_check() {
        $this->email = $this->input->post('email');
        $query = $this->db->get_where('postumeapplicants', array('EmailAddress' => $this->email));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('email_check', 'Invalid information given !!! Check carefully before you continue ');
            return FALSE;
        }
    }
/**
 * verify JambID
 */
    public function JambID_check() {
        $this->JambID = $this->input->post('JambID');
        $query = $this->db->get_where('postumeapplicants', array('JambID' => $this->JambID));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('JambID_check', 'Invalid information given !!! Check carefully before you continue ');
            return FALSE;
        }
    }

/***
 * The password reset method!!!! And extra gift for the developer LOLZ!!!!!!!!!!!!!
 */
    public function resetpassword($user) {
        date_default_timezone_set('GMT');
        $this->password = random_string('alnum', 16);
        $this->db->where('JambID', $user->JambID);
        $this->db->update('postumeapplicants', array('password' => $this->password));
    }

}
