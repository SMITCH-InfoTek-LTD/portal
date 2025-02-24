<?php
namespace App\Controllers;
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
class Admissionnotification extends BaseController {

    //put your code here

    public function index() {
        $data = array('title' => 'Congratulation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ug/Student_m');
        $this->load->helper('html');
        echo view('template/header');
        echo view('template/header_menu');
        echo view('new/admissionnotification', $data);
        echo view('template/footer_other');
    }

}
