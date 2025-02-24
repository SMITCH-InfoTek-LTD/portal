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
class RevokeHostelsc extends BaseController {

//put your code here
    public function index() {
//session_start();
        $data = array('title' => 'Hostel Booking Revocation'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');
        $this->load->model('new/Search');
        $this->form_validation->set_rules('hostel', 'hostel', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('admin/revokeHostels', $data);
            $this->load->view('template/footer_other');
        } else {
            $vStatus = "BOOKED";
            $query = $this->db->get_where('allocations', array('status' => $vStatus));
            $k = 0;
            foreach ($query->result() as $row) {

                $vHostel = $row->hostelname;
                $vBed = $row->bedspace;
                $regno = $row->regno;
                $today = date("Y-m-d");
                $bkdate = $row->bkdate;
                $datetime1 = date_create($today);
                $datetime2 = date_create($bkdate);
                $diff = date_diff($datetime2, $datetime1);
                if ($diff->format('%a') >= 7) {
                    $data2 = array('status' => "FREE", 'bkdate' => "00-00-0000", 'regno' => "");
                    $this->db->where(array('hostelname' => $vHostel, 'bedspace' => $vBed));
                    $this->db->update('allocations', $data2);
                    if ($this->db->affected_rows() > 0) {
                        $k = $k + 1;
                    }
                }
            }
            $msg = 'Total Number Of BedSpaces Revoked = ' . $k;
            $_SESSION['msg'] = $msg;
            $this->session->mark_as_flash('msg');
            //echo "<script type='text/javascript'>alert('$msg');</script>";
            redirect('admin/RevokeHostelsc', 'refresh');
        }
    }

}
