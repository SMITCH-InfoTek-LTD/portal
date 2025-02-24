<?php


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
        echo view('template/header');
            echo view('template/header_menu');
        echo view('secured/admin/success');
        echo view('template/footer_other');
    }
}

?>
