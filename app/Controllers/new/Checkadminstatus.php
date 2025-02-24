<?php



/**
 * Description of Preadmissionlogin
 *
 * @author osagiesammy
 */
class Checkadminstatus extends BaseController {

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('new/Search');
        $this->load->helper('captcha');
        $this->load->database();
        $this->load->model('admin/Captcha');
    }

    //put your code here
    public function index() {
        $sub_data['cap_img'] = $this->Captcha->make_captcha();
        echo view('template/header');
        echo view('template/header_menu');
        echo view('new/checkadminstatus',$sub_data);
        $this->form_validation->set_message('rule', 'Error Message');
        echo view('template/footer_other');
    }

    public function adminCheck() {
        $sub_data['cap_img'] = $this->Captcha->make_captcha();
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('RegNumb', 'Jamb ID', 'trim|required|xss_clean|alpha_numeric');
        if ($this->form_validation->run() == FALSE) {
            echo view('template/header');
            echo view('template/header_menu');
            echo view('new/checkadminstatus',$sub_data);
            $this->form_validation->set_message('rule', 'Error Message');
            echo view('template/footer_other');
        } else {
            $this->RegNumb = $this->input->post('RegNumb');
            $query = $this->db->get_where('admittedstudents', array('RegNumb' => $this->RegNumb));
            $rowarray = $query->row_array();
            if ($query->num_rows() > 0) {
                $rowarray = $query->row_array();
                $_SESSION['RegNumb'] = $rowarray['RegNumb'];
                $_SESSION['CandName'] = $rowarray['candname'];
                $_SESSION['Course'] = $rowarray['Course'];
                $_SESSION['Faculty'] = $rowarray['faculty'];
                $_SESSION['Dept'] = $rowarray['dept'];
                $_SESSION['Duration'] = $rowarray['duration'];
                $_SESSION['level'] = $rowarray['level'];
                $_SESSION['Admode'] = $rowarray['admode'];
                redirect('new/Successadmission', 'refresh');
            } else {
                redirect('new/Erroradmission', 'refresh');
            }
        }
    }

}
