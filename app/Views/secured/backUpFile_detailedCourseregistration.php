<title><?php echo $title; ?></title>
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
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('#firstsemesterunit').click(function () {
            calculateTotal($(this).closest('table'));
        });

        $('#secondsemesterunit').click(function () {
            calculateTotal2($(this).closest('table'));
        });
    });
    function calculateTotal($tab) {
        var sum = 0;
        $tab.find('input[name="cunit[]"]:checked').each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseInt(this.value);
                //alert(sum);
            }
        });
        $tab.find("#1stcunit").html(sum.toFixed(2));
        document.getElementById('1stcunit').value = sum;
    }

    function calculateTotal2($tab) {
        var sum = 0;
        $tab.find('input[name="cunit2[]"]:checked').each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseInt(this.value);
                //alert(sum);
            }
        });
        $tab.find("#2ndcunit").html(sum.toFixed(2));
        document.getElementById('2ndcunit').value = sum;
    }
</script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        $("#dialog-message").dialog({
            modal: true,
            buttons: {
                Ok: function () {
                    $(this).dialog("close");
                }
            }
        });
    });
</script>
<script>
    jQuery(document).ready(function () {
        $('#ccode').autocomplete({
            source: 'http://localhost/registry/assets/files/getCourses.php',
            minLength: 2,
            select: function (evt, ui)
            {
                // when a course code is selected, populate related fields in this form
                this.form.cdesc.value = ui.item.cdesc;
                this.form.cunit.value = ui.item.cunits;
                //document.getElementById('txtCreditload').value = this.form.cunit.value;
            }
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
                <p><?php echo view('menu/studentmenuS'); ?></p>
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
                        <?php
                        echo "<font color='red'>" . validation_errors() . "</font>";
                        $attributes = array('class' => 'form-inline', 'role' => 'form', 'name' => 'regCourses', 'id' => 'regCourses');
                        echo form_open('secured/Detailedcourseregistrationc', $attributes);
                        ?>
                        <legend><img src="<?php echo base_url(); ?>assets/images/b_edit.png" alt="login" width="20" height="20"/>
                            Student Course Registration Info</legend>
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
                        <tr>
                            <td align="left"><label class="control-label">Session</label></td>
                            <td align="left"><input class="form-control" name="session" type="text" id="session" 
                                                    value="<?php echo( htmlspecialchars($this->session->userdata('session'))); ?>" size="25" readonly></td>
                            <td align="left"><label class="control-label">Semester</label></td>
                            <td align="left"><input class="form-control" name="semester" type="text" id="semester" 
                                                    value="FIRST SEMESTER" size="25" readonly ></td>
                        </tr>
                        <tr>
                            <?php
                            if (isset($_SESSION['courses_first']) || isset($_SESSION['courses_second']) || isset($_SESSION['courses_secondcarryover']) || isset($_SESSION['courses_firstcarryover'])) {
                                $coursesFirst = $_SESSION['courses_first'];
                                $coursesSecond = $_SESSION['courses_second'];
                                $coursesFirstCarryover = $_SESSION['courses_firstcarryover'];
                                $coursesSecondCarryover = $_SESSION['courses_secondcarryover'];
                                foreach ($coursesFirst as $key) {
                                    echo $key->cCode . "   :   " . $key->cDesc . "  " . $key->Units . "<br/>";
                                }
                            } else {
                                redirect('secured/Displaystudentreginfoc', 'refresh');
                            }
                            ?>
                        </tr>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive table-condensed">
                        <thead><td colspan="4"><h2>First Semester Course Registration</h2></td></thead>
                        <thead>
                            <tr>
                                <th align="left">CODE</th>
                                <th align="left">COURSE TITLE</th>
                                <th align="left">CREDIT UNIT</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if ($coursesFirst): ?>
                                <?php if ($coursesFirstCarryover): ?>
                                    <?php foreach ($coursesFirstCarryover as $row): ?>                
                                        <tr>
                                            <td align="left">
                                                <div class="checkbox"></div>
                                                <label><input name="ccode[]" type="checkbox" id="ccode" value="<?= $row->cCode ?>" checked required readonly="readonly"><?= $row->cCode ?></label>
                                            </td>
                                            <td><input name="cdesc[]" class="form-control" value="<?= $row->cDesc ?>" type="text" id="cdesc" size="47" readonly="readonly" required/></td>
                                            <td><label><input name="cunit[]" class="" value="<?= $row->Units ?>" type="checkbox" id="cunit" checked required readonly="readonly"/><?= $row->Units ?></label>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td align="left">No Carry Over</td>
                                    </tr>
                                <?php endif; ?>
                                <?php foreach ($coursesFirst as $row): ?>
                                    <tr>
                                            <td align="left">
                                                <select name = "cCode[]" id = "cCode" class="form-control">
                                                    <option value="">-- Select Category --</option>
                                                        <option value="<?php echo $row->cCode; ?>"><?php echo $row->cCode; ?></option>
                                                </select>
                                            </td>
                                        </tr>
                                    <tr>
                                        <td align="left">
                                            <div class="checkbox"></div>
                                            <label><input name="ccode[]" type="checkbox"  id="ccode" checked value="<?= $row->cCode ?>"><?= $row->cCode ?></label>
                                        </td>
                                        <td><input name="cdesc[]" class="form-control" value="<?= $row->cDesc ?>" type="text" id="cdesc" size="47"/></td>
                                        <td><label><input name="cunit[]" class="" value="<?= $row->Units ?>" checked type="checkbox" id="cunit"/><?= $row->Units ?></label></td>
                                    </tr>
                                <tbody>
                                <?php endforeach; ?>
                            <?php else: ?>
                            <tbody>
                                <tr>
                                    <td align="left">No Carry Over</td>
                                </tr>
                            </tbody>
                        <?php endif; ?>

                        <tr> 
                            <td></td>
                            <td>
                                <input type="button" value="Calculate First semester units" id="firstsemesterunit"/>
                            </td>
                            <td align="left" colspan="4">
                                <label for="1stCreditload">First Semester Units</label>
                                <input name="1stcunit" type="text" id="1stcunit" value="" size="2" readonly />
                            </td>
                        </tr>

                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive table-condensed">
                        <thead><td colspan="4"><h2>Second Semester Course Registration</h2></td></thead>
                        <thead>
                            <tr>
                                <th align="left">CODE</th>
                                <th align="left">COURSE TITLE</th>
                                <th align="left">CREDIT UNIT</th>
                            </tr>
                        </thead>
                        <?php if ($coursesSecond): ?>
                            <?php if ($coursesSecondCarryover): ?>
                                <?php foreach ($coursesSecondCarryover as $row): ?>
                                    <tr>
                                        <td align="left">
                                            <div class="checkbox"></div>
                                            <label><input name="ccode2[]" type="checkbox"  id="ccode" value="<?= $row->cCode ?>" checked readonly="readonly"><?= $row->cCode ?></label>
                                        </td>
                                        <td><input name="cdesc2[]" class="form-control" value="<?= $row->cDesc ?>" type="text" id="cdesc" size="47" readonly="readonly" required/></td>
                                        <td><label><input name="cunit2[]" class="" value="<?= $row->Units ?>" checked type="checkbox" id="cunit" readonly="readonly" required/><?= $row->Units ?></label></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td align="left">No Carry Over</td>
                                </tr>
                            <?php endif; ?>
                            <?php foreach ($coursesSecond as $row): ?>

                                <tr>
                                    <td align="left">
                                        <div class="checkbox"></div>
                                        <label><input name="ccode2[]" type="checkbox"  id="ccode2_1" value="<?= $row->cCode ?>" checked><?= $row->cCode ?></label>
                                    </td>
                                    <td><input name="cdesc2[]" class="form-control" value="<?= $row->cDesc ?>" type="text" id="cdesc2_1" size="47"/></td>
                                    <td><label><input name="cunit2[]" value="<?= $row->Units ?>" checked type="checkbox" id="cunit2_1"/><?= $row->Units ?></label></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td align="left">No Carry Over</td>
                            </tr>
                        <?php endif; ?>
                        <?php
                        form_close()
                        ?>
                        </tbody>
                        <tr><td></td>
                            <td>
                                <input type="button" value="Calculate Second semester units" id="secondsemesterunit"/>
                            </td>
                            <td align="left" colspan="4">
                                <label for="2ndCreditload">2nd Semester Units</label>
                                <input name="2ndcunit" type="text" id="2ndcunit" value="" size="2" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="submitButton">
                                    <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />Submit
                                </button>
                                <button type="reset" name="resetButton">
                                    <img src="<?php echo base_url(); ?>assets/images/reset.png" width="16" height="16" />Reset
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
            <!-- / content body -->
        </div>
    </div>
    <div id="dialog-message" title="Student course registration">
        <p>
            <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
            You have only 30 minutes to complete your form after which you will redirected to start all-over again.
        </p>
        <p>
            <b>Please take note</b>.
        </p>
    </div>
</body>  