<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UpdateSuccess
 *
 * @author osagiesammy
 */
class UpdateSuccess extends BaseController {

    //put your code here
    public function index() {
        //session_start();
        $data = array('title' => 'Student OLevel Upload Successful'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');

        $this->load->view('template/header');
        $this->load->view('template/header_menu');
        $this->load->view('secured/updateStudentSuccess', $data);
        $this->load->view('template/footer_other');
    }

}
