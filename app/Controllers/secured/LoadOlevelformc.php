<?php
namespace App\Controllers;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoadOlevelformc
 *
 * @author osagiesammy
 */
class LoadOlevelformc extends BaseController{
    //put your code here
    public function index(){
        //session_start();
        $data = array('title' => 'Student OLevel Upload'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');
    }
    
    public function onesittings(){
        
         echo view('admissions/onesittings', $data);
    }
    
    public function doublesittings(){
        echo view('admissions/doublesittings', $data);
    }
}
