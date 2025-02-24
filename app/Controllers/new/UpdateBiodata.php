<?php



/**
 * Description of Preadmissionlogin
 *
 * @author osagiesammy
 */
class UpdateBiodata extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ug/Student_m');
        $this->load->helper('html');
    }

    //put your code here
    public function index() {
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('RegNumb', 'Registration number', 'trim|required|xss_clean|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('new/updatebiodata');
            $this->form_validation->set_message('rule', 'Error Message');
            $this->load->view('template/footer_other');
        } else {
            $this->password = $this->input->post('password');
            $this->username = $this->input->post('RegNumb');
            $query = $this->db->get_where('students', array('regno' => $this->username, 'Sname' => $this->password));
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $_SESSION['RegNumb'] = $row['regno'];
                $_SESSION['sname'] = $row['Sname']; $_SESSION['mname'] = $row['mname'];
                $_SESSION['lname'] = $row['Fname'];$_SESSION['dob'] = $row['dob'];
                $_SESSION['StateOfOrigin'] = $row['state']; $_SESSION['LGA'] = $row['lga'];$_SESSION['Sex'] = $row['sex'];
                $_SESSION['Course'] = $row['degree'];$_SESSION['Faculty'] = $row['fact'];
                $_SESSION['dept'] = $row['dept'];$_SESSION['religion'] = $row['religion'];
                $_SESSION['email'] = $row['email'];$_SESSION['contactaddr'] = $row['contactaddr'];
                $_SESSION['nation'] = $row['nation'];$_SESSION['NOKName'] = $row['Next_of_Kin_Name'];
                $_SESSION['NOKAddress'] = $row['Next_of_Kin_address'];$_SESSION['NOKPhone'] = $row['NokPhone'];
                $_SESSION['occupation'] = $row['occupation'];$_SESSION['relationship'] = $row['relationship'];
                $_SESSION['ResidentialAddress'] = $row['ResidentialAddress'];$_SESSION['hometown'] = $row['hometown'];
                $_SESSION['admode'] = $row['admode'];$_SESSION['mstatus'] = $row['mstatus'];
                $_SESSION['Phone'] = $row['Phone'];$_SESSION['sEmail'] = $row['sEmail'];
                $_SESSION['password'] = $row['password'];$_SESSION['passport'] = 'default.jpg';
                redirect('secured/Displaystudentinfoc', 'refresh');
                return TRUE;
            } else {
                redirect('new/Erroradmission', 'refresh');
            }
        }
    }

}
