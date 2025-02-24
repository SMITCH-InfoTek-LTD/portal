<?php



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome
 *
 * @author osagiesammy
 */
class Indexc extends BaseController{
    
      //put your code here
    public function index() {
        $data = array('title' => 'Welcome to Post UME Portal --- University of Abuja'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');
        
        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('welcome', $data);
            echo view('template/footer_other');
        }
    }
}
