<?php

<<<<<<< HEAD
defined('BASEPATH') OR exit('No direct script access allowed');
=======
namespace App\Models; 

use CodeIgniter\Model;
>>>>>>> a3c25aa (Converting CI 3 application to CI 4 :: continuation of updating the Model)
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile_model
 *
 * @author doowo
 */
<<<<<<< HEAD
class Student_m extends CI_Model {
=======
class Student_m extends Model {
>>>>>>> a3c25aa (Converting CI 3 application to CI 4 :: continuation of updating the Model)

    var $Sno;
    var $jambID;
    var $CandName;
    var $Sex;
    var $StateOforigin;
    var $LGAOfOrigin;
    var $EnglishScore;
    var $Subject2;
    var $Subject2Score;
    var $Subject3;
    var $Subject3Score;
    var $Subject4;
    var $Subject4Score;
    var $Aggregate;
    var $FirstChoiceUniv;
    var $FirstChoiceFaculty;
    var $FirstChoiceCourse;
    var $SecondChoiceUniv;
    var $SecondChoiceFaculty;
    var $SecondChoiceCourse;
    var $ccode = array();
    var $cdesc = array();
    var $cunit = array();
    var $all;
    var $serialzed;
    var $thearray = array();
    var $unserialized;
    var $disdata;
    var $counterEE;
    var $password;
    var $hash;

//put your code here
    function __construct() {
// Call the Model constructor
        parent::__construct();
        //session_start();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('date');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->library('email');
    }

    function sendEmail($to_email) {
        $from_email = 'techsupport@uniabuja.edu.ng'; //change this to yours
        $subject = 'Verify Your Email Address';
        $message = 'Dear User ' . $_SESSION['CandName'] . ' ,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://www.mydomain.com/user/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Mydomain Team';
        $message .='your password is ' . $_SESSION['stacy'];
        //$this->email->initialize($config);
        //$this->load->library('email');
//send mail
        $this->email->from($from_email, 'Uniabuja.edu.ng');
        //$this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        //return $this->email->send();

        if ($this->email->send()) {
            $_SESSION['message_display'] = 'Email Successfully Send !';
            $this->session->mark_as_flash('message_display');
        } else {
            $_SESSION['message_display'] = '<p class="error_msg">Invalid Gmail Account or Password !</p>';
            $this->session->mark_as_flash('message_display');
            //print_r($this->email->print_debugger());
        }
    }

    function get_dropdown_list() {
        $this->db->select('StateOforigin');
        $this->db->distinct();
        $this->db->order_by('StateOforigin', 'ASC');
        $query = $this->db->get('tblDemo');
        $result = $query->result();

        //array to store department id & department name
        //$regno = array('-SELECT-');
        $state = array('-SELECT-');

        for ($i = 0; $i < count($result); $i++) {
            //array_push($regno, $result[$i]->);
            array_push($state, $result[$i]->StateOforigin);
        }
        return $department_result = array($state);
    }

    function registerStudent() {
        $this->regno = $this->input->post('frmregno');
        $this->sname = $this->input->post('frmsname');
        $this->mname = $this->input->post('frmfname');
        $this->fname = $this->input->post('frmmname');
        $this->sex = $this->input->post('frmsex');
        $this->nation = $this->input->post('frmnation');
        $this->dob = $this->input->post('frmdob');
        $this->password = $this->input->post('frmpassword');
        $this->maritalStatus = $this->input->post('maritalstatus');
        $this->religion = $this->input->post('frmreligion');
        $this->email = $this->input->post('frmemail');
        $this->gsm = $this->input->post('frmgsm');
        $this->roleid = $this->input->post('frmroleid');
        $this->permaddr = $this->input->post('frmpermaddr');
        $this->contactaddr = $this->input->post('frmcontactaddr');
        $this->birthstate = $this->input->post('frmbirthstate');
        $this->birthlga = $this->input->post('frmbirthlga');
        $this->birthplace = $this->input->post('frmbirthplace');
        $this->originstate = $this->input->post('frmoriginstate');
        $this->originlga = $this->input->post('frmoriginlga');
        $this->originplace = $this->input->post('frmoriginplace');
        $this->nokname = $this->input->post('frmnokname');
        $this->nokcontactaddr = $this->input->post('frmnokcontactaddr');
        $this->nokphone = $this->input->post('frmnokphone');
        $this->sponname = $this->input->post('frmsponname');
        $this->sponaddr = $this->input->post('frmsponaddr');
        $this->sponemail = $this->input->post('frmsponemail');
        $this->entrymode = $this->input->post('frmentrymode');
        $this->prevuniversity = $this->input->post('frmprevuniversity');
        $this->prgtype = $this->input->post('frmprgtype');
        $this->highqual = $this->input->post('frmhighqual');
        $this->institution = $this->input->post('frminstitution');
        $this->dateobt = $this->input->post('frmdateobt');
        $this->firstsubject = $this->input->post('frmfirstsubject');
        $this->entryyr = $this->input->post('frmentryyr');
        $this->award = $this->input->post('frmaward');
        $this->faculty = $this->input->post('frmfaculty');
        $this->dept = $this->input->post('frmdept');
        $this->studymode = $this->input->post('frmstudymode');
        $this->duration = $this->input->post('frmduration');
        $this->extracurr = $this->input->post('frmextracurr');
        $this->healthstatus = $this->input->post('frmhealthstatus');
        $this->disability = $this->input->post('frmdisability');
        $this->specialmed = $this->input->post('frmspecialmed');
        $this->data = array(
            'regno' => $this->regno,
            'sname' => $this->sname,
            'mname' => $this->mname,
            'fname' => $this->fname,
            'sex' => $this->sex,
            'dob' => $this->dob,
            'email' => $this->email,
            'gsm' => $this->gsm,
            'role_id' => $this->roleid,
            'nation' => $this->nation,
            'state' => $this->state,
            'birthstate' => $this->birthstate,
            'birthlga' => $this->birthlga,
            'originstate' => $this->originstate,
            'originlga' => $this->originlga,
            'birthplace' => $this->birthplace,
            'originplace' => $this->originplace,
            'maritalStatus' => $this->maritalStatus,
            'religion' => $this->religion,
            'permaddr' => $this->permaddr,
            'contactaddr' => $this->contactaddr,
            'nokname' => $this->nokname,
            'nokcontactaddr' => $this->nokcontactaddr,
            'nokphone' => $this->nokphone,
            'sponname' => $this->sponname,
            'sponaddr' => $this->sponaddr,
            'sponemail' => $this->sponemail,
            'entrymode' => $this->entrymode,
            'prevuniversity' => $this->prevuniversity,
            'prgtype' => $this->prgtype,
            'highqual' => $this->highqual,
            'institution' => $this->institution,
            'dateobt' => $this->dateobt,
            'firstsubject' => $this->firstsubject,
            'entryyr' => $this->entryyr,
            'award' => $this->award,
            'faculty' => $this->faculty,
            'dept' => $this->dept,
            'studymode' => $this->studymode,
            'duration' => $this->duration,
            'extracurr' => $this->extracurr,
            'healthstatus' => $this->healthstatus,
            'password' => $this->password,
            'disability' => $this->disability,
            'specialmed' => $this->specialmed
        );
        $_SESSION['regno'] = $this->regno;
        $this->session->set_userdata('regno', $this->regno);
        $this->db->insert('students', $this->data);
        if ($this->db->affected_rows() > 0) {
            return True;
        } else {
            return False;
        }
    }

    function updateStudentProfile() {
        $this->regno = $this->input->post('frmregno');
        $this->sname = $this->input->post('frmsname');
        $this->mname = $this->input->post('frmfname');
        $this->fname = $this->input->post('frmmname');
        $this->sex = $this->input->post('frmsex');
        $this->nation = $this->input->post('frmnation');
        $this->dob = $this->input->post('frmdob');
        $this->password = $this->input->post('frmpassword');
        $this->maritalStatus = $this->input->post('maritalstatus');
        $this->religion = $this->input->post('frmreligion');
        $this->email = $this->input->post('frmemail');
        $this->gsm = $this->input->post('frmgsm');
        $this->roleid = $this->input->post('frmroleid');
        $this->permaddr = $this->input->post('frmpermaddr');
        $this->contactaddr = $this->input->post('frmcontactaddr');
        $this->birthstate = $this->input->post('frmbirthstate');
        $this->birthlga = $this->input->post('frmbirthlga');
        $this->birthplace = $this->input->post('frmbirthplace');
        $this->originstate = $this->input->post('frmoriginstate');
        $this->originlga = $this->input->post('frmoriginlga');
        $this->originplace = $this->input->post('frmoriginplace');
        $this->nokname = $this->input->post('frmnokname');
        $this->nokcontactaddr = $this->input->post('frmnokcontactaddr');
        $this->nokphone = $this->input->post('frmnokphone');
        $this->sponname = $this->input->post('frmsponname');
        $this->sponaddr = $this->input->post('frmsponaddr');
        $this->sponemail = $this->input->post('frmsponemail');
        $this->entrymode = $this->input->post('frmentrymode');
        $this->prevuniversity = $this->input->post('frmprevuniversity');
        $this->prgtype = $this->input->post('frmprgtype');
        $this->highqual = $this->input->post('frmhighqual');
        $this->institution = $this->input->post('frminstitution');
        $this->dateobt = $this->input->post('frmdateobt');
        $this->firstsubject = $this->input->post('frmfirstsubject');
        $this->entryyr = $this->input->post('frmentryyr');
        $this->award = $this->input->post('frmaward');
        $this->faculty = $this->input->post('frmfaculty');
        $this->dept = $this->input->post('frmdept');
        $this->studymode = $this->input->post('frmstudymode');
        $this->duration = $this->input->post('frmduration');
        $this->extracurr = $this->input->post('frmextracurr');
        $this->healthstatus = $this->input->post('frmhealthstatus');
        $this->disability = $this->input->post('frmdisability');
        $this->specialmed = $this->input->post('frmspecialmed');
        $this->data = array(
            'regno' => $this->regno,
            'sname' => $this->sname,
            'mname' => $this->mname,
            'fname' => $this->fname,
            'sex' => $this->sex,
            'dob' => $this->dob,
            'email' => $this->email,
            'gsm' => $this->gsm,
            'role_id' => $this->roleid,
            'nation' => $this->nation,
            'birthstate' => $this->birthstate,
            'birthlga' => $this->birthlga,
            'originstate' => $this->originstate,
            'originlga' => $this->originlga,
            'birthplace' => $this->birthplace,
            'originplace' => $this->originplace,
            'maritalStatus' => $this->maritalStatus,
            'religion' => $this->religion,
            'permaddr' => $this->permaddr,
            'contactaddr' => $this->contactaddr,
            'nokname' => $this->nokname,
            'nokcontactaddr' => $this->nokcontactaddr,
            'nokphone' => $this->nokphone,
            'sponname' => $this->sponname,
            'sponaddr' => $this->sponaddr,
            'sponemail' => $this->sponemail,
            'entrymode' => $this->entrymode,
            'prevuniversity' => $this->prevuniversity,
            'prgtype' => $this->prgtype,
            'highqual' => $this->highqual,
            'institution' => $this->institution,
            'dateobt' => $this->dateobt,
            'firstsubject' => $this->firstsubject,
            'entryyr' => $this->entryyr,
            'award' => $this->award,
            'faculty' => $this->faculty,
            'dept' => $this->dept,
            'studymode' => $this->studymode,
            'duration' => $this->duration,
            'extracurr' => $this->extracurr,
            'healthstatus' => $this->healthstatus,
            'password' => $this->password,
            'disability' => $this->disability,
            'specialmed' => $this->specialmed
        );
        $this->db->update('students', $this->data);
        if ($this->db->affected_rows() > 0) {
            return True;
        } else {
            return False;
        }
    }

    function searchstudent() {

        $this->jambID = $this->input->post('JambID');
        $query = $this->db->get_where('tblDemo', array('JambID' => $this->jambID));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $newdata = array(
                'Sno' => $row['Sno'],
                'JambID' => $row['JambID'],
                'fname' => $row['firstname'],
                'mname' => $row['middlename'],
                'sname' => $row['surname'],
                'Sex' => $row['Sex'],
                'StateOforigin' => $row['StateOforigin'],
                'LGAOfOrigin' => $row['LGAOfOrigin'],
                'EnglishScore' => $row['EnglishScore'],
                'Subject2' => $row['Subject2'],
                'Subject2Score' => $row['Subject2Score'],
                'Subject3' => $row['Subject3'],
                'Subject3Score' => $row['Subject3Score'],
                'Subject4' => $row['Subject4'],
                'Subject4Score' => $row['Subject4Score'],
                'Aggregate' => $row['Aggregate'],
                'FirstChoiceUniv' => $row['FirstChoiceUniv'],
                'FirstChoiceFaculty' => $row['FirstChoiceFaculty'],
                'FirstChoiceCourse' => $row['FirstChoiceCourse'],
                'SecondChoiceUniv' => $row['SecondChoiceUniv'],
                'SecondChoiceFaculty' => $row['SecondChoiceFaculty'],
                'SecondChoiceCourse' => $row['SecondChoiceCourse']
            );
            $this->session->set_userdata($newdata);
        }
    }

    function getStudentDetails() {
        $this->jambID = $this->input->post('JambID');
        $query = $this->db->get_where('tblDemo', array('JambID' => $this->jambID));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            print_r($row);
            exit();
            $newdata = array(
                'Sno' => $row['Sno'],
                'JambID' => $row['JambID'],
                'fname' => $row['firstname'],
                'mname' => $row['middlename'],
                'sname' => $row['surname'],
                'Sex' => $row['Sex'],
                'StateOfOrigin' => $row['StateOforigin'],
                'LGAOfOrigin' => $row['LGAOfOrigin'],
                'EnglishScore' => $row['EnglishScore'],
                'Subject2' => $row['Subject2'],
                'Subject2Score' => $row['Subject2Score'],
                'Subject3' => $row['Subject3'],
                'Subject3Score' => $row['Subject3Score'],
                'Subject4' => $row['Subject4'],
                'Subject4Score' => $row['Subject4Score'],
                'Aggregate' => $row['Aggregate'],
                'FirstChoiceUniv' => $row['FirstChoiceUniv'],
                'FirstChoiceFaculty' => $row['FirstChoiceFaculty'],
                'FirstChoiceCourse' => $row['FirstChoiceCourse'],
                'SecondChoiceUniv' => $row['SecondChoiceUniv'],
                'SecondChoiceFaculty' => $row['SecondChoiceFaculty'],
                'SecondChoiceCourse' => $row['SecondChoiceCourse']
            );
            $this->session->set_userdata($newdata);
            $_SESSION['Sno'] = $row['Sno'];
            $_SESSION['JambID'] = $row['JambID'];
            $_SESSION['fname'] = $row['firstname'];
            $_SESSION['mname'] = $row['middlename'];
            $_SESSION['sname'] = $row['surname'];
            $_SESSION['Sex'] = $row['Sex'];
            $_SESSION['StateOforigin'] = $row['StateOforigin'];
            $_SESSION['LGAOfOrigin'] = $row['LGAOfOrigin'];
            $_SESSION['EnglishScore'] = $row['EnglishScore'];
            $_SESSION['Subject2'] = $row['Subject2'];
            $_SESSION['Subject2Score'] = $row['Subject2Score'];
            $_SESSION['Subject3'] = $row['Subject3'];
            $_SESSION['Subject3Score'] = $row['Subject3Score'];
            $_SESSION['Subject4'] = $row['Subject4'];
            $_SESSION['Subject4Score'] = $row['Subject4Score'];
            $_SESSION['Aggregate'] = $row['Aggregate'];
            $_SESSION['FirstChoiceUniv'] = $row['FirstChoiceUniv'];
            $_SESSION['FirstChoiceFaculty'] = $row['FirstChoiceFaculty'];
            $_SESSION['FirstChoiceCourse'] = $row['FirstChoiceCourse'];
            $_SESSION['SecondChoiceUniv'] = $row['SecondChoiceUniv'];
            $_SESSION['SecondChoiceFaculty'] = $row['SecondChoiceFaculty'];
            $_SESSION['SecondChoiceCourse'] = $row['SecondChoiceCourse'];
            //print_r($_SESSION);exit;
        }
    }

    function checkForExistence() {
        $this->jambID = $this->session->userdata('jambID');
        $query = $this->db->get_where('tblstudents_temp', array('regno' => $this->jambID));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function login() {
        $this->RegNumb = $this->input->post('RegNumb');
        $this->password = $this->input->post('password');
        $query = $this->db->get_where('students', array('regno' => $this->RegNumb, 'password' => $this->password));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $_SESSION['DeptSn'] = $row['dept'];
            $_SESSION['RegNumb'] = $row['regno'];
            $_SESSION['lname'] = $row['Fname'];
            $_SESSION['mname'] = $row['mname'];
            $_SESSION['sname'] = $row['Sname'];
            $_SESSION['Sex'] = $row['sex'];
            $_SESSION['StateOfOrigin'] = $row['state'];
            $_SESSION['LGA'] = $row['lga'];
            $_SESSION['hometown'] = $row['hometown'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['ContactAddress'] = $row['contactaddr'];
            $_SESSION['nation'] = $row['nation'];
            $_SESSION['religion'] = $row['religion'];
            $_SESSION['NOKName'] = $row['Next_of_Kin_Name'];
            $_SESSION['NOKAddress'] = $row['Next_of_Kin_address'];
            $_SESSION['NOKEmail'] = $row['sEmail'];
            $_SESSION['residential'] = $row['ResidentialAddress'];
            $_SESSION['admode'] = $row['admode'];
            $_SESSION['FacAbrev'] = $row['fact'];
            $_SESSION['CourseAbrev'] = $row['dept'];
            $_SESSION['degree'] = $row['degree'];
            $_SESSION['level'] = $row['level'];
            $_SESSION['occupation'] = $row['occupation'];
            $_SESSION['relationship'] = $row['relationship'];
            $_SESSION['mstatus'] = $row['mstatus'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['phone'] = $row['Phone'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['NOKPhone'] = $row['NokPhone'];
            $query = $this->db->get_where('students', array('regno' => $this->RegNumb));
            if ($query->num_rows() > 0) {
                $row1 = $query->row_array();
                $_SESSION['passport'] = $row1['passport'];
                $_SESSION['email'] = $row1['email'];
            } else {
                $_SESSION['passport'] = 'default.jpg';
            }
            redirect('secured/Mainstudentc', 'refresh');
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
