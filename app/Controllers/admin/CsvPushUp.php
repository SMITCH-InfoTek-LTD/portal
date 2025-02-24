<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CsvPushUp
 *
 * @author osagiesammy
 */
class CsvPushUp extends BaseController{
    //put your code here
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');
        $this->load->model('admin/Csv_pushUp');
    }
 
    function index() {
        echo view('template/header');
        echo view('template/header_menu');
        //$data['students'] = $this->Csv_pushUp->get_studentrecords();
        echo view('admin/uploadecsv');
        echo view('template/footer_other');
    }
}
