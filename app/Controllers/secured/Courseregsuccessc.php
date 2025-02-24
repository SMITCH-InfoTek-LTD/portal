<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
        $this->load->view('template/header');
        $this->load->view('template/header_menu');
        $this->load->view('secured/courseregistrationsuccess');
        $this->load->view('template/footer_other');
    }
}
