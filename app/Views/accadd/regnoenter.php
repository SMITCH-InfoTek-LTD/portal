<?php

?>
<title>Security Check for Paid Hostel</title>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php echo anchor('/Welcome', 'Back to Dashboard'); ?></p>
            </div>
                    <div class="col-sm-8">
                         <h2>Security Check for Paid Hostel</h2>
                         <br>
                        <div clas="table-responsive">
                            <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                                <?php
                                $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'RRREnter', 'id' => 'RRREnter');
                                echo form_open('accadd/RegnoEnter', $attributes);
                                ?>
                                <fieldset>
                                    <b><span class="alert-danger"><?php echo validation_errors(); ?></span></b>
                                </fieldset>
                                <tr>
                                    <td align="right"><label class="control-label" for="Regno">Enter Your Reg number</label></td>
                                    <td>
                                        <input type="text" name="regno" class="form-control input-sm" id="regno" placeholder="Enter Your Reg Number" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"><button type="submit" class="btn btn-success btn-sm" name="submitButton" id="submit_enquiry">
                                            <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="25" height="30" />
                                            <b>Submit</b></button></td>
                                </tr>
                                <?php echo form_close(); ?>
                            </table>
                        </div>
                    </div>
            <div class="col-sm-2 sidenav">
                <?php ?>
            </div>
        </div>
    </div>
