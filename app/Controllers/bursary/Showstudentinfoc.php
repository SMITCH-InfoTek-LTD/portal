<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Showstudentinfo
 *
 * @author osagiesammy
 */
class Showstudentinfoc extends BaseController {

    //put your code here
    public function index() {
        //session_start();
        $data = array('title' => 'Student Info Display'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->model('secured/Student_m');
        $this->load->view('template/header');
        $this->load->view('template/header_menu');
        $this->load->view('secured/showstudentinfo', $data);
        $this->load->view('template/footer_other');
    }

}
