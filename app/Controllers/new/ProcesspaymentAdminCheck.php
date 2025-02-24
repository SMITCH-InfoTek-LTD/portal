<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Processpayment
 *
 * @author osagiesammy
 */
class ProcesspaymentAdminCheck extends BaseController{
    //put your code here
    function __construct() {
// Call the Model constructor
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('html');
    }
     public function index() {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('new/processpaymentadmincheck');
            $this->load->view('template/footer_other');
    }
}
