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
class PrintMyDetails extends BaseController {

    //put your code here
    public function index() {
        //session_start();
        $data = array('title' => 'My POST UTME - Details'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->library('table');
        $this->load->model('secured/Olevels_m');
        echo view('template/header');
        echo view('template/header_menu');
        $this->Olevels_m->viewOlevelSubjects();
        echo view('secured/printMyDetails', $data);
        echo view('template/footer_other');
    }

}

