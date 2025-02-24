<?php
<<<<<<< HEAD

defined('BASEPATH') OR exit('No direct script access allowed');
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
 * Description of Report_m
 *
 * @author osagiesammy
 */
<<<<<<< HEAD
class Report_m extends CI_Model {
=======
class Report_m extends Model {
>>>>>>> a3c25aa (Converting CI 3 application to CI 4 :: continuation of updating the Model)

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

//fetch department details from database
    function get_applicants_list($limit, $start) {
        $sql = "SELECT * FROM postumeapplicants LIMIT " . $start . ', ' . $limit;
//$sql = "SELECT * FROM `postumeapplicants` LIMIT 0,30";
        $query = $this->db->query($sql);
        return $query->result();
    }

    
    function updateCandidateProfile() {
        $this->JambID = $this->input->post('JambID');
        $this->sname = $this->input->post('sname');
        $this->mname = $this->input->post('fname');
        $this->fname = $this->input->post('mname');
        $this->sex = $this->input->post('sex');
        $this->nation = $this->input->post('nation');
        $this->dob = $this->input->post('dob');
        $this->password = $this->input->post('password');
        $this->maritalStatus = $this->input->post('maritalStatus');
        $this->religion = $this->input->post('religion');
        $this->email = $this->input->post('email');
        $this->gsm = $this->input->post('gsm');
        $this->roleid = $this->input->post('roleid');
        $this->permaddr = $this->input->post('permaddr');
        $this->contactaddr = $this->input->post('contactaddr');
        $this->originstate = $this->input->post('originstate');
        $this->originlga = $this->input->post('originlga');
        $this->nokname = $this->input->post('nokname');
        $this->nokpermaddr = $this->input->post('nokpermaddr');
        $this->nokphone = $this->input->post('nokphone');
        
        $this->data = array(
            'JambID' => $this->JambID,
            'sname' => $this->sname,
            'mname' => $this->mname,
            'fname' => $this->fname,
            'sex' => $this->sex,
            'dob' => $this->dob,
            'email' => $this->email,
            'gsm' => $this->gsm,
            'role_id' => $this->roleid,
            'nation' => $this->nation,
            'originstate' => $this->originstate,
            'originlga' => $this->originlga,
            'maritalStatus' => $this->maritalStatus,
            'religion' => $this->religion,
            'nokpermaddr' => $this->nokpermaddr,
            'nokname' => $this->nokname,
            'nokphone' => $this->nokphone,
            'password' => MD5($this->password)
        );
        $this->db->update('tblstudents_temp', $this->data);
        if ($this->db->affected_rows() > 0) {
            return True;
        } else {
            return False;
        }
    }

}
