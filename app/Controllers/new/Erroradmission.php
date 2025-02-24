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
class Erroradmission extends BaseController {

    //put your code here

    public function index() {
        $data = array('title' => 'Error!!!');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->helper('html');

        echo view('template/header');
        echo view('template/header_menu');
        echo view('new/erroradmission', $data);
        echo view('template/footer_other');
    }

}