<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Erroradmission
 *
 * @author osagiesammy
 */
class TransError extends BaseController {

    //put your code here

    public function index() {
        $data = array('title' => 'Error!!!');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->helper('html');

        $this->load->view('template/header');
        $this->load->view('template/header_menu');
        $this->load->view('new/transerror', $data);
        $this->load->view('template/footer_other');
    }

}