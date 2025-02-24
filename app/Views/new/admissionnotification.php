<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('/Newstudentc', 'refresh');
}
?>
<body>
    <div class="container-fluid text-center">
        <div class="row content">

            <!-- main content -->
            <div class="col-sm-8">
                <h2></h2>
                <div class="row">
                    <div>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <p style="text-align:center; font-weight:bold; padding-top:2mm;">
                                    <img src="<?php echo base_url(); ?>assets/images/logo.png" style="width:150px; height:150px" /><br/>
                                    University of Abuja - Provisional Admission letter
                                </p>

                            </div>
                            <div class="panel-body">
                                <p style="text-align:right; font-weight:bold; padding-top:5mm;">
                                    <b>Date : 
                                        <?php
                                        $datestring = "%Y-%m-%d %h:%i %a";
                                        $time = time();
                                        echo mdate($datestring, $time);
                                        ?></b>
                                </p>
                                <p style="text-align:left; font-weight:bold; padding-top:5mm;">
                                    <b>Your Ref :</b> <?php echo $_SESSION['CandName'] . '   ' . $_SESSION['RegNumb'] ?>
                                </p>
                                <p style="text-align:left; font-weight:bold; padding-top:5mm;">Dear , <?php echo $_SESSION['CandName'] ?></p>
                                <br/>
                                <p style="text-align:center; font-weight:bold; padding-top:5mm;"><b>PROVISIONAL ADMISSION INTO DEGREE PROGRAMME: 2015/2016 ACADEMIC SESSION</b></p>
                                <br/>
                                <p style="text-align:left;">
                                    I am pleased to inform you that you have been offered a provisional admission as follows : <br/><br/>
                                    <b>
                                        Programme  : <?php echo $_SESSION['Course']; ?><br/>
                                        Department : <?php echo $_SESSION['Dept']; ?><br/>
                                        Faculty    : <?php echo $_SESSION['Faculty']; ?><br/>
                                        Duration   : <?php echo $_SESSION['Duration']; ?><br/>
                                    </b>.
                                    
                            </div>
                        </div>
                        <p>
                            <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/PrintAdmission">
                            <button type="submit" class="btn btn-success btn-lg">
                                <img src="<?php echo base_url(); ?>assets/images/b_pdfdoc.png" width="25" height="25" />
                            </button><b>Print letter</b>
                            </a>
                            <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/secured/Logoutc">
                            <button type="submit" class="btn btn-success btn-lg">
                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="25" height="25" />
                            </button><b>Exit</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
