<?php
namespace App\Controllers;
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
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/receipt', $data);
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } 
    }    
}
