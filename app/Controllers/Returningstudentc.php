<?php

namespace App\Controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Returningstudentc
 *
 * @author osagiesammy
 */
class Returningstudentc extends BaseController{
    //put your code here
    
    public function index() {
     
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('html');
        echo view('template/header');
        echo view('template/header_menu');
        echo view('returningstudents');
        echo view('template/footer_other');
    }
}

