<?php



class Loadpicc extends BaseController {

    function __construct() {
        parent::__construct();
        //session_start();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->database();
        $this->load->model('secured/Student_m');
    }

    function index() {
        $this->load->view('template/header');
        $this->load->view('template/header_menu');
        $this->load->view('secured/uploadpassport', array('error' => ' '));
        $this->load->view('template/footer_other');
    }

    function do_upload() {
        $config['upload_path'] = './assets/uploads/student/secured/'; //echo $config['upload_path'];
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '100';
        $config['max_width'] = '100';
        $config['max_height'] = '100';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['max_filename'] = 12;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            //print_r($error);
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('secured/uploadpassport', $error);
            $this->load->view('template/footer_other');
        } else {

            $query = $this->db->get_where('tblstudents_temp', array('JambID' => $this->session->userdata('JambID')));
            if ($query->num_rows() > 0) {
                $errorUploading['errorUploading'] = "<font color=red>Your information has been updated.</font><br/>";
                $this->load->view('template/header');
                $this->load->view('template/header_menu');
                $this->load->view('secured/errorUploading', $errorUploading);
                $this->load->view('template/footer_other');
            } else {
                $datapic = array('upload_data' => $this->upload->data());
                $photoname = $datapic["upload_data"]["file_name"];
                //print_r($photoname);exit();
                $data = array(
                    'JambID' => $this->session->userdata('JambID'),
                    'fname' => $this->session->userdata('fname'),
                    'mname' => $this->session->userdata('mname'),
                    'sname' => $this->session->userdata('sname'),
                    'sex' => $this->session->userdata('sex'),
                    'dob' => $this->session->userdata('dob'),
                    'gsm' => $this->session->userdata('gsm'),
                    'nation' => $this->session->userdata('nation'),
                    'originstate' => $this->session->userdata('StateOforigin'),
                    'originlga' => $this->session->userdata('LGAOfOrigin'),
                    'maritalstatus' => $this->session->userdata('maritalstatus'),
                    'religion' => $this->session->userdata('religion'),
                    'permaddr' => $this->session->userdata('permaddr'),
                    'contactaddr' => $this->session->userdata('contactaddr'),
                    'nokpermaddr' => $this->session->userdata('nokpermaddr'),
                    'nokname' => $this->session->userdata('nokname'),
                    'nokphone' => $this->session->userdata('nokphone'),
                    'passport' => $photoname,
                     'password' => $this->session->userdata('password'),
                    'declaration' => $this->session->userdata('agree')
                    
                );
                $this->JambID = $this->session->userdata('JambID');
                $query = $this->db->get_where('tblstudents_temp', array('JambID' => $this->session->userdata('JambID')));
                if ($query->num_rows() > 0) {
                    $errorUploading['errorUploading'] = "<font color=red>Your information has been updated.</font><br/>";
                    $this->load->view('template/header');
                    $this->load->view('template/header_menu');
                    $this->load->view('secured/errorUploading', $errorUploading);
                    $this->load->view('template/footer_other');
                } else {
                    $this->db->insert('tblstudents_temp', $data);
                    if ($this->db->affected_rows() > 0) {
                        $info = array('upload_data' => $this->upload->data(), 'data' => $data);
                        //print_r($info);
                        $this->load->view('template/header');
                        $this->load->view('template/header_menu');
                        $this->load->view('secured/updateStudentSuccess', $info);
                        $this->load->view('template/footer_other');
                        //echo '<meta http-equiv="refresh"' . 'content="0;URL="'.base_url().'index.php/successc">';
                    }
                }
            }
        }
    }

}
