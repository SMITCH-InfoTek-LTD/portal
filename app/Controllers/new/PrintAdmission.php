<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrintMyDetailspdfc
 *
 * @author osagiesammy
 */
class Printadmission extends BaseController {
    
    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->helper('html');
        $this->load->library('table');
        $this->load->library('M_pdf');
    }

    public function index() {
        $data = array('title' => 'Student Info Display'
        );
        $pdfFilePath = $this->session->userdata('RegNumb') . ".pdf";
        $pdf = $this->m_pdf->load();
        $pdf->SetHeader('Office of the Registrar|Provisional Admission letter|{PAGENO}');
        $pdf->SetFooter('Provisional Admission letter');
        $pdf->defaultheaderfontsize = 10;
        $pdf->defaultheaderfontstyle = 'B';
        $pdf->defaultheaderline = 0;
        $pdf->defaultfooterfontsize = 8;
        $pdf->defaultfooterfontstyle = 'BI';
        $pdf->defaultfooterline = 0;
        //$pdf->SetProtection(array('copy','print'), $this->session->userdata('RegNumb'),$this->session->userdata('RegNumb'));
        $pdf->watermarkImageAlpha = 0.2;
        $pdf->SetWatermarkImage(base_url() . 'assets/images/logo.jpg');
        $pdf->showWatermarkImage = true;
        $html = $this->load->view('new/printadmission', $data, TRUE);

        //generate the PDF from the given html
        $this->stylesheet = file_get_contents(base_url() . 'assets/bootstrap/css/bootstrap.min.css');
        $pdf->WriteHTML($this->stylesheet, 1);
        $pdf->WriteHTML($html);

        $html2 = $this->load->view('new/academicplanning', $data, TRUE);
        $pdf->SetHeader('Director Academic Planning|SCREENING CERTIFICATE|{PAGENO}');
        $pdf->SetFooter('Office of Director Academic Planning');
        $pdf->defaultheaderfontsize = 10;
        $pdf->defaultheaderfontstyle = 'B';
        $pdf->defaultheaderline = 0;
        $pdf->defaultfooterfontsize = 8;
        $pdf->defaultfooterfontstyle = 'BI';
        $pdf->defaultfooterline = 0;
        //$pdf->AddPage();
        $pdf->WriteHTML($html2);

        $html3 = $this->load->view('new/academicplanning2', $data, TRUE);
        $pdf->SetHeader('Director Academic Planning|SCREENING CERTIFICATE|{PAGENO}');
        $pdf->SetFooter('Office of Director Academic Planning');
        $pdf->defaultheaderfontsize = 10;
        $pdf->defaultheaderfontstyle = 'B';
        $pdf->defaultheaderline = 0;
        $pdf->defaultfooterfontsize = 8;
        $pdf->defaultfooterfontstyle = 'BI';
        $pdf->defaultfooterline = 0;
        $pdf->AddPage();
        $this->stylesheet = file_get_contents(base_url() . 'assets/bootstrap/css/bootstrap.min.css');
        $pdf->WriteHTML($this->stylesheet, 1);
        $pdf->WriteHTML($html3);
        //import from the pdf
        /***/
        $html4 = $this->load->view('new/printnotificationreceipt', $data, TRUE);
        $pdf->SetHeader('<div style="font-family: serif;">Office of the Bursar|Notification receipt|{PAGENO}</div>');
        $pdf->SetFooter('Office of the Bursar');
        $pdf->defaultheaderfontsize = 10;
        $pdf->defaultheaderfontstyle = 'B';
        $pdf->defaultheaderline = 0;
        $pdf->defaultfooterfontsize = 8;
        $pdf->defaultfooterfontstyle = 'BI';
        $pdf->defaultfooterline = 0;
        $pdf->AddPage();
        $this->stylesheet = file_get_contents(base_url() . 'assets/bootstrap/css/bootstrap.min.css');
        $pdf->WriteHTML($this->stylesheet, 1);
        $pdf->WriteHTML($html4);
        /** 
         
        $html5 = $this->load->view('new/printchangeofinstitution', $data, TRUE);
        $pdf->SetHeader('<div style="font-family: serif;">Office of the Bursar|Change of Institution receipt|{PAGENO}</div>');
        $pdf->SetFooter('Office of the Bursar');
        $pdf->defaultheaderfontsize = 10;
        $pdf->defaultheaderfontstyle = 'B';
        $pdf->defaultheaderline = 0;
        $pdf->defaultfooterfontsize = 8;
        $pdf->defaultfooterfontstyle = 'BI';
        $pdf->defaultfooterline = 0;
        $pdf->AddPage();
        $this->stylesheet = file_get_contents(base_url() . 'assets/bootstrap/css/bootstrap.min.css');
        $pdf->WriteHTML($this->stylesheet, 1);
        $pdf->WriteHTML($html5);
       ** 
         */
        //import from the pdf
        $pdf->Output($pdfFilePath, "I");
        
    }
}