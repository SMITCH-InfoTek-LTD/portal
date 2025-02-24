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
        $this->load->model('secured/Student_m');
    }

    function index() {
        echo view('template/header');
        echo view('template/header_menu');
        echo view('secured/uploadpassport2', array('error' => ' '));
        echo view('template/footer_other');
    }

    function do_upload() {
        $config['upload_path'] = './assets/uploads/student/secured/'; //echo $config['upload_path'];
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '100';
        $config['max_width'] = '100';
        $config['max_height'] = '100';
        $config['encrypt_name'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['max_filename'] = 20;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            //print_r($error);
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/uploadpassport2', $error);
            echo view('template/footer_other');
        } else {

            $query = $this->db->get_where('tblstudents_temp', array('JambID' => $this->session->userdata('JambID')));
            if ($query->num_rows() > 0) {
                $errorUploading['errorUploading'] = "<font color=red>Your information has been updated.</font><br/>";
                echo view('template/header');
                echo view('template/header_menu');
                echo view('secured/errorUploading', $errorUploading);
                echo view('template/footer_other');
            } else {
                //$_FILES["userfiles"]['name'] = $this->session->userdata('JambID');
                //$config['file_name'] = $_FILES["userfiles"]['name']; 
                $datapic = array('upload_data' => $this->upload->data());
                $photoname = $datapic["upload_data"]["file_name"];
                //print_r($this->session->userdata());
                $data = array(
                    'JambID' => $this->session->userdata('JambID'),
                    'passport' => $photoname,
                    'email' => $this->session->userdata('EmailAddress'),
                    'password' => $this->session->userdata('password')
                );
                $query = $this->db->get_where('tblstudents_temp', array('JambID' => $this->session->userdata('JambID')));
                if ($query->num_rows() > 0) {
                    $errorUploading['errorUploading'] = "<font color=red>Your information has been updated.</font><br/>";
                    echo view('template/header');
                    echo view('template/header_menu');
                    echo view('secured/errorUploading', $errorUploading);
                    echo view('template/footer_other');
                } else {
                    $this->db->insert('tblstudents_temp', $data);
                    if ($this->db->affected_rows() > 0) {
                        /*                         * *************** */
                        $from_email = 'secured@uniabuja.edu.ng'; //change this to yours
                        $subject = 'Account Creation';
                        $message = 'Dear Prospective Candidate ' . $_SESSION['JambID'] . ' ' . $_SESSION['CandName'] . ' ,<br />';
                        $message .= 'Your University of Abuja POST UTME account was suceessfully created. ';
                        $message .= 'Find below your login details:';
                        $message .= 'Login ID(username):  ' . $_SESSION['JambID'];
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
                        echo view('template/header');
                        echo view('template/header_menu');
                        echo view('secured/acctPicUploadSuccess', $info);
                        echo view('template/footer_other');
                    }
                }
            }
        }
    }

}
