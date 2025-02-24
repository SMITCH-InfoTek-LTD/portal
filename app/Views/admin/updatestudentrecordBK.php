<?php  ?>
<?php
if (!isset($_SESSION['username'])||($_SESSION['roleid']=="2")) {
    redirect('/admin/Loginc', 'refresh');
}
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $( function() {
    $( "#dob" ).datepicker({
      showOn: "button",
      buttonImage: "<?php echo base_url(); ?>assets/images/cal.gif",
      buttonImageOnly: true,
      buttonText: "Select date",
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
<title><?php echo $title; ?></title>
<body style="color:black;">
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
                        $attributes = array('class' => 'form-inline', 'role' => 'form', 'name' => 'UpdateStudentRecord', 'id' => 'UpdateStudentRecord');
                        echo form_open('admin/UpdateStudentRecord', $attributes);
                        ?>
                        <tr>
                            <td align="left"><label class="control-label">JambId</label></td>
                            <td align="left"><input class="form-control" id="jambid" name="jambid" placeholder="jambid" 
                                                    type="text" value="" onblur="ShowCandName(this.value)" size="25"/></td>
                        </tr>
                        <tr>
                        <td align="left"><label class="control-label">Surname</label></td>
                        <td align="left"><input class="form-control" id="sname" name="sname" placeholder="sname" 
      type="text" value="" size="23"/></td>                  </tr>
                        <tr>

                        <td align="left"><label class="control-label">Middlename</label></td>
                        <td align="left"><input class="form-control" id="mname" name="mname" placeholder="mname" 
                                             type="text" value="" size="23"/></td>
                        </tr>
                        <tr>
                        <td align="left"><label class="control-label">Firstname</label></td>
                        <td align="left"><input class="form-control" id="fname" name="fname" placeholder="fname"
                                             type="text" value="" size="23"/></td>

                        </tr>
<tr>
                        <td align="left"><label class="control-label">DeptDesc</label></td>
                        <td align="left"><input class="form-control" id="sn" name="sn" placeholder="sn"
                                             type="text" value="" size="10" readonly/></td>

                        </tr>
<tr>
                        <td align="left"><label class="control-label">RefNumb</label></td>
                        <td align="left"><input class="form-control" id="refnumb" name="refnumb" placeholder="refnumb"
                                             type="text" value="" size="15"/></td>

                        </tr>
 <tr>
                        <td align="left"><label class="control-label">Gender</label></td>

                        <td align="left"><input class="form-control" id="sex" name="sex" placeholder="sex"
                                             type="text" value="" size="2" /></td>

                        </tr>
 <tr>
                        <td align="left"><label class="control-label">Religion</label></td>
<td align="left"><select class="form-control" name="religion" id="religion">
<option value="Christianity">Christianity</option>
<option value="Islam">Islam</option>
<option value="African Tradition">African Tradition</option>
</select>


</td>
                        </tr>
 <tr>
                        <td align="left"><label class="control-label">Date of Birth</label></td>
<td align="left"><input class="form-control" type="text" name="dob" placeholder="dob" id="dob" size="20">


</td>
                        </tr>
<tr>
                        <td align="left"><label class="control-label">Level</label></td>
<td align="left"><input class="form-control" type="text" name="level" placeholder="level" id="level" size="20">


</td>
                        </tr>
 <tr>
                        <td align="left"><label class="control-label">LGA</label></td>

                        <td align="left"><input class="form-control" id="lga" name="lga" placeholder="lga"
                                             type="text" value="" size="23"/></td>

                        </tr>
                        <tr>
                        <td align="left"><label class="control-label">Matric Number</label></td>

                        <td align="left"><input class="form-control" id="regno" name="regno" placeholder="Matriculation number" 
                                                type="text" value="" size="25"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit" class="btn btn-success btn-sm" name="submitButton" id="submit_enquiry">
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
            jQuery.ajax({type: "GET", data: post_data, url: "<?php echo base_url(); ?>" + "index.php/admin/UpdateStudentRecord/getSnamec?q=" + str,
                dataType: "json", success: function (res) {
                    if (res) {
                        document.getElementById("sname").value = res[0].sname;
                        document.getElementById("fname").value = res[0].fname;
                        document.getElementById("mname").value = res[0].mname;
                        document.getElementById("lga").value = res[0].lga;
                        document.getElementById("religion").value = res[0].religion;
                        document.getElementById("dob").value = res[0].dob;
                        document.getElementById("refnumb").value = res[0].refnumb;
                        document.getElementById("sex").value = res[0].sex;
                        document.getElementById("level").value = res[0].level;
                        document.getElementById("regno").value = res[0].regno;
                        document.getElementById("sn").value = res[0].sn;
                        document.getElementById("refnumb").value = res[0].RefNumb;
                        
                    }
                    
                }});
        }
    </script> 