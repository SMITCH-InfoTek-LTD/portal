<?php


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
class securedPayment extends BaseController {

    //put your code here
    public function index() {
        $data = array('title' => 'get student details');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('secured/Student_m');
        $this->load->model('secured/Paymentremita_m');
        $this->load->helper('html');
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('amt', 'Amount Paid', 'trim|required|xss_clean');
        $this->form_validation->set_rules('payerName', 'Payer Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('payerEmail', 'Payer Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('payerPhone', 'Payer Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('paymenttype', 'Payment type', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/securedpayment', $data);
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            $this->Paymentremita_m->Payment();
            redirect('secured/Processpayment', 'refresh');
            return TRUE;
        }
    }

    public function param_check() {
        $this->jambID = $this->input->post('jambID');
        $query = $this->db->get_where('postumeapplicants', array('JambID' => $this->jambID));
        if ($query->num_rows() > 0) {
            $_SESSION['RegNumber'] = $this->input->post('jambID');
            return TRUE;
        } else {
            $this->form_validation->set_message('param_check', 'This {field} is invalid!!! Check carefully before you continue  ' . $this->jambID);
            return FALSE;
        }
    }

    public function password_check() {
        $this->password = $this->input->post('Password');
        //$this->hash = password_hash($this->password, PASSWORD_DEFAULT);
        $query = $this->db->get_where('postumeapplicants', array('Password' => $this->password));
        if ($query->num_rows() > 0) {
            //echo $_SESSION['stacy'];
            //if (password_verify($this->password, $_SESSION['stacy'])) {
            //echo 'Password is valid!';
            return TRUE;
        } else {
            $this->form_validation->set_message('password_check', 'The {field} field is invalid');
            return FALSE;
        }
    }

}
