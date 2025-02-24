<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrintHostelreceipt
 *
 * @author osagiesammy
 */
class PrintExamCard extends BaseController {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('ug/Student_m');
        $this->load->model('ug/Paymentremita_m');
        $this->load->helper('html');
        $this->load->library('M_pdf');
       
    }

    public function index() {
        
        $this->load->view('template/header');
        $this->load->view('template/header_menu');
        $this->load->view('secured/printexamcard');
        $this->form_validation->set_message('rule', 'Error Message');
        $this->load->view('template/footer_other');
    }

}
