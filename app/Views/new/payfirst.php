<?php

?>
<title>Pay first!!!</title>
<!-- main content -->
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-4 sidenav">
            <p><?php echo anchor('/Newstudentc', 'Back to Dashboard'); ?></p>
        </div>
        <!-- main content -->
        <div class="col-sm-5 text-center">
            <h2 style="color: red">You have not Paid Admission notification fee</h2>

            <p style="text-align:center; font-weight:bold; padding-top:2mm;color:red;">
                <img src="<?php echo base_url(); ?>assets/images/logo.png" style="width:150px; height:150px" /><br/>
            </p>

<!--            <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php">
                <p style="text-align:center; font-weight:bolder;text-decoration: blink;">
                    ---Click here to PAY---
                </p>
            </a>-->
        </div>
        <div class="col-sm-3 sidenav">
            <?php ?>
        </div>
    </div>
</div>
<?php
session_destroy();
