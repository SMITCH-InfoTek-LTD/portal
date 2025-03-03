<?php
namespace App\Controllers;


/**
 * Description of Preadmissionlogin
 *
 * @author balarabehashim
 */
class RegnoEnter extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ug/Student_m');
        $this->load->helper('html');
    }

    //put your code here
    public function index() {
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('rrrno', 'RRR Number', 'trim|required|xss_clean|numeric|callback_rrrno_check');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('new/regenter');
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            $this->rrrno = $this->input->post('rrrno');
            $this->password = $this->input->post('password');
            $query = $this->db->get_where('paymentTrans', array('RRR' => $this->rrrno));
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                //var_dump($row);exit;
                if (($row['status'] == '01') || ($row['status'] == '00')) {
                    $_SESSION['RRR'] = $row['RRR'];
                    $_SESSION['Amount'] = $row['Amount'];
                    $_SESSION['OrderID'] = $row['OrderID'];
                    $_SESSION['message'] = $row['message'];
                    $_SESSION['transactiontime'] = $row['transactiontime'];
                    $_SESSION['academic_session'] = $row['academic_session'];
                    $query0 = $this->db->get_where('applicationsTemp', array('OrderID' => $row['OrderID']));
                    if ($query0->num_rows() > 0) {
                         $row0 = $query0->row_array();
                         $data = array(
                                    'surname' => $row0['surname'],
                                    'fname'  => $row0['fname'],
                                    'mname'  => $row0['mname'],
                                    'OrderID'  => $row0['OrderID'],
                                    'payerEmail'  => $row0['payerEmail'],
                                    'phoneno'  => $row0['phoneno'],
                                    'paymentitem'  => $row0['paymentitem'],
                                    'academic_session'  => $row0['academic_session']
                         );
                         //var_dump($data);die();
                         $this->db->where('OrderID', $row['OrderID']);
                         $this->db->replace('applications', $data);
                    }
                    $query = $this->db->get_where('tblinstappform', array('formno' => $row['OrderID']));
                    if ($query->num_rows() > 0) {
                        $_SESSION['shout'] = "You have already applied but you can edit your application, login with your username and password ....";
                        $this->session->mark_as_flash('shout');
                        redirect('new/CandLoginc', 'refresh');
                    } else {
                        redirect('new/ApplicationForm2', 'refresh');
                        return TRUE;
                    }
                } else {
                    redirect('new/RegEnter', 'refresh');
                    //redirect('new/insterrorappc', 'refresh');
                }
            }
        }
    }
    
     public function rrrno_check() {
        $this->rrrno = $this->input->post('rrrno');
        $query = $this->db->get_where('paymentTrans', array('RRR' => $this->rrrno));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('rrrno_check', 'Invalid credentials submitted access DENIED!!!');
            return FALSE;
        }
    }

}
