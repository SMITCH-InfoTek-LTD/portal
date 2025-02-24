<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReceiptChangeAdmform
 *
 * @author osagiesammy
 */
class ReceiptChangeAdmform extends BaseController{
    //put your code here
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ug/Paychangeremita_m');
        $this->load->helper('html');
        $this->initD();
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('template/header_menu');
        $this->load->view('new/receiptAdmchk');
        $this->load->view('template/footer_other');
    }

    public function remita_transaction_details($val) {
        $OrderId = $val;
        $mert = MERCHANTID;
        $api_key = APIKEY;
        $concatString = $OrderId . $api_key . $mert;
        $hash = hash('sha512', $concatString);
        $url = CHECKSTATUSURL . '/' . $mert . '/' . $OrderId . '/' . $hash . '/' . 'orderstatus.reg';
        //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);
        // Execute
        $result = curl_exec($ch);

        // Closing         
        curl_close($ch);
        $response = json_decode($result, true);
        return $response;
    }

    public function initD() {
    
        if ($_REQUEST['orderID'] != null) {
            $response = $this->remita_transaction_details($_REQUEST['orderID']);
            //var_dump($response);echo $_REQUEST['orderID']; die();
            if (isset($response['RRR'])) {
                $response['title'] = 'remita payment response';
                $_SESSION['response'] = $response;
                
                $data = array(
                    'RRR' => $response['RRR'],
                    //'OrderID' => $response['orderId'],
                    'message' => $response['message'],
                    'status' => $response['status'],
                    'transID' => $response['orderId'],
                    'transactiontime' => $response['transactiontime'],
                    'amount' => $response['amount']
                );
                
                $this->db->where('OrderID', $response['orderId']);
                $this->db->update('paymentTrans', $data);
                $_SESSION['RRR'] = $response['RRR'];
                $_SESSION['message'] = $response['message'];
                $_SESSION['status'] = $response['status'];
                $_SESSION['OrderId'] = $response['orderId'];
                $_SESSION['transactiontime'] = $response['transactiontime'];
                $_SESSION['amount'] = $response['amount'];
                redirect('new/SuccessAdmchkpayment');
            }
        }else{
       	    redirect('new/ChangeOfAdmissionapplication');
        }
    }
}
