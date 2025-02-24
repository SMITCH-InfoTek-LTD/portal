<?php

  if (!isset($_SESSION["RegNumb"])) {
        redirect("Welcome", "refresh");
    }
?>
<title>Error!!!</title>
<!-- main content -->
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-4 sidenav">
            <p><p><?php echo anchor('/Newstudentc', 'Back to Dashboard'); ?></p></p>
        </div>
        <!-- main content -->
        <div class="col-sm-5 text-center">
            <p style="text-align:center; font-weight:bolder; padding-top:2mm; color:green;font-size: xx-large">
                University of Abuja
            </p>

            <p style="text-align:center; font-weight:bolder; padding-top:2mm; color: red;font-size: x-large">
                <img src="<?php echo base_url(); ?>assets/images/logo.png" style="width:150px; height:150px" /><br/><br/>
                <?php echo $_SESSION['RegNumb'] ?>
            </p>
            <p style="text-align:center; font-weight:bolder; padding-top:2mm; color: red;font-size: x-large" id="message">
                <b>INVALID CREDENTIALS ACCESS DENIED!!!</b>
                <br/>
            </p>
            <P>
                
            </P>
        
        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
            <button type="submit" class="btn btn-success btn-sm">
                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
            </button><b>Exit</b>
        </a>
    </div>
<div class="col-sm-3 sidenav">
    <?php ?>
</div>
</div>
</div>
<?php
session_destroy();
