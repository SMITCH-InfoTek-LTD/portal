<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('/Newstudentc', 'refresh');
}
?>

<body>
    <!-- main content -->
    <div class="panel panel-success">
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

            <p style="text-align:left;">
                You have been offered a provisional admission as follows : <br/><br/>
                <b>
                    Programme  : <?php echo $_SESSION['Course']; ?><br/>
                    Department : <?php echo $_SESSION['Dept']; ?><br/>
                    Faculty    : <?php echo $_SESSION['Faculty']; ?><br/>
                    Level      : <?php echo $_SESSION['level']; ?><br/>
                    Entry mode : <?php echo $_SESSION['Admode']; ?><br/>
                    Duration   : <?php echo $_SESSION['Duration']; ?><br/>
                </b>.

        </div>
    </div>
    <div>
        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/secured/Logoutc">
            <button type="submit" class="btn btn-success btn-sm">
                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
            </button><b>Exit</b>
        </a>
    </div>
    <?php session_destroy();