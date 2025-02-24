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
class Processpayment extends BaseController {
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
        echo view('template/header');
        echo view('template/header_menu');
        echo view('secured/processpayment');
        echo view('template/footer_other');
    }

}
