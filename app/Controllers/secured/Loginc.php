<?php
namespace App\Controllers;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of changePasswordc
 *
 * @author doowo
 */
class Loginc extends BaseController {

    //put your code here
    public function index() {

        //session_start();
        $data = array('title' => 'user login'
        );
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('html');
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[3]|max_length[24]|callback_password_check');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[24]|xss_clean|callback_username_check');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/admin/login', $data);
            echo view('template/footer_other');
        } else {
            //$this->Student->loginStudent();
            $this->password = $this->input->post('password');
            $this->username = $this->input->post('username');
            $query = $this->db->get_where('tbllogindetails', array('loginame' => $this->username, 'password' => MD5($this->password)));
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['username'] = $row['loginame'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['roleid'] = $row['role_id'];
                $_SESSION['regdate'] = $row['regdate'];
                $_SESSION['staffID'] = $row['staffid'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['photo'] = $row['photo'];
                redirect('secured/admin/Mainstaffc', 'refresh');
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function password_check() {
        $this->password = $this->input->post('password');
        $query = $this->db->get_where('tbllogindetails', array('password' => MD5($this->password)));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('password_check', 'Invalid credentials submitted access DENIED!!!');
            return FALSE;
        }
    }

    public function username_check() {
        $this->username = $this->input->post('username');
        $query = $this->db->get_where('tbllogindetails', array('loginame' => $this->username));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('username_check', 'Invalid credentials submitted access DENIED!!!');
            return FALSE;
        }
    }

}

?>
