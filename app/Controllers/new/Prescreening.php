<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Prescreening
 *
 * @author osagiesammy
 */
class Prescreening extends BaseController{
    //put your code here
    function __construct() {
// Call the Model constructor
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('captcha');
        $this->load->model('ug/Student_m');
        $this->load->model('ug/Paychangeremita_m');
        $this->load->helper('html');
        $this->load->model('admin/Captcha');
    }

    public function index() {

        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('RegNumb', 'Jamb ID', 'trim|required|xss_clean|alpha_numeric|callback_checkJambID_check');
        $this->form_validation->set_rules('Amount', 'Amount Paid', 'trim|required|xss_clean');
        $this->form_validation->set_rules('payerName', 'Payer Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('payerEmail', 'Payer Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('payerPhone', 'Payer Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('paymenttype', 'Payment type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|xss_clean|callback_captcha_check');

        if ($this->form_validation->run() == FALSE) {
            $sub_data['cap_img'] = $this->Captcha->make_captcha();
            echo view('template/header');
            echo view('template/header_menu');
            echo view('new/prescreeningfee', $sub_data);
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            $this->acad_sess = $this->input->post('academic_session');
            $this->itemname = $this->input->post('itemname');
            $this->itemCode = $this->input->post('ItemCode');
            $this->RegNumb = $this->input->post('RegNumb');
            $this->db->from('paymentTrans');
            $this->db->where('RegNumb', $this->RegNumb);
            $this->db->where('Item_Code', $this->itemCode);
            $this->db->where('status', '01');
            //$this->db->or_where('status', '021');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                foreach ($query->result() as $row) {

                    if ($row->status == '01') {
                        $this->db->from('paymentItems');
                        $this->db->where('MultiPay', 'Yes');
                        $this->db->where('ItemCode', $this->itemCode);
                        $query = $this->db->get();
                        if ($query->num_rows() > 0) {
                            $this->Paychangeremita_m->paymentPrescreening();
                            redirect('new/ProcesspaymentAdminCheck', 'refresh');
                        } else {
                            $msg = "Hello. You already have a paid OR pending transaction check back in two hours time!!! ";
                            $_SESSION['paymsg'] = $msg;
                            $this->session->mark_as_flash('paymsg');
                            redirect('new/ChangeOfAdmissionapplication', 'refresh');
                        }
                   }else{
                         $this->Paychangeremita_m->paymentPrescreening();
                         redirect('new/ProcesspaymentAdminCheck', 'refresh');
                   }
                }
                $msg = "Hello. You already have a paid OR pending transaction check back in two hours time!!! ";
                $_SESSION['paymsg'] = $msg;
                $this->session->mark_as_flash('paymsg');
                //echo "<script type='text/javascript'>alert('$msg');</script>";
                redirect('new/ChangeOfAdmissionapplication', 'refresh');
            } else {
                $this->Paychangeremita_m->paymentPrescreening();
                redirect('new/ProcesspaymentAdminCheck', 'refresh');
                return TRUE;
            }
        }
    }

    public function paymentItem() {
        $q = $this->input->get('q');
        $this->firstsemester = 'FIRST SEMESTER';
        $this->return_arr = array();
        $sql = "SELECT ItemName,ItemCode,ItemCost FROM paymentItems WHERE ItemCode LIKE '%" . $q . "%'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['ItemName'] = $row->ItemName;
                $data['ItemCode'] = $row->ItemCode;
                $data['ItemCost'] = $row->ItemCost;
                array_push($this->return_arr, $data);
            }
            echo json_encode($this->return_arr);
        } else {
            echo "FAILED";
        }
    }

    public function checkJambID_check() {
        $this->RegNumb = $this->input->post('RegNumb');
        $query = $this->db->get_where('admittedstudents', array('RegNumb' => $this->RegNumb));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('checkJambID_check', 'Invalid credential submitted access DENIED!!!');
            return FALSE;
        }
    }

    public function showCandName() {
        $q = $this->input->get('q');
        $this->return_arr = array();
        $sql = "SELECT RegNumb,candname,Course,faculty,dept FROM admittedstudents WHERE RegNumb= '" . $q . "' ORDER BY RegNumb";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['RegNumb'] = $row->RegNumb;
                $data['candname'] = $row->candname;
                $data['Course'] = $row->Course;
                $data['faculty'] = $row->faculty;
                $data['dept'] = $row->dept;
                array_push($this->return_arr, $data);
            }
            echo json_encode($this->return_arr);
        } else {
            echo "No Record Found!!!";
        }
    }

    public function captcha_check() {
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
