<?php



/**
 * Description of Preadmissionlogin
 *
 * @author osagiesammy
 */
class Preadmissionloginc extends BaseController {

    //put your code here
    public function index() {
        $data = array('title' => 'login to secured page');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('secured/Student_m');
        $this->load->helper('html');
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('JambID', 'Jamb ID', 'trim|required|exact_length[10]|xss_clean|alpha_numeric|callback_param_check');
        $this->form_validation->set_rules('Password', 'password', 'trim|required|xss_clean|alpha_numeric|callback_password_check');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/preadmissionlogin', $data);
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            //$this->Student_m->getStudentDetails();
            $this->jambID = $this->input->post('JambID');
            $query = $this->db->get_where('tblDemo', array('JambID' => $this->jambID));
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $_SESSION['Sno'] = $row['Sno'];
                $_SESSION['JambID'] = $row['JambID'];
                $_SESSION['fname'] = $row['firstname'];
                $_SESSION['mname'] = $row['middlename'];
                $_SESSION['sname'] = $row['surname'];
                $_SESSION['Sex'] = $row['Sex'];
                $_SESSION['StateOforigin'] = $row['StateOforigin'];
                $_SESSION['LGAOfOrigin'] = $row['LGAOfOrigin'];
                $_SESSION['EnglishScore'] = $row['EnglishScore'];
                $_SESSION['Subject2'] = $row['Subject2'];
                $_SESSION['Subject2Score'] = $row['Subject2Score'];
                $_SESSION['Subject3'] = $row['Subject3'];
                $_SESSION['Subject3Score'] = $row['Subject3Score'];
                $_SESSION['Subject4'] = $row['Subject4'];
                $_SESSION['Subject4Score'] = $row['Subject4Score'];
                $_SESSION['Aggregate'] = $row['Aggregate'];
                $_SESSION['FirstChoiceUniv'] = $row['FirstChoiceUniv'];
                $_SESSION['FirstChoiceFaculty'] = $row['FirstChoiceFaculty'];
                $_SESSION['FirstChoiceCourse'] = $row['FirstChoiceCourse'];
                $_SESSION['SecondChoiceUniv'] = $row['SecondChoiceUniv'];
                $_SESSION['SecondChoiceFaculty'] = $row['SecondChoiceFaculty'];
                $_SESSION['SecondChoiceCourse'] = $row['SecondChoiceCourse'];
                //redirect('secured/Displaystudentinfoc', 'refresh');
                $query = $this->db->get_where('tblstudents_temp', array('JambID' => $this->jambID));
                if ($query->num_rows() > 0) {
                    $row1 = $query->row_array();
                    $_SESSION['passport'] = $row1['passport'];
                    $_SESSION['email'] = $row1['email'];
                }
                 redirect('secured/Mainstudentc', 'refresh');
                return TRUE;
            }
        }
    }

    public function param_check() {
        $this->jambID = $this->input->post('JambID');
        $query = $this->db->get_where('postumeapplicants', array('JambID' => $this->jambID));
        if ($query->num_rows() > 0) {
            $_SESSION['JambID'] = $this->input->post('JambID');
            return TRUE;
        } else {
            $this->form_validation->set_message('param_check', 'Invalid credentials submitted access DENIED!!!');
            return FALSE;
        }
    }

    public function password_check() {
        $this->password = $this->input->post('Password');
        //$this->hash = password_hash($this->password, PASSWORD_DEFAULT);
        $query = $this->db->get_where('postumeapplicants', array('Password' => md5($this->password)));
        $row = $query->row();
        if ($query->num_rows() > 0) {
            //if (password_verify($this->password, $_SESSION['stacy'])) {
            //echo 'Password is valid!';
            return TRUE;
        } else {
            $this->form_validation->set_message('password_check', 'Invalid credentials submitted access DENIED!!!');
            return FALSE;
        }
    }

}
