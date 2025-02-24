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
 * @author Uchenna Igboeli
 */
class Jambtoregnoc extends BaseController {

//put your code here
    public function index() {
//session_start();
        $data = array('title' => 'Upload Screened Students'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');
        $this->load->model('new/Search');
        $this->form_validation->set_rules('jambtoreg', 'regno', 'trim|xss_clean');
        //$this->form_validation->set_rules('degree', 'Degree', 'trim|required|xss_clean');

        $k = 0;

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('admin/jambtoregno', $data);
            $this->load->view('template/footer_other');
        } else {
            $query = $this->db->get('jambtoreg');
            $k = 0;$l =0;
            foreach ($query->result() as $row) {
                $vJambID = $row->jambid;
                $vRegno = $row->regno;
                $level = $row->Level;
                $this->db->set('regno',$vRegno);
                $this->db->where('RegNumb', $vJambID);
                $this->db->update('students');
                if ($this->db->affected_rows() > 0) {
                    $k = $k + $this->db->affected_rows();
                    $this->db->set('RefNumb',$vRegno);
                    $this->db->where('RegNumb', $vJambID);
                    $this->db->update('admittedstudents');
                    if ($this->db->affected_rows() > 0) {
                       $l = $l + $this->db->affected_rows();
                    }
                    
                }
            } 
            $msg = 'Total Number Of Candidates Replaced = ' . $k;
            $msg2 = 'Total Number Of Refrence number updated = ' . $l;
            //echo "<script type='text/javascript'>alert('$msg');</script>";
            //echo "<script type='text/javascript'>alert('$msg2');</script>";
            $_SESSION['msg'] = $msg;$_SESSION['msg2'] = $msg2;
            $this->session->mark_as_flash('msg');$this->session->mark_as_flash('msg2');
            redirect('admin/Jambtoregnoc', 'refresh');
        }
    }

}
