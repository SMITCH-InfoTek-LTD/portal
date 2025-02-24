<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of displaystaffinfoc
 *
 * @author Mitchelle Ateb
 */
class UpdateOlevelc extends BaseController {
    
    //put your code here
    public function index() {
        //session_start();
        $data = array('title' => 'Student OLevel Upload'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');
        
        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('admissions/onesittings', $data);
            echo view('template/footer_other');
        } else {
            $this->Olevels_m->registerOlevels_1_sittings();
            redirect('admissions/olevelupdatesuccessc', 'refresh');
            return FALSE;
        }
}
}
