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
class Registerstaffc extends BaseController{
    //put your code here
    
    public function index() {
        session_start();
        $data = array('title' => 'New Staff Registration'
        );
        
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('Staff_m');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('html');
        $this->form_validation->set_rules('staffID', 'StaffID', 'trim|required|max_length[12]|xss_clean');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|alpha|required|min_length[3]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|alpha|required|min_length[3]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('mname', 'Middle Name', 'trim|alpha|xss_clean');
        $this->form_validation->set_rules('sex', 'Gender', 'trim|required|xss_clean');
        $this->form_validation->set_rules('frmnation', 'Nationality', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|xss_clean');
        $this->form_validation->set_rules('maritalstatus', 'Marital Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('religion', 'Religion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('permaddr', 'Permanent Addresss', 'trim|required|xss_clean');
        $this->form_validation->set_rules('contactaddr', 'Contact Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[staff.email]|xss_clean');
        $this->form_validation->set_rules('gsm', 'GSM', 'required|is_unique[staff.gsm]|xss_clean');
        $this->form_validation->set_rules('frmroleid', 'RoleID', 'xss_clean');
        $this->form_validation->set_rules('levelOfAppointment', 'Level Of Appointment', 'trim|required|xss_clean');
        $this->form_validation->set_rules('natureOfAppointment', 'Nature Of Appointment', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rank', 'Job Title / Rank', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|xss_clean');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required');
        $this->form_validation->set_rules('frmoriginstate', 'State of Origin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('frmoriginlga', 'LGA of Origin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('frmoriginplace', 'Place of Origin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('frmnokname', 'Next Of Kin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('frmnokcontactaddr', 'Next Of Kin Contact Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('frmnokphone', 'Next of Kin Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('qualification', 'Qualification', 'trim|required|xss_clean');
        $this->form_validation->set_rules('frmfaculty', 'Faculty', 'trim|required|xss_clean');
        $this->form_validation->set_rules('frmdept', 'Department', 'trim|required|xss_clean'); 
        

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('menu/staffmenu');
            $this->load->view('staff/registerStaff', $data);
            $this->load->view('template/footer');
        } else {
            $register = $this->Staff_m->registerStaff();
            if (!$register) {
                redirect('/staff/registerstaffc', 'refresh');
            } else {
                redirect('/staff/uploadpicc', 'refresh');
            }
        }
    }

    public function check_username() {
        $result = $this->check_email_exist();
        //print_r($result);
        if ($result) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function check_email_exist() {
        $usr = $this->input->post('email_address');
        $this->db->where("logniname", $usr);
        $query = $this->db->get("tblloginDetails");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_username_ci() {
        //$usr = $this->input->post('email_address')
        $result = $this->Staff_m->check_email_exist();
        if ($result) {
            $this->form_validation->set_message('email_check', 'This %s has been used!!! Check carefully before you continue  ' . $this->email);
            echo "false";
        } else {
            echo "true";
        }
    }
}

?>
