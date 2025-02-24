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
class Displaycandidateinfoc extends BaseController {

    //put your code here
    public function index() {
        $data = array('title' => 'Candidate Profile'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->database();
        $this->load->helper('html');
        $this->load->view('template/header');
            $this->load->view('template/header_menu');
        $this->load->view('secured/displayCandidateinfo', $data);
        $this->load->view('template/footer_other');
    }

}