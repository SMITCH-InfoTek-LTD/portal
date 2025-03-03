<?php

namespace App\Controllers;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Receiptc
 *
 * @author osagiesammy
 */
class ReceiptChgCourse extends BaseController {

    //put your code here
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('session');
        $this->load->database();
        $this->initD();
    }

    public function index() {

        echo view('template/header');
        echo view('template/header_menu');
        echo view('secured/receipt');
        echo view('template/footer_other');
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
        if ($_SESSION['OrderID'] != null) {
            $response = $this->remita_transaction_details($_SESSION['OrderID']);
            //var_dump($response);echo $_REQUEST['orderID']; die();
            if (isset($response['RRR'])) {
                $response['title'] = 'remita payment response';
                $_SESSION['response'] = $response;
                $data = array(
                    'RRR' => $response['RRR'],
                    //'OrderID'         => $response['orderId'],
                    'message' => $response['message'],
                    'status' => $response['status'],
                    'transID' => $response['orderId'],
                    'transactiontime' => $response['transactiontime'],
                    'amount' => $response['amount'],
                );
                $this->db->where('OrderID', $response['orderId']);
                $this->db->update('paymentTrans', $data);
                 if (($this->db->affected_rows() > 0 ) && (($response['status'] == '01') || ($response['status'] == '00'))) {
                    $data0 = array(
                    'Status' => "T",
                );
                    $this->db->where('RegNumb', $_SESSION["JambID"]);//still here;
                    $this->db->update('changeOfCourse', $data0);
                    $_SESSION['RRR'] = $response['RRR'];
                    $_SESSION['message'] = $response['message'];
                    $_SESSION['status'] = $response['status'];
                    $_SESSION['OrderId'] = $response['orderId'];
                    $_SESSION['transactiontime'] = $response['transactiontime'];
                    $_SESSION['amount'] = $response['amount'];
                    redirect('secured/Successpayment', 'refresh');
                }
            }
        } else {
            redirect('secured/Mainstudentc', 'refresh');
        }
    }

}
