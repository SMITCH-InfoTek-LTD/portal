<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('Welcome', 'refresh');
}
?>
<style>
    input.form-control,select.form-control,textarea.form-control {
        width: auto;
    }
    <!--
    /* style the auto-complete response */
    li.ui-menu-item { font-size:12px !important; }
    -->
    .ui-autocomplete-loading {
        background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
    }
</style>
<body style="color:black;">
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php echo view('menu/studentmenuS'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <legend>
                    Welcome <span class="glyphicon glyphicon-user"></span>
                    <?php echo ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?>
                    <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")"; ?><br/>
                    <img src="<?php echo base_url(); ?>assets/images/b_edit.png" alt="login" width="20" height="20"/>
                            Print Course form<br/>
                            <?php echo "<font color='red'>" . validation_errors() . "</font>"?>
                </legend>
                <div class="table-responsive">
                    <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                        <?php
                        $attributes = array('class' => 'form-inline', 'role' => 'form', 'name' => 'regCourses', 'id' => 'regCourses');
                        echo form_open('secured/Printregisteredcourses/printcoursesregistered', $attributes);
                        ?>
                        <tr>
                            <td align="left"><label class="control-label">Faculty</label></td>
                            <td align="left"><input class="form-control" id="faculty" name="faculty" placeholder="faculty" 
                                                    type="text" value="<?php echo $this->session->userdata('FacAbrev'); ?>" size="25" readonly /></td>

                            <td align="left"><label class="control-label">Department</label></td>
                            <td align="left"><input class="form-control" id="dept" name="dept" placeholder="dept" 
                                                    type="text" value="<?php echo $this->session->userdata('CourseAbrev'); ?>" size="25" readonly></td>
                        </tr>
                        <tr>
                            <td align="left"><label class="control-label">Course of Study</label></td>
                            <td align="left"><input class="form-control" name="degree" type="text" id="degree" 
                                                    value="<?php echo( htmlspecialchars($this->session->userdata('degree'))) ?>" size="25" readonly></td>
                            <td align="left"><label class="control-label">Level</label></td>
                            <td align="left"><input class="form-control" name="level" type="text" id="level" 
                                                    value="<?php echo( htmlspecialchars($this->session->userdata('level'))); ?>" size="25" readonly></td>
                        </tr>
                        <tr  align="centre">
                            <td align="left"><label class="control-label">Session</label></td>
                            <td align="left" colspan="2">
                                <select name="session" id="session" class="form-control">
                                    <option value="">-------Select Session-------</option>
                                    <option value="2016/2017">2016/2017</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="submitButton" class="btn btn-success" role="button">
                                    <span class="glyphicon glyphicon-cog"></span> Submit
                                </button>
                                <button type="reset" name="resetButton" class="btn btn-success" role="button">
                                    <span class="glyphicon glyphicon-refresh"></span> Reset
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
            <!-- / content body -->
    <div class="col-sm-2 sidenav">
                <?php echo view('template/menu/sidenav'); ?>
            </div>
        </div>
    </div>
    