<?php
namespace App\Controllers;

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
        echo view('template/header');
        echo view('template/header_menu');
        echo view('secured/mainstudent', $data);
        echo view('template/footer_other');
    }

}