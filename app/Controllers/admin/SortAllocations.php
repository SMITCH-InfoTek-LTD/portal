<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SortAllocations
 *
 * @author osagiesammy
 */
class SortAllocations extends BaseController {

    //put your code here

    public function index() {
        $data = array('title' => 'Sort Hostel Allocations'
        );

        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');
        $this->form_validation->set_rules('sorting', 'Sorting', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('admin/sortallocations', $data);
            $this->load->view('template/footer_other');
        } else {
            $Sqlqry = 'SELECT RegNumb FROM paymentTrans WHERE((Item_Code="")AND((status = "00")||(status = "01"))'
                    . 'AND(academic_session="' . ACADEMIC_SESSION . '"))';
            $qry = $this->db->query($Sqlqry);
            $l = 0;
            foreach ($qry->result() as $row) {
                //echo $row->RegNumb ."<br/>";
                $this->db->where('regno', $row->RegNumb);
                $query = $this->db->get('allocations');
                $row1 = $query->row_array(); //var_dump($row1);//die();
                $v = $row1["hostelname"];
                //echo $row->RegNumb . $v . "<br/>";
                $this->db->select('ItemName,ItemCode');
                $this->db->where('ItemName', $v);
                $qry = $this->db->get('paymentItems');
                $row2 = $qry->row_array(); var_dump($row2);
                echo $row->RegNumb . "    " . $v . " Code  " . $row2["ItemCode"] . "<br/>";
                if(isset($row2["ItemCode"])) {
                    $data = array(
                        'Item_Code' => $row2["ItemCode"],
                    );
                    $this->db->where('RegNumb', $row->RegNumb);
                    $this->db->update('paymentTrans', $data);
                    if ($this->db->affected_rows() > 0) {
                        $l = $l + $this->db->affected_rows();
                    }
                }
            }
            $msg = 'Total Number Of rows affected = ' . $l;
            $_SESSION['msg'] = $msg;
            $this->session->mark_as_flash('msg');
            redirect('admin/SortAllocations', 'refresh');
        }
    }

}
