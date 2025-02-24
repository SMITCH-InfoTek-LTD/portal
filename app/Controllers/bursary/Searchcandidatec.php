<?php
namespace App\Controllers;


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of courseregc
 *
 * @author Mitchelle Ateb
 */
class Searchcandidatec extends BaseController {

    //put your code here
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('ug/Student_m');
        $this->load->model('ug/Paymentremita_m');
        $this->load->model('bursary/BursaryReporting');
        $this->load->helper('html');
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

    public function index() {
        $data = array('title' => 'search staff'
        );
        $this->load->helper('html');
        $this->form_validation->set_rules('RegNumb', 'RegNumb', 'trim|required|min_length[6]|max_length[24]|xss_clean|callback_RegNumb_check');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('bursary/searchCandidate', $data);
            echo view('template/footer_other');
        } else {
                $this->RegNumb = $this->input->post('RegNumb');
                $_SESSION['results'] =   $this->BursaryReporting->getStudentsPayments($this->RegNumb);
                redirect('bursary/Displaystudentpaymentsc', 'refresh');
                return TRUE;
        }
    }

    public function RegNumb_check() {
        $this->RegNumb = $this->input->post('RegNumb');
        $query = $this->db->get_where('paymentTrans', array('RegNumb' => $this->RegNumb));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('RegNumb_check', 'Invalid credential!!! Check carefully before you continue');
            return FALSE;
        }
    }

}
