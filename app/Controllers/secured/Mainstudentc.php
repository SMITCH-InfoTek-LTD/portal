<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainstudentc
 *
 * @author Mitchelle Ateb
 *
 *
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Mainstudentc extends BaseController {

    public function index() {
        //session_start();
        $data = array('title' => 'welcome to secured page'
        );
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ug/Student_m');
        $this->load->helper('html');
        $this->load->view('template/header');
        $this->load->view('template/header_menu');
        $this->load->view('secured/mainstudent', $data);
        $this->load->view('template/footer_other');
    }

}