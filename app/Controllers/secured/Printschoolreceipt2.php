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
class Printschoolreceipt2 extends BaseController {

    public function index() {
        $this->load->library('M_pdf');
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->helper('html');
        $this->load->library('table');
        $this->pdf();
    }

    public function pdf() {
        // page info here, db calls, etc.    
        $data = array('title' => 'Print Student Info Display');
        $pdfFilePath = $_SESSION['RegNumb'] . ".pdf";
        $pdf = $this->m_pdf->load();
        $pdf->SetHeader('Office of the Busar|Receipt of Payment|{PAGENO}');
        $pdf->SetFooter('Receipt of payment|https://www.portal.uniabuja.edu.ng');
        $pdf->defaultheaderfontsize = 10;
        $pdf->defaultheaderfontstyle = 'B';
        $pdf->defaultheaderline = 0;
        $pdf->defaultfooterfontsize = 8;
        $pdf->defaultfooterfontstyle = 'BI';
        $pdf->defaultfooterline = 0;
        $pdf->watermarkImageAlpha = 0.2;
        $pdf->SetWatermarkImage(base_url() . 'assets/images/logo.jpg');
        $pdf->showWatermarkImage = true;
        $html = echo view('secured/printschoolreceipttmpl2', $data, TRUE);
        //generate the PDF from the given html
        $this->stylesheet = file_get_contents(base_url() . 'assets/bootstrap/css/bootstrap.min.css');
        $this->stylesheet .= file_get_contents(base_url() . 'assets/css/layout.css');
        $pdf->WriteHTML($this->stylesheet, 1);
        $pdf->WriteHTML($html);
        //import from the pdf
        $pdf->Output($pdfFilePath, "I");
    }
}