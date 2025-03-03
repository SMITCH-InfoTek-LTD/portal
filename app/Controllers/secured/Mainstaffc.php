<?php
namespace App\Controllers;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainstaffc
 *
 * @author Mitchelle Ateb
 */
class Mainstaffc extends BaseController {

    //put your code here
    public function index() {
        //session_start();
        $data = array('title' => 'welcome to staff secured page'
        );
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->library('table');
        $this->load->helper('url');
        $this->load->helper('html');
        echo view('template/header');
        echo view('template/header_menu');
        echo view('secured/admin/mainstaff', $data);
        echo view('template/footer_other');
    }

}

?>
