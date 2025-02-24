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
class Successc extends BaseController {
    //put your code here
    function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->library('table');
    }
    
    function index(){
        $this->load->view('template/header');
            $this->load->view('template/header_menu');
        $this->load->view('secured/admin/success');
        $this->load->view('template/footer_other');
    }
}

?>
