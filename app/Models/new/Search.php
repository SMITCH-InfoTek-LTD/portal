<?php

namespace App\Models; 

use CodeIgniter\Model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search
 *
 * @author osagiesammy
 */
class Search extends Model {

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

    function checkadminStatus($regno) {
        $query = $this->db->get_where('admittedstudents', array('RegNumb' => $regno));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    function searchState() {
        $query = $this->db->query("SELECT DISTINCT sname FROM states ORDER BY sname");
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

    function get_LGA_from_state($state) {
        $query = $this->db->ger_where('localgovts', array('sname' => $state));

        if ($query->num_rows > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    function searchCourses($data,$sem,$le) {
        $this->db->select('cCode');
        $this->db->select('cDesc');
        $this->db->select('cUnits');
        $this->db->like('cCode', $data);
        $this->db->where('cSemester', $sem);
        $this->db->where('cLevel', $le);
        $this->db->from('courses');
        $query =  $this->db->get();
        if ($query->num_rows() > 0) { 
            return $query->result();
        }
    }

}
