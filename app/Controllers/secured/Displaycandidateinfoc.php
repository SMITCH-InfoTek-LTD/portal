<?php

namespace App\Controllers;

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
        echo view('template/header');
            echo view('template/header_menu');
        echo view('secured/displayCandidateinfo', $data);
        echo view('template/footer_other');
    }

}