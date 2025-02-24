<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detailedcourseregistrationc
 *
 * @author Mitchelle Ateb
 */
class Detailedcourseregistrationc extends BaseController {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('ug/Courseregistration');
        $this->load->model('new/Search');
        $this->load->helper('html');
    }

    public function index() {

        $this->data = array(
            'title' => 'Student Course Registration Form',
        );
        $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('session', 'Session', 'trim|required|xss_clean');
        $this->form_validation->set_rules('1stcunit', 'First semester total credit load', 'trim|required|xss_clean|integer|callback_checkMaxCreditLoad1st_check');
        $this->form_validation->set_rules('2ndcunit', 'Second semester total credit load', 'trim|required|xss_clean|integer|callback_checkMaxCreditLoad2nd_check');
        $this->load->helper('html');
        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/detailedCourseregistration', $this->data);
            echo view('template/footer_other');
        } else {

            $this->Courseregistration->registerCourses();
            //exit;
            redirect('secured/Courseregsuccessc', 'refresh');
        }
    }

    public function checkMaxCreditLoad1st_check() {

        $this->totalUnitFirst = $this->input->post('1stcunit');
        $this->level = $_SESSION['level'];
        $this->degree = $_SESSION['degree'];
        if ($this->level == 100) {
            $this->db->select('Degree, Max1001');
            $query = $this->db->get_where('registrationlimits', array('Max1001 >=' => $this->totalUnitFirst, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max1001'];
            if  (($row != NULL)  || ($this->var > ($this->totalUnitFirst))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad1st_check', 'You have have exceeded your maximum Credit unit for First Semester!!!');
                return FALSE;
            }
        } else if ($this->level == 200) {
            $this->db->select('Degree, Max2001');
            $query = $this->db->get_where('registrationlimits', array('Max2001 >=' => $this->totalUnitFirst, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max2001'];
            //echo $row['Max2001'];echo "<br/>";echo $this->var;echo $this->totalUnitFirst; 
            if  (($row != NULL)  || ($this->var > ($this->totalUnitFirst))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad1st_check', 'You have have exceeded your maximum Credit unit for First Semester!!!');
                return FALSE;
            }
        } else if ($this->level == 300) {
            $query = $this->db->get_where('registrationlimits', array('Max3001 >= ' => $this->totalUnitFirst, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max3001'];
            if  (($row != NULL)  || ($this->var > ($this->totalUnitFirst))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad1st_check', 'You have have exceeded your maximum Credit unit for First Semester!!!');
                return FALSE;
            }
        } else if ($this->level == 400) {
            $query = $this->db->get_where('registrationlimits', array('Max4001 >= ' => $this->totalUnitFirst, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max4001'];
            if  (($row != NULL)  || ($this->var > ($this->totalUnitFirst))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad1st_check', 'You have have exceeded your maximum Credit unit for First Semester!!!');
                return FALSE;
            }
        } else if ($this->level == 500) {
            $query = $this->db->get_where('registrationlimits', array('Max5001 >= ' => $this->totalUnitFirst, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max5001'];
            if  (($row != NULL)  || ($this->var > ($this->totalUnitFirst))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad1st_check', 'You have have exceeded your maximum Credit unit for First Semester!!!');
                return FALSE;
            }
        } else {
            $query = $this->db->get_where('registrationlimits', array('Max6001 >= ' => $this->totalUnitFirst, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max6001'];
            if  (($row != NULL)  || ($this->var > ($this->totalUnitFirst))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad1st_check', 'You have have exceeded your maximum Credit unit for First Semester!!!');
                return FALSE;
            }
        }
    }

    public function checkMaxCreditLoad2nd_check() {

        $this->totalUnitSecond = $this->input->post('2ndcunit');
        $this->level = $_SESSION['level'];
        $this->degree = $_SESSION['degree'];

        if ($this->level == 100) {
            $query = $this->db->get_where('registrationlimits', array('Max1002 >= ' => $this->totalUnitSecond, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max1002'];
            if  (($row != NULL)  || ($this->var > ($this->totalUnitSecond))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad2nd_check', 'You have have exceeded your maximum Credit unit for Second Semester!!!');
                return FALSE;
            }
        } else if ($this->level == 200) {
            $this->db->select('Degree, Max2002');
            $query = $this->db->get_where('registrationlimits', array('Max2002 >= ' => $this->totalUnitSecond, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max2002'];
            if  (($row != NULL)  || ($this->var > ($this->totalUnitSecond))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad2nd_check', 'You have have exceeded your maximum Credit unit for Second Semester!!!');
                return FALSE;
            }
        } else if ($this->level == 300) {
            $query = $this->db->get_where('registrationlimits', array('Max3002 >= ' => $this->totalUnitSecond, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max3002'];
            if  (($row != NULL)  || ($this->var > ($this->totalUnitSecond))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad2nd_check', 'You have have exceeded your maximum Credit unit for Second Semester!!!');
                return FALSE;
            }
        } else if ($this->level == 400) {
            $query = $this->db->get_where('registrationlimits', array('Max4002 >= ' => $this->totalUnitSecond, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max4002'];
            if  (($row != NULL)  || ($this->var > ($this->totalUnitSecond))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad2nd_check', 'You have have exceeded your maximum Credit unit for Second Semester!!!');
                return FALSE;
            }
        } else if ($this->level == 500) {
            $query = $this->db->get_where('registrationlimits', array('Max5002 >= ' => $this->totalUnitSecond, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max5002'];
            if  (($row != NULL)  || ($this->var > ($this->totalUnitSecond))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad2nd_check', 'You have have exceeded your maximum Credit unit for Second Semester!!!');
                return FALSE;
            }
        } else {
            $query = $this->db->get_where('registrationlimits', array('Max6002 >= ' => $this->totalUnitSecond, 'Degree' => $this->degree));
            $row = $query->row_array();
            $this->var = (int)$row['Max6002'];
            if  (($row != NULL)  || ($this->var > ($this->totalUnitSecond))) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkMaxCreditLoad2nd_check', 'You have have exceeded your maximum Credit unit for Second Semester!!!');
                return FALSE;
            }
        }
    }

    public function populatecourseFirst() {
        $q = $this->input->get('q');
        $this->firstsemester = 'FIRST SEMESTER';
        $this->return_arr = array();
        $this->db->order_by('cCode ASC');
        $this->db->select('cCode,cDesc,Units');
        $this->db->distinct();
        if ($_SESSION['level'] == 100) {
            $sql = "SELECT cCode,cDesc,cType,Units FROM curriculum WHERE cCode LIKE '%" . $q . "%' AND Degree = '" . $_SESSION['degree'] .
                    "' AND Level='" . $_SESSION['level'] . "' AND Semester= '" . $this->firstsemester . "' ORDER BY cCode";
        } else {
            $sql = "SELECT cCode,cDesc,cType,Units FROM curriculum WHERE cCode LIKE '%" . $q . "%' AND Degree = '" . $_SESSION['degree'] .
                    "' AND Level<='" . $_SESSION['level'] . "' AND Semester= '" . $this->firstsemester . "' ORDER BY cCode";
        }
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['ccode'] = $row->cCode;
                $data['cdesc'] = $row->cDesc;
                $data['ctype'] = $row->cType;
                $data['units'] = $row->Units;
                array_push($this->return_arr, $data);
            }
            echo json_encode($this->return_arr);
        } else {
                echo "FAILED";
        }
    }

    public function populatecourseSecond() {
        $q = $this->input->get('q');
        $this->secondsemester = 'SECOND SEMESTER';
        $this->return_arr = array();
        $this->db->order_by('cCode ASC');
        $this->db->select('cCode,cDesc,Units');
        $this->db->distinct();
        if ($_SESSION['level'] == 100) {
            $sql = "SELECT cCode,cDesc,cType,Units FROM curriculum WHERE cCode LIKE '%" . $q . "%' AND Degree = '" . $_SESSION['degree'] .
                    "' AND Level='" . $_SESSION['level'] . "' AND Semester= '" . $this->secondsemester . "' ORDER BY cCode";
        } else {
            $sql = "SELECT cCode,cDesc,cType,Units FROM curriculum WHERE cCode LIKE '%" . $q . "%' AND Degree = '" . $_SESSION['degree'] .
                    "' AND Level<='" . $_SESSION['level'] . "' AND Semester= '" . $this->secondsemester . "' ORDER BY cCode";
        }
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['ccode'] = $row->cCode;
                $data['cdesc'] = $row->cDesc;
                $data['ctype'] = $row->cType;
                $data['units'] = $row->Units;
                array_push($this->return_arr, $data);
            }
            echo json_encode($this->return_arr);
        } else {
                $data['ccode'] = "";
                $data['cdesc'] = "";
                $data['ctype'] = "";
                $data['units'] = "";
                array_push($this->return_arr, $data);
                echo json_encode($this->return_arr);
                echo "FAILED";
        }
    }

}
