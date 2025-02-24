
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('captcha');
        $this->load->database();
        $this->load->helper('html');
        $this->load->model('admin/Captcha');
    }

    //put your code here
    public function index() {

        //session_start();
        $sub_data['captcha_return'] = '';
        $sub_data['cap_img'] = $this->Captcha->make_captcha();

        if ($this->input->post('submitButton')) {
            $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[3]|max_length[24]|callback_password_check');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[24]|xss_clean|callback_username_check');

            if ($this->form_validation->run() == FALSE) {
                echo view('template/header');
                echo view('template/header_menu');
                $data['body'] = echo view('admin/login', $sub_data, true);
                echo view('template/footer_other');
            } else {
                if ($this->Captcha->check_captcha() == TRUE) {

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
                        redirect('admin/Mainstaffc', 'refresh');
                        return TRUE;
                    } else {
                        $sub_data['captcha_return'] = "The characters you entered didn't match the word verification. Please try again. <br/>";
                        $data['body'] = echo view('admin/login', $sub_data, true);
                        return FALSE;
                    }
                }
                echo view('admin/login', $data);
            }
            echo view('admin/login', $data);
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
