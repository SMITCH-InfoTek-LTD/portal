<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainstaffc
 *
 * @author Mitchelle Ateb
 */
class Mainstaffc extends BaseController {

    //put your code here
    public function index() {
        //session_start();
       
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->library('table');
        $this->load->helper('url');
        $this->load->helper('html');
        echo view('template/header');
        echo view('template/header_menu');
        echo view('admin/mainstaff');
        echo view('template/footer_other');
    }

}

?>
