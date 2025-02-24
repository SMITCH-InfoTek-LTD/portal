<?php
namespace App\Controllers;
/*
  /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Export2Excel
 *
 * @author osagiesammy
 */
class Export2Excel extends BaseController {

    //put your code here
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('html');
        $this->load->helper('download');
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->form_validation->set_rules('regno', 'Regno', 'trim|required|xss_clean');
    }

    public function index() {

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('bursary/export2excel');
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            $filename = "studentaccounts.csv";
            $sql = "SELECT students.regno,students.Sname,students.Fname,students.fact,students.dept,paymentTrans.Amount,paymentTrans.transactiontime,paymentItems.ItemName,paymentTrans.academic_session FROM students,paymentTrans,paymentItems,admittedstudents WHERE(admittedstudents.RegNumb=paymentTrans.RegNumb)AND(paymentItems.ItemCode=paymentTrans.Item_Code)AND((paymentTrans.status='01') || (paymentTrans.status ='00'))ORDER BY paymentTrans.transID ASC";
            $query = $this->db->query($sql);
            //foreach ($query->result_array() as $row) {
            //    echo $row['regno'];echo $row['Amount'];echo $row['Sname'];echo $row['fact'];
            //}
            $data = $this->dbutil->csv_from_result($query);
            force_download($filename, $data);
        }
    }

}