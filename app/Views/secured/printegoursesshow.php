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
            <div class="col-sm-2">
                <p style="background-color: transparent">
                    <?php echo view('menu/studentmenuS'); ?>
                </p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <legend>
                    Welcome <span class="glyphicon glyphicon-user"></span>
                    <?php echo ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?>
                    <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")"; ?><br/>
                    <img src="<?php echo base_url(); ?>assets/images/b_edit.png" alt="login" width="20" height="20"/>
                    Print Course form<br/>
                    <?php echo "<font color='red'>" . validation_errors() . "</font>" ?>
                </legend>
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
        
                if (isset($_SESSION["cCode1"]) || isset($_SESSION["cCode2"])) {
                    $this->Semester1 = $_SESSION['Semester1'];
                    $this->Level1 = $_SESSION['Level1'];
                    $this->cCode1 = $_SESSION['cCode1'];
                    $this->cDesc1 = $_SESSION['cDesc1'];
                    $this->Semester2 = $_SESSION['Semester2'];
                    $this->Level2 = $_SESSION['Level2'];
                    $this->cCode2 = $_SESSION['cCode2'];
                    $this->cDesc2 = $_SESSION['cDesc2'];
                    $this->Units1 = $_SESSION['Units1'];
                    $this->Units2 = $_SESSION['Units2'];
                    $this->countSemester1 = count($this->Semester1);
                $this->countLevel1 = count($this->Level1);
                $this->countcCode1 = count($this->cCode1);
                $this->countcDesc1 = count($this->cDesc1);
                $this->countSemester2 = count($this->Semester2);
                $this->countLevel2 = count($this->Level2);
                $this->countcCode2 = count($this->cCode2);
                $this->countcDesc2 = count($this->cDesc2);
                } else {
                    //redirect("secured/Printregisteredcourses", "refresh");
                }
                ?>
                <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                    <tr>
                        <td align="left"><label class="control-label">Faculty</label></td>
                        <td align="left"><?php echo $this->session->userdata("FacAbrev"); ?></td>

                        <td align="left"><label class="control-label">Department</label></td>
                        <td align="left"><?php echo $this->session->userdata("CourseAbrev"); ?></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="control-label">Course of Study</label></td>
                        <td align="left"><?php echo( htmlspecialchars($this->session->userdata("degree"))) ?></td>
                        <td align="left"><label class="control-label">Level</label></td>
                        <td align="left"><?php echo( htmlspecialchars($this->session->userdata("level"))); ?></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="control-label">Session</label></td>
                        <td align="left"colspan="3"><?php echo $_SESSION['session']; ?></td>
                    </tr>
                    <tr><th colspan="7"><p align="center"><font color="#000"><b>First Semester</b></font></p></th></tr>
                    <tr><th align="left"><b>Course Code</b></th><th align="left"><b>Description</b></th>
                        <th align="left"><b>Units</b></th><th align="left">Semester</th></tr>
                    <?php
                    if (isset($this->Semester1)):
                        for ($values = 0; $values <= ($this->countcCode1 - 1); $values++):
                            ?>
                            <tr><td align='left'><?= $this->cCode1[$values] ?></td>
                                <td align='left'><?= $this->cDesc1[$values] ?></td>
                                <td align='left'><?= $this->Units1[$values] ?></td>
                                <td align = 'left'><?= $this->Semester1[$values] ?></td></tr>
                        <?php endfor; ?>
                        <tr><td align="right" colspan="2">Total Units</td><td align="left"><?= array_sum($this->Units1); ?></td></tr>
                        </tbody>
                    <?php else: ?>
                        <tr><td align="left" colspan="4">No registered courses</td></tr>
                        </tbody>
                        <tbody>
                        <?php endif; ?>
                    <tbody>
                        <tr><th colspan="7"><p align="center"><font color="#000"><b>Second Semester</b></font></p></th></tr>
                    <tr><th align="left"><b>Course Code</b></th><th align="left"><b>Description</b></th>
                        <th align="left"><b>Units</b></th><th align="left">Semester</th></tr>
                    <?php
                    if (isset($this->Semester2)):
                        for ($values = 0; $values <= ($this->countcCode2 - 1); $values++):
                            ?>
                            <tr><td align='left'><?= $this->cCode2[$values] ?></td>
                                <td align='left'><?= $this->cDesc2[$values] ?></td>
                                <td align='left'><?= $this->Units2[$values] ?></td>
                                <td align = 'left'><?= $this->Semester2[$values] ?></td></tr>
                        <?php endfor; ?>
                        <tr><td align="right" colspan="2">Total Units</td><td align="left"><?= array_sum($this->Units2); ?></td></tr>
                        </tbody>
                    <?php else: ?>
                        <tr><td align="left" colspan="4">No registered courses</td></tr>
                        </tbody>
                        <tbody>
                        <?php endif; ?>
                        <tr><td><?php echo anchor_popup('/secured/Printmycoursesregistered', 'Print course form', $atts); ?>
                            </td></tr>
                    </tbody>
                </table>
                <!-- / content body -->
            </div>
            <div class="col-sm-2 sidenav">
                <?php echo view('template/menu/sidenav'); ?>
            </div>
        </div>
    </div>