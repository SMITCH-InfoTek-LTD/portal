<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('Welcome', 'refresh');
}
?>
<title>My hostel receipts</title>
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
            <div class="row pad-top-botm ">
         <div class="col-lg-12 col-md-12 col-sm-12 " align="center">
            <img src="<?php echo base_url(); ?>assets/images/logo.jpg" style="width:70px; height:70px" /><br/> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6" align="center">
              <strong>UNIVERSITY OF ABUJA</strong>
              <br/>
              <i>Main Campus, Airport Road,</i>
              <br />
              <i>FCT - Abuja,</i> 
              <i>Nigeria.</i><br/>
              Email: dean.studentaffairs@uniabuja.edu.ng
              <br/>Office Of the Dean Student Affairs
         </div>
     </div>
                <table border="0" width="500px" class="table table-sm table-hover table-striped table-responsive">
                    <tr>
                        <td align="center" colspan="2">
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
                	<td align="right" colspan="4" ><b><?php echo date($datestring, $time); ?></b></td>
                </tr>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                 <tr>
                        <td align="left" colspan="2"><?php echo $_SESSION["lname"].'   '.$_SESSION["mname"].'  '.$_SESSION["sname"]; ?></td>
                        <td align="left" colspan="2"><?php echo $_SESSION["RegNumb"] ?></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="control-label">Contact Address</label></td>
                        <td align="left"><?php echo $_SESSION["ContactAddress"]; ?></td>
                        <td align="left"><label class="control-label">Email</label></td>
                        <td align="left"><?php echo $_SESSION["email"]; ?></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="control-label">State</label></td>
                        <td align="left"><?php echo $_SESSION["StateOfOrigin"];?></td>
                        <td align="left"><label class="control-label">LGA</label></td>
                        <td align="left"><?php echo  $_SESSION["LGA"];?></td>
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
                    <tr><th colspan="4"><p align="center"><font color="#000"><b>My Other Details</b></font></p></th></tr>
                    <tr><th align="left"><b>Phoneno</b></th><th align="left"><b>Marital Status</b></th>
                        <th align="left"><b>Religion</b></th><th align="left">Date of Birth</th></tr>
                    <?php
                    if (isset($_SESSION["phone"])): ?>
                    <tbody>
                            <tr><td align='left'><?= $_SESSION['phone'] ?></td>
                                <td align='left'><?= $_SESSION['mstatus'] ?></td>
                                <td align='left'><?= $_SESSION['religion'] ?></td>
                                <td align = 'left'><?= $_SESSION['dob'] ?></td></tr>
                            </tbody>
                    <?php else: ?>
                        <tr><td align="left" colspan="4">No other details updated</td></tr>
                        </tbody>
                        <tbody>
                        <?php endif; ?>
                        <tr><th colspan="7"><p align="center"><font color="#000"><b>Next Of Kin Information</b></font></p></th></tr>
                    <tr><th align="left"><b>Name</b></th><th align="left"><b>Phone</b></th>
                        <th align="left"><b>Relationship</b></th><th align="left">Address</th></tr>
                    <?php
                    if (isset($_SESSION["NOKEmail"])): ?>
                        <tbody>
                            <tr><td align='left'><?= $_SESSION["NOKName"] ?></td>
                                <td align='left'><?= $_SESSION['NOKPhone'] ?></td>
                                <td align='left'><?= $_SESSION['relationship'] ?></td>
                                <td align = 'left'><?= $_SESSION['NOKAddress'] ?></td></tr>
                        </tbody>
                    <?php else: ?>
                        <tr><td align="left" colspan="4">No hostel payment details</td></tr>
                        </tbody>
                        <tbody>
                        <?php endif; ?>
                        <tr></tr>
                    </tbody>
                </table>
                <!-- / content body -->
            </div>
        </div>
    </div>