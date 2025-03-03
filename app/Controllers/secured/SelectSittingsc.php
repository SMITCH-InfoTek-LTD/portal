<?php
namespace App\Controllers;



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SelectSittingsc
 *
 * @author osagiesammy
 */
class SelectSittingsc extends BaseController {

    //put your code here
    //put your code here
    public function index() {
        $data = array('title' => 'select no of sittings');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('secured/Student_m');
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('sittings', 'No. of sittings', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/selectsittings', $data);
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            $this->sittings = $this->input->post('sittings');
            $this->session->set_userdata('sittings', $this->sittings);
            redirect('secured/PrintMyDetails', 'refresh');
            return TRUE;
        }
    }
}
