<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HostelReceipts
 *
 * @author osagiesammy
 */
class HostelReceipts extends BaseController {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('ug/Student_m');
        $this->load->model('ug/Paymentremita_m');
        $this->load->helper('html');
    }

    public function index() {
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('RRR', 'RRR number', 'trim|required|xss_clean|alpha_numeric|callback_RRRNUMB_check');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/hostelreceipts');
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            $regno = $_SESSION['RegNumb'];
            $query = $this->db->get_where('allocations', array('regno' => $regno, 'status' => 'PAID'));
            if ($query->num_rows() > 0) {
                $row2 = $query->row_array();//var_dump($row2);die();
                $_SESSION['hostelname'] = $row2['hostelname'];
                $_SESSION['bkdate'] = $row2['bkdate'];
                $_SESSION['bedspace'] = $row2['bedspace'];
                $_SESSION['bookstatus'] = $row2['status'];

$Sqlqry = "SELECT paymentItems.ItemCode,paymentItems.ItemName,paymentTrans.Amount,
    paymentTrans.status,paymentTrans.academic_session,paymentTrans.message,paymentTrans.OrderID,
    paymentTrans.RRR,paymentTrans.transID,paymentTrans.transactiontime FROM paymentTrans,paymentItems
    WHERE(paymentItems.ItemCode = paymentTrans.Item_Code)AND((paymentTrans.status = '00')||(paymentTrans.status = '01'))
    AND(paymentTrans.Item_Code IN(1046,1047,1048,1049,1050,1051,1052))
    AND (paymentTrans.RegNumb='".$_SESSION['RegNumb']."')AND(paymentTrans.academic_session='".ACADEMIC_SESSION."')";
                $qry = $this->db->query($Sqlqry);//var_dump($qry);
                if ($qry->num_rows() > 0) {
                    $row3 = $qry->row_array(); //var_dump($row3);//die();
                    $_SESSION['RRR0'] = $row3['RRR'];
                    $_SESSION['Amt'] = $row3['Amount'];
                    $_SESSION['OrdID'] = $row3['OrderID'];
                    $_SESSION['tID'] = $row3['transID'];
                    $_SESSION['tTime'] = $row3['transactiontime'];
                    $_SESSION['itName'] = $row3['ItemName'];
                    $_SESSION['sts'] = $row3['status'];
                    redirect('secured/PrintHostelreceipt', 'refresh');
                } else {
                    $msg = "<font color='red'><br/>Sorry. You have not paid for Accommodation!!!</font>";
                    $_SESSION['paymsg'] = $msg;
                    $this->session->mark_as_flash('paymsg');
                    redirect('secured/HostelReceipts', 'refresh');
                }
            } else {
                $msg = "<font color='red'><br/>Sorry. You HAVE NOT BOOKED FOR HOSTEL!!!</font>"; 
                $_SESSION['paymsg'] = $msg;
                $this->session->mark_as_flash('paymsg');
                redirect('secured/HostelReceipts', 'refresh');
            }
        }
    }

    public function RRRNUMB_check() {
        $this->RRR = $this->input->post('RRR');
        $query = $this->db->get_where('paymentTrans', array('RRR' => $this->RRR));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('RRRNUMB_check', 'Invalid credential submitted transaction FAILED!!!');
            return FALSE;
        }
    }

}
