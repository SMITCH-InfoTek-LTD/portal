<?php
namespace App\Controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetstudentDetailsc
 *
 * @author osagiesammy
 */
class SecuredPayment extends BaseController {

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
        $this->load->helper('captcha');
        $this->load->model('ug/Paymentremita_m');
        $this->load->model('ug/Paychangeremita_m');
        $this->load->helper('html');
        $this->load->model('admin/Captcha');
    }

    public function index() {
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('Amount', 'Amount Paid', 'trim|required|xss_clean');
        $this->form_validation->set_rules('payerName', 'Payer Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('payerEmail', 'Payer Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('payerPhone', 'Payer Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('paymenttype', 'Payment type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('paymentItem', 'Payment Item', 'trim|required|xss_clean');
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|xss_clean|callback_captcha_check');

        if ($this->form_validation->run() == FALSE) {
            $sub_data['cap_img'] = $this->Captcha->make_captcha();
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/securedpayment', $sub_data);
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            $this->acad_sess = ACADEMIC_SESSION;
            $this->itemCode = $this->input->post('ItemCode');
            $this->db->from('paymentTrans');
            $this->db->where('RegNumb', $_SESSION['RegNumb']);
            $this->db->where('Item_Code', $this->itemCode);
            $this->db->where('academic_session', $this->acad_sess);
            $this->db->where('status', '01');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                //var_dump($row);
                //die();
                //echo "Got here 1";
                foreach ($query->result() as $row) {
                    if ($row->status == '01') {
                        $this->db->from('paymentItems');
                        $this->db->where('MultiPay', 'Yes');
                        $this->db->where('ItemCode', $this->itemCode);
                        $query = $this->db->get();
                        if ($query->num_rows() > 0) {
                            $row = $query->row_array();
                            //echo "Got here 2";
                            $this->Paymentremita_m->payment();
                            redirect('secured/Processpayment', 'refresh');
                        } else {
                            $msg = "Hello. You already have a paid OR pending transaction check back in two hours time!!!1st ";
                            $_SESSION['paymsg'] = $msg;
                            $this->session->mark_as_flash('paymsg');
                            redirect('secured/SecuredPayment', 'refresh');
                        }
                    }
                }
            } elseif ($query->num_rows() == 0) {
                $sql = "SELECT * FROM newStudentSchoolFeesSocketWork WHERE"
                        . "(newStudentSchoolFeesSocketWork.REGISTRATION_NUMBER='" . $_SESSION['RegNumb'] . "')";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    $msg = "Hello. You already have a paid OR pending transaction check back in two hours time!!!4th ";
                    $_SESSION['paymsg'] = $msg;
                    $this->session->mark_as_flash('paymsg');
                    redirect('secured/SecuredPayment', 'refresh');
                } else {
                    if ($this->itemCode == "3003") {
                        /*                         * * begining of change of institution and change of course */
                        //echo  '  '. $this->itemCode;die();
                        $sql0 = "SELECT * FROM changeOfInstitution WHERE"
                                . "(changeOfInstitution.RegNumb='" . $_SESSION['JambID'] . "')"
                                . "AND(changeOfInstitution.Status='F')";
                        $query0 = $this->db->query($sql0);
                        if ($query0->num_rows() > 0) {
                            $row = $query0->row_array();
                            //var_dump($row);
                            //exit();
                            //echo "Got here 3";
                            //pay 80,000
                            $this->Paychangeremita_m->paymentChangeInstitution();
                            redirect('secured/Processpayment', 'refresh');
                        } else {
                            $msg = "<font color='red'>Hello. You already have a paid for change of institution! Please visit the ICT center</font>";
                            $_SESSION['paymsg'] = $msg;
                            $this->session->mark_as_flash('paymsg');
                            redirect('secured/SecuredPayment', 'refresh');
                        }
                    } elseif ($this->itemCode == "3002") {
                        $sql00 = "SELECT * FROM changeOfCourse WHERE"
                                . "(changeOfCourse.RegNumb='" . $_SESSION['JambID'] . "')"
                                . "AND(changeOfCourse.Status='F')";
                        $query00 = $this->db->query($sql00);
                        if ($query00->num_rows() > 0) {
                            $row = $query00->row_array();
                            //var_dump($row);
                            //exit();
                            //echo "Got here 4";
                            //pay 25000 
                            $this->Paychangeremita_m->paymentChangeCourse();
                            redirect('secured/Processpayment', 'refresh');
                        }else{
                            $msg = "<font color='red'>Hello. You already have a paid for change of course! Please visit the ICT center</font>";
                            $_SESSION['paymsg'] = $msg;
                            $this->session->mark_as_flash('paymsg');
                            redirect('secured/SecuredPayment', 'refresh');
                        }
                    } else {
                        //echo "/***end of change of course and change of institution */";
                        $this->Paymentremita_m->payment();
                        redirect('secured/Processpayment', 'refresh'); //
                    }
                }
            }
        }
    }

    public function paymentItem() {
        $q = $this->input->get('q');
        $this->return_arr = array();
        $this->db->order_by('cCode ASC');
        $this->db->select('ItemName,ItemCode,ItemCost,serviceID');
        $this->db->distinct();
        $sql = "SELECT ItemName,ItemCode,ItemCost,serviceID FROM paymentItems WHERE ItemCode LIKE '%" . $q . "%'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['ItemName'] = $row->ItemName;
                $data['ItemCode'] = $row->ItemCode;
                $data['ItemCost'] = $row->ItemCost;
                $data['serviceID'] = $row->serviceID;
                array_push($this->return_arr, $data);
            }
            echo json_encode($this->return_arr);
        } else {
            echo "FAILED";
        }
    }

    public
            function captcha_check() {
// First, delete old captchas
        $expiration = time() - 3600; // One hour limit
        $this->db->where('captcha_time < ', $expiration)
                ->delete('captcha');
// Then see if a captcha exists:
        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        if ($row->count == 0) {
            $this->form_validation->set_message('captcha_check', 'You must submit the word that appears in the image');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
