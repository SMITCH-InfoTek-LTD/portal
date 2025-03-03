<?php

namespace App\Controllers;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Indexc
 *
 * @author osagiesammy
 */
class Indexc extends BaseController{
    //put your code here
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
     
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('html');
        echo view('template/header');
        echo view('template/anastasiaHeadermenu');
        echo view('index');
        echo view('template/footer');
    }
    
}
