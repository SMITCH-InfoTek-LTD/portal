<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of displaystaffinfoc
 *
 * @author Mitchelle Ateb
 */
class Displaystudentinfoc extends CI_Controller {

//put your code here
        function __construct() {
// Call the Model constructor
        parent::__construct();
//session_start();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper(array('html','date'));
        $this->load->library('email');
        $this->load->helper(array('form', 'url','security'));
        $this->load->library('form_validation');
        $this->load->model('new/Search');
    }
    public function index() {
//session_start();
        $data = array('title' => 'Student Profile'
        );
        $this->form_validation->set_rules('gsm', 'GSM', 'trim|required|min_length[11]|max_length[14]'); //|is_unique[tblregistered.phoneno]');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('maritalstatus', 'Marital Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|matches[cpassword]|xss_clean|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|min_length[6]|xss_clean|required');
        $this->form_validation->set_rules('religion', 'Religion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('resaddr', 'Permanent Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('contactaddr', 'Contact Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nokname', 'Next of Kin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nokphone', 'Next of Kin Phone', 'trim|xss_clean');
        $this->form_validation->set_rules('nokpermaddr', 'Next of Kin Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sEmail', 'Nok Email Address', 'trim|xss_clean');
        $this->form_validation->set_rules('degree', 'Degree', 'trim|required|xss_clean');




        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('secured/displaystudentinfo', $data);
            $this->load->view('template/footer_other');
        } else {
            $datestring = "Y-m-d h:i a";
            $time = time();
            $this->dateOfreg = date($datestring, $time);
            $data2 = array(
                'Phone' => $this->input->post('gsm'),
                'rdate' => $this->dateOfreg,
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'lga' => $this->input->post('LGAOfOrigin'),
                'mstatus' => $this->input->post('maritalstatus'),
                'religion' => $this->input->post('religion'),
                'ResidentialAddress' => $this->input->post('resaddr'),
                'contactaddr' => $this->input->post('contactaddr'),
                'Next_of_Kin_address' => $this->input->post('nokpermaddr'),
                'Next_of_Kin_Name' => $this->input->post('nokname'),
                'NoKphone' => $this->input->post('nokphone'),
                'admode' => $this->input->post('admode'),
                'sEmail' => $this->input->post('sEmail'),'occupation' => $this->input->post('occupation'),
                'relationship' => $this->input->post('relationship'),
                'hometown' => $this->input->post('hometown'),
                'lastUpdated' => $this->dateOfreg
            );
            $this->session->set_userdata($data2);
            $this->session->set_userdata('cpwd', $this->input->post('password'));
            $this->db->where('regno', $this->session->userdata('RegNumb'));
            $this->db->update('students', $data2);
            if ($this->db->affected_rows() > 0) {
                redirect('secured/LoadPictureAcctCreate', 'refresh');
            } else {
                redirect('secured/LoadPictureAcctCreate', 'refresh');
            }
        }
    }

    public function ajax_call() {
//Checking so that people cannot go to the page directly.
        //if (($this->input->post('StateOfOrigin'))) {
        $state = $this->input->post('StateOfOrigin');
        $arrCities = $this->Search->get_LGA_from_state($state);
        var_dump($arrCities);
        foreach ($arrCities as $cities) {
            $arrFinal[$cities['lganame']] = $cities[lganame];
        }
//Using the form_dropdown helper function to get the new dropdown.
        print form_dropdown('StateOfOrigin', $arrFinal);
        //} else {
        //    redirect('site'); //Else redire to the site home page.
        //}
    }

    public function confirmB4Insert() {
        $this->regno = $this->session->userdata('RegNumb');
        $query = $this->db->get_where('students', array('regno' => $this->regno));
        if ($query->num_rows() > 0) {
            echo '<script>alert("got here")</script>';
            $this->form_validation->set_message('param_check', 'Profile already updated!!! You can login to continue');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
