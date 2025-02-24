<?php

<<<<<<< HEAD
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
=======
namespace App\Models; 

use CodeIgniter\Model;
>>>>>>> a3c25aa (Converting CI 3 application to CI 4 :: continuation of updating the Model)
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paymentremita
 *
 * @author osagiesammy
 */
<<<<<<< HEAD
class Paymentremita_m extends CI_Model {
=======
class Paymentremita_m extends Model {
>>>>>>> a3c25aa (Converting CI 3 application to CI 4 :: continuation of updating the Model)

//put your code here
    var $amount;
    var $timesammp;
    var $orderID;
    var $Student_type;
    var $payerName;
    var $payerEmail;
    var $payerPhone;
    var $paymentItem;
    var $RegNumb;
    var $acad_sess;
    var $rrr;
    var $responseurl;
    var $itemname;
    var $concatString;
    var $hash;
    var $paymenttype;

    function __construct() {
// Call the Model constructor
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('date');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->library('email');
    }

    function payment() {
        $this->amount = $this->input->post('smitch');
        $this->acad_sess = $this->input->post('academic_session');
        $this->timesammp = DATE("dmyHis");
        $this->orderID = $this->timesammp;
        $this->faculty = $this->input->post('faculty');
        $this->itemname = $this->input->post('itemname');
        $this->Student_type = $this->input->post('studentype');
        $this->payerName = $this->input->post('payerName');
        $this->Course = $this->input->post('Course');
        $this->payerEmail = $this->input->post('payerEmail');
        $this->dept = $this->input->post('dept');
        $this->payerPhone = $this->input->post('payerPhone');
        $this->paymentItem = $this->input->post('paymentItem');
        $this->responseurl = site_url('/secured/Receiptc');
        $this->concatString = MERCHANTID . SERVICETYPEID . $this->orderID . $this->amount . $this->responseurl . APIKEY;
        $this->hash = hash('sha512', $this->concatString);
        $this->paymenttype = $this->input->post('paymenttype');
        $this->itemCode = $this->input->post('ItemCode');
        $_SESSION['Amount'] = $this->amount;
        $_SESSION['OrderID'] = $this->orderID;
        $_SESSION['faculty'] = $this->faculty;
        $_SESSION['PayerName'] = $this->payerName;
        $_SESSION['Course'] = $this->Course;
        $_SESSION['PayerEmail'] = $this->payerEmail;
        $_SESSION['PayerPhone'] = $this->payerPhone;
        $_SESSION['academic_session'] = $this->acad_sess;
        $_SESSION['ResponseUrl'] = $this->responseurl;
        $_SESSION['Hash'] = $this->hash;
        $_SESSION['PaymentItem'] = $this->paymentItem;
        $_SESSION['PaymentType'] = $this->paymenttype;
        $_SESSION['ItemCode'] = $this->itemCode;
        $_SESSION['Student_type'] = $this->Student_type;
        $trans_data = array(
            'RegNumb' => $_SESSION['RegNumb'],
            'Student_type' => $_SESSION['Student_type'],
            'Item_Code' => $_SESSION['ItemCode'],
            'OrderID' => $_SESSION['OrderID'],
            'Amount' => $_SESSION['Amount'],
            'payment_type' => $_SESSION['PaymentType'],
            'academic_session' => $_SESSION['academic_session']
        );
        $this->db->insert('paymentTrans', $trans_data);
    }

    function paymentAdminCheck() {
        $this->amount = $this->input->post('smitch');
        $this->RegNumb = $this->input->post('RegNumb');
        $this->acad_sess = $this->input->post('academic_session');
        $this->timesammp = DATE("dmyHis");
        $this->orderID = $this->timesammp;
        $this->faculty = $this->input->post('faculty');
        $this->itemname = $this->input->post('itemname');
        $this->Student_type = $this->input->post('studentype');
        $this->payerName = $this->input->post('payerName');
        $this->Course = $this->input->post('Course');
        $this->payerEmail = $this->input->post('payerEmail');
        $this->dept = $this->input->post('dept');
        $this->payerPhone = $this->input->post('payerPhone');
        $this->paymentItem = $this->input->post('paymentItem');
        $this->responseurl = site_url('/new/ReceiptAdmchkc');
        $this->concatString = MERCHANTID . SERVICETYPEID . $this->orderID . $this->amount . $this->responseurl . APIKEY;
        $this->hash = hash('sha512', $this->concatString);
        $this->paymenttype = $this->input->post('paymenttype');
        $this->itemCode = $this->input->post('ItemCode');
        $_SESSION['Amount'] = $this->amount;
        $_SESSION['RegNumb'] = $this->RegNumb;
        $_SESSION['OrderID'] = $this->orderID;
        $_SESSION['faculty'] = $this->faculty;
        $_SESSION['PayerName'] = $this->payerName;
        $_SESSION['Course'] = $this->Course;
        $_SESSION['PayerEmail'] = $this->payerEmail;
        $_SESSION['dept'] = $this->dept;
        $_SESSION['PayerPhone'] = $this->payerPhone;
        $_SESSION['academic_session'] = $this->acad_sess;
        $_SESSION['ResponseUrl'] = $this->responseurl;
        $_SESSION['Hash'] = $this->hash;
        $_SESSION['itemname'] = $this->itemname;
        $_SESSION['PaymentItem'] = $this->paymentItem;
        $_SESSION['PaymentType'] = $this->paymenttype;
        $_SESSION['ItemCode'] = $this->itemCode;
        $_SESSION['Student_type'] = $this->Student_type;
        //print_r($_SESSION);die();
        $trans_data = array(
            'RegNumb' => $_SESSION['RegNumb'],
            'Student_type' => $_SESSION['Student_type'],
            'Item_Code' => $_SESSION['ItemCode'],
            'OrderID' => $_SESSION['OrderID'],
            'Amount' => $_SESSION['Amount'],
            'payment_type' => $_SESSION['PaymentType'],
            'academic_session' => $_SESSION['academic_session']
        );

        $this->db->insert('paymentTrans', $trans_data);
    }

    function getPaymentStatus($rrr) {
        $this->rrr = $this->input->post('RRR');
        $query = $this->db->get_where('paymentTrans', array('RRR' => $rrr));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $query = $this->db->get_where('admittedstudents', array('RegNumb' => $row['RegNumb']));
            $_SESSION['itemname'] = $row['Item_Code'];
            $_SESSION['academic_session'] = $row['academic_session'];
            $_SESSION['Student_Type'] = $row['Student_type'];
            $row1 = $query->row_array();
            $_SESSION['RegNumb'] = $row1['RegNumb'];
            $_SESSION['PayerName'] = $row1['candname'];
            $_SESSION['Course'] = $row1['Course'];
            $_SESSION['faculty'] = $row1['faculty'];
            $_SESSION['dept'] = $row1['dept'];
            $mert = MERCHANTID;
            $api_key = APIKEY;
            $concatString = $this->rrr . $api_key . $mert;
            $hash = hash('sha512', $concatString);
            $url = CHECKSTATUSURL . '/' . $mert . '/' . $this->rrr . '/' . $hash . '/' . 'status.reg';
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
        } else {
            return FALSE;
        }
    }



    function getPaymentStatusRMT() {
        $this->rrr = $this->input->post('RRR');
        $this->RegNumb = $this->input->post('RegNumb');
        $query = $this->db->get_where('paymentTrans', array('RRR' => $this->rrr));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $mert = MERCHANTID;
            $api_key = APIKEY;
            $concatString = $this->rrr . $api_key . $mert;
            $hash = hash('sha512', $concatString);
            $url = CHECKSTATUSURL . '/' . $mert . '/' . $this->rrr . '/' . $hash . '/' . 'status.reg';
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
            if (($response['status'] == '00') || ($response['status'] == '01')) {
                $data = array(
                    'transactiontime' => $response['transationtime'],
                    'status' => $response['status'],
                    'message' => $response['message']
                );
                $this->db->where('RRR', $response['RRR']);
                $this->db->update('paymentTrans', $data);
            }
            return $response;
        } else {
            return FALSE;
        }
    }

    /*******
    function printreceipt() {
        $this->rrr = $this->input->post('RRR');
        $this->RegNumb = $_SESSION['RegNumb'];
        $sql = "select * FROM students,paymentTrans WHERE students.regno = paymentTrans.RegNumb AND paymentTrans.RRR =". $this->rrr;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
        } else {
            return FALSE;
        }
    }
    ******/
    
    function printreceipt() {
        $this->rrr = $this->input->post('RRR');
        $this->RegNumb = $_SESSION['RegNumb'];
        $sql = "select * FROM students,paymentTrans WHERE students.regno = paymentTrans.RegNumb AND paymentTrans.RRR =". $this->rrr;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $sql1 = "select * FROM paymentItems WHERE ItemCode =".$row['Item_Code'];
            $query1 = $this->db->query($sql1);
            if ($query1->num_rows() > 0) {
             $row1 = $query1->row_array();
             $_SESSION["PaymentItem"] = $row1['ItemName'];
            return $row;
            }
        } else {
            return FALSE;
        }
    }
    
    function getPaymentStatusReg($rrr) {
        $this->rrr = $this->input->post('RRR');
        $query = $this->db->get_where('paymentTrans', array('RRR' => $rrr));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $query1 = $this->db->get_where('students', array('regno' => $row['RegNumb']));
            $_SESSION['itemname'] = $row['Item_Code'];
            $_SESSION['academic_session'] = $row['academic_session'];
            $_SESSION['Student_Type'] = $row['Student_type'];
            $row1 = $query1->row_array();
            //var_dump($row);echo "===========";var_dump($row1);die();
            //$_SESSION['RegNumb'] = $row1['RegNumb'];
            //$_SESSION['PayerName'] = $row1['candname'];
            //$_SESSION['Course'] = $row1['Course'];
            //$_SESSION['faculty'] = $row1['faculty'];
            //$_SESSION['dept'] = $row1['dept'];
            $mert = MERCHANTID;
            $api_key = APIKEY;
            $concatString = $this->rrr . $api_key . $mert;
            $hash = hash('sha512', $concatString);
            $url = CHECKSTATUSURL . '/' . $mert . '/' . $this->rrr . '/' . $hash . '/' . 'status.reg';
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
        } else {
            return FALSE;
        }
    }

}
