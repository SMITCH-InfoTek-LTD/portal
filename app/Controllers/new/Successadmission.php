<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Successadmission
 *
 * @author osagiesammy
 */
class Successadmission extends BaseController {

    //put your code here
     public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ug/Student_m');
        $this->load->helper('html');
    }

    public function index() {
        echo view('template/header');
        echo view('template/header_menu');
        echo view('new/successadmission');
        echo view('template/footer_other');
    }

}
