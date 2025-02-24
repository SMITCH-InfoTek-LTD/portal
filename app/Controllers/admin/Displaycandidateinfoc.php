<?php



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of displaystaffinfoc
 *
 * @author Uchenna Igboeli
 */
class Displaycandidateinfoc extends BaseController {

//put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->helper('html');
    }

    public function index() {
//session_start();
        $data = array('title' => 'Upload Screened Students'
        );
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('jambid', 'JAMB ID', 'trim|xss_clean|required');
        
        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('admin/DisplayCandidateInfo', $data);
            echo view('template/footer_other');
        } else {
            $vRegno = $this->input->post('regno');
            $Sname = $this->input->post('sname');
            $Fname = $this->input->post('fname');
            $mname = $this->input->post('mname');
            $vJambID = $this->input->post('jambid');
            $level = $this->input->post('level');
            $lga   = $this->input->post('lga');
            $religion = $this->input->post('religion');
            $dob = $this->input->post('dob');
            $sex = $this->input->post('sex');
            $datestring = '%Y - %m  - %d - %h:%i %a';
            $time = time();
            $date = mdate($datestring, $time);
            $query = $this->db->get_where('students', array('RegNumb' => $vJambID));
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $vSname = $row['Sname'];
                $vMname = $row['mname'];
                $vFname = $row['Fname'];

            }

            if (isset($vSname)) {
                 $k = 0;
                $l = 0;
                $data2 = array('Sname'=>$Sname,'Fname'=>$Fname,'mname'=>$mname,'regno' => $vRegno,'level'=>$level,'religion'=>$religion,'dob'=>$dob,'sex'=>$sex,'lga'=>$lga,'lastUpdated'=>$date,'LastUpdatedBy'=>$_SESSION['username']);
//var_dump($data2);die();
                $this->db->where(array('RegNumb' => $vJambID));
                $this->db->update('students', $data2);
                if ($this->db->affected_rows() > 0) {
                    $k = $k + $this->db->affected_rows();
                    $this->db->set('RefNumb', $vRegno);
                    $this->db->where('RegNumb', $vJambID);
                    $this->db->update('admittedstudents');
                    if ($this->db->affected_rows() > 0) {
                        $l = $l + $this->db->affected_rows();
                    }
                    $msg = 'Candidate Names Are   ' . $vSname . ' ' . $vFname . ' ' . $vMname ."<br/>";
                    $msg .= 'Candidate With JambID :  ' . $vJambID . '  Updated With Regno :  ' . $vRegno;
                    $msg2 = 'Total Number Of Candidates Replaced =  ' . $k."<br/>";
                    $msg2 .= 'Total Number Of Reference number updated =  ' . $l;
                }
$auditdata = array('regno' => $vRegno,'jambid' => $vJambID,'sex'=>$sex,'level'=>$level,'religion'=>$religion,'dateOfBirth'=>$dob,'lga'=>$lga,'dateUpdated'=>$date,'updatedBy'=>$_SESSION['username']);//var_dump($auditdata);die();
$this->db->insert('audit', $auditdata); 
if ($this->db->affected_rows() > 0) {$a=0; $a = $a + $this->db->affected_rows();}else{$a=0;}                 
$msg2 .= '  >>>>>>>>  Total Number Of Audit trail(s) =  ' .$a ."<br/>";
$_SESSION['msg'] = $msg;
                    $_SESSION['msg2'] = $msg2;
                    $this->session->mark_as_flash('msg');
                    $this->session->mark_as_flash('msg2');
                    redirect('admin/Displaycandidateinfoc', 'refresh');
                
            } else {
                    $msg = 'Candidate with JambID   ' . $vJambID  . 'record not found';
                    $_SESSION['msg'] = $msg;
                    $this->session->mark_as_flash('msg');
                    redirect('admin/Displaycandidateinfoc', 'refresh');
            }
        }
    }

    public function getSnamec() {
        $q = $this->input->get('q');
        $this->return_arr = array();
        $sql = "SELECT regno,Sname,Fname,mname,level,lga,dob,sex FROM students WHERE RegNumb ='" . $q . "'";
        $query = $this->db->query($sql);
                $row = $query->row_array();//var_dump($row);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['sname'] = $row->Sname;
                $data['fname'] = $row->Fname;
                $data['mname'] = $row->mname;
                $data['level'] = $row->level;
                $data['lga']   = $row->lga;
                $data['religion'] = $row->religion;
                $data['dob'] = $row->dob;
                $data['sex'] = $row->sex;
                $data['regno'] = $row->regno;
                array_push($this->return_arr, $data);
            }
            echo json_encode($this->return_arr);
        } else {
            echo "No records Found!!!";
        }
    }

}
