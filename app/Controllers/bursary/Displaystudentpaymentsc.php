<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Displaystudentpaymentsc
 *
 * @author osagiesammy
 */
class Displaystudentpaymentsc extends BaseController {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->model('ug/Student_m');
        $this->load->model('ug/Paymentremita_m');
        $this->load->helper('html');
    }

    public function index() {
        $data = array('title' => 'student payments'
        );
        echo view('template/header');
        echo view('template/header_menu');
        $config["base_url"] = base_url() . "index.php/bursary/Displaystudentpaymentsc";
        $config['total_rows'] = 10;
        $config['per_page'] = 1;
        $this->pagination->initialize($config);
        if ($this->uri->segment(3)) {
            $page = ($this->uri->segment(3));
        } else {
            $page = 1;
        }
        $data["vals"] = $_SESSION['results'];
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        echo view('bursary/displaystudentpayments', $data);
        echo view('template/footer_other');
    }

}
