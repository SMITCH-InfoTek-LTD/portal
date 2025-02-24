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
class PrintRegCoursesShow extends BaseController {

    //put your code here
    public function index() {
        //session_start();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->library('table');
        $this->load->model('ug/Courseregistration');
        echo view('template/header');
        echo view('template/header_menu');
        echo view('secured/printegoursesshow');
        echo view('template/footer_other');
    }

}

