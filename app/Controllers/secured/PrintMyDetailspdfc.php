<?php
namespace App\Controllers;



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
class PrintMyDetailspdfc extends BaseController {

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
        $pdf->SetHeader('Office of the Dean Student Affairs|Student Bio data|{PAGENO}');
        $pdf->SetFooter('Dean Student Affairs');
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
        $html = echo view('secured/printMyDetailsPDF', $data, TRUE);

        //generate the PDF from the given html
        $this->stylesheet = file_get_contents(base_url() . 'assets/bootstrap/css/bootstrap.min.css');
        $pdf->WriteHTML($this->stylesheet, 1);
        $pdf->WriteHTML($html);

        //import from the pdf
        $pdf->Output($pdfFilePath, "I");
        
    }

}
