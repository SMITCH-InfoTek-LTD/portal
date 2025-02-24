<?php



/**
 * Description of Preadmissionlogin
 *
 * @author osagiesammy
 */
class PrintPrev extends BaseController {

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ug/Student_m');
        $this->load->helper('html');
        $this->load->library('M_pdf');
        $this->load->helper('captcha');
        $this->load->model('admin/Captcha');
    }

    //put your code here
    public function index() {
        $sub_data['cap_img'] = $this->Captcha->make_captcha();
        $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
        $this->form_validation->set_rules('RegNumb', 'Jamb ID', 'trim|required|xss_clean|alpha_numeric');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/header_menu');
            $this->load->view('new/printprev', $sub_data);
            $this->form_validation->set_message('rule', 'Error Message');
            $this->load->view('template/footer_other');
        } else {
            $this->RegNumb = $this->input->post('RegNumb');
            $this->surname = $this->input->post('surname');
            $Sqlqry = "SELECT paymentItems.ItemCode,paymentTrans.Item_Code,admittedstudents.RegNumb,paymentTrans.status,paymentTrans.message,"
                    . "paymentTrans.RRR,paymentTrans.transID,paymentItems.ItemName,paymentTrans.status,paymentTrans.Student_type,"
                    . "paymentTrans.Amount,paymentTrans.transactiontime,paymentTrans.academic_session"
                    . " FROM paymentTrans,paymentItems,admittedstudents"
                    . " WHERE (paymentItems.ItemCode = paymentTrans.Item_Code) AND (admittedstudents.RegNumb = paymentTrans.RegNumb)"
                    . " AND((paymentTrans.status = '00') || (paymentTrans.status = '01'))AND((paymentItems.ItemCode = '1001'))"
                    . " AND (paymentTrans.RegNumb='" . $this->RegNumb . "')";
            $qry = $this->db->query($Sqlqry);
            if ($qry->num_rows() > 0) {
                $row1 = $qry->row_array();
                //var_dump($row1);die();
                $_SESSION['message'] = $row1['message'];
                $sql = "SELECT * FROM `admittedstudents` WHERE `RegNumb`='" . $this->RegNumb . "' AND `candname` LIKE '%" . $this->surname . "%'";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    $row = $query->row_array();//var_dump($row);die();
                    $_SESSION['RegNumb'] = $row['RegNumb'];
                    $_SESSION['CandName'] = $row['candname'];
                    $_SESSION['Course'] = $row['Course'];
                    $_SESSION['Faculty'] = $row['faculty'];
                    $_SESSION['Dept'] = $row['dept'];
                    $_SESSION['Duration'] = $row['duration'];
                    $_SESSION['RefNumb'] = $row['RefNumb'];
                     $_SESSION['ItemName'] = $row1['ItemName'];
                        $_SESSION['transID'] = $row1['transID'];
                        $_SESSION['RRR'] = $row1['RRR'];
                        $_SESSION['academic_session'] = $row1['academic_session'];
                        $_SESSION['transactiontime'] = $row1['transactiontime'];
                        $_SESSION['amount'] = $row1['Amount'];
                        $_SESSION['orderId'] = $row1['transID'];
                        $_SESSION['Student_type'] = $row1['Student_type'];
                    redirect('new/PrintAdmission', 'refresh');
                } else {
                    $_SESSION['RegNumb'] = $this->input->post('RegNumb');
                    redirect('new/TransError', 'refresh');
                }
            } elseif ($qry->num_rows() == 0) {
                $sql = "SELECT * FROM newStudentNotificationSocketworks WHERE"
                        . "(newStudentNotificationSocketworks.FORM_NUMBER='" . $this->RegNumb . "')";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    $sql = "SELECT * FROM `admittedstudents` WHERE `RegNumb`='" . $this->RegNumb . "' AND `candname` LIKE '%" . $this->surname . "%'";
                    $query = $this->db->query($sql);
                    if ($query->num_rows() > 0) {
                        $row = $query->row_array();
                        $_SESSION['RegNumb'] = $row['RegNumb'];
                        $_SESSION['CandName'] = $row['candname'];
                        $_SESSION['Course'] = $row['Course'];
                        $_SESSION['Faculty'] = $row['faculty'];
                        $_SESSION['Dept'] = $row['dept'];
                        $_SESSION['Duration'] = $row['duration'];
                        $_SESSION['RefNumb'] = $row['RefNumb'];
                        $_SESSION['ItemName'] = $row1['ItemName'];
                        $_SESSION['transID'] = $row1['transID'];
                        $_SESSION['RRR'] = $row1['RRR'];
                        $_SESSION['academic_session'] = $row1['academic_session'];
                        $_SESSION['transactiontime'] = $row1['transactiontime'];
                        $_SESSION['amount'] = $row1['Amount'];
                        $_SESSION['orderId'] = $row1['transID'];
                        $_SESSION['Student_type'] = $row1['Student_type'];
                        redirect('new/PrintAdmission', 'refresh');
                    } else {
                        $_SESSION['RegNumb'] = $this->input->post('RegNumb');
                        redirect('new/TransError', 'refresh');
                    }
                } else {
                    $_SESSION['RegNumb'] = $this->input->post('RegNumb');
                    redirect('new/TransError', 'refresh');
                }
            } else {
                $_SESSION['RegNumb'] = $this->input->post('RegNumb');
                redirect('new/PaymentFirst', 'refresh');
            }
        }
    }

    /*     * ****
      public function printpdf() {
      $this->form_validation->set_error_delimiters('<div class="errormessage">', '</div>');
      $this->form_validation->set_rules('RegNumb', 'Jamb ID', 'trim|required|xss_clean|alpha_numeric');
      $this->form_validation->set_rules('surname', 'Surname', 'trim|required|xss_clean');

      if ($this->form_validation->run() == FALSE) {
      $this->load->view('template/header');
      $this->load->view('template/header_menu');
      $this->load->view('new/printprev');
      $this->form_validation->set_message('rule', 'Error Message');
      $this->load->view('template/footer_other');
      } else {
      $this->RegNumb = $this->input->post('RegNumb');
      $this->surname = $this->input->post('surname');
      //$qry = "SELECT ItemCode.paymentItems,Item_Code.paymentTrans,RegNumb.paymentTrans";
      $sql = "SELECT * FROM `admittedstudents` WHERE `RegNumb`='" . $this->RegNumb . "' AND `candname` LIKE '%" . $this->surname . "%'";
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0) {
      $row = $query->row_array();
      $_SESSION['RegNumb'] = $row['RegNumb'];
      $_SESSION['CandName'] = $row['candname'];
      $_SESSION['Course'] = $row['Course'];
      $_SESSION['Faculty'] = $row['faculty'];
      $_SESSION['Dept'] = $row['dept'];
      $_SESSION['Duration'] = $row['duration'];
      $_SESSION['RefNumb'] = $row['RefNumb'];
      //redirect('new/AdminCheckPay', 'refresh');
      redirect('new/PrintAdmission', 'refresh');
      } else {
      $_SESSION['RegNumb'] = $this->input->post('RegNumb');
      redirect('new/Erroradmission', 'refresh');
      }
      }
      }

      public function pdf() {
      // page info here, db calls, etc.

      $data = array('title' => 'Student Info Display'
      );
      $pdfFilePath = $this->session->userdata('RegNumb') . ".pdf";
      $pdf = $this->m_pdf->load();
      //$pdf->SetProtection(array('copy','print'), $this->session->userdata('RegNumb'),$this->session->userdata('RegNumb'));
      $html = $this->load->view('new/printadmission', $data, TRUE);
      //generate the PDF from the given html
      $pdf->WriteHTML($html);
      //download it.
      $pdf->WriteHTML($html);
      $pdf->WriteHTML($html);
      $this->session->sess_destroy();
      $pdf->Output($pdfFilePath, "I");
      }
     * ***** */

    public function refresh() {
        // Captcha configuration
        $vals = array(
            'word' => '',
            'img_path' => './assets/captcha/',
            'img_url' => base_url() . 'assets/captcha/',
            'font_path' => base_url() . 'assets/captcha/captcha.ttf',
            'img_width' => '200',
            'img_height' => '30',
            'expiration' => 3600,
            'word_length' => 8,
            'font_size' => 16,
            'img_id' => 'Imageid',
            'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            // White background and border, black text and red grid
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(192, 192, 192, 0.3)
        ));
        $cap = create_captcha($vals);

        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);

        // Display captcha image
        echo $cap['image'];
    }

    public function captcha_check() {
        // First, delete old captchas
        $expiration = time() - 3600; // One hour limit
        $this->db->where('captcha_time < ', $expiration)
                ->delete('captcha');
// Then see if a captcha exists:
        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        if ($row->count == 0) {
            $this->form_validation->set_message('captcha_check', 'You must submit the word that appears in the image');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
