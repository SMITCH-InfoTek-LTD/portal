<?php
namespace App\Controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetstudentDetailsc
 *
 * @author osagiesammy
 */
class SuccessAdmchkpayment extends BaseController {

    //put your code here
    function __construct() {
// Call the Model constructor
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
         $this->load->model('ug/Student_m');
        $this->load->model('ug/Paymentremita_m');
        $this->load->helper('html');
    }
    public function index() {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('accadd/receiptAdmChkpayment');
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } 
}
