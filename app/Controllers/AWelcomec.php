<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AWelcome
 *
 * @author osagiesammy
 */
class AWelcomec extends BaseController{
    //put your code here
    public function index() {
     
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('html');
        $this->load->view('template/header');
        $this->load->view('template/header_menu');
        $this->load->view('awelcome');
        $this->load->view('template/footer_other');
    }
}
