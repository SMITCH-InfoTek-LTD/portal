<?php



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
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('secured/verifystudentinfo', $data);
            $this->load->view('template/footer');
        } else {
            $data = array('agree' => 'Yes', 'phoneno' => $this->input->post('phoneno'));
            $this->session->set_userdata($data);
            redirect('student/loadpicc', 'refresh');
            return TRUE;
        }
    }

}
