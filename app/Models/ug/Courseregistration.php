<?php
<<<<<<< HEAD

=======
namespace App\Models; 

use CodeIgniter\Model;
>>>>>>> a3c25aa (Converting CI 3 application to CI 4 :: continuation of updating the Model)
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Courseregistration
 *
 * @author osagiesammy
 */
<<<<<<< HEAD
class Courseregistration extends CI_Model {
=======
class Courseregistration extends Model {
>>>>>>> a3c25aa (Converting CI 3 application to CI 4 :: continuation of updating the Model)

    //put your code here
    var $regno;
    var $sname;
    var $fname;
    var $mname;
    var $sex;
    var $dob;
    var $email;
    var $gsm;
    var $roleid;
    var $highqual;
    var $institution;
    var $dateobt;
    var $firstsubject;
    var $entryyr;
    var $award;
    var $faculty;
    var $dept;
    var $studymode;
    var $duration;
    var $extracurr;
    var $healthstatus;
    var $password;
    var $disability;
    var $specialmed;
    var $level = '';
    var $session = '';
    var $courses = '';
    var $dateOfreg = '';
    var $semester;
    var $cname;
    var $cdescription;
    var $courseunit;
    var $ccode = array();
    var $cdesc = array();
    var $cunit = array();
    var $tcunit;
    var $all;
    var $serialzed;
    var $thearray = array();
    var $unserialized;
    var $disdata;
    var $counterEE;

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('date');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->library('session');
        $this->load->library('email');
    }

    function registerCourses() {
        $this->regno = $_SESSION['RegNumb'];
        $this->level = $_SESSION['level'];
        $this->ccode = $this->input->post('ccode');
        $this->cdesc = $this->input->post('cdesc');
        $this->cunit = $this->input->post('cunit');
        $this->ccode2 = $this->input->post('ccode2');
        $this->cdesc2 = $this->input->post('cdesc2');
        $this->cunit2 = $this->input->post('cunit2');
        $this->session = $this->input->post('session');
        $datestring = "%Y-%m-%d %h:%i %a";
        $time = time();
        $this->dateOfreg = mdate($datestring, $time);
        $this->serialized = serialize(array($this->ccode, $this->cdesc, $this->cunit));
        $this->serializedccode = serialize(($this->ccode));
        $this->serializedcdesc = serialize($this->cdesc);
        $this->serializedcunit = serialize($this->cunit);
        $this->tcunit = $this->input->post('tcunit');
        $this->data = array(
            'Regno' => $this->regno, 'level' => $this->level, 'csession' => $this->session, 'ccode' => $this->ccode,
            'cdesc' => $this->cdesc, 'cunit' => $this->cunit, 'tcunit' => $this->tcunit, 'semester' => 'FIRST SEMESTER',
            'dateOfreg' => $this->dateOfreg
        );
        $this->data2 = array(
            'Regno' => $this->regno, 'level' => $this->level, 'csession' => $this->session, 'ccode' => $this->ccode2,
            'cdesc' => $this->cdesc2, 'cunit' => $this->cunit2, 'tcunit' => $this->tcunit, 'semester' => 'SECOND SEMESTER',
            'dateOfreg' => $this->dateOfreg
        );
        $temp = count($this->ccode);
        $temp2 = count($this->ccode2);
        $this->db->delete('coursesregistered', array('Regno' => $this->regno,'csession'=>$this->session,'level'=>$this->level,'Semester'=>'FIRST SEMESTER'));
        for ($i = 0; ($i <= $temp - 1); $i++) {
            if ((isset($this->regno)) && (!empty($this->ccode[$i])) && (isset($this->ccode[$i]))) {
                //echo "Course Info :" . $this->ccode[$i] . " " . $this->cdesc[$i] . "  " . $this->cunit[$i] ."FIRST SEMESTER"."<br />";
                $this->data = array(
                    'Regno' => $this->regno,
                    'Degree' => $_SESSION['degree'],
                    'Level' => $this->level,
                    'csession' => $this->session,
                    'cCode' => $this->ccode[$i],
                    'cDesc' => $this->cdesc[$i],
                    'Units' => $this->cunit[$i],
                    'Semester' => 'FIRST SEMESTER',
                        //'dateOfreg' => $this->dateOfreg
                );
                
                $this->db->insert('coursesregistered', $this->data);
            }
        }
        $this->db->delete('coursesregistered', array('Regno' => $this->regno,'csession'=>$this->session,'level'=>$this->level,'Semester'=>'SECOND SEMESTER'));
        for ($i = 0; ($i <= $temp2 - 1); $i++) {
            if ((isset($this->regno)) && (!empty($this->ccode2[$i])) && (isset($this->ccode2[$i]))) {
                //echo "Course Info :" . $this->ccode2[$i] . " " . $this->cdesc2[$i] . "  " . $this->cunit2[$i] . "SECOND SEMESTER"."<br />";
                $this->data2 = array(
                    'Regno' => $this->regno,
                    'Degree' => $_SESSION['degree'],
                    'Level' => $this->level,
                    'csession' => $this->session,
                    'cCode' => $this->ccode2[$i],
                    'cDesc' => $this->cdesc2[$i],
                    'Units' => $this->cunit2[$i],
                    'Semester' => 'SECOND SEMESTER',
                        //'dateOfreg' => $this->dateOfreg
                );
                
                $this->db->insert('coursesregistered', $this->data2);
            }
        }
        //echo "end of Disdata code";
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function fetchCoursesFirst() {
        $this->db->order_by('cCode ASC');
        $this->db->select('cCode,cDesc,Units,cType');
        $this->db->distinct();
        if($_SESSION['level'] == 100){
        $query = $this->db->get_where('curriculum', array('Degree' => $_SESSION['degree'], 'Level' => $_SESSION['level'], 'Semester' => 'FIRST SEMESTER'));
        }else{
        $query = $this->db->get_where('curriculum', array('Degree' => $_SESSION['degree'], 'Level<=' => $_SESSION['level'], 'Semester' => 'FIRST SEMESTER'));    
        }
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function fetchCoursesSecond() {
        $this->db->order_by('cCode ASC');
        $this->db->select('cCode,cDesc,Units,cType');
        $this->db->distinct();
        if($_SESSION['level'] == 100){
        $query = $this->db->get_where('curriculum', array('Degree' => $_SESSION['degree'], 'Level' => $_SESSION['level'], 'Semester' => 'SECOND SEMESTER'));
        }else{
        $query = $this->db->get_where('curriculum', array('Degree' => $_SESSION['degree'], 'Level<=' => $_SESSION['level'], 'Semester' => 'SECOND SEMESTER'));    
        }

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function fetchCoursesFirstCarryover() {
        $this->db->order_by('cCode ASC');
        $this->db->select('cCode,cDesc,Units,cType');
        $this->db->distinct();
        $query = $this->db->get_where('carryovers', array('Degree' => $_SESSION['degree'], 'Level<=' => $_SESSION['level'], 'Semester' => 'FIRST SEMESTER', 'grade' => 'F', 'Regno' => $_SESSION['RegNumb']));
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function fetchCoursesSecondCarryover() {
        $this->db->order_by('cCode ASC');
        $this->db->select('cCode,cDesc,Units,cType');
        $this->db->distinct();
        $query = $this->db->get_where('carryovers', array('Degree' => $_SESSION['degree'], 'Level<=' => $_SESSION['level'], 'Semester' => 'SECOND SEMESTER', 'grade' => 'F', 'Regno' => $_SESSION['RegNumb']));
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function printCoursesregistered1() {
       $this->session = $this->input->post('session');
       $this->db->order_by('cCode ASC');
       $this->db->select('Semester,Level,cCode,cDesc,Units');
       $query = $this->db->get_where('coursesregistered', array('Regno' => $_SESSION['RegNumb'],'csession'=>$this->session,'level'=>$_SESSION['level'],'semester' => 'FIRST SEMESTER'));
       if($query->num_rows() > 0){
           $row = $query->row_array();
           foreach($query->result() as $row){
            $tempSemester1[] = $row->Semester;$tempLevel1[] = $row->Level;$tempcCode1[] = $row->cCode;$tempcDesc1[] = $row->cDesc;    
            $tempUnits1[] = $row->Units;$_SESSION['Semester1'] = $tempSemester1;$_SESSION['Level1'] = $tempLevel1;
            $_SESSION['cCode1'] = $tempcCode1;$_SESSION['cDesc1'] = $tempcDesc1;$_SESSION['Units1'] = $tempUnits1;
           }
            return TRUE;
       }else{
           return FALSE;
       }
    }
    
    function printCoursesregistered2() {
       $this->session = $this->input->post('session');
       $this->db->order_by('cCode ASC');
       $this->db->select('Semester,Level,cCode,cDesc,Units');
       $query = $this->db->get_where('coursesregistered', array('Regno' => $_SESSION['RegNumb'],'csession'=>$this->session,'level'=>$_SESSION['level'],'semester' => 'SECOND SEMESTER'));
       if($query->num_rows() > 0){
           $row = $query->row_array();
           foreach($query->result() as $row){
            $tempSemester2[] = $row->Semester;$tempLevel2[] = $row->Level;$tempcCode2[] = $row->cCode;$tempcDesc2[] = $row->cDesc;    
            $tempUnits2[] = $row->Units;$_SESSION['Semester2'] = $tempSemester2;$_SESSION['Level2'] = $tempLevel2;
            $_SESSION['cCode2'] = $tempcCode2;$_SESSION['cDesc2'] = $tempcDesc2;$_SESSION['Units2'] = $tempUnits2;
           }
            return TRUE;
       }else{
           return FALSE;
       }
    }

}
