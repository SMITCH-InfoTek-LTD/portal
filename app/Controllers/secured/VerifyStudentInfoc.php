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
class VerifyStudentInfoc extends BaseController {

    //put your code here
    public function index() {
        $data = array('title' => 'Student Profile'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');
        $this->form_validation->set_rules('agree', 'Agree', 'trim|required');
        $this->form_validation->set_rules('phoneno', 'Phoneno', 'trim|required|min_length[11]|max_length[14]'); //|is_unique[tblregistered.phoneno]');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/verifystudentinfo', $data);
            echo view('template/footer');
        } else {
            $data = array('agree' => 'Yes', 'phoneno' => $this->input->post('phoneno'));
            $this->session->set_userdata($data);
            redirect('student/loadpicc', 'refresh');
            return TRUE;
        }
    }

}
