<?php

namespace App\Controllers;


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of displaystaffinfoc
 *
 * @author Uchenna Igboeli
 */
class Updatestudenthostelinfoc extends BaseController {

//put your code here
    public function index() {
//session_start();
        $data = array('title' => 'Student Hostel Booking'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('html');
        $this->load->model('new/Search');
        $this->form_validation->set_rules('degree', 'Degree', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/updatestudentHostelinfo', $data);
            echo view('template/footer_other');
        } else {
            $vRegno = $this->session->userdata('RegNumb');
            $vFact = $this->input->post('faculty');
            $vLevel = $this->input->post('level');
            $vHostel = $this->input->post('hostel');
            $vStatus = "FREE";

            if ($this->input->post('level') == "100") {
                $vLevel = "100";
            }
            if ($this->input->post('level') == "200") {
                $vLevel = "230";
            }

            if ($this->input->post('level') == "300") {
                $vLevel = "230";
            }

            if ($this->input->post('faculty') == "LAW") {
                if ($this->input->post('level') == "500") {
                    $vLevel = "450";
                }
                if ($this->input->post('level') == "400") {
                    $vLevel = "230";
                }
            }
            if ($this->input->post('faculty') == "Faculty of Engineering") {
                if ($this->input->post('level') == "500") {
                    $vLevel = "450";
                }
                if ($this->input->post('level') == "400") {
                    $vLevel = "230";
                }
            }
            /*             * ***
              $Sqlqry = "SELECT paymentItems.ItemCode,paymentTrans.Item_Code,students.regno,"
              . "paymentTrans.status,paymentTrans.academic_session,paymentTrans.message"
              . " FROM paymentTrans,paymentItems,students"
              . " WHERE (paymentItems.ItemCode = paymentTrans.Item_Code) AND (students.regno = paymentTrans.RegNumb)"
              . " AND (paymentTrans.RegNumb='" . $_SESSION['RegNumb'] . "')AND(paymentTrans.academic_session='" . ACADEMIC_SESSION . "')";
             * 
             */
            $Sqlqry = "SELECT paymentItems.ItemCode,students.regno,"
                    . "paymentTrans.status,paymentTrans.academic_session,paymentTrans.message FROM paymentTrans,paymentItems,students"
                    . " WHERE (paymentItems.ItemCode = paymentTrans.Item_Code) AND (students.regno = paymentTrans.RegNumb)"
                    . " AND((paymentTrans.status = '00') || (paymentTrans.status = '01'))AND((paymentItems.ItemCode = '2001')||(paymentItems.ItemCode = '2002')||(paymentItems.ItemCode = '2003'))"
                    . " AND (paymentTrans.RegNumb='" . $_SESSION['RegNumb'] . "')AND(paymentTrans.academic_session='" . ACADEMIC_SESSION . "')";
            $qry = $this->db->query($Sqlqry);
            if ($qry->num_rows() > 0) {
                $vFcode = "99999";
                $query = $this->db->get_where('faculties', array('fname' => $vFact));
                if ($query->num_rows() > 0) {
                    $row = $query->row_array();
                    $vFcode = $row['fcode'];
                }
                $vMyFact = $vFcode;
                $this->return_arr = array();
                $this->db->select('hostelname,fcode');

                //check if your faculty can stay in this hostel
                $query = $this->db->get_where('hostels', array('hostelname' => $vHostel));
                $vFcode = "94vv3v834";
                if ($query->num_rows() > 0) {
                    $row = $query->row_array();
                    $vFcode = $row['fcode'];
                }
/******CODE TO BOOKED ONLY WHERE YOUR FACULTY IS LOCATED WICKED CODE***********
                $res = strpos($vFcode, $vMyFact);
                if ($res === FALSE) {
                    $msg = "Sorry. You can Only Book Hostels Where Your Faculty Is Located!!! ";
                    $_SESSION['paymsg'] = $msg;
                    $this->session->mark_as_flash('paymsg');
                    //echo "<script type='text/javascript'>alert('$msg');</script>";
                    redirect('secured/Updatestudenthostelinfoc', 'refresh');
                }
******END OF CODE TO BOOKED ONLY WHERE YOUR FACULTY IS LOCATED WICKED CODE***********/

                $vStatus = "BOOKED";
                $query = $this->db->get_where('allocations', array('regno' => $vRegno, 'status' => $vStatus));
                if ($query->num_rows() > 0) {
                    //Booked Before
                    $msg1 = "Sorry. You Have Booked A Hostel Already. Cannot Book Twice!!! ";
                    $_SESSION['paymsg'] = $msg1;
                    $this->session->mark_as_flash('paymsg');
                    //echo "<script type='text/javascript'>alert('$msg');</script>";
                    redirect('secured/Updatestudenthostelinfoc', 'refresh');
                } else {
                    $vStatus = "FREE";
                    $query = $this->db->get_where('allocations', array('hostelname' => $vHostel, 'level' => $vLevel, 'status' => $vStatus));
                    if ($query->num_rows() > 0) {
                        $row = $query->row_array();
                        $vBed = $row['bedspace'];
                        $time = date("Y-m-d");
                        $data2 = array('regno' => $this->session->userdata('RegNumb'), 'status' => "BOOKED", 'bkdate' => $time);

                        $this->db->where(array('hostelname' => $vHostel, 'level' => $vLevel, 'status' => $vStatus, 'bedspace' => $vBed));
                        $this->db->update('allocations', $data2);
                        if ($this->db->affected_rows() > 0) {
                            $msg2 = 'Your Hostel Is [' . $vHostel . ' BedSpace Number ' . $vBed . ']';
                            $msg2 .= "Your Booking Is Successful!!! " . $msg2;
                            $_SESSION['paymsg'] = $msg2;
                            $this->session->mark_as_flash('paymsg');
                            //echo "<script type='text/javascript'>alert('$msg');</script>";
                            redirect('secured/Updatestudenthostelinfoc', 'refresh');
                        } else {
                            $msg3 = "Your Booking Is Not successful. Please Retry...";
                            $_SESSION['paymsg'] = $msg3;
                            $this->session->mark_as_flash('paymsg');
                            //echo "<script type='text/javascript'>alert('$msg');</script>";
                            redirect('secured/Updatestudenthostelinfoc', 'refresh');
                        }
                    } else {
                        $msg4 = "Accomodation For Your Level In This Hostel Is Exhausted. Please Check Another Hostel";
                        $_SESSION['paymsg'] = $msg4;
                        $this->session->mark_as_flash('paymsg');
                        //echo "<script type='text/javascript'>alert('$msg');</script>";
                        redirect('secured/Updatestudenthostelinfoc', 'refresh');
                    }
                }
            } elseif ($qry->num_rows() == 0) {
            //var_dump($_SESSION);die();
                $sql = "SELECT * FROM newStudentSchoolFeesSocketWork WHERE"
                        . "(newStudentSchoolFeesSocketWork.REGISTRATION_NUMBER='" . $_SESSION['RegNumb'] . "')";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    $vFcode = "99999";
                    $query = $this->db->get_where('faculties', array('fname' => $vFact));
                    if ($query->num_rows() > 0) {
                        $row = $query->row_array();
                        $vFcode = $row['fcode'];
                    }
                    $vMyFact = $vFcode;
                    $this->return_arr = array();
                    $this->db->select('hostelname,fcode');

                    //check if your faculty can stay in this hostel
                    $query = $this->db->get_where('hostels', array('hostelname' => $vHostel));
                    $vFcode = "94vv3v834";
                    if ($query->num_rows() > 0) {
                        $row = $query->row_array();
                        $vFcode = $row['fcode'];
                    }
/******CODE TO BOOKED ONLY WHERE YOUR FACULTY IS LOCATED WICKED CODE***********
                    $res = strpos($vFcode, $vMyFact);
                    if ($res === FALSE) {
                        $msg = "Sorry. You can Only Book Hostels Where Your Faculty Is Located!!! ";
                        $_SESSION['paymsg'] = $msg;
                        $this->session->mark_as_flash('paymsg');
                        //echo "<script type='text/javascript'>alert('$msg');</script>";
                        redirect('secured/Updatestudenthostelinfoc', 'refresh');
                    }
******END OF CODE TO BOOKED ONLY WHERE YOUR FACULTY IS LOCATED WICKED CODE***********/
                    $vStatus = "BOOKED";
                    $query = $this->db->get_where('allocations', array('regno' => $vRegno, 'status' => $vStatus));
                    if ($query->num_rows() > 0) {
                        //Booked Before
                        $msg1 = "Sorry. You Have Booked A Hostel Already. Cannot Book Twice!!! ";
                        $_SESSION['paymsg'] = $msg1;
                        $this->session->mark_as_flash('paymsg');
                        //echo "<script type='text/javascript'>alert('$msg');</script>";
                        redirect('secured/Updatestudenthostelinfoc', 'refresh');
                    } else {
                        $vStatus = "FREE";
                        $query = $this->db->get_where('allocations', array('hostelname' => $vHostel, 'level' => $vLevel, 'status' => $vStatus));
                        if ($query->num_rows() > 0) {
                            $row = $query->row_array();
                            $vBed = $row['bedspace'];
                            $time = date("Y-m-d");
                            $data2 = array('regno' => $this->session->userdata('RegNumb'), 'status' => "BOOKED", 'bkdate' => $time);

                            $this->db->where(array('hostelname' => $vHostel, 'level' => $vLevel, 'status' => $vStatus, 'bedspace' => $vBed));
                            $this->db->update('allocations', $data2);
                            if ($this->db->affected_rows() > 0) {
                                $msg2 = 'Your Hostel Is [' . $vHostel . ' BedSpace Number ' . $vBed . ']';
                                $msg2 .= "Your Booking Is Successful!!! " . $msg;
                                $_SESSION['paymsg'] = $msg2;
                                $this->session->mark_as_flash('paymsg');
                                //echo "<script type='text/javascript'>alert('$msg');</script>";
                                redirect('secured/Updatestudenthostelinfoc', 'refresh');
                            } else {
                                $msg3 = "Your Booking Is Not successful. Please Retry...";
                                $_SESSION['paymsg'] = $msg3;
                                $this->session->mark_as_flash('paymsg');
                                //echo "<script type='text/javascript'>alert('$msg');</script>";
                                redirect('secured/Updatestudenthostelinfoc', 'refresh');
                            }
                        } else {
                            $msg4 = "Accomodation For Your Level In This Hostel Is Exhausted. Please Check Another Hostel";
                            $_SESSION['paymsg'] = $msg4;
                            $this->session->mark_as_flash('paymsg');
                            //echo "<script type='text/javascript'>alert('$msg');</script>";
                            redirect('secured/Updatestudenthostelinfoc', 'refresh');
                        }
                    }
                } else {
                    $_SESSION['paymsg'] = '<font color="red">You have not paid your school fees</font>';
                    redirect('secured/SecuredPayment', 'refresh');
                }
            }
        }
    }

}
