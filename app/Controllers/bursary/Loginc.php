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
        $sub_data['cap_img'] = $this->Captcha->make_captcha();
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[3]|max_length[24]|callback_password_check');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[24]|xss_clean|callback_username_check');
        //$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|xss_clean|callback_captcha_check');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('bursary/login', $sub_data);
            $this->load->view('template/footer_other');
        } else {
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
                redirect('bursary/Mainbursarystaffc', 'refresh');
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function refresh() {
        // Captcha configuration
        $vals = array(
            'word' => '',
            'img_path' => './assets/captcha/',
            'img_url' => base_url() . 'assets/captcha/',
            'font_path' => base_url() . 'assets/captcha/captcha.ttf',
            'img_width' => '200',
            'img_height' => '30',
            'expiration' => 3600,
            'word_length' => 8,
            'font_size' => 16,
            'img_id' => 'Imageid',
            'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            // White background and border, black text and red grid
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(192,192,192,0.3)
        ));
        $cap = create_captcha($vals);

        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);

        // Display captcha image
        echo $cap['image'];
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

    public function captcha_check() {
        // First, delete old captchas
        $expiration = time() - 3600; // One hour limit
        $this->db->where('captcha_time < ', $expiration)
                ->delete('captcha');

// Then see if a captcha exists:
        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        if ($row->count == 0) {
            $this->form_validation->set_message('captcha_check', 'You must submit the word that appears in the image');
            return FALSE;
        }else{
            return TRUE;
        }
    }

}
