<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logoutc extends BaseController {

    function index() {
        // Begin the session
        $this->load->library('session');
        $this->load->helper('url');
        $this->session->sess_destroy();
        redirect('/secured/Studentloginc', 'refresh');
    }

}