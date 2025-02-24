<?php


class Printslip extends BaseController {

//construct
    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->model('Staff_m');
        $this->load->helper('date');
        $this->load->library('pdf'); // Load library
        $this->pdf->fontpath = 'font/'; // Specify font folder
        
    }

    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES . 'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
       // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');        
    }

    public function tcpdf() {
        // set document information
        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor('University of Abuja');
        $this->pdf->SetTitle('Staff Profile');
        $this->pdf->SetSubject('Registration Slip');
        $this->pdf->SetKeywords('Education','University','UniAbuja','Registration');
        global $l;
        

// set default header data
        $this->pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
        $this->pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
        $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
        $this->pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $this->pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $this->pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
        $this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
        $this->pdf->setLanguageArray($l);
// ---------------------------------------------------------
// set font
        $this->pdf->SetFont('times', 'BI', 12);

// add a page
        $this->pdf->AddPage();

// set some text to print
        // define some HTML content with style
// -----------------------------------------------------------------------------
$this->db->select('staffID, surname, dob');
$query = $this->db->get('staff');
foreach ($query->result() as $row){
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0">
    <tr>
        <td>Name of Citizen</td>
        <td>$row->staffID</td>
        <td>E</td>
    </tr>
    <tr>
        <td>Residential Address</td>
        <td>$row->surname</td>
    </tr>
    <tr>
       <td>DOB</td>
       <td>$row->dob</td>
    </tr>
    <tr>
    <td>Security no</td>
    </tr>
  
</table>

EOD;
}
//$this->pdf->lastPage();
// output the HTML content
$this->pdf->writeHTML($tbl, true, false, true, false, '');
// print a block of text using Write()
        //$this->pdf->Write($h = 0, $txt, $link = '', $fill = 0, $align = 'C', $ln = true, $stretch = 0, $firstline = false, $firstblock = false, $maxh = 0);

// ---------------------------------------------------------
//Close and output PDF document
        $this->pdf->Output($row->staffID.'.pdf', 'I');
    }

// Instanciation of inherited class
    public function index() {
        $this->tcpdf();
    }

}

?>