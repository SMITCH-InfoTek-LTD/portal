<?php



/**
 * Description of Preadmissionlogin
 *
 * @author balarabehashim
 */
class RegnoEnter extends BaseController {

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
        $this->form_validation->set_rules('regno', 'Reg Number', 'trim|required|xss_clean|numeric|callback_regno_check');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('accadd/regnoenter');
            $this->form_validation->set_message('rule', 'Error Message');
            $this->load->view('template/footer_other');
        } else {
            $this->regno = $this->input->post('regno');
            $query = $this->db->get_where('paymentTrans', array('RegNumb' => $this->regno,'Amount'=>25000));
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                //var_dump($row);//exit;
                if (($row['status'] == '01') || ($row['status'] == '00')) {
                    //var_dump($row);//exit;
                    $_SESSION['RegNumb'] = $row['RegNumb'];
                    $_SESSION['RRR'] = $row['RRR'];
                    $_SESSION['Amount'] = $row['Amount'];
                    $_SESSION['OrderID'] = $row['OrderID'];
                    $_SESSION['message'] = $row['message'];
                    $_SESSION['transactiontime'] = $row['transactiontime'];
                    $_SESSION['academic_session'] = $row['academic_session'];
                    $_SESSION['status'] = $row['status'];
                    $query0 = $this->db->get_where('HostelNew', array('REGNO' => $row['RegNumb']));
                    if ($query0->num_rows() > 0) {
                         $row0 = $query0->row_array();//var_dump($row0);//exit;
                          $_SESSION['name'] = $row0['NAME'];
                          $_SESSION['sex']  =  $row0['SEX'];
                          $_SESSION['faculty']  = $row0['FACULTY'];
                          $_SESSION['dept']  = $row0['DEPARTMENT'];
                          $_SESSION['level']  = $row0['LEVEL'];
                         //var_dump($_SESSION);die();
                         redirect('accadd/SuccesspaymentHostel', 'refresh');
                    }else{               
                        $_SESSION['shout'] = "You name is not found !!! ....";
                        redirect('accadd/RegnoEnter', 'refresh');
                    }
                } else {
                     $_SESSION['shout'] = "Your payment was not successful , please PAY NOW!!! ....";
                    redirect('accadd/RegnoEnter', 'refresh');
                    //redirect('new/insterrorappc', 'refresh');
                }
            }else{
                $_SESSION['shout'] = "You have not paid for Hostel , please PAY NOW!!! ....";
                redirect('accadd/RegnoEnter', 'refresh');
            }
        }
    }
    
     public function regno_check() {
        $this->regno = $this->input->post('regno');
        $query = $this->db->get_where('paymentTrans', array('RegNumb' => $this->regno));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('regno_check', 'Invalid credentials submitted access DENIED!!!');
            return FALSE;
        }
    }

}
