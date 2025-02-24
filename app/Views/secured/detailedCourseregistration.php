<title><?php echo $title; ?></title>
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

if (!isset($_SESSION["RegNumb"])) {
    redirect("Welcome", "refresh");
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
        $("#firstsemesterunit").click(function () {
            calculateTotal($(this).closest("table"));
        });

        $("#secondsemesterunit").click(function () {
            calculateTotal2($(this).closest("table"));
        });
    });
    function calculateTotal($tab) {
        var sum = 0;
        $tab.find('input[name="cunit[]"]').each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseInt(this.value);
                //alert(sum);
            }
        });
        $tab.find("#1stcunit").html(sum.toFixed(2));
        document.getElementById("1stcunit").value = sum;
    }

    function calculateTotal2($tab) {
        var sum = 0;
        $tab.find('input[name="cunit2[]"]').each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseInt(this.value);
                //alert(sum);
            }
        });
        $tab.find("#2ndcunit").html(sum.toFixed(2));
        document.getElementById("2ndcunit").value = sum;
    }
</script>
<script>
    function showCourses(str) {
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc").value = "";
            document.getElementById("ctype").value = "";
            document.getElementById("cunit").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc").value = res[0].cdesc;
                        document.getElementById("ctype").value = res[0].ctype;
                        document.getElementById("cunit").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_1(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc1").value = "";
            document.getElementById("ctype1").value = "";
            document.getElementById("cunit1").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc1").value = res[0].cdesc;
                        document.getElementById("ctype1").value = res[0].ctype;
                        document.getElementById("cunit1").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_2(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc2").value = "";
            document.getElementById("ctype2").value = "";
            document.getElementById("cunit2").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc2").value = res[0].cdesc;
                        document.getElementById("ctype2").value = res[0].ctype;
                        document.getElementById("cunit2").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_3(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc3").value = "";
            document.getElementById("ctype3").value = "";
            document.getElementById("cunit3").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc3").value = res[0].cdesc;
                        document.getElementById("ctype3").value = res[0].ctype;
                        document.getElementById("cunit3").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_4(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc4").value = "";
            document.getElementById("ctype4").value = "";
            document.getElementById("cunit4").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc4").value = res[0].cdesc;
                        document.getElementById("ctype4").value = res[0].ctype;
                        document.getElementById("cunit4").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_5(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc5").value = "";
            document.getElementById("ctype5").value = "";
            document.getElementById("cunit5").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc5").value = res[0].cdesc;
                        document.getElementById("ctype5").value = res[0].ctype;
                        document.getElementById("cunit5").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_6(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc6").value = "";
            document.getElementById("ctype6").value = "";
            document.getElementById("cunit6").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc6").value = res[0].cdesc;
                        document.getElementById("ctype6").value = res[0].ctype;
                        document.getElementById("cunit6").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_7(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc7").value = "";
            document.getElementById("ctype7").value = "";
            document.getElementById("cunit7").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc7").value = res[0].cdesc;
                        document.getElementById("ctype7").value = res[0].ctype;
                        document.getElementById("cunit7").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_8(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc8").value = "";
            document.getElementById("ctype8").value = "";
            document.getElementById("cunit8").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc8").value = res[0].cdesc;
                        document.getElementById("ctype8").value = res[0].ctype;
                        document.getElementById("cunit8").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_9(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc9").value = "";
            document.getElementById("ctype9").value = "";
            document.getElementById("cunit9").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc9").value = res[0].cdesc;
                        document.getElementById("ctype9").value = res[0].ctype;
                        document.getElementById("cunit9").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_10(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc10").value = "";
            document.getElementById("ctype10").value = "";
            document.getElementById("cunit10").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc10").value = res[0].cdesc;
                        document.getElementById("ctype10").value = res[0].ctype;
                        document.getElementById("cunit10").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_11(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc11").value = "";
            document.getElementById("ctype11").value = "";
            document.getElementById("cunit11").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc11").value = res[0].cdesc;
                        document.getElementById("ctype11").value = res[0].ctype;
                        document.getElementById("cunit11").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
    function showCourses1_12(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        if (str.length === 0) {
            document.getElementById("cdesc12").value = "";
            document.getElementById("ctype12").value = "";
            document.getElementById("cunit12").value = "";

        } else {
            jQuery.ajax({
                type: "GET",
                data: post_data,
                url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseFirst?q=" + str,
                dataType: "json",
                success: function (res) {
                    if (res)
                    {
                        document.getElementById("cdesc12").value = res[0].cdesc;
                        document.getElementById("ctype12").value = res[0].ctype;
                        document.getElementById("cunit12").value = res[0].units;
                        document.getElementById("1stcunit").value = "";
                    }
                }
            });
        }
    }
</script>
<body style="color:black;">
    <!-- content -->
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2">
                <p style="background-color: transparent">
                    <?php
                    if (isset($_SESSION["passport"])) {
                        $passport = $_SESSION["passport"];
                    }
                    $image_properties = array(
                        "src" => "assets/uploads/student/" . $passport,
                        "alt" => ucwords($_SESSION["lname"] . " " . $_SESSION["mname"] . " " . $_SESSION["sname"]),
                        "class" => "img-responsive img-thumbnail",
                        "width" => "100",
                        "height" => "100",
                        "title" => ucwords($_SESSION["lname"] . " " . $_SESSION["mname"] . " " . $_SESSION["sname"]),
                        "rel" => "lightbox",
                    );
                    echo img($image_properties);
                    ?>
                </p>
                <p><?php echo view("menu/studentmenuS"); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-10 text-center">
                <legend>
                    Welcome <span class="glyphicon glyphicon-user"></span>
                    <?php echo ucwords($_SESSION["lname"] . " " . $_SESSION["mname"] . " " . $_SESSION["sname"]); ?>
                    <?php echo "(RegNumb  :" . $_SESSION["RegNumb"] . ")"; ?>
                </legend>



                <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                    <?php
                    echo "<font color='red'>" . validation_errors() . "</font>";
                    $attributes = array("class" => "form-inline", "role" => "form", "name" => "regCourses", "id" => "regCourses");
                    echo form_open("secured/Detailedcourseregistrationc", $attributes);
                    ?>
                    <legend><img src="<?php echo base_url(); ?>assets/images/b_edit.png" alt="login" width="20" height="20"/>
                        Student Course Registration Info</legend>
                    <tr>
                        <td align="left"><label class="control-label">Faculty</label></td>
                        <td align="left"><input class="form-control" id="faculty" name="faculty" placeholder="faculty" 
                                                type="text" value="<?php echo $this->session->userdata("FacAbrev"); ?>" size="25" readonly /></td>

                        <td align="left"><label class="control-label">Department</label></td>
                        <td align="left"><input class="form-control" id="dept" name="dept" placeholder="dept" 
                                                type="text" value="<?php echo $this->session->userdata("CourseAbrev"); ?>" size="25" readonly></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="control-label">Course of Study</label></td>
                        <td align="left"><input class="form-control" name="degree" type="text" id="degree" 
                                                value="<?php echo( htmlspecialchars($this->session->userdata("degree"))) ?>" size="25" readonly></td>
                        <td align="left"><label class="control-label">Level</label></td>
                        <td align="left"><input class="form-control" name="level" type="text" id="level" 
                                                value="<?php echo( htmlspecialchars($this->session->userdata("level"))); ?>" size="25" readonly></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="control-label">Session</label></td>
                        <td align="left"><input class="form-control" name="session" type="text" id="session" 
                                                value="<?php echo( htmlspecialchars($this->session->userdata("session"))); ?>" size="25" readonly></td>
                        <td align="left"><label class="control-label">Semester</label></td>
                        <td align="left"><input class="form-control" name="semester" type="text" id="semester" 
                                                value="FIRST SEMESTER" size="25" readonly ></td>
                    </tr>
                    <tr>
                        <?php
                        if (isset($_SESSION["courses_first"]) || isset($_SESSION["courses_second"]) || isset($_SESSION["courses_secondcarryover"]) || isset($_SESSION["courses_firstcarryover"])) {
                            $coursesFirst = $_SESSION["courses_first"];
                            $coursesSecond = $_SESSION["courses_second"];
                            $coursesFirstCarryover = $_SESSION["courses_firstcarryover"];
                            $coursesSecondCarryover = $_SESSION["courses_secondcarryover"];
                        } else {
                            redirect("secured/Displaystudentreginfoc", "refresh");
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
                            <th align="left">COURSE TYPE</th>
                            <th align="left">CREDIT UNIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($coursesFirst)):
                            if (isset($coursesFirstCarryover) && (is_array($coursesFirstCarryover))) :
                                foreach ($coursesFirstCarryover as $row):
                                    ?>
                                    <tr><td align="left">
                                            <input type="text" name = "ccode[]" id = "ccode" class="form-control" readonly
                                                   value="<?= $row->cCode ?> ">
                                        </td>
                                        <td><input name="cdesc[]" class="form-control" value="<?= $row->cDesc ?>" type="text" id="cdescc" size="47" readonly="readonly" required/></td>
                                        <td><input name="ctype[]" class="form-control" value="<?= $row->cType ?>" type="text" id="ctypec" size="20" readonly="readonly" required/></td>
                                        <td><input name="cunit[]" class="form-control" value="<?= $row->Units ?>" type="text" id="cunitc" size="20" readonly="readonly"/></td>" 
                                    </tr>

                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td align="left">No Carry Over</td></tr>
                            </tbody>
                            <tbody>
                            <?php endif; ?>
                            <tr><td align="left">
                                    <select name = "ccode[]" id ="ccode" class="form-control" onchange="showCourses(this.value)">
                                        <option value="">-- Select Courses --</option>

                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>         
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit" readonly="readonly"/></td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <select name = "ccode[]" id = "ccode" class="form-control" onchange="showCourses1_1(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc1" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype1" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" size="20" id="cunit1" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode[]" id = "ccode2" class="form-control" onchange="showCourses1_2(this.value)">
                                        <option value="">-- Select Courses --</option>"
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc2" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype2" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit2" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode[]" id = "ccode" class="form-control" onchange="showCourses1_3(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc3" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype3" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit3" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode[]" id = "ccode" class="form-control" onchange="showCourses1_4(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc4" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype4" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit4" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode[]" id = "ccode" class="form-control" onchange="showCourses1_5(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc5" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype5" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit5" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode[]" id = "ccode" class="form-control" onchange="showCourses1_6(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc6" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype6" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit6" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode[]" id = "ccode" class="form-control" onchange="showCourses1_7(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc7" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype7" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit7" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode[]" id = "ccode" class="form-control" onchange="showCourses1_8(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc8" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype8" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit8" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode[]" id = "ccode" class="form-control" onchange="showCourses1_9(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc9" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype9" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit9" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode[]" id = "ccode" class="form-control" onchange="showCourses1_10(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc10" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype10" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit10" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode[]" id = "ccode" class="form-control" onchange="showCourses1_11(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc11" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype11" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit11" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode[]" id = "ccode" class="form-control" onchange="showCourses1_12(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesFirst as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc[]" class="form-control" value="" type="text" id="cdesc12" size="47"/></td>
                                <td><input name="ctype[]" class="form-control" value="" type="text" id="ctype12" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit[]" class="form-control" value="" type="text" id="cunit12" readonly="readonly"/></td>
                            </tr>
                        </tbody>    
                    <?php else: ?>
                        <tbody><tr>
                                <td align="left">No registered courses in First semester</td>
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
                            <th align="left">COURSE TYPE</th>
                            <th align="left">CREDIT UNIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($coursesSecond)):
                            if (isset($coursesSecondCarryover) && (is_array($coursesSecondCarryover))):
                                foreach ($coursesSecondCarryover as $row):
                                    ?>
                                    <tr><td align="left">
                                            <input type="text" name = "ccode2[]" id = "ccode" class="form-control" readonly
                                                   value="<?= $row->cCode ?> ">
                                        </td>
                                        <td><input name="cdesc2[]" class="form-control" value="<?= $row->cDesc ?>" type="text" id="cdescc" size="47" readonly="readonly" required/></td>
                                        <td><input name="ctype2[]" class="form-control" value="<?= $row->cType ?>" type="text" id="ctype1" size="20" readonly="readonly" required/></td>
                                        <td><input name="cunit2[]" class="form-control" value="<?= $row->Units ?>" type="text" id="cunitc" readonly="readonly"/></td> 
                                    </tr>

                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td align="left">No Carry Over</td></tr>
                            </tbody>
                            <tbody>
                            <?php endif; ?>
                            <tr><td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_1(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_1" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_1" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_1" readonly="readonly"/></td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_2(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row) : ?>

                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_2" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_2" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_2" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_3(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row) : ?>

                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_3" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_3" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_3" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_4(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row): ?>

                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_4" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_4" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_4" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_5(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row) : ?>

                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_5" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_5" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_5" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_6(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_6" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_6" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_6" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_7(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_7" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_7" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_7" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_8(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_8" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_8" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_8" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_9(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_9" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_9" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_9" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_10(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_10" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_10" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_10" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_11(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_11" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_11" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_11" readonly="readonly"/></td>
                            </tr>
                            <tr><td align="left">
                                    <select name = "ccode2[]" id = "ccode2" class="form-control" onchange="showCourses2_12(this.value)">
                                        <option value="">-- Select Courses --</option>
                                        <?php foreach ($coursesSecond as $row): ?>
                                            <option value="<?= $row->cCode ?>"><?= $row->cCode ?></option>
                                        <?php endforeach; ?>
                                    </select></td>
                                <td align="left">
                                    <input name="cdesc2[]" class="form-control" value="" type="text" id="cdesc2_12" size="47"/></td>
                                <td><input name="ctype2[]" class="form-control" value="" type="text" id="ctype2_12" size="20" readonly="readonly" required/></td>
                                <td><input name="cunit2[]" class="form-control" value="" type="text" id="cunit2_12" readonly="readonly"/></td>
                            </tr>
                        <?php else: ?>
                        <tbody>
                            <tr>
                                <td align="left">No registered courses in Second semester</td>
                            </tr>
                        </tbody>
                    <?php endif; ?>
                    </tbody>
                    <tr>
                        <td></td>
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
                    <?php echo form_close(); ?>
                </table>

            </div>
            <!-- / content body -->
        </div>
    </div>
</body>  
<script type="text/javascript">
    jQuery(document).ready(function () {
        $("#secondsemesterunit").click(function () {
            calculateTotal2($(this).closest("table"));
        });
    });

    function calculateTotal2($tab) {
        var sum = 0;
        $tab.find('input[name="cunit2[]"]').each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseInt(this.value);
                //alert(sum);
            }
        });
        $tab.find("#2ndcunit").html(sum.toFixed(2));
        document.getElementById("2ndcunit").value = sum;
    }
</script>
<script>
    function showCourses2_1(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_1").value = res[0].cdesc;
                    document.getElementById("ctype2_1").value = res[0].ctype;
                    document.getElementById("cunit2_1").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
    function showCourses2_2(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_2").value = res[0].cdesc;
                    document.getElementById("ctype2_2").value = res[0].ctype;
                    document.getElementById("cunit2_2").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
    function showCourses2_3(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_3").value = res[0].cdesc;
                    document.getElementById("ctype2_3").value = res[0].ctype;
                    document.getElementById("cunit2_3").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
    function showCourses2_4(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_4").value = res[0].cdesc;
                    document.getElementById("ctype2_4").value = res[0].ctype;
                    document.getElementById("cunit2_4").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
    function showCourses2_5(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_5").value = res[0].cdesc;
                    document.getElementById("ctype2_5").value = res[0].ctype;
                    document.getElementById("cunit2_5").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
    function showCourses2_6(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_6").value = res[0].cdesc;
                    document.getElementById("ctype2_6").value = res[0].ctype;
                    document.getElementById("cunit2_6").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
    function showCourses2_7(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_7").value = res[0].cdesc;
                    document.getElementById("ctype2_7").value = res[0].ctype;
                    document.getElementById("cunit2_7").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
    function showCourses2_8(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_8").value = res[0].cdesc;
                    document.getElementById("ctype2_8").value = res[0].ctype;
                    document.getElementById("cunit2_8").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
    
    function showCourses2_9(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_9").value = res[0].cdesc;
                    document.getElementById("ctype2_9").value = res[0].ctype;
                    document.getElementById("cunit2_9").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
    function showCourses2_10(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_10").value = res[0].cdesc;
                    document.getElementById("ctype2_10").value = res[0].ctype;
                    document.getElementById("cunit2_10").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
    function showCourses2_11(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_11").value = res[0].cdesc;
                    document.getElementById("ctype2_11").value = res[0].ctype;
                    document.getElementById("cunit2_11").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
    function showCourses2_12(str) {
        //alert(str);
        var post_data = {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Detailedcourseregistrationc/populatecourseSecond?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    document.getElementById("cdesc2_12").value = res[0].cdesc;
                    document.getElementById("ctype2_12").value = res[0].ctype;
                    document.getElementById("cunit2_12").value = res[0].units;
                    document.getElementById("2ndcunit").value = "";
                }
            }
        });
    }
</script>