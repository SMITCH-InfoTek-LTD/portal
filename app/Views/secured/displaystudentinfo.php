<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('Newstudentc', 'refresh');
}
?>
<style>
    input.form-control,select.form-control,textarea.form-control {
        width: auto;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $('#StateOfOrigin').change(function (eve) {
            eve.preventDefault();
            //var selState = $(this).attr('value');
            var input_data = $('#StateOfOrigin').val();
            console.log(input_data);
            var post_data = {
                'StateOfOrigin': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };
            //alert(post_data);
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/secured/Displaystudentinfoc/ajax_call", //The url where the server req would we made.
                async: false,
                type: "POST", //The type which you want to use: GET/POST
                data: "StateOfOrigin=" + input_data, //The variables which are going.
                dataType: "html", //Return data type (what we expect).
                //This is the function which will be called if ajax call is successful.
                success: function (data) {

                    //data is the html of the page where the request is made.
                    $('#LGAOfOrigin').html(data);
                }
            });
        });
    });
</script>
<body style="color:black;">
    <!-- content -->
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2">
                <p style="background-color: transparent">
                    <?php
                    if (isset($_SESSION['passport'])) {
                        $passport = $_SESSION['passport'];
                    }
                    $image_properties = array(
                        'src' => 'assets/uploads/student/' . $passport,
                        'alt' => ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']),
                        'class' => 'img-responsive img-thumbnail',
                        'width' => '100',
                        'height' => '100',
                        'title' => ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']),
                        'rel' => 'lightbox',
                    );
                    echo img($image_properties);
                    ?>
                </p>
                <p><?php echo view('menu/menu_stacy'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-10 text-center">
                <legend>
                    Welcome <span class="glyphicon glyphicon-user"></span>
                    <?php echo ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?>
                </legend>

                <div class="">
                    <strong>
                        <?php
                        echo validation_errors('<div class="error">', '</div>');
                        $message = $this->session->flashdata('message');
                        if (isset($message)) {
                            echo "<font color='red'><b>" . $this->session->flashdata('message') . "</b></font>";
                            echo " ";
                            echo '<a href="' . base_url() . 'index.php/secured/Studentloginc" class="btn btn-info role="button">You can login from here</a>';
                            $image_properties = array(
                                'src' => 'assets/uploads/student/' . $this->session->userdata('RegNumb'),
                                'alt' => $this->session->userdata('RegNumb'),
                                'class' => 'img-responsive',
                                'width' => '100',
                                'height' => '100',
                                'title' => ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']),
                                'rel' => 'lightbox',
                            );
                            echo img($image_properties);
                        }
                        ?>
                    </strong>
                </div>
                <div class="table-responsive">

                    <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                        <?php
                        $attributes = array('id' => 'regform', 'class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('secured/Displaystudentinfoc', $attributes);
                        ?>
                        <thead>
                            <tr>
                        <legend><img src="<?php echo base_url(); ?>assets/images/s_info.png" alt="update" width="15" height="15"/>
                            Student Information</legend>

                        </tr>
                        </thead>
                        <tr>
                            <td align="right"><label class="control-label">RegNo</label></td>
                            <td align="left"><input class="form-control" id="regnum" name="RegNumb" placeholder="regnum" 
                                                    type="text" value="<?php echo $this->session->userdata('RegNumb'); ?>" size="25" readonly /></td>

                            <td align="right"><label class="control-label">Firstname</label></td>
                            <td align="left"><input class="form-control" id="lname" name="lname" placeholder="lname" 
                                                    type="text" value="<?php echo $this->session->userdata('lname'); ?>" size="25" readonly></td>
                        </tr>

                        <tr>
                            <td align="right"><label class="control-label">MiddleName</label></td>
                            <td align="left"><input class="form-control" id="fname" placeholder="Middlename"
                                                    type="text" name="mname" value="<?php echo $this->session->userdata('mname'); ?>" size="25"  readonly/></td>

                            <td align="right">
                                <label class="control-label">Surname</label></td>
                            <td align="left"><input class="form-control" id="sname" placeholder="Surname"
                                                    type="text" name="sname" value="<?php echo $this->session->userdata('sname'); ?>" size="25"  readonly/></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Sex</label></td>
                            <td align="left"><input class="form-control" id="sex" placeholder="Sex"
                                                    type="text" name="Sex" value="<?php echo $this->session->userdata('Sex'); ?>" size="25"/></td>
                            <td align="right">
                                <label class="control-label">Phone number</label></td>
                            <td align="left"><input class="form-control" id="gsm" placeholder="gsm" type="tel" name="gsm" 
                                                  value="<?php echo $this->session->userdata('Phone'); ?>"  size="25" required/></td>

                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">State Of Origin</label></td>
                            <td>
                             <select class="form-control" id="StateOfOrigin" placeholder="StateOfOrigin" name="StateOfOrigin">
                                    <?php
                                    $query = $this->db->query("SELECT DISTINCT sname FROM states ORDER BY sname");
                                    foreach ($query->result() as $row) {
                                        echo "<option VALUE=" . $row->sname . ">" . $row->sname . "</option>";
                                    }
                                    ?>
                                    <option value="">[---------select one---------]</option>
                                </select>
                            </td>
                            <td align="right"><label class="control-label">Local Govt of Origin</label>
                            </td>
                            <td align="left">
                                <select class="form-control" id="LGAOfOrigin" name="LGAOfOrigin">
                                    <option value="<?php echo $this->session->userdata('LGA'); ?>"><?php echo $this->session->userdata('LGA'); ?></option>
                                    <?php
                                    $query = $this->db->query("SELECT lganame FROM localgovts ORDER BY lganame");
                                    foreach ($query->result() as $row) {
                                        echo "<option VALUE=" . $row->lganame . ">" . $row->lganame . "</option>";
                                    }
                                    ?>
                                    <option value="">[-----------select one------------]</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Hometown</label></td>
                            <td align="left"><input class="form-control" id="hometown" placeholder="hometown"
                                                    type="text" name="hometown" value="<?php echo $this->session->userdata('hometown'); ?>" size="25"  />
                            </td>
                            <td align="right"><label class="control-label">Nationality</label></td>
                            <td align="left"><input type="text" name="nation" value="<?php echo $this->session->userdata('nation'); ?>" size="25" required class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Date of Birth</label></td>
                            <td align="left">
                                <input class="form-control" placeholder="dob" name="dob" id="dob" 
                                       type="text" value="<?php echo $this->session->userdata('dob'); ?>" size="25" required>
                            </td>
                            <td align="right">
                                <label class="control-label">MaritalStatus</label></td>
                            <td align="left">
                                <select name="maritalstatus" required class="form-control">
                                    <option value="<?php echo $this->session->userdata('mstatus'); ?>"><?php echo $this->session->userdata('mstatus'); ?></option>
                                    <option value="married">Married</option>
                                    <option value="single">Single</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="separated">Separated</option>
                                    <option value="widow">Widow</option>
                                    <option value="widower">Widower</option>
                                    <option value="">[-----------select one------------]</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Admission Mode</label></td>
                            <td align="left">
                                
                                <input class="form-control" id="admode" placeholder="admode" name="admode" 
                                                    id="email" type="text" value="<?php echo $this->session->userdata('admode'); ?>" size="25" required readonly/>
                            </td>
                            <td align="right">
                                <label class="control-label">Email</label></td>
                            <td align="left"><input class="form-control" id="email" placeholder="email" name="email" 
                                                    id="email" type="text" value="<?php echo $this->session->userdata('email'); ?>" size="25" required /></td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label class="control-label">Religion</label></td>
                            <td align="left"><select name="religion" required class="form-control" >
                                    <option value="" selected>[----------select one-----------]</option>
                                    <option value="Christianity" selected>Christianity</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Traditional">Traditional</option>
                                    <option value="Others">Others</option>
                                </select></td>
                            <td align="right">
                                <label class="control-label">Degree</label></td>
                            <td align="left"><input class="form-control" id="regnum" name="degree" placeholder="degree" 
                                                    type="text" value="<?php echo $this->session->userdata('Course'); ?>" size="25" readonly /></td>

                        </tr>
                        <tr>
                            <td align="right">
                                <label for="permaddress" class="control-label">Permanent Address</label>
                            </td>
                            <td align="left">
                                <textarea class="form-control" name="resaddr" id="resaddr" wrap="soft"  cols="28" rows="5" required>
                                    <?php echo $this->session->userdata('ResidentialAddress'); ?>
                                </textarea>
                            </td>
                            <td align="right">
                                <label for="contactaddress" class="control-label">Contact Address</label></td>
                            <td align="left"><textarea class="form-control" name="contactaddr" id="contactaddr" wrap="soft" cols="28" rows="5" required>
                                <?php echo $this->session->userdata('contactaddr'); ?>
                                </textarea></td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label class="control-label">Password</label>
                            </td>
                            <td align="left">
                                <input class="form-control"class="form-control" id="password" placeholder="enter your password"
                                       type="password" name="password" value="<?php echo $this->session->userdata('sname'); ?>" size="25"  />
                            </td>
                            <td align="right">
                                <label class="control-label">Confirm Password</label></td>
                            <td align="left"> <input class="form-control" id="cpassword" placeholder="renter your password to confirm"
                                                     type="password" name="cpassword" value="<?php echo $this->session->userdata('sname'); ?>" size="25"  /></td>            
                        </tr>
                        <th><img src="<?php echo base_url(); ?>assets/images/b_edit.png" alt="validate" width="15" height="15"/>
                            Next of Kin Information</th>
                        <tr>
                            <td align="right">
                                <label class="control-label">Next of Kin Name</label></td>
                            <td align="left"><input class="form-control" id="StateOfOrigin" placeholder="Enter name of Next of kin"
                                                    type="text" name="nokname" value="<?php echo $this->session->userdata('NOKName'); ?>" size="25"/></td>
                            <td align="right">
                                <label for="gsm" class="control-label">GSM No</label></td>
                            <td align="left"><input class="form-control" id="nokphone" placeholder="Enter gsm no of Next of kin"
                                                    type="tel" name="nokphone" value="<?php echo $this->session->userdata('NOKPhone'); ?>" size="25"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="nokpermaddr" class="control-label">Contact Address</label></td>
                            <td align="left"><textarea class="form-control" name="nokpermaddr" id="contactaddr" wrap="soft" cols="28" rows="5" required>
                                <?php echo $this->session->userdata('NOKAddress'); ?>
                                </textarea>
                            </td>
                            <td align="right">
                                <label class="control-label">Next of Kin Email</label></td>
                            <td align="left"><input class="form-control" id="sEmail" placeholder="next of kin email" name="sEmail" 
                                                    id="sEmail" type="email" value="<?php echo $this->session->userdata('sEmail'); ?>"  size="25" required /></td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label class="control-label">Relationship</label></td>
                            <td align="left"><input class="form-control" id="relationship" placeholder="relationship" name="relationship" 
                                                    id="relationship" type="text" value="<?php echo $this->session->userdata('relationship'); ?>"  size="25" required /></td>
                            <td align="right">
                                <label class="control-label">Occupation</label></td>
                            <td align="left"><input class="form-control" id="email" placeholder="Occupation" name="occupation" 
                                                    id="occupation" type="text" value="<?php echo $this->session->userdata('occupation'); ?>"  size="25" required /></td>
                        </tr>
                        <tr>
                            <td colspan="4"><button type="submit" class="btn btn-success btn-sm" name="submitButton" id="submit_enquiry">
                                    <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
                                    <b>Submit</b></button></td>
                        </tr>
                        </form>
                    </table>
                </div>
            </div>
            <!-- / content body -->

        </div>
    </div>