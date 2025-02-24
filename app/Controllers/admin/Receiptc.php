<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Receiptc
 *
 * @author osagiesammy
 */
class Receiptc extends BaseController{
    //put your code here
     public function index() {
        $data = array('title' => 'remita payment');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('secured/Paymentremita_m');
        $this->load->helper('html');
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('secured/receipt', $data);
            $this->form_validation->set_message('rule', 'Error Message');
            $this->load->view('template/footer_other');
        } 
    }    
}
