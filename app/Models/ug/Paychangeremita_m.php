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
 * Description of Paychangeremita_m
 *
 * @author osagiesammy
 */
<<<<<<< HEAD
class Paychangeremita_m extends CI_Model{
=======
class Paychangeremita_m extends Model{
>>>>>>> a3c25aa (Converting CI 3 application to CI 4 :: continuation of updating the Model)
    //put your code here
    
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

    function paymentChangeInstitution() {
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
        $this->servicetypeid = $this->input->post('servicetypeid');
        $this->responseurl = site_url('/secured/ReceiptChgInstitution');
        $this->concatString = MERCHANTID . $this->servicetypeid . $this->orderID . $this->amount . $this->responseurl . APIKEY;
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
        $_SESSION['servicetypeid'] = $this->servicetypeid;
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
    
    function paymentChangeCourse(){
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
        $this->servicetypeid = $this->input->post('servicetypeid');
        $this->responseurl = site_url('/secured/ReceiptChgCourse');
        $this->concatString = MERCHANTID . $this->servicetypeid . $this->orderID . $this->amount . $this->responseurl . APIKEY;
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
        $_SESSION['servicetypeid'] = $this->servicetypeid;
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
    
    function paymentAdminChangeApplication() {
        $this->amount = 5000;
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
        $this->servicetypeid = $this->input->post('servicetypeid');
        $this->responseurl = site_url('/new/ReceiptPrescreening');
        $this->concatString = MERCHANTID . $this->servicetypeid . $this->orderID . $this->amount . $this->responseurl . APIKEY;
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
        $_SESSION['servicetypeid'] = $this->servicetypeid;
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
    
        function paymentPrescreening() {
        $this->amount = 2500;
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
        $this->servicetypeid = $this->input->post('servicetypeid');
        $this->responseurl = site_url('/new/ReceiptPrescreening');
        $this->concatString = MERCHANTID . $this->servicetypeid . $this->orderID . $this->amount . $this->responseurl . APIKEY;
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
        $_SESSION['servicetypeid'] = $this->servicetypeid;
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
    
}
