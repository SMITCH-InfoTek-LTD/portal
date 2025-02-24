<?php
namespace App\Models; 

use CodeIgniter\Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Studentresult
 *
 * @author osagiesammy
 */
class Studentresult extends Model {

    //Globa variables

    var $courses = '';
    var $dateOfreg = '';
    var $semester;
    var $cname;
    var $cdescription;
    var $courseunit;
    var $level;
    var $code;
    var $regno = array();
    var $grade = array();
    var $score = array();
    var $examyear = array();
    var $tcunit;
    var $info;
    var $all;

    //Constructor
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

    function enterresults() {
        $this->regno = $_SESSION['regno'];
        $this->grade = $this->input->post('grade');
        $this->score = $this->input->post('score');
        $this->examyear = $this->input->post('examyear');
        $this->semester = $this->input->post('semester');
        $this->level = $this->input->post('level');
        $this->ccode = $this->input->post('ccode');
        $tdata = count($this->regno);
        //echo $tdata . "Got here";
        //print_r($this->regno);
        for ($i = 0; ($i <= ($tdata - 1)); $i++) {
            if (isset($_SESSION['regno'][$i]) && (!empty($_SESSION['ccode'][$i]) && (isset($_SESSION['ccode'][$i])))) {
                echo 'Regno<input name=' . $_SESSION['regno'][$i] . ' value="' . $_SESSION['regno'][$i] . '" size="10"/>Score<input name="score[]" size="3" />'
                . 'Grade<input name="grade[]" size="1"/>ExamYear<input name="examyear[]" size="6" />';
                $this->data = array(
                    'regno' => $this->regno[$i], 'level' => $this->level, 'ccode' => $this->ccode,
                    'semester' => $this->semester, 'examyear' => $this->examyear[$i], 'score' => $this->score[$i],
                    'grade' => $this->grade[$i]
                );
                $this->db->insert('tblresults', $this->data);
                if ($this->db->affected_rows() > 0) {
                    $this->info = "The total number of inserted rows :" . $this->db->affected_rows();
                    //$this->session->mark_as_flash($this->info);
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }

    function printHTMLresult(){
        $this->regno = $this->input->post('regno');
        $query = $this->db->get_where('tblresults', array('regno' => $this->regno));
        if ($query->num_rows() > 0) {
            //$row = array();
            foreach ($query->result() as $row) {
                return $row;
            }
        } else {
            return FALSE;
        }
    }
    function deleteStudentProfile() {
        
    }

    function updateStudentRegisteredCourses() {
        
    }

    function printRegisteredCourses() {
        
    }

    function printTranscript() {
        
    }

    function deceasedStudent() {
        
    }

}
