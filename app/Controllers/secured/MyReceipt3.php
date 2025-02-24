<?php


/*
  /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QueryFailedTransactions
 *
 * @author osagiesammy
 */
class MyReceipt3 extends BaseController {

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
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

    public function index() {
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('RRR', 'RRR number', 'trim|required|xss_clean|alpha_numeric|callback_RRRNUMB_check');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('secured/myreceipt3');
            $this->form_validation->set_message('rule', 'Error Message');
            $this->load->view('template/footer_other');
        } else {
            $this->rrr = $this->input->post('RRR');
            $this->ItemCode = $this->input->post('Item_Code');
            $sql1 = "SELECT paymentTrans.RegNumb,paymentItems.ItemName,paymentTrans.Amount,paymentTrans.OrderID,paymentTrans.RRR,"
                    . "paymentTrans.transID,paymentTrans.transactiontime,paymentTrans.academic_session,paymentTrans.message,paymentTrans.Item_Code"
                    . " FROM paymentTrans,paymentItems WHERE((paymentTrans.status = 01)||(paymentTrans.status = 00))"
                    . "AND(paymentTrans.Item_Code=paymentItems.ItemCode)AND(paymentTrans.Item_Code =".$this->ItemCode.")"
                    . "AND(paymentTrans.academic_session='" . ACADEMIC_SESSION . "')AND(paymentTrans.RRR='" . $this->rrr . "')"
                    . "AND paymentTrans.RegNumb = " . $_SESSION['RegNumb'];
            $query = $this->db->query($sql1);
            $row = $query->row_array();
            if (isset($row)) {
                $_SESSION['response3'] = $row;
                redirect('secured/Printschoolreceipt3', 'refresh');
                return TRUE;
            } else {
                return FALSE;
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
