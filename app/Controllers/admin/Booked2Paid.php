<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Booked2Paid
 *
 * @author osagiesammy
 */
class Booked2Paid extends BaseController{
    //put your code here
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
            echo view('template/header');
            echo view('template/header_menu');
            echo view('admin/booked2paid', $data);
            echo view('template/footer_other');
        } else {
            $Sqlqry = "SELECT paymentItems.ItemCode,students.regno,paymentItems.ItemName,paymentTrans.Amount,"
                    . "paymentTrans.status,paymentTrans.academic_session,paymentTrans.message,paymentTrans.OrderID,"
                    . "paymentTrans.RRR,paymentTrans.transID,paymentTrans.transactiontime FROM paymentTrans,paymentItems,students "
                    . "WHERE((paymentItems.ItemCode = paymentTrans.Item_Code) AND (students.regno = paymentTrans.RegNumb))"
                    . "AND((paymentTrans.status = '00') || (paymentTrans.status = '01'))"
                    . "AND((paymentItems.ItemCode = '1046')||(paymentItems.ItemCode = '1047')||(paymentItems.ItemCode = '1048')"
                    . "||(paymentItems.ItemCode = '1049')||(paymentItems.ItemCode = '1050')||(paymentItems.ItemCode='1051')||(paymentItems.ItemCode='1052'))"
                    . "AND(paymentTrans.academic_session='" . ACADEMIC_SESSION . "')";
            $qry = $this->db->query($Sqlqry);
            //$row = $qry->row_array();var_dump($row);die();
            $k = 0;$l =0;
            foreach ($qry->result() as $row) {
                $vRegno = $row->regno;
                $this->db->set('status',"PAID");
                $this->db->where('regno', $vRegno);
                $this->db->update('allocations');
                if ($this->db->affected_rows() > 0) {
                    $k = $k + $this->db->affected_rows();                  
                }
            } 
            $msg = 'Total Number Of rows affected = ' . $k;
            $_SESSION['msg'] = $msg;
            $this->session->mark_as_flash('msg');
            redirect('admin/Booked2Paid', 'refresh');
        }
    }
}
