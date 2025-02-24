<?php

?>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <p><?php print'<a href="'.base_url().'index.php" class="btn btn-success" role="button">back to dashboard</a>'?></p>
            </div>
                 <div class="col-sm-6 text-center">
                    <div class="table-responsive ">

                        <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                            <thead>
                                <tr>
                            <legend><img src="<?php echo base_url();?>assets/images/s_info.png" alt="update" width="15" height="15"/>
                                enter login detail</legend>

                            </tr>
                            </thead>

<?php
$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form', 'id' => 'form');
echo form_open('secured/Studentloginc', $attributes);
?>
<fieldset>
                                <legend>
<?php echo validation_errors();
if (isset($_SESSION['message'])) {echo $_SESSION['message'];}?>
<p align="left">
<?php
if ($this->session->flashdata('shout')) {
	//echo "The number of rows affected is  " . $this->session->flashdata('shout');
	echo "<br/>  ".$this->session->flashdata('message_display');
}
?>
</legend>
                            </fieldset>
                            <tr>
                                <td align="left"><label class="control-label">Registration number</label></td>
                                <td align="left"><input class="form-control" id="RegNumb" name="RegNumb" placeholder="enter registration number"
                                                        type="text"  size="25" /></td>
                            </tr>
                            <tr>
                                <td align="left"><label class="control-label">Password</label></td>
                                <td align="left"><input class="form-control" name="password" type="password" id="password" placeholder="enter password" autocomplete="off" /></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <button type="submit" class="btn btn-success btn-lg" name="submitButton" id="submit_enquiry">
                                        <span class="glyphicon glyphicon-log-in"></span> <b>Login</b></button></td>
                            </tr>
<?php echo form_close();?>
</table>
                    </div>
                </div>

            <div class="col-sm-3 sidenav">
<?php ?>
</div>
        </div>
    </div>
