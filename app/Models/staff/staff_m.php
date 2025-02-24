<?php

namespace App\Models; 

use CodeIgniter\Model;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of staff_m
 *
 * @author Mitchelle Ateb
 */
class Staff_m extends Model {

    //put your code here
    var $staffID;
    var $surname;
    var $fname;
    var $mname;
    var $sex;
    var $frmnation;
    var $dob;
    var $maritalstatus;
    var $religion;
    var $permaddr;
    var $contactaddr;
    var $email;
    var $gsm;
    var $frmroleid;
    var $levelOfAppointment;
    var $natureOfAppointment;
    var $rank;
    var $password;
    var $frmoriginstate;
    var $frmoriginlga;
    var $frmoriginplace;
    var $frmnokname;
    var $frmnokcontactaddr;
    var $frmnokphone;
    var $qualification;
    var $careerProgression;
    var $frmfaculty;
    var $frmdept;

    function __construct() {
        //session_start();
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->library('email');
    }

    function registerStaff() {
        $this->staffID = $this->input->post('staffID');
        $this->surname = $this->input->post('surname');
        $this->fname = $this->input->post('fname');
        $this->mname = $this->input->post('mname');
        $this->sex = $this->input->post('sex');
        $this->frmnation = $this->input->post('frmnation');
        $this->dob = $this->input->post('dob');
        $this->maritalstatus = $this->input->post('maritalstatus');
        $this->religion = $this->input->post('religion');
        $this->permaddr = $this->input->post('permaddr');
        $this->contactaddr = $this->input->post('contactaddr');
        $this->email = $this->input->post('email');
        $this->gsm = $this->input->post('gsm');
        $this->frmroleid = $this->input->post('frmroleid');
        $this->levelOfAppointment = $this->input->post('levelOfAppointment');
        $this->natureOfAppointment = $this->input->post('natureOfAppointment');
        $this->rank = $this->input->post('rank');
        $this->password = $this->input->post('password');
        $this->frmoriginstate = $this->input->post('frmoriginstate');
        $this->frmoriginlga = $this->input->post('frmoriginlga');
        $this->frmoriginplace = $this->input->post('frmoriginplace');
        $this->frmnokname = $this->input->post('frmnokname');
        $this->frmnokcontactaddr = $this->input->post('frmnokcontactaddr');
        $this->frmnokphone = $this->input->post('frmnokphone');
        $this->qualification = $this->input->post('qualification');
        $this->careerProgression = $this->input->post('careerProgression');
        $this->frmfaculty = $this->input->post('frmfaculty');
        $this->frmdept = $this->input->post('frmdept');
        $this->data = array(
            'staffID' => $this->staffID,
            'surname' => $this->surname,
            'fname' => $this->fname,
            'mname' => $this->mname,
            'sex' => $this->sex,
            'frmnation' => $this->frmnation,
            'dob' => $this->dob,
            'maritalstatus' => $this->maritalstatus,
            'religion' => $this->religion,
            'permaddr' => $this->permaddr,
            'contactaddr' => $this->contactaddr,
            'email' => $this->email,
            'gsm' => $this->gsm,
            'frmroleid' => $this->frmroleid,
            'levelOfAppointment' => $this->levelOfAppointment,
            'natureOfAppointment' => $this->natureOfAppointment,
            'rank' => $this->rank,
            'password' => $this->password,
            'frmoriginstate' => $this->frmoriginstate,
            'frmoriginlga' => $this->frmoriginlga,
            'frmoriginplace' => $this->frmoriginplace,
            'frmnokname' => $this->frmnokname,
            'frmnokcontactaddr' => $this->frmnokcontactaddr,
            'frmnokphone' => $this->frmnokphone,
            'qualification' => $this->qualification,
            'careerProgression' => $this->careerProgression,
            'frmfaculty' => $this->frmfaculty,
            'frmdept' => $this->frmdept
        );
        $_SESSION['staffNo'] = $this->staffID;
        $this->db->insert('staff', $this->data);
        if ($this->db->affected_rows() > 0) {
            return True;
        } else {
            return False;
        }
    }

    /*
     * Grant acces to staff method
     * This method enables the system administrator 
     * to promote staff to higher privileges.
     */

    function grantAccess() {
        $this->frmroleid = $this->input->post('roleid');
        $this->staffID = $this->input->post('staffID');
        $data = array(
            'frmroleid' => $this->frmroleid
        );
        $this->db->where('staffID',$this->staffID);
        $this->db->update('staff', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('affectedRow', $this->db->affected_rows());
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
     * Update Staff Profile method
     */

    function updateStaffProfile() {
        $this->staffID = $this->input->post('staffID');
        $this->surname = $this->input->post('surname');
        $this->fname = $this->input->post('fname');
        $this->mname = $this->input->post('mname');
        $this->sex = $this->input->post('sex');
        $this->frmnation = $this->input->post('frmnation');
        $this->dob = $this->input->post('dob');
        $this->maritalstatus = $this->input->post('maritalstatus');
        $this->religion = $this->input->post('religion');
        $this->permaddr = $this->input->post('permaddr');
        $this->contactaddr = $this->input->post('contactaddr');
        $this->email = $this->input->post('email');
        $this->gsm = $this->input->post('gsm');
        $this->frmroleid = $this->input->post('frmroleid');
        $this->levelOfAppointment = $this->input->post('levelOfAppointment');
        $this->natureOfAppointment = $this->input->post('natureOfAppointment');
        $this->rank = $this->input->post('rank');
        $this->password = $this->input->post('password');
        $this->frmoriginstate = $this->input->post('frmoriginstate');
        $this->frmoriginlga = $this->input->post('frmoriginlga');
        $this->frmoriginplace = $this->input->post('frmoriginplace');
        $this->frmnokname = $this->input->post('frmnokname');
        $this->frmnokcontactaddr = $this->input->post('frmnokcontactaddr');
        $this->frmnokphone = $this->input->post('frmnokphone');
        $this->qualification = $this->input->post('qualification');
        $this->careerProgression = $this->input->post('careerProgression');
        $this->frmfaculty = $this->input->post('frmfaculty');
        $this->frmdept = $this->input->post('frmdept');
        $this->data = array(
            'staffID' => $this->staffID,
            'surname' => $this->surname,
            'fname' => $this->fname,
            'mname' => $this->mname,
            'sex' => $this->sex,
            'frmnation' => $this->frmnation,
            'dob' => $this->dob,
            'maritalstatus' => $this->maritalstatus,
            'religion' => $this->religion,
            'permaddr' => $this->permaddr,
            'contactaddr' => $this->contactaddr,
            'email' => $this->email,
            'gsm' => $this->gsm,
            'frmroleid' => $this->frmroleid,
            'levelOfAppointment' => $this->levelOfAppointment,
            'natureOfAppointment' => $this->natureOfAppointment,
            'rank' => $this->rank,
            'password' => $this->password,
            'frmoriginstate' => $this->frmoriginstate,
            'frmoriginlga' => $this->frmoriginlga,
            'frmoriginplace' => $this->frmoriginplace,
            'frmnokname' => $this->frmnokname,
            'frmnokcontactaddr' => $this->frmnokcontactaddr,
            'frmnokphone' => $this->frmnokphone,
            'qualification' => $this->qualification,
            'careerProgression' => $this->careerProgression,
            'frmfaculty' => $this->frmfaculty,
            'frmdept' => $this->frmdept
        );
        $this->staffID = $this->input->post('staffID');
        $this->db->where('staffID',$this->staffID);
        $this->db->update('staff', $this->data);
        if ($this->db->affected_rows() > 0) {
            return True;
        } else {
            return False;
        }
    }

    function deleteStaffProfile() {
        
    }

    function deceasedStaff() {
        
    }

}

?>
