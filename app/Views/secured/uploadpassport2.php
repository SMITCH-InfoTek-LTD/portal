<!-- content -->
<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('Newstudentc', 'refresh');
}
?>
<body style="color:black;">
    <!-- content -->
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p>
                    <?php //echo view('menu/studentmenuS'); 
                    ?>
                </p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <legend><img src="<?php echo base_url(); ?>assets/images/b_search.png" alt="login"/>
                    Welcome
                    <?php echo ucwords($_SESSION['sname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['lname']); ?>
                </legend>
                <div class="table-responsive">

                    <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                        <thead>
                            <tr>
                        <p>
                            <b><font color="red">Passport must be 100(height) x 100(width) in dimension</font></b><br/>
                            <b><font color="red">Passport must be <= 100kb in size.</font></b> <br/>
                            <b><font color="red">Passport must be in either png , jpeg ,jpg , or gif format.</font></b>
                        </p>
                        </tr>
                        </thead>
                        <legend>Upload Passport</legend>
                        <div class="alert alert-danger">
                            <strong><h2><marquee>
                                    <?php
                                    print_r($error);
                                    ?></marquee></h2>
                            </strong>
                        </div>
                        <?php
                        $attributes = array('id' => 'uploadstudent');
                        echo form_open_multipart('secured/LoadPictureAcctCreate/do_upload', $attributes);
                        ?>
                        <tr>
                            <td align="left"><input class="form-control" id="userfile" placeholder="upload passport" type="file" name="userfile"/></td>
                            <td align="left">
                                <button type="submit" name="submitButton" id="button" class="btn btn-success btn-sm">
                                    <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
                                    upload
                                </button>
                            </td>
                        </tr>
                        <tr><td><h4><?php print '<a href="' . base_url() . 'index.php/secured/Logoutc" class="btn btn-success" role="button">back to main page</a>' ?></h4></td></tr>
                        <?php
                        echo form_close();
                        ?>
                        </fieldset>
                    </table>
                </div>
            </div>
            <!-- / content body -->
            <div class="col-sm-2 sidenav">
                <?php ?>
                <div>

                </div>
            </div>
        </div>
    </div>