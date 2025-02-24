<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of displaystaffinfoc
 *
 * @author Mitchelle Ateb
 */
class Grantaccessstaffinfoc extends BaseController {

    //put your code here
    public function index() {
        session_start();
        $data = array('title' => 'Promote Staff Priviledge'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('Staff_m');
        $this->load->helper('html');
        $this->form_validation->set_rules('roleid', 'Role ID', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('menu/staffmenu');
            $this->load->view('staff/grantaccessstaffinfo', $data);
            $this->load->view('template/footer');
        } else {
            $grantaccess = $this->Staff_m->grantAccess();
            if (!$grantaccess) {
                redirect('/staff/grantaccessstaffinfoc', 'refresh');
            } else {
                redirect('/staff/grantaccessc', 'refresh');
            } 
        }
    }
}

?>
