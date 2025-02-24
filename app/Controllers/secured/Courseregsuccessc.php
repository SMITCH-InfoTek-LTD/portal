<?php
namespace App\Controllers;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of successc
 *
 * @author Mitchelle Ateb
 */
class Courseregsuccessc extends BaseController {
    //put your code here
    
    function index(){
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        echo view('template/header');
        echo view('template/header_menu');
        echo view('secured/courseregistrationsuccess');
        echo view('template/footer_other');
    }
}
