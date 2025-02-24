<?php



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exitc
 *
 * @author osagiesammy
 */
class Exitc extends BaseController{
    //put your code here
    function index() {
        // Begin the session
        $this->load->library('session');
        $this->load->helper('url');
        $this->session->sess_destroy();
        redirect('/Welcome', 'refresh');
    }
}
