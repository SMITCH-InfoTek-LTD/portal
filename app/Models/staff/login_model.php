<?php

namespace App\Models; 

use CodeIgniter\Model;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author doowo
 */
class Login_model extends Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        //$this->load->database();
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->library('session');
        $this->load->library('email');
    }

    //put your code here
    public function validate() {
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('npassword'));

        // Prep the query
        $this->db->where('logniname', $username);
        $this->db->where('password', $password);

        // Run the query
        $query = $this->db->get('tblloginDetails');
        // Let's check if there are any results
        if ($query->num_rows == 1) {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                'userid' => $row->userid,
                'fname' => $row->fname,
                'lname' => $row->lname,
                'username' => $row->username,
                'validated' => true
            );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }

}

?>
