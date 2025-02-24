<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('/Newstudentc', 'refresh');
}
?>

<body>
    <div class="container-fluid text-center table-responsive">
        <div class="row content">
            <!-- main content -->
            <div class="col-sm-12">
                <p style="text-align:center; font-weight:bold">
                <h2 align="center">UNIVERSITY OF ABUJA</h2>
                <h3 align="center">P.M.B 117</h3>
                <h3 align="center">ABUJA, NIGERIA</h3>
                <img src="<?php echo base_url(); ?>assets/images/logo.jpg" style="width:70px; height:70px;" />

                <h4 align="center">Office of the Registrar</h4>
<p>registrar@uniabuja.edu.ng</p>
            </p>
            </div>
        </div>
        <div class="row content">

            <p style="text-align:right; font-weight:bold; padding-top:5mm;">
                <b>Date : 
                    <?php
                    $datestring = "Y-m-d h:i a";
                    $time = time();
                    echo date($datestring, $time);
                    ?></b>
            </p>
            <p style="text-align:left; font-weight:bold; padding-top:2mm;">
                <b>
                    <?php echo $_SESSION['CandName'] ?></b><br/>
                <b>JAMB Regno :</b><?php echo $_SESSION['RegNumb']; ?>
            </p>
        </div>
        <div class="panel-body">
            <p style="text-align:center; font-weight:bold; padding-top:2mm;"><b>NOTIFICATION OF PROVISIONAL ADMISSION INTO FIRST DEGREE PROGRAMME: 2016/2017 ACADEMIC SESSION</b></p>
            <p style="text-align:left;">
                I am pleased to inform you that you have been offered provisional admission into the University of Abuja, 
                to pursue a first degree programme as follows : <br/><br/>
                <b>
                    Programme  : <?php echo $_SESSION['Course']; ?><br/>
                    Department : <?php echo $_SESSION['Dept']; ?><br/>
                    Faculty    : <?php echo $_SESSION['Faculty']; ?><br/>
                    Duration   : <?php echo $_SESSION['Duration']; ?>
                </b>
            </p>
            <p style="text-align:left;">
                The confirmation of this offer is subject to your obtaining the minimum entry qualifications for the course to which you have
                been offered admission, as well as fulfilling the conditions for registration.<br/>
                At the time of registration in the University, you will be required to present the originals of the certificate(s) or any other
                acceptable evidence of the qualifications on which this offer of admission has been granted.<br/>
                If it is discovered at any time that you do not possess any of the qualifications which you claim to have obtained, you will be
                required to withdraw from the University.<br/>
                Furthermore, failure to validate your offer of admission and register within the stipulated date automatically invalidates the
                offer.<br/>
                Information relating to the date of registration, schedule of fees, accommodation facilities, medical examination, etc can be
                accessed through the University Portal (https://portal.uniabuja.edu.ng )
            </p>
            <p style="text-align:left; font-weight:bold;">
                Accept our congratulations.<br/>
                <img src="<?php echo base_url(); ?>assets/images/registrar.jpg" style="width:100px; height:50px" /><br/>
                Rifkatu Hoshen Swanta(Mrs)<br/>
                Registrar<br/>
            </p>
        </div>
    </div>
    <?php //redirect('/Newstudentc','refresh');
    