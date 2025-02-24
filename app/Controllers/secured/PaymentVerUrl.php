<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaymentVerUrl
 *
 * @author osagiesammy
 */
class PaymentVerUrl extends BaseController {

//put your code here
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
    }

    public function index() {


           $json = file_get_contents('php://input');
            $arr = json_decode($json, true);
            try {
                if ($arr != null) {
                    foreach ($arr as $key => $value) {
                        $this->orderRef = $value['orderRef'];
                        $this->response = $this->remita_transaction_details($this->orderRef);
                        $response_code = $this->response['status'];
                        $response_message = $this->response['message'];
                        $transtime = $this->response['transactiontime'];
                        $orderId = $this->response['orderId'];

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

                            $data = array(
                                'RRR' => $this->rrr0,
                                'transID' => $orderId,
                                'message' => $response_message,
                                'status' => $response_code,
                                'transactiontime' => $transtime
                            );
         
                            $this->db->update('paymentTrans', $data, array('OrderID' => $orderId));
                        }
                    }
                    exit('OK');
                }
            } catch (Exception $e) {
                exit('Not OK');
            }
    }
    public function remita_transaction_details($orderId) {
        $mert = MERCHANTID;
        $api_key = APIKEY;
        $mode = "Test";
        $hash_string = $orderId . $api_key . $mert;
        $hash = hash('sha512', $hash_string);
        if ($mode == 'Test') {
            $query_url = 'http://www.remitademo.net/remita/ecomm';
        } else if ($mode == 'Live') {
            $query_url = 'https://login.remita.net/remita/ecomm';
        }
        $url = $query_url . '/' . $mert . '/' . $orderId . '/' . $hash . '/' . 'orderstatus.reg';
        $result = file_get_contents($url);
        $response = json_decode($result, true);
        return $response;
    }
}
    