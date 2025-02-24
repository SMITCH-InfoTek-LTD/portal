<?php

?>
<script>
    $(document).ready(function () {
        $("a.refresh").click(function () {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/admin/Loginc/refresh",
                success: function (res) {
                    if (res)
                    {
                        jQuery("div.image").html(res);
                    }
                }
            });
        });
    });
</script>
<title>user login</title>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php echo anchor('', 'Back to Main'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <div class="table-responsive">
                    <h5><strong>Student Accounts Admin Login</strong></h5>
                    <?php echo form_open('bursary/Loginc'); ?>
                    <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">                            <fieldset>
                            <?php echo validation_errors(); ?>
                            <p align="left">
                                <?php
                                if ($this->session->flashdata('shout')) {
                                    echo "<br/>  " . $this->session->flashdata('message_display');
                                }
                                ?>
                        </fieldset>
                        <tr>
                            <td width="">Username:</td>
                            <td width=""><input name="username" type="text" id="username" size="40" /></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input name="password" type="password" id="password" size="40" /></td>
                        </tr>
<!-----------------
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <div class="image"><?php echo $cap_img; ?>
                                <a  style="background-color: transparent" href='#' class ='refresh'><img id = 'ref_symbol' src ="<?php echo base_url() . 'assets/images/refresh.png'; ?>" width="50px" height="50px"</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Captcha:</td>
                            <td><input type="text" name="captcha" value="" size="40" autocomplete="off"/></td>
                        </tr>
----------------------!>
                        <tr>
                            <td colspan="2">
                                <div align="center">
                                    <button type="submit" name="submitButton">
                                        <img src="<?php echo base_url(); ?>assets/images/b_search.png" width="16" height="16" />
                                        <b>Login</b>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <?php echo form_close(); ?>
                    </fieldset>
                </div>
            </div>
            <div class="col-sm-2 sidenav">
                <?php ?>
            </div>
        </div>
    </div>
</body>