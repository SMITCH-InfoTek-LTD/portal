<?php  ?>
<?php
if (!isset($_SESSION['RegNumb'])) {
    redirect('Welcome', 'refresh');
}
?>
<title><?php echo $title; ?></title>
<style type="text/css">
    #autoSuggestionsList > li {
        background: none repeat scroll 0 0 #F3F3F3;
        border-bottom: 1px solid #E3E3E3;
        list-style: none outside none;
        padding: 3px 15px 3px 15px;
        text-align: left;
    }
    #autoSuggestionsList > li a { color: #800000; }
    .auto_list {
        border: 1px solid #E3E3E3;
        border-radius: 5px 5px 5px 5px;
        position: absolute;
    }
</style>
<body style="color:black;">
    <!-- content -->
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2">
                <p><?php $this->load->view('menu/studentmenuS'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-10 text-center">
                <legend>
                    Welcome <span class="glyphicon glyphicon-user"></span>
                    <?php echo ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?>
                    <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")"; ?>
                </legend>
                <div class="table-responsive">

                    <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                                            <tr><legend><?php if(isset($_SESSION['paymsg'])){echo $_SESSION['paymsg'];}?></legend></tr>

                        <?php
                        echo validation_errors();

                        $attributes = array('class' => 'form-inline', 'role' => 'form', 'name' => 'regCourses', 'id' => 'regCourses');
                        echo form_open('secured/Updatestudenthostelinfoc', $attributes);
                        ?>
                        <tr>
                            <td align="left"><label class="control-label">Faculty</label></td>
                            <td align="left"><input class="form-control" id="faculty" placeholder="faculty"
                                                    type="text" name="faculty" value="<?php echo $this->session->userdata('FacAbrev'); ?>" size="25"  readonly />
                            </td>
                            <td align="left">
                                <label class="control-label">Department</label></td>
                            <td align="left"><input class="form-control" id="gsm" placeholder="dept" type="text" name="dept" 
                                                    value="<?php echo $this->session->userdata('CourseAbrev'); ?>"  size="25" required readonly/></td>

                        </tr>
                        <tr>
                            <td align="left"><label class="control-label">Course</label></td>
                            <td align="left">
                                <input  class="form-control" name="degree" type="text" id="degree" value="<?php echo(htmlspecialchars($this->session->userdata('degree'))); ?>" size="20" readonly/>
                            </td>
                            <td align="left"><label class="control-label">Level</label></td>
                            <td align="left">
                                <input name="level" id="level" class="form-control" value="<?php echo $this->session->userdata('level'); ?>" readonly/>
                            </td>
                        </tr>
                        <td align="left">
                            <label class="control-label">Sex</label></td>
                        <td align="left"><input class="form-control" id="sex" placeholder="sex" type="text" name="sex" 
                                                value="<?php echo $this->session->userdata('Sex'); ?>"  size="25" required readonly/></td>
                        <tr>
                            <td align="left"><label class="control-label">Hostel</label></td>
                            <td align="left" colspan="1">

                                <select class="form-control" id="hostel" name="hostel">
                                    <option value="">----------Select Hostel------------</option>
                                    <?php
                                    $query = $this->db->query("SELECT hostelname,sex FROM hostels where sex = '" . $this->session->userdata('Sex') . "'");
                                    foreach ($query->result() as $row) {
                                        echo "<option VALUE=" . "'" . $row->hostelname . "'>" . "'" . $row->hostelname . "'</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"><button type="submit" class="btn btn-success btn-sm" name="submitButton" id="submit_enquiry">
                                    <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
                                    <b>Submit</b></button></td>
                        </tr>


                        <marquee>
                            <h2>NOTICE!! If Booked Bedspace Is Not Paid For Within 7days, Your Accommodation Will Be Revocked.</h2> 
                        </marquee>
                        </p>



                        <?php
                        form_close()
                        ?>
                    </table>
                </div>
                <div class="col-sm-8" id="suggestions">
                    <div id="autoSuggestionsList"></div>
                </div>
            </div>
            <!-- / content body -->

        </div>
    </div>