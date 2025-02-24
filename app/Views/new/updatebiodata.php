<?php

?>
<title>update bio - data</title>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php echo anchor('/Newstudentc', 'Back to Dashboard'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <h2>Update Bio-Data</h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div clas="table-responsive">
                            <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                                <?php
                                $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'admincheck', 'id' => 'admincheck');
                                echo form_open('new/UpdateBiodata', $attributes);
                                //echo form_open('', $attributes);
                                ?>
                                <fieldset>
                                    <b><span class="alert-danger"><?php echo validation_errors(); ?></span></b>
                                </fieldset>
                                <tr>
                                    <td align="left"><label class="control-label" for="RegNumb">Enter Reg number</label></td>
                                    <td>
                                        <input type="text" name="RegNumb" class="form-control input-sm" id="RegNumb" placeholder="Enter RegNo" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left"><label class="control-label">Enter password</label></td>
                                    <td>
                                        <input type="password" name="password" class="form-control input-sm" id="password" placeholder="Enter Password which is your surname" autocomplete="off" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"><button type="submit" class="btn btn-success btn-sm" name="submitButton" id="submit_enquiry">
                                            <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
                                            <b>Submit</b></button></td>
                                </tr>
                                <?php echo form_close(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 sidenav">
                <?php ?>
            </div>
        </div>
    </div>
