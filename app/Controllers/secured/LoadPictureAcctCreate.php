<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class LoadPictureAcctCreate extends BaseController {

    function __construct() {
        parent::__construct();
//session_start();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->database();
        $this->load->library('email');
        $this->load->model('ug/Student_m');
    }

    function index() {
        $this->load->view('template/header');
        $this->load->view('template/header_menu');
        $this->load->view('secured/uploadpassport2', array('error' => ' '));
        $this->load->view('template/footer_other');
    }

    function do_upload() {
        $config['upload_path'] = './assets/uploads/student/'; //echo $config['upload_path'];
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '100';
        $config['max_width'] = '100';
        $config['max_height'] = '100';
        $config['encrypt_name'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['max_filename'] = 20;
        $config['file_ext_tolower'] = TRUE;
        $config['file_name'] = $this->session->userdata('RegNumb');
        $config['overwrite'] = TRUE;
        $config['detect_mime'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('secured/uploadpassport2', $error);
            $this->load->view('template/footer_other');
        } else {
 
            $datapic = array('upload_data' => $this->upload->data());
            $photoname = $datapic["upload_data"]["file_name"];
            $this->timesammp = DATE("dmyHis");
            $this->lastUpDate = $this->timesammp;
            $data = array(
                'passport' => $photoname,
                'lastUpdated'=> $this->lastUpDate
            );
            //var_dump($data);
            $this->db->where('regno', $this->session->userdata('RegNumb'));
            $this->db->update('students', $data);
            $this->Candname = $this->session->userdata('SurName') .''. $this->session->userdata('Middlename').''.$this->session->userdata('LastName');
            if ($this->db->affected_rows() > 0) {
                //var_dump($data);
                /*                 * *************** */
                $from_email = 'secured@uniabuja.edu.ng'; //change this to yours
                $subject = 'Account Creation';
                $message = 'Dear Prospective Candidate ' . $this->session->userdata('RegNumb') . ' ' . $this->Candname . ' ,<br />';
                $message .= 'Your University of Abuja POST UTME account was suceessfully created. ';
                $message .= 'Find below your login details:';
                $message .= 'Login ID(username):  ' . $this->session->userdata('RegNumb');
                $message .= 'You can now login with the username and password your provided. ';
                $message .= 'NOTE: Always keep your password safe. It should also be noted that your password is case-sensitive.';
                $message .='<br /><br /><br /><b>Best Regards.<br />UNIABUJA Portal Team</b>';
                $message .='<br /><br /><b><font color="red">DO NOT REPLY TO THIS MAIL IT WILL GO NO WHERE!!!</font></b>';
//$this->email->initialize($config);
//$this->load->library('email');
//send mail
                $this->email->from($from_email, 'Portal Support');
                $this->email->to($this->input->post('email'));
                $this->email->subject($subject);
                $this->email->message($message);
//return $this->email->send();
/**
                if ($this->email->send()) {
                    $_SESSION['message_display'] = 'Email Successfully Sent ! , Please check your spam folder if you can not find email';
                    $this->session->mark_as_flash('message_display');
                } else {
                    $_SESSION['message_display'] = '<p class="error_msg">Invalid Gmail Account or Password !</p>';
                    $this->session->mark_as_flash('message_display');
                    print_r($this->email->print_debugger());
                }//exit;
//redirect('secured/Preadmissionloginc', 'refresh');
//**************/

                $info = array('upload_data' => $this->upload->data(), 'data' => $data);
                $this->load->view('template/header');
                $this->load->view('template/header_menu');
                $this->load->view('secured/acctPicUploadSuccess', $info);
                $this->load->view('template/footer_other');
            }
        }
    }
}
