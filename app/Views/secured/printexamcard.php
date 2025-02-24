<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('/secured/Studentloginc', 'refresh');
}
?>
<title>My Exam card</title>
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
            <div class="col-sm-2">
                <p style="background-color: transparent">
                    <?php echo view('menu/studentmenuS'); ?>
                </p>
            </div>
            <!-- main content -->
            <div class="col-sm-10 text-center">
                <legend>
                   <?php
                $atts = array(
                    'width' => 900,
                    'height' => 700,
                    'scrollbars' => 'yes',
                    'status' => 'yes',
                    'resizable' => 'yes',
                    'screenx' => 0,
                    'screeny' => 0,
                    'class' => 'btn btn-success',
                    'role' => 'button',
                    'window_name' => '_blank'
                );
        $image_properties = array(
            'src' => 'assets/uploads/student/' . $_SESSION['passport'],
            'alt' => ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']),
            'class' => 'img-responsive img-rounded',
            'width' => '50',
            'height' => '50',
            'title' => ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']),
            'rel' => 'lightbox',
        );
        echo img($image_properties);
        ?>
                   
                    <span class="glyphicon glyphicon-education"></span>
                    Print Exam Card<br/>
                    <?php echo "<font color='red'>" . validation_errors() . "</font>" ?>
                </legend>
                <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                 <tr>
                        <td align="left" colspan="2"><?php echo $_SESSION["lname"].'   '.$_SESSION["mname"].'  '.$_SESSION["sname"]; ?></td>
                        <td align="left" colspan="2"><?php echo $_SESSION["RegNumb"] ?></td>
                    </tr>
             <tr><th colspan="7"><p align="center"><font color="#000"><b>Faculty / Course Details</b></font></p></th></tr>
                    <tr>
                        <td align="left" colspan=""><?php echo $this->session->userdata("FacAbrev"); ?></td>
                        <td align="left" colspan="3"><?php echo $this->session->userdata("CourseAbrev"); ?></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="control-label">Course of Study</label></td>
                        <td align="left"><?php echo( htmlspecialchars($this->session->userdata("degree"))) ?></td>
                        <td align="left"><label class="control-label">Level</label></td>
                        <td align="left"><?php echo( htmlspecialchars($this->session->userdata("level"))); ?></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="control-label">Session</label></td>
                        <td align="left"colspan="3"><?php echo ACADEMIC_SESSION; ?></td>
                    </tr>
                    <tr><th colspan="5"><p align="center"><font color="#000"><b>My Fees Details</b></font></p></th></tr>
                    <tr><th align="left"><b>Matno</b></th><th align="left"><b>Item Description</b></th>
                        <th align="left"><b>Amount</b></th><th align="left"><b>Payment Date</b></th><th align="left">Session</th></tr>
                    <?php
                     $sql1 = "SELECT paymentTrans.RegNumb,paymentItems.ItemName,paymentTrans.Amount,paymentTrans.OrderID,paymentTrans.RRR,"
                    . "paymentTrans.transID,paymentTrans.transactiontime,paymentTrans.academic_session,paymentTrans.message,paymentTrans.Item_Code"
                    . " FROM paymentTrans,paymentItems WHERE((paymentTrans.status = '01')||(paymentTrans.status = '00'))"
                    . "AND(paymentTrans.academic_session='" . ACADEMIC_SESSION . "')AND((paymentTrans.Item_Code = '2001')||(paymentTrans.Item_Code = '2002')||(paymentTrans.Item_Code = '2003')||(paymentTrans.Item_Code = '6001')||(paymentTrans.Item_Code = '6002')||(paymentTrans.Item_Code = '6003')||(paymentTrans.Item_Code = '6004'))AND((paymentTrans.Item_Code)=(paymentItems.ItemCode))"
                    . "AND paymentTrans.RegNumb = " . $_SESSION['RegNumb'];
            $query = $this->db->query($sql1);
            $mitch = $query->row_array();
            //var_dump($row);
                    if (isset($mitch)): 
                     foreach ($query->result() as $row): ?>
                    <tbody>
                            <tr><td align='left'><?= $row->RegNumb ?></td>
                                <td align='left'><?= $row->ItemName ?></td>
                                <td align='left'><?= $row->Amount ?></td>
                                <td align='left'><?= $row->transactiontime ?></td>
                                <td align = 'left'><?= $row->academic_session ?></td></tr>
                            </tbody>
                   <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td align="left" colspan="4">No Fees details updated</td></tr>
                        </tbody>
                        <tbody>
                        <?php endif; ?>
                        </tbody>
                </table>
                <div>
                 <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive" style="float: left;">
                        <tr><th colspan="7"><p align="center"><font color="#000"><b>Courses registered Information(First Semester)</b></font></p></th></tr>
                    <tr><th align="left"><b>Description</b></th><th align="left"><b>Code</b></th>
                        <th align="left"><b>Units</b></th><th align="left">Semester</th><th align="left">Session</th></tr>
                    <?php
                    $semester = "FIRST SEMESTER";
                     $sql2 = "SELECT coursesregistered.Regno,coursesregistered.Degree,coursesregistered.Semester,coursesregistered.Level,"
                    . "coursesregistered.cCode,coursesregistered.cDesc,coursesregistered.Units,coursesregistered.cType,coursesregistered.csession"
                    . " FROM coursesregistered WHERE(coursesregistered.csession='" . ACADEMIC_SESSION . "')AND(coursesregistered.Level='" . $_SESSION['level'] . "')"
                    . "AND(coursesregistered.Semester='".$semester."')"
                    . "AND coursesregistered.Regno = " . $_SESSION['RegNumb'];
            $query2 = $this->db->query($sql2);
            $vin = $query2->row_array();
                    if (isset($vin)): 
                    foreach ($query2->result() as $row): ?>
                        <tbody>
                            <tr>
                                <td align='left'><?= $row->cDesc ?></td>
                                <td align='left'><?= $row->cCode ?></td>
                                <td align = 'left'><?= $row->Units ?></td>
                                <td align='left'><?= $row->Semester ?></td>
                                <td align='left'><?= $row->csession ?></td>
                                </tr>
                        </tbody>
                     <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td align="left" colspan="4">No registered courses for First Semester</td></tr>
                        </tbody>
                        <tbody>
                        <?php endif; ?>
                        <tr><td><?php echo anchor_popup('/secured/PrintMyExamCard', 'Print exam card', $atts); ?></td></tr>
                    </tbody>
                </table>
                </div>
                <!-----------------------
                <div><table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive" style="float: left;">
                        <tr><th colspan="7"><p align="center"><font color="#000"><b>Courses registered Informationn(Second Semester)</b></font></p></th></tr>
                    <tr><th align="left"><b>Description</b></th><th align="left"><b>Code</b></th>
                        <th align="left"><b>Units</b></th><th align="left">Semester</th><th align="left">Session</th></tr>
                        ------->
                    <?php
                    /****
                     $semester = "SECOND SEMESTER";
                     $sql2 = "SELECT coursesregistered.Regno,coursesregistered.Degree,coursesregistered.Semester,coursesregistered.Level,"
                    . "coursesregistered.cCode,coursesregistered.cDesc,coursesregistered.Units,coursesregistered.cType,coursesregistered.csession"
                    . " FROM coursesregistered WHERE(coursesregistered.csession='" . ACADEMIC_SESSION . "')AND(coursesregistered.Level='" . $_SESSION['level'] . "')"
                    . "AND(coursesregistered.Semester='".$semester."')"
                    . "AND coursesregistered.Regno = " . $_SESSION['RegNumb'];

            $query2 = $this->db->query($sql2);
            $vin = $query2->row_array();
            //var_dump($vin);//die();
                    if (isset($vin)): 
                    foreach ($query2->result() as $row): ?>
                        <tbody>
                            <tr>
                                <td align='left'><?= $row->cDesc ?></td>
                                <td align='left'><?= $row->cCode ?></td>
                                <td align = 'left'><?= $row->Units ?></td>
                                <td align='left'><?= $row->Semester ?></td>
                                <td align='left'><?= $row->csession ?></td>
                                </tr>
                        </tbody>
                     <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td align="left" colspan="4">No registered courses for Second Semester</td></tr>
                        </tbody>
                        <tbody>
                        <?php endif; *******/?>
                        
                    </tbody>
                </table>
                </div>
                           
            
        </div>
    </div>