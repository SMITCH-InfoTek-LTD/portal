<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of courseregc
 *
 * @author Mitchelle Ateb
 */
class Displaystudentreginfoc extends BaseController {

//put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('ug/Courseregistration');
        $this->load->helper('html');
    }

    public function index() {
        $this->data = array('title' => 'Student Display Info');
        $this->form_validation->set_rules('session', 'Session ', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('secured/displaystudentreginfo', $this->data);
            $this->load->view('template/footer_other');
        } else {

            //test for whether student has paid school fees
            $this->RegNumb = $_SESSION['RegNumb'];
            $this->session = $this->input->post('session');
            
            $Sqlqry = "SELECT paymentItems.ItemCode,students.regno,"
                    . "paymentTrans.status,paymentTrans.academic_session,paymentTrans.message FROM paymentTrans,paymentItems,students"
                    . " WHERE (paymentItems.ItemCode = paymentTrans.Item_Code) AND (students.regno = paymentTrans.RegNumb)"
                    . " AND((paymentTrans.status = '00') || (paymentTrans.status = '01'))AND((paymentItems.ItemCode = '2001')||(paymentItems.ItemCode = '2003')||(paymentItems.ItemCode = '2002')||(paymentItems.ItemCode = '6001'))"
                    . " AND (paymentTrans.RegNumb='" . $_SESSION['RegNumb'] . "')AND(paymentTrans.academic_session='" . $this->session . "')";
            $qry = $this->db->query($Sqlqry);
            if ($qry->num_rows() > 0) {
                $row = $qry->row_array();
                    $_SESSION['session'] = $this->input->post('session');
                    $_SESSION['courses_first'] = $this->Courseregistration->fetchCoursesFirst();
                    $_SESSION['courses_second'] = $this->Courseregistration->fetchCoursesSecond();
                    $_SESSION['courses_firstcarryover'] = $this->Courseregistration->fetchCoursesFirstCarryover();
                    $_SESSION['courses_secondcarryover'] = $this->Courseregistration->fetchCoursesSecondCarryover();
                    redirect('secured/Detailedcourseregistrationc', 'refresh');            
            } elseif ($qry->num_rows() == 0) {
                $sql = "SELECT * FROM newStudentSchoolFeesSocketWork WHERE"
                     ."(newStudentSchoolFeesSocketWork.REGISTRATION_NUMBER='" . $_SESSION['RegNumb'] . "')";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    $row = $query->row_array();
                    $_SESSION['session'] = $this->input->post('session');
                    $_SESSION['courses_first'] = $this->Courseregistration->fetchCoursesFirst();
                    $_SESSION['courses_second'] = $this->Courseregistration->fetchCoursesSecond();
                    $_SESSION['courses_firstcarryover'] = $this->Courseregistration->fetchCoursesFirstCarryover();
                    $_SESSION['courses_secondcarryover'] = $this->Courseregistration->fetchCoursesSecondCarryover();
                    redirect('secured/Detailedcourseregistrationc', 'refresh');
                } else {
                    $_SESSION['paymsg'] = '<font color="red">You have not paid your school fees</font>';
                    redirect('secured/SecuredPayment', 'refresh');
                }
            } else {
                $_SESSION['paymsg'] = '<font color="red">You have not paid your school fees</font>';
                redirect('secured/SecuredPayment', 'refresh');
            }
        }
    }

}
