<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Printregisteredcourses
 *
 * @author osagiesammy
 */
class Printregisteredcourses extends BaseController {

    //put your code here
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('ug/Courseregistration');
        $this->load->helper('html');
    }

    //put your code here
    public function index() {

        $this->load->view('template/header');
        $this->load->view('template/header_menu');
        $this->load->view('secured/printregisteredcourses');
        $this->form_validation->set_message('rule', 'Error Message');
        $this->load->view('template/footer_other');
    }

    public function printcoursesregistered() {
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('session', 'Session', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('secured/printregisteredcourses');
            $this->form_validation->set_message('rule', 'Error Message');
            $this->load->view('template/footer_other');
        } else {
            $this->session = $this->input->post('session');
            $_SESSION['session'] = $this->session;
            $this->Courseregistration->printCoursesregistered1();
            $this->Courseregistration->printCoursesregistered2();
            redirect('/secured/PrintRegCoursesShow','refresh');
        }
    }

}
