<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenerateRRR
 *
 * @author osagiesammy
 */
class GetPaymentStatus extends BaseController {

    //put your code here
    function __construct() {
// Call the Model constructor
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
        $this->form_validation->set_rules('RRR', 'RRR number', 'trim|required|xss_clean|alpha_numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('admin/getpaymentstatus');
            $this->form_validation->set_message('rule', 'Error Message');
            $this->load->view('template/footer_other');
        } else {
            $this->rrr = $this->input->post('RRR');
            $this->response = $this->Paymentremita_m->getPaymentStatusReg($this->rrr);
            $response_code = $this->response['status'];
            $response_message = $this->response['message'];
            $transtime = $this->response['transactiontime'];
            $orderId = $this->response['orderId'];
            //var_dump($this->response);die();
            $_SESSION['response_code'] = $this->response['status'];
            $_SESSION['response'] = $this->response['status'];
            $_SESSION['message'] = $this->response['message'];
            $_SESSION['transactiontime'] = $this->response['transactiontime'];
            $_SESSION['orderId'] = $this->response['orderId'];
            
            if (isset($this->response['RRR'])) {
                $this->rrr0 = $this->response['RRR'];
                $_SESSION['RRR'] = $this->rrr0;
            }
            if ($response_code == '01' || $response_code == '00') {
                //Payment Successful, You can Update Status to Paid here on Database;
                $data = array(
                    'RRR' => $this->rrr0,
                    'transID' => $orderId,
                    'message' => $response_message,
                    'status' => $response_code,
                    'transactiontime' => $transtime,
                    'Flag' => "Update from Remita"
                );
                //var_dump($data);die();
                $this->db->update('paymentTrans', $data, array('OrderID' => $orderId));
                //if ($this->db->affected_rows() > 0) {
                    //echo "Number of rows " . $this->db->affected_rows();
                    $this->db->where('OrderID', $orderId);
                //}
                $query = $this->db->get('paymentTrans');
                    $row = $query->row();
                    $_SESSION['orderId'] = $row->OrderID;
                    $_SESSION['RRR'] = $row->RRR;
                    $_SESSION['message'] = $row->message;
                    $_SESSION['transactiontime'] = $row->transactiontime;
                    $_SESSION['status'] = $row->status;
                    $_SESSION['amount'] = $row->Amount;
            }
            //var_dump($data);die();
            //expire variables in 20secs
            $this->session->mark_as_temp(array('orderId', 'message','transactiontime','status','amount','response_code','RRR'), 50);
            $response_message = $this->response['message'];
            redirect('admin/GetStatusCheck', 'refresh');
            return TRUE;
        }
        return FALSE;
    }

}
