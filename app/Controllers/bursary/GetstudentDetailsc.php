<?php
namespace App\Controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetstudentDetailsc
 *
 * @author osagiesammy
 */
class GetstudentDetailsc extends BaseController {

    //put your code here
    public function index() {
        $data = array('title' => 'get student details');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('secured/Student_m');
        $this->load->helper('html');
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('jambID', 'Jamb ID', 'trim|required|exact_length[10]|xss_clean|alpha_numeric|callback_param_check');
        $this->form_validation->set_rules('Password', 'password', 'trim|required|xss_clean|alpha_numeric|callback_password_check');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/preadmissionlogin', $data);
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            $this->Student_m->getStudentDetails();
            redirect('secured/Displaystudentinfoc', 'refresh');
            return TRUE;
        }
    }

    public function param_check() {
        $this->jambID = $this->input->post('jambID');
        $query = $this->db->get_where('postumeapplicants', array('JambID' => $this->jambID));
        if ($query->num_rows() > 0) {
            $_SESSION['RegNumber'] = $this->input->post('jambID');
            return TRUE;
        } else {
            $this->form_validation->set_message('param_check', 'This {field} is invalid!!! Check carefully before you continue  ' . $this->jambID);
            return FALSE;
        }
    }

    public function password_check() {
        $this->password = $this->input->post('Password');
        $query = $this->db->get_where('postumeapplicants', array('Password' => $this->password));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
             $this->form_validation->set_message('password_check', 'The {field} field is invalid');
            return FALSE;
            
        }
}
}
