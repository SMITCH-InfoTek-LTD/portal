<?php
namespace App\Controllers;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Prospective
 *
 * @author osagiesammy
 */
class Prospective extends BaseController {

//put your code here

    public function index() {
        $this->load->helper('url');
        echo view('template/header');
        echo view('template/header_menu');
        echo view('prospective');
        echo view('template/footer_other');
    }

}
