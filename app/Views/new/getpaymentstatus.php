<?php


?>
<title>remita payment</title>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
           <p><?php echo anchor('/Newstudentc', 'Back to Dashboard'); ?></p>
        </div>
        <!-- main content -->
        <div class="col-sm-8 text-center">
            <legend>
                    <span class="glyphicon glyphicon-user"></span>
                    Welcome User
                </legend>
            <div class="table-responsive">
                <?php
                $attributes = array(
                    'id' => 'RemitaGetPayStatusForm1', 'class' => 'form-horizontal',
                    'role' => 'form', 'name' => 'RemitaGetPayStatusForm1');
                echo form_open('new/GetPaymentStatus', $attributes);
                ?>
                <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-responsive">
                    <tr><legend><img src="<?php echo base_url(); ?>assets/images/remita-payment-logo-horizonal.png"/></legend></tr>
                    <tr><?php echo validation_errors('<div class="error">', '</div>'); ?></tr>
                    <tr>
                        <td align="right"><label class="control-label">Enter RRR:</label></td>
                        <td align="left"><input type="text" class="form-control" placeholder="Enter Your RRR" name="RRR" required></td>
                        <td colspan="4" col-sm-8 col-sm-offset-4>
                            <button class="btn btn-sm btn-primary" id="statusButton" type="button">
                                <img src="<?php echo base_url(); ?>assets/images/eye.png" width="16" height="16" />
                                <b>Get Status</b>
                            </button>
                        </td>
                    </tr>
                    <tr><hr></tr>

                </table>
                <?php echo form_close(); ?>
            </div>
        </div>

        <div class="col-sm-2 sidenav">
            <p>  </p>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("button#statusButton").click(function () {
            $('form[name=RemitaGetPayStatusForm1]').submit();
        });

    });
</script>