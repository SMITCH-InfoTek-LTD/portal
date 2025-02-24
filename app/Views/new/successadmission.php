<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('/Newstudentc', 'refresh');
}
?>

<body>
    <!-- main content -->
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-4 sidenav">
                <p><?php echo anchor('/Newstudentc', 'Back to Dashboard'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-5 text-center">
                        <div class="panel panel-success text-center">

            <p style="text-align:center; font-weight:bolder; padding-top:2mm;">
                <img src="<?php echo base_url(); ?>assets/images/logo.png" style="width:100px; height:100px" />
  <h2>Congratulations!!!</h2>

            </p>
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

                                <p style="text-align:left;">
                                    You have been offered a provisional admission as follows : <br/><br/>
                                    <b>
                                        Programme  : <?php echo $_SESSION['Course']; ?><br/>
                                        Department : <?php echo $_SESSION['Dept']; ?><br/>
                                        Faculty    : <?php echo $_SESSION['Faculty']; ?><br/>
                                        Duration   : <?php echo $_SESSION['Duration']; ?><br/>
                                    </b>.
</p>

                            </div>
                        <div>
                            <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/Newstudentc">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                </button><b>Exit</b>
                            </a>
                        </div>
                </div>
        <div class="col-sm-3 sidenav">
            <?php ?>
        </div>
    </div>
</div>
<?php
session_destroy();
