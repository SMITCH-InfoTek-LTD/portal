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

    public function index() {
        $data = array('title' => 'Student Info Display'
        );
        $this->load->library('M_pdf');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->library('table');
        $this->load->model('secured/Olevels_m');
        $this->Olevels_m->viewOlevelSubjects();
        $this->pdf();
    }

    public function pdf() {
        // page info here, db calls, etc.    

        $data = array('title' => 'Student Info Display'
        );
        $pdfFilePath = $this->session->userdata('JambID') . ".pdf";
        $pdf = $this->m_pdf->load();
        $html = echo view('secured/printMyDetailsPDF', $data, TRUE);
        
        //generate the PDF from the given html
        $pdf->WriteHTML($html);
        //download it.
        $pdf->Output($pdfFilePath, "D");
    }

}
