<?php



/**
 * Description of Preadmissionlogin
 *
 * @author osagiesammy
 */
class Studentloginc extends BaseController {

    //put your code here
    public function index() {
        $data = array('title' => 'login to secured page');
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('RegNumb', 'Reg number', 'trim|required|xss_clean|alpha_numeric|callback_regno_check');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|alpha_numeric|callback_password_check');

        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('secured/studentlogin', $data);
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            $this->RegNumb = $this->input->post('RegNumb');
            $this->password = $this->input->post('password');
            $query = $this->db->get_where('students', array('regno' => $this->RegNumb, 'password' => $this->password));
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $_SESSION['DeptSn'] = $row['dept'];
                $_SESSION['RegNumb'] = $row['regno'];
                $_SESSION['lname'] = $row['Fname'];
                $_SESSION['mname'] = $row['mname'];
                $_SESSION['sname'] = $row['Sname'];
                $_SESSION['Sex'] = $row['sex'];
                $_SESSION['StateOfOrigin'] = $row['state'];
                $_SESSION['LGA'] = $row['lga'];
                $_SESSION['hometown'] = $row['hometown'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['ContactAddress'] = $row['contactaddr'];
                $_SESSION['nation'] = $row['nation'];
                $_SESSION['religion'] = $row['religion'];
                $_SESSION['NOKName'] = $row['Next_of_Kin_Name'];
                $_SESSION['NOKAddress'] = $row['Next_of_Kin_address'];
                $_SESSION['NOKEmail'] = $row['sEmail'];
                $_SESSION['residential'] = $row['ResidentialAddress'];
                $_SESSION['admode'] = $row['admode'];
                $_SESSION['FacAbrev'] = $row['fact'];
                $_SESSION['CourseAbrev'] = $row['dept'];
                $_SESSION['degree'] = $row['degree'];
                $_SESSION['level'] = $row['level'];
                $_SESSION['occupation'] = $row['occupation'];
                $_SESSION['relationship'] = $row['relationship'];
                $_SESSION['mstatus'] = $row['mstatus'];
                $_SESSION['dob'] = $row['dob'];
                $_SESSION['passport'] = $row['passport'];
                $_SESSION['phone'] = $row['Phone'];
                $_SESSION['NOKPhone'] = $row['NokPhone'];
                if (isset($row['RegNumb'])) {
                    $_SESSION['JambID'] = $row['RegNumb'];
                } else {
                    $_SESSION['JambID'] = "";
                }
               //var_dump($_SESSION);die();
                //$query = $this->db->get_where('students', array('regno' => $this->RegNumb));
                if ($_SESSION['passport'] == "") {
                    $_SESSION['passport'] = 'default.jpg';
                }
                    $query1 = $this->db->get_where('changeOfCourse', array('RegNumb' => $_SESSION['JambID']));
                if ($query1->num_rows() > 0) {
                    $row1 = $query1->row_array();
                    $_SESSION['StatChange'] = $row1['Status'];
                    $qry1 = $this->db->get_where('paymentTrans', array('Item_Code' => '3002', 'status' => '01', 'RegNumb' => $this->RegNumb));
                    if ($qry1->num_rows() > 0) {
                        $_SESSION['StatChange'] = 'T';
                        $_SESSION['text'] = "";
                        redirect('secured/Mainstudentc', 'refresh');
                    } else {
                        $_SESSION['text'] = $row1['Message'];
                        redirect('secured/SecuredPayment', 'refresh');
                    }
                } elseif ($query1->num_rows() == 0) {
                    $query2 = $this->db->get_where('changeOfInstitution', array('RegNumb' => $_SESSION['JambID']));
                    $row2 = $query2->row_array();
                    if ($query2->num_rows() > 0) {
                        $_SESSION['StatChange'] = $row2['Status'];
                        $_SESSION['text'] = $row2['Message'];
                        $qry2 = $this->db->get_where('paymentTrans', array('Item_Code' => '3003', 'status' => '01', 'RegNumb' => $this->RegNumb));
                        if ($qry2->num_rows() > 0) {
                            $_SESSION['StatChange'] = 'T';
                            $_SESSION['text'] = "";
                            redirect('secured/Mainstudentc', 'refresh');
                        } else {
                            redirect('secured/SecuredPayment', 'refresh');
                        }
                    }else{
                       $_SESSION['StatChange'] = 'T';
                       $_SESSION['text'] = "";
                       redirect('secured/Mainstudentc', 'refresh');
                    }
                } else {
                    $_SESSION['StatChange'] = 'T';
                    $_SESSION['text'] = "";
                    redirect('secured/Mainstudentc', 'refresh');
                }
            } else {

                $_SESSION['message'] = 'Invalid credentials supplied';
                //echo "Got here++++++";
                $this->session->mark_as_flash('message');
                echo view('template/header');
                echo view('template/header_menu');
                echo view('secured/studentlogin');
                $this->form_validation->set_message('rule', 'Error Message');
                echo view('template/footer_other');
                //$this->form_validation->set_message('rule', 'Error Message');
                //return FALSE;
            }
        }
    }

    public function regno_check() {
        $this->RegNumb = $this->input->post('RegNumb');
        $query = $this->db->get_where('students', array('regno' => $this->RegNumb));
        if ($query->num_rows() > 0) {
            $_SESSION['RegNumb'] = $this->input->post('RegNumb');
            return TRUE;
        } else {
            $this->form_validation->set_message('regno_check', 'Invalid credentials submitted access DENIEDR!!!');
            return FALSE;
        }
    }

    public function password_check() {
        $this->password = $this->input->post('password');
        $query2 = $this->db->get_where('students', array('password' => $this->password));
        if ($query2->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('password_check', 'Invalid credentials submitted access DENIEDP!!!');
            return FALSE;
        }
    }
}
