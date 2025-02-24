<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('Welcome', 'refresh');
}
?>
<title>My registered courses</title>
<style>
    input.form-control,select.form-control,textarea.form-control {
        width: auto;
    }
    <!--
    /* style the auto-complete response */
    li.ui-menu-item { font-size:12px !important; }
    -->
    .ui-autocomplete-loading {
        background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
    }
    *{
        margin:0;
        padding:0;
        font-family:Arial;
        font-size:12pt;
        color:#000;
    }
    body
    {
        width:100%;
        font-family:Arial;
        font-size:8pt;
        margin:0;
        padding:0;
    }

    p
    {
        margin:0;
        padding:0;
    }

    #wrapper
    {
        width:180mm;
        margin:0 15mm;
    }

    .page
    {
        height:297mm;
        width:210mm;
        page-break-after:always;
    }

    table
    {
        border-left: 1px solid #ccc;
        border-top: 1px solid #ccc;

        border-spacing:0;
        border-collapse: collapse; 

    }

    table td 
    {
        border-right: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        padding: 2mm;
    }

    table.heading
    {
        height:50mm;
    }

    h1.heading
    {
        font-size:14pt;
        color:#000;
        font-weight:normal;
    }

    h2.heading
    {
        font-size:9pt;
        color:#000;
        font-weight:normal;
    }

    hr
    {
        color:#ccc;
        background:#ccc;
    }

    #invoice_body
    {
        height: 149mm;
    }

    #invoice_body , #invoice_total
    {   
        width:100%;
    }
    #invoice_body table , #invoice_total table
    {
        width:100%;
        border-left: 1px solid #ccc;
        border-top: 1px solid #ccc;

        border-spacing:0;
        border-collapse: collapse; 

        margin-top:5mm;
    }

    #invoice_body table td , #invoice_total table td
    {
        text-align:center;
        font-size:9pt;
        border-right: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        padding:2mm 0;
    }

    #invoice_body table td.mono  , #invoice_total table td.mono
    {
        font-family:monospace;
        text-align:right;
        padding-right:3mm;
        font-size:10pt;
    }
    #watermark { position: fixed; bottom: 0px; right: 0px; width: 180px; height: 180px; opacity: .1; }

    #footer
    {   
        width:180mm;
        margin:0 15mm;
        padding-bottom:3mm;
    }
    #footer table
    {
        width:100%;
        border-left: 1px solid #ccc;
        border-top: 1px solid #ccc;

        background:#eee;

        border-spacing:0;
        border-collapse: collapse; 
    }
    #footer table td
    {
        width:25%;
        text-align:center;
        font-size:9pt;
        border-right: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
    }
</style>
<body style="color:black;">
    <!-- content -->
    <div class="container-fluid text-center">
        <div class="row content">
            <!-- main content -->
            <div class="col-sm-12 text-center">
                <table border="0" width="500px" class="table table-sm table-hover table-striped table-responsive">
                    <tr>
                        <td align="center" colspan="2">
                            <img src="<?php echo base_url(); ?>assets/images/logo.jpg" style="width:50px; height:50px" />
                            <br/><br/><br/>
                            <h3><?php echo ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?><br/>
                                <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")"; ?></h3>
                        </td>
                        <td colspan="2">
                            <?php
                            $image_properties = array(
                                'src' => 'assets/uploads/student/' . $_SESSION['passport'],
                                'alt' => ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']),
                                'class' => 'img-responsive img-rounded',
                                'width' => '100',
                                'height' => '100',
                                'title' => ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']),
                                'rel' => 'lightbox',
                            );
                            echo "<td rowspan='3'>" . img($image_properties) . "</td>";
                            ?>
                        </td>
                    </tr>
                </table>
                <?php
                $datestring = "Y-m-d h:i a";
                $time = time();
                ?>
                <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                    <tr>
                        <td align="left" colspan="2"><?php echo $this->session->userdata("FacAbrev"); ?></td>
                        <td align="left" colspan="2"><?php echo $this->session->userdata("CourseAbrev"); ?></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="control-label">Course of Study</label></td>
                        <td align="left"><?php echo( htmlspecialchars($this->session->userdata("degree"))) ?></td>
                        <td align="left"><label class="control-label">Level</label></td>
                        <td align="left"><?php echo( htmlspecialchars($this->session->userdata("level"))); ?></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="control-label">Session</label></td>
                        <td align="left"><?php echo ACADEMIC_SESSION; ?></td>
                        <td align="left"><label class="control-label">Date of print</label></td>
                        <td align="left" colspan="3"><b><?php echo date($datestring, $time); ?></b></td>
                    </tr>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                    <tbody>
                    <tr><th colspan="7"><p align="center"><font color="#000"><b>Hostel Booking Details</b></font></p></th></tr>
                    <tr><th align="left"><b>Hostel name</b></th><th align="left"><b>Date booked</b></th>
                        <th align="left"><b>Bedspace</b></th><th align="left">Book status</th></tr>
                    <?php if (isset($_SESSION['hostelname'])): ?>
                        <tbody>
                            <tr><td align='left'><?= $_SESSION['hostelname'] ?></td>
                                <td align='left'><?= $_SESSION['bkdate'] ?></td>
                                <td align='left'><?= $_SESSION['bedspace'] ?></td>
                                <td align = 'left'><?= $_SESSION['bookstatus'] ?></td></tr>
                        </tbody>
                    <?php else: ?>
                        <tr><td align="left" colspan="4">No hostel booked</td></tr>
                        </tbody>
                        <tbody>
                        <?php endif; ?>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                    <tbody>
                        <tr><th colspan="7"><p align="center"><font color="#000"><b>Payment Details</b></font></p></th></tr>
                    <tr><th align="left"><b>Receiptno</b></th><th align="left"><b>Date of payment</b></th>
                        <th align="left"><b>RRR</b></th><th align="left">Amount</th></tr>
                    <?php
                    if (isset($_SESSION['receiptno'])): ?>
                        <tbody>
                            <tr><td align='left'><?= $_SESSION['receiptno'] ?></td>
                                <td align='left'><?= $_SESSION['paymentDate'] ?></td>
                                <td align='left'><?= $_SESSION['RRR'] ?></td>
                                <td align = 'left'><?= $_SESSION['amount'] ?></td></tr>
                        </tbody>
                    <?php else: ?>
                        <tr><td align="left" colspan="4">No hostel payment details</td></tr>
                        </tbody>
                        <tbody>
                        <?php endif; ?>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                    <tr>
                        <td>Dean student affairs :</td><td></td><td>Hall warden</td><td></td>
                    </tr>
                </table>
<table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                    <tr>
                        <td>
                            <hr />
              <div class="ttl sign" align="left">
                  <img src="<?php echo base_url(); ?>assets/images/bursar1.jpg" style="width:200px; height:100px" />
             </div>
                        </td>
                    </tr>
                </table>
<div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
             <ol>
                 <li><b style="font-family: cursive;color: red;">Do NOT alter this receipt, ANY ALTERATION RENDERS IT INVALID</b></li>
                 <li><b style="font-family: cursive;color: green;">Please make sure you print your receipt and keep it safe!!!</b></li>
             </ol>
             </div>
         </div>
                <!-- / content body -->
            </div>
        </div>
    </div>
    