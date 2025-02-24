<?php  ?>
<?php
if (!isset($_SESSION['username'])||($_SESSION['roleid']=="2")) {
    redirect('/Welcome', 'refresh');
}
?>
<title><?php echo $title; ?></title>
<body style="color:black;">
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <?php echo view('menu/menu'); ?>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <legend>
                    <span class="glyphicon glyphicon-user"></span>
                    Welcome
                    <?php echo ucwords($_SESSION['fname'] . ' ' . $_SESSION['surname']); ?>
                    <?php echo "(Username  :" . $_SESSION['username'] . ")"; ?>
                </legend>
                <h3 style="color:green"><span class="glyphicon glyphicon-cog">My Services</span></h3>
                <br>
                <div class="row">
                <div class="table-responsive">

                    <table border="0" cellpadding="0" cellspacing="0" width="" class="table table-sm table-hover table-striped table-responsive">

                        <?php
                         if((isset($_SESSION['msg']))&&(isset($_SESSION['msg2']))){
                             echo $_SESSION['msg'];
                             echo "<br/>";
                             echo $_SESSION['msg2'];
                             
                         }elseif(isset($_SESSION['msg'])){
                             echo $_SESSION['msg'];
                             echo "<br/>";
                         }else{$_SESSION['msg'] ="";}
                        echo validation_errors();
                        $attributes = array('class' => 'form-inline', 'role' => 'form', 'name' => 'Displaycandidateinfo', 'id' => 'DisplayCandidateInfo');
                        echo form_open('admin/Displaycandidateinfoc', $attributes);
                        ?>
                        <tr>
                            <td align="left"><label class="control-label">JambId</label></td>
                            <td align="left" colspan="2">

                            <td align="left"><input class="form-control" id="jambid" name="jambid" placeholder="jambid" 
                                                    type="text" value="" onblur="ShowCandName(this.value)" size="25"/></td>
                        </tr>
                        <tr>
                        <td align="left"><label class="control-label">Surname</label></td>
                        <td align="left" colspan="2">

                        <td align="left"><input class="form-control" id="sname" name="sname" placeholder="sname" 
      type="text" value="" size="23" readonly="" /></td>                  </tr>
                        <tr>

                        <td align="left"><label class="control-label">Middlename</label></td>
                        <td align="left" colspan="2">

                        <td align="left"><input class="form-control" id="mname" name="mname" placeholder="mname" 
                                             type="text" value="" size="23" readonly="" /></td>
                        </tr>
                        <tr>
                        <td align="left"><label class="control-label">Firstname</label></td>
                        <td align="left" colspan="2">

                        <td align="left"><input class="form-control" id="fname" name="fname" placeholder="fname"
                                             type="text" value="" size="23" readonly="" /></td>

                        </tr>
                        <tr>
                        <td align="left"><label class="control-label">Matric Number</label></td>
                        <td align="left" colspan="2">

                        <td align="left"><input class="form-control" id="frmregno" name="frmregno" placeholder="frmregno" 
                                                type="text" value="" size="25"/></td>
                        </tr>
                        <tr>
                            <td colspan="4"><button type="submit" class="btn btn-success btn-sm" name="submitButton" id="submit_enquiry">
                                    <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
                                    <b>Submit</b></button></td>
                        </tr>

                        <?php
                        form_close()
                        ?>
                    </table>
                </div>
                  </div>
        </div>
        </div>
    </div>
</body>
     <script type="text/javascript">
        
        function ShowCandName(str) {
            var post_data = {"<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"};
            jQuery.ajax({type: "GET", data: post_data, url: "<?php echo base_url(); ?>" + "index.php/admin/Displaycandidateinfoc/getSnamec?q=" + str,
                dataType: "json", success: function (res) {
                    if (res) {
                        document.getElementById("sname").value = res[0].sname;
                        document.getElementById("fname").value = res[0].fname;
                        document.getElementById("mname").value = res[0].mname;
                        
                    }
                    
                }});
        }
    </script> 