<?php

?>
<body>
    <!-- content -->
    <div class="wrapper row2">
        <div id="container" class="clear">
            <!-- main content -->
            <div id="homepage">
                <!-- Services -->
                <!---->
                <section id="intro" class="last clear">
                    <article>
                        <figure>
                            <figcaptionHome>
                                <h5><strong>POST UME Registration</strong></h5>
                                <fieldset>
                                    <legend><img src="<?php echo base_url(); ?>assets/images/s_passwd.png" alt="login"/>
                                        verify password</legend>
                                    <?php echo form_open('secured/Forgotpwd'); ?>
                                    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="table-responsive">
                                        <fieldset>
                                            <legend><img src="<?php echo base_url(); ?>assets/images/error.png" alt="error"/></legend>
                                            <?php echo validation_errors(); ?>
                                            <?php if ($this->session->flashdata('message_display')) { ?>
                                                <label><span style="color: #CC6633"><?php echo $this->session->flashdata('message_display'); ?><span></label>
                                                        <?php } ?>
                                                        </fieldset>
                                                        <tr>
                                                            <th width="60%">JambID:</th>
                                                            <td width="40%"><input name="JambID" type="text" value="<?php echo set_value('JambID'); ?>" size="40" required/></td>
                                                        </tr>
                                                        <tr>
                                                            <th width="60%">Email address:</th>
                                                            <td width="40%"><input name="email" type="text" value="<?php echo set_value('email'); ?>" size="40" required/></td>
                                                        </tr>
                                                        <tr>
                                                            <th width="60%">Password:</th>
                                                            <td width="40%"><input name="password" type="password" value="" size="40" required/></td>
                                                        </tr>
                                                        <tr>
                                                            <th width="60%">Comfirm Password:</th>
                                                            <td width="40%"><input name="cpassword" type="password" value="" size="40" required/></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div align="center">
                                                                    <button type="submit" name="submitButton">
                                                                        <img src="<?php echo base_url(); ?>assets/images/b_search.png" width="16" height="16" />
                                                                        <b>click to verify info</b>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </table>
                                                        <?php echo form_close(); ?>
                                                        </fieldset>
                                                        </figcaptionhome>
                                                        </figure>
                                                        </article>
                                                        </section>
                                                        </body>
                                                        </div>
                                                        <!-- / content body -->
                                                        </div>
                                                        </div>