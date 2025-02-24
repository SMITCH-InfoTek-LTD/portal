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
 * Description of Olevels_m
 *
 * @author osagiesammy
 */
<<<<<<< HEAD
class Olevels_m extends CI_Model {
=======
class Olevels_m extends Model {
>>>>>>> a3c25aa (Converting CI 3 application to CI 4 :: continuation of updating the Model)

    //put your code here

    var $Sno;
    var $JambID;
    var $CandName;
    var $Sex;
    var $exambody;
    var $others;
    var $examyear;
    var $examyear_1;
    var $examnumber;
    var $sittings;
    var $subject = array();
    var $grade = array();
    var $exambody2;
    var $others2;
    var $examyear2;
    var $examyear2_1;
    var $examnumber2;
    var $subject2 = array();
    var $grade2 = array();
    var $ccode = array();
    var $cdesc = array();
    var $cunit = array();
    var $all;
    var $serialzed;
    var $thearray = array();
    var $unserialized;
    var $disdata, $disdata2;
    var $counterEE;
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

    function registerOlevels_1_sittings() {
        $this->JambID = $this->input->post('JambID');
        $this->exambody = $this->input->post('exambody');
        $this->examnumber = $this->input->post('examnumber');
        $this->examyear = $this->input->post('examyear');
        $this->others = $this->input->post('others');
        $this->subject = $this->input->post('subject');
        $this->grade = $this->input->post('grade');
        $this->sittings = $this->input->post('sittings');
        $this->sitting = $this->input->post('sitting');
        $this->examyear_1 = $this->input->post('examyear_1');
        $this->semester = $this->input->post('txtsemester');
        $datestring = "%Y-%m-%d %h:%i %a";
        $time = time();
        $this->serializedsubject = json_encode($this->subject);
        $this->serializedgrade = json_encode($this->grade);
        $this->dateOfreg = mdate($datestring, $time);
        $temp = count($this->subject);
        //echo $temp;
        //print_r($this->subject);exit();
        for ($i = 0; ($i < $temp - 1); $i++) {
            if ((isset($this->JambID)) && (!empty($this->subject[$i])) && (isset($this->subject[$i]))) {
                $this->disdata = array(
                    'JambID' => $this->JambID,
                    'exambody' => $this->exambody,
                    'examyear' => $this->examyear,
                    'examyear_1' => $this->examyear_1,
                    'examnumber' => $this->examnumber,
                    'subject' => $this->subject[$i],
                    'grade' => $this->grade[$i],
                    'sitting'=> $this->sitting,
                    'dateOfreg' => $this->dateOfreg
                );
                $this->db->insert('tblOlevel', $this->disdata);
            }
        }
        if ($this->db->affected_rows() > 0) {
            $this->data = array(
                'JambID' => $this->JambID,
                'sittings' => $this->sittings
            );
            $this->db->insert('tblsittings', $this->data);
            return True;
        } else {
            return False;
        }
    }

    function registerOlevels_2_sittings() {
        $this->JambID = $this->input->post('JambID');
        $this->exambody = $this->input->post('exambody');
        $this->examnumber = $this->input->post('examnumber');
        $this->examyear = $this->input->post('examyear');
        $this->sitting = $this->input->post('sitting');
        $this->others = $this->input->post('others');
        $this->subject = $this->input->post('subject');
        $this->grade = $this->input->post('grade');
        $this->examyear_1 = $this->input->post('examyear_1');
        $this->exambody2 = $this->input->post('exambody2');
        $this->sitting2 = $this->input->post('sitting2');
        $this->examnumber2 = $this->input->post('examnumber2');
        $this->examyear2 = $this->input->post('examyear2');
        $this->examyear2_1 = $this->input->post('examyear2_1');
        $this->others2 = $this->input->post('others2');
        $this->subject2 = $this->input->post('subject2');
        $this->grade2 = $this->input->post('grade2');
        $this->sittings = $this->input->post('sittings');
        $this->examyear2_1 = $this->input->post('examyear2_1');
        $this->ccode = $this->input->post('ccode');
        $this->cdesc = $this->input->post('cdesc');
        $this->cunit = $this->input->post('cunit');
        $datestring = "%Y-%m-%d %h:%i %a";
        $time = time();
        $this->serializedsubject = json_encode($this->subject);
        $this->serializedgrade = json_encode($this->grade);
        $this->serializedsubject2 = json_encode($this->subject2);
        $this->serializedgrade2 = json_encode($this->grade2);
        $this->dateOfreg = mdate($datestring, $time);
        $temp = count($this->subject);
        //echo $temp;
        //print_r($this->subject);exit();
        for ($i = 0; ($i < $temp - 1); $i++) {
            if ((isset($this->JambID)) && (!empty($this->subject[$i])) && (isset($this->subject[$i]))) {
                $this->disdata = array(
                    array(
                        'JambID' => $this->JambID,
                        'exambody' => $this->exambody,
                        'examyear' => $this->examyear,
                        'examyear_1' => $this->examyear_1,
                        'examnumber' => $this->examnumber,
                        'subject' => $this->subject[$i],
                        'grade' => $this->grade[$i],
                        'sitting' => $this->sitting,
                        'dateOfreg' => $this->dateOfreg
                    ),
                    array(
                        'JambID' => $this->JambID,
                        'exambody' => $this->exambody2,
                        'examyear' => $this->examyear2,
                        'examyear_1' => $this->examyear2_1,
                        'examnumber' => $this->examnumber2,
                        'subject' => $this->subject2[$i],
                        'grade' => $this->grade2[$i],
                        'sitting' => $this->sitting2,
                        'dateOfreg' => $this->dateOfreg
                    )
                );
                //print_r($this->disdata);
                $this->db->insert_batch('tblOlevel', $this->disdata);
            }
        }
        if ($this->db->affected_rows() > 0) {
            $this->data = array(
                'JambID' => $this->JambID,
                'sittings' => $this->sittings
            );
            $this->db->insert('tblsittings', $this->data);
            return True;
        } else {
            return False;
        }
    }

    function viewOlevelSubjects() {
        $this->JambID = $this->session->userdata('JambID');
        $query = $this->db->get_where('tblsittings', array('sittings' => $this->session->userdata('sittings')));
        //$query = $this->db->get('tblsittings');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            //$_SESSION['sittings'] = $row['sittings'];
            //echo $row['sittings'];
            if (($row['JambID'] == $this->session->userdata('JambID')) && ($row['sittings'] == 'onesitting')) {
                //echo $row['JambID'] . " " . $row['sittings'] . "<br />";
                $query = $this->db->get_where('tblOlevel', array('JambID' => $this->JambID));
                $row = $query->row_array();
                foreach ($query->result() as $row) {
                    $_SESSION['exambody'] = $row->exambody;
                    $_SESSION['others'] = $row->others;
                    $_SESSION['examyear'] = $row->examyear;
                    $_SESSION['examyear_1'] = $row->examyear_1;
                    $_SESSION['examnumber'] = $row->examnumber;
                    //$_SESSION['subject'] = $row->subject;
                    //$_SESSION['grade'] = $row->grade;
                    $_SESSION['dateOfreg'] = $row->dateOfreg;
                    $tempsitting[] = $row->sitting;
                    $tempsubject[] = $row->subject;
                    $tempgrade[] = $row->grade;
                }
                $data = array(
                    'exambody' => $_SESSION['exambody'],
                    'others' => $_SESSION['others'],
                    'examyear' => $_SESSION['examyear'],
                    'examyear_1' => $_SESSION['examyear_1'],
                    'examnumber' => $_SESSION['examnumber'],
                    'subject' => $tempsubject,
                    'grade' => $tempgrade,
                    'sitting' => $tempsitting,
                    'dateOfreg' => $_SESSION['dateOfreg']
                );
                $this->session->set_userdata($data);
                return True;
            } else if (($row['JambID'] == $this->session->userdata('JambID')) && ($this->session->userdata('sittings') == 'doublesittings')) {
                //echo $row['JambID'] . " " . $row['sittings'] . "<br />";
                $query = $this->db->get_where('tblOlevel', array('JambID' => $this->JambID));
                 $row = $query->row_array();
                foreach ($query->result() as $row) {
                    $tempexambody[] = $row->exambody;
                    $tempothers[] = $row->others;
                    $tempexamyear[] = $row->examyear;
                    $tempexamyear_1[] = $row->examyear_1;
                    $tempexamnumber[] = $row->examnumber;
                    //$tempsitting[] = $row->sitting;
                    $tempdateOfreg[] = $row->dateOfreg;
                    $tempsubject[] = $row->subject;
                    $tempgrade[] = $row->grade;
                }
                    $data = array(
                        'exambody' => $tempexambody,
                        'others' => $tempothers,
                        'examyear' => $tempexamyear,
                        'examyear_1' => $tempexamyear_1,
                        'examnumber' => $tempexamnumber,
                        'subject' => $tempsubject,
                        'grade' => $tempgrade,
                        //'sitting' => $tempsitting,
                        'dateOfreg' => $tempdateOfreg
                    );
                //}
                $this->session->set_userdata($data);
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

}
