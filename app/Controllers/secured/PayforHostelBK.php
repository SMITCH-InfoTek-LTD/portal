<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PayforHostel
 *
 * @author osagiesammy
 */
class PayforHostel extends BaseController {

    // Call the Model constructor
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('ug/Student_m');
        $this->load->helper('captcha');
        $this->load->model('ug/Paymentremita_m');
        $this->load->helper('html');
        $this->load->model('admin/Captcha');
    }

    public function index() {
        $sub_data['cap_img'] = $this->Captcha->make_captcha();
        echo view('template/header');
        echo view('template/header_menu');
        echo view('secured/payforHostel', $sub_data);
        $this->form_validation->set_message('rule', 'Error Message');
        echo view('template/footer_other');
    }

    public function payment4Hostel() {
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
            echo view('secured/payforHostel', $sub_data);
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            //$this->Paymentremita_m->payment();
            //redirect('secured/Processpayment', 'refresh');
            //return TRUE;
            $this->acad_sess = $this->input->post('academic_session');
            $this->itemname = $this->input->post('itemname');
            $query = $this->db->get_where('paymentTrans', array('RegNumb' => $_SESSION['RegNumb'], 'Item_Code=' . $this->itemname, 'status' => '01'));
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $msg = "Hello. You already have a paid OR pending transaction check back in two hours time!!! ";
                //echo "<script type='text/javascript'>alert('$msg');</script>";
                $_SESSION['paymsg'] = $msg;
                $this->session->mark_as_flash('paymsg');
                redirect('secured/PayforHostel', 'refresh');
            } else {
                $this->Paymentremita_m->payment();
                redirect('secured/Processpayment', 'refresh');
                return TRUE;
            }
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
