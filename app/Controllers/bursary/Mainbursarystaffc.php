<?php

namespace App\Controllers;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainstaffc
 *
 * @author Mitchelle Ateb
 */
class Mainbursarystaffc extends BaseController {

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
        echo view('bursary/mainbursarystaff');
        echo view('template/footer_other');
    }

}

?>
