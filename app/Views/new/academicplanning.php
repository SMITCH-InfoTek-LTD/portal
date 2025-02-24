<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('/Newstudentc', 'refresh');
}
?>

<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <!-- main content -->
            <div style="text-align:center; font-weight:bold">
                <img src="<?php echo base_url(); ?>assets/images/logo.jpg" style="width:70px; height:70px;" />
                <h3 align="center">UNIVERSITY OF ABUJA</h3>
                <h4 align="center">ACADEMIC PLANNING UNIT</h4>
            </div>
            <div class="panel-body">
                <p style="text-align:right; padding-top:5mm;text-decoration: underline;">
                    Form 01
                </p>
                <div style="padding-top:5mm;">

                    SN ................................. COLLEGE/FACULTY<b> <?php echo $_SESSION['Faculty'];?></b> 
                    <br/><br/>
                    <b><em>SCREENING CERTIFICATE</em></b><br/>
                    (To be completed at the College/Faculty/Department)
                    <br/><br/>
                </div>
                <div style="text-align: justify">
                    This is to certify that  <b> <?php echo $_SESSION['CandName'];?></b><br/>

                    Who has been admitted to read <b> <?php echo $_SESSION['Course'];?></b> in the <br/>

                    <b> <?php echo $_SESSION['Faculty'];?></b> has been screened.<br/>
                    <ol>
                        <li>He/She is qualified for the Course into which admitted and is therefore issued with this<br/>

                            Matriculation number ............................................. Accordingly, he/she is recommended to <br/>

                            Academic Planning Unit for approval.</li>

                        <li>He/She is not qualified due to the following deficiency .......................................

                            .................................................................................. Accordingly, he/she is

                            recommended to the Academic Planning Unit for Change of Admission (if there is vacancy) into:

                            ........................... .......................................................................................
                        </li>
                    </ol>
                    <div class="row">
                   
                        <div class="col-sm-4 text-center">
                         <p style="text-align:center;">
                            <br/>
                                _________________________________<br/>
                                Name of College/Faculty Screening
                         </p>
                        </div>
                        <div class="col-sm-4 text-center">
                         <p style="text-align:center;">
                            <br/>
                                ________________________<br/>
                                Officer Stamp & Signature
                         </p>
                        </div>
                        <div class="col-sm-4 text-center">
                         <p style="text-align:center;">
                            <br/>
                            ________________________<br/>
                                    Date
                          </p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>