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
class Grantaccessc extends BaseController {

    //put your code here
    public function index() {
        session_start();
        $data = array('title' => 'grant access to staff'
        );
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('Staff_m');
        $this->load->helper('html');
        $this->form_validation->set_rules('staffID', 'StaffID', 'trim|required|min_length[6]|max_length[24]|xss_clean|callback_staffID_check');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('menu/staffmenu');
            echo view('staff/grantAccess', $data);
            echo view('template/footer');
        } else {
            //$this->Student->loginStudent();
            $this->staffID = $this->input->post('staffID');
            $query = $this->db->get_where('staff', array('staffID' => $this->staffID));
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                //print_r($row);
                $newdata = array(
                    'staffNo' => '','surname' => '','fname' => '','mname' => '','sex' =>'','frmnation' =>'','dob' =>'',
                    'maritalstatus' =>'','religion' =>'','permaddr' =>'','contactaddr' =>'','email' =>'','gsm' =>'',
                    'frmroleid' =>'','levelOfAppointment' =>'','natureOfAppointment' =>'','rank' =>'','password' => '',
                    'frmoriginstate' => '','frmoriginlga' =>'','frmoriginplace' =>'','frmnokname' => '',
                    'frmnokcontactaddr' =>'','frmnokphone' =>'','qualification' =>'','careerProgression' =>'',
                    'frmfaculty' => '','frmdept' => '','photopic' => '',
                );
                $this->session->unset_userdata($newdata);
                $newdata = array(
                    'staffNo' => $row['staffID'],
                    'surname' => $row['surname'],
                    'fname' => $row['fname'],
                    'mname' => $row['mname'],
                    'sex' => $row['sex'],
                    'frmnation' => $row['frmnation'],
                    'dob' => $row['dob'],
                    'maritalstatus' => $row['maritalstatus'],
                    'religion' => $row['religion'],
                    'permaddr' => $row['permaddr'],
                    'contactaddr' => $row['contactaddr'],
                    'email' => $row['email'],
                    'gsm' => $row['gsm'],
                    'frmroleid' => $row['frmroleid'],
                    'levelOfAppointment' => $row['levelOfAppointment'],
                    'natureOfAppointment' => $row['natureOfAppointment'],
                    'rank' => $row['rank'],
                    'password' => $row['password'],
                    'frmoriginstate' => $row['frmoriginstate'],
                    'frmoriginlga' => $row['frmoriginlga'],
                    'frmoriginplace' => $row['frmoriginplace'],
                    'frmnokname' => $row['frmnokname'],
                    'frmnokcontactaddr' => $row['frmnokcontactaddr'],
                    'frmnokphone' => $row['frmnokphone'],
                    'qualification' => $row['qualification'],
                    'careerProgression' => $row['careerProgression'],
                    'frmfaculty' => $row['frmfaculty'],
                    'frmdept' => $row['frmdept'],
                    'photopic' => $row['photo'],
                );
                $this->session->set_userdata($newdata);
                redirect('staff/grantaccessstaffinfoc', 'refresh');
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function staffID_check() {
        $this->staffID = $this->input->post('staffID');
        $query = $this->db->get_where('staff', array('staffID' => $this->staffID));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('staffID_check', 'This %s is invalid!!! Check carefully before you continue  ' . $this->staffID);
            return FALSE;
        }
    }

}

?>
