<?php


namespace App\Models; 

use CodeIgniter\Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PUMEUpdate_m
 *
 * @author osagiesammy
 */

class PUMEUpdate_m extends Model {


    //put your code here
    var $Sno;
    var $JambID;
    var $CandName;
    var $Sex;
    var $StateOforigin;
    var $LGAOfOrigin;
    var $EnglishScore;

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
    
    function createAcct() {
        $this->jambID = $this->input->post('jambID');
        $this->email = $this->input->post('email');
        $this->password = $this->input->post('password');
        $_SESSION['stacy'] = $this->password;
        $datestring = "%Y-%m-%d %h:%i %a";
        $time = time();
        $this->dateOfreg = mdate($datestring, $time);
        $this->data = array(
            'JambID' => $this->jambID,
            'AppName' => $_SESSION['CandName'],
            'EmailAddress' => $this->email,
            'Password' => md5($this->password),
            'dateAltered' => $this->dateOfreg
        );
        $this->stacy = array(
                'JambID' => $this->jambID,
                'EmailAddress' => $this->email,
                'password' => md5($this->password)
            );
        $this->session->set_userdata($this->stacy);
        $this->db->insert('postumeapplicants', $this->data);
        if ($this->db->affected_rows() > 0) {
            return True;
        } else {
            return False;
        }
    }
    
    function updatesecured() {
        $this->EmailAddress = $this->input->post('email');$this->JambID = $this->input->post('JambID');
        $this->state = $this->input->post('state');$this->course = $this->input->post('course');
        $this->Password = $this->input->post('password');$datestring = DATE_RFC822;$time = time();
        $query = $this->db->get_where('postumeapplicants', array('JambID' => $this->JambID));
        if ($query->num_rows() > 0) {
            $this->updateData = array(
                'JambID' => $this->JambID,'EmailAddress' => $this->EmailAddress,'Password' => MD5($this->Password),
                'dateAltered' => date($datestring, $time)
            );
            $this->db->set($this->updateData);
            $this->db->where('JambID', $this->JambID);
            $this->db->update('postumeapplicants', $this->updateData);
            if ($this->db->affected_rows() > 0) {
                return True;
            } else {
                return False;
            }
        }else{
            return False;
        }
    }

}
