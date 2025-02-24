<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CreateAcct
 *
 * @author osagiesammy
 */
class CreateAcct extends BaseController {

    //put your code here 
    //put your code here
    public function index() {
        //session_start();
        $data = array('title' => 'Student create new account'
        );
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ug/Student_m');
        $this->load->model('ug/PUMEUpdate_m');
        $this->load->helper('html');
        $this->load->helper('security');
        $this->load->library('form_validation');
        ////////////////////////mail things
        //$this->email->initialize($config);
        /////////////end of mail things
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('regno', 'Regno', 'trim|xss_clean|exact_length[10]|alpha_numeric|is_unique[students.regno]|callback_JambID_check');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|matches[cpassword]|xss_clean|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|min_length[6]|xss_clean|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|xss_clean|valid_email|is_unique[postumeapplicants.EmailAddress]|required');
        $this->form_validation->set_rules('state', 'State of Origin', 'trim|xss_clean|required|callback_ALL_check');
        $this->form_validation->set_rules('course', 'Course', 'trim|xss_clean|required|callback_Course_check');
        $this->form_validation->set_rules('faculty', 'Faculty', 'trim|xss_clean|required');
        $this->form_validation->set_rules('LGA', 'LGA', 'trim|xss_clean|required');

        if ($this->form_validation->run() == FALSE) {
            //$data['lists'] = $this->Student_m->get_dropdown_list();
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('secured/createaccount', $data);
            $this->load->view('template/footer_other');
        } else {
            //creating sessions
            $this->Update_m->createAcct();
            redirect('secured/LoadPictureAcctCreate', 'refresh');
        }
    }

    /*     * *
     * Do state verification and validation
     */

    public function State_check() {
        $this->state = $this->input->post('state');
        $query = $this->db->get_where('studentslogin', array('StateOfOrigin' => $this->state));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('State_check', 'Invalid information given !!! Check State carefully before you continue');
            return FALSE;
        }
    }

    /*     * **
     * Do Course verification and validation
     */

    public function Course_check() {
        $this->course = $this->input->post('course');
        $query = $this->db->get_where('studentslogin', array('FirstChoice' => $this->FirstChoice));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('Course_check', 'Invalid information given !!! Check Course carefully before you continue ');
            return FALSE;
        }
    }

    public function JambID_check() {
        $this->regno = $this->input->post('regno');
        $query = $this->db->get_where('studentslogin', array('' => $this->jambID));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $_SESSION['CandName'] = $row->surname . ' ' . $row->middlename . ' ' . $row->firstname;
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('param_check', 'Invalid information !!! You are not qualified  ');
            return FALSE;
        }
    }

    public function ALL_check() {
        $this->jambID = $this->input->post('jambID');
        $this->course = $this->input->post('course');
        $this->state = $this->input->post('state');
        $query = $this->db->get_where('tblDemo', array('JambID' => $this->jambID, ''
            . 'FirstChoiceCourse' => $this->course, 'StateOforigin' => $this->state));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $_SESSION['CandName'] = $row->surname . ' ' . $row->middlename . ' ' . $row->firstname;
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('param_check', 'Invalid information !!! You are not qualified  ALL');
            return FALSE;
        }
    }

}
