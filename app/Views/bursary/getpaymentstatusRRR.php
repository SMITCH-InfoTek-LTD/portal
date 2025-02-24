<?php

if (!isset($_SESSION["username"])) {
    redirect("/", "refresh");
}
?>
<body>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <?php $this->load->view('menu/menu'); ?>
        </div>
        <!-- main content -->
        <div class="col-sm-8 text-center">
            <legend>
                <span class="glyphicon glyphicon-user"></span>
                Welcome
                <?php echo ucwords($_SESSION['fname'] . ' ' . $_SESSION['surname']); ?>
                <?php echo "(Username  :" . $_SESSION['username'] . ")"; ?>
            </legend>
            <div class="table-responsive">
                <?php
                $attributes = array(
                    'id' => 'RemitaGetPayStatusForm1', 'class' => 'form-horizontal',
                    'role' => 'form', 'name' => 'RemitaGetPayStatusForm1');
                echo form_open('bursary/GetPaymentStatusRRR', $attributes);
                ?>
                <table cellspacing="0" class="table table-sm table-responsive">
                    <tr><?php echo validation_errors('<div class="error">', '</div>'); ?></tr>
                    <tr>
                        <td align="right"><label class="control-label">Enter RRR:</label></td>
                        <td align="left"><input type="text" class="form-control" placeholder="Enter Your RRR" name="RRR" required></td>
                        <td colspan="4">
                            <button class="btn btn-sm btn-primary" id="statusButton" type="button">
                                <img src="<?php echo base_url(); ?>assets/images/eye.png" width="16" height="16" />
                                <b>Get Status</b>
                            </button>
                        </td>
                    </tr>

                </table>
                <?php echo form_close(); ?>
            </div>
        </div>

        <div class="col-sm-2 sidenav">
            <p>  </p>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(function () {
        $("button#statusButton").click(function () {
            $('form[name=RemitaGetPayStatusForm1]').submit();
        });

    });
</script>