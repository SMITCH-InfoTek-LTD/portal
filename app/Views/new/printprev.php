<?php

/*****to be removed****/
//if (!isset($_SESSION['RegNumb'])) {
//    redirect('/Newstudentc', 'refresh');
//}
/*******/
?>
<script>


// Functon to Show out Busy Div
    function showBusy() {
        $('#busy').show('slow');
    }

// function to process form response
    function processForm(html) {

        $('#errors').hide('slow');
        window.setTimeout(function () {

            var r = confirm("Please wait while you are being redirected.....Press OK to download");
            if (r === true) {
                $('#busy').hide('slow');
                $('#admincheck0').after('Thank you for submitting');
                $('#admincheck0').hide('slow');
                var url = "<?php echo base_url(); ?>index.php/new/PrintAdmission";
                window.open(url, "", "status");
            } else {
                var url = "<?php echo base_url(); ?>index.php/new/PrintPrev";
                $(location).attr("href", url);
                $('#errors').html(html).show('slow');
            }
            url = "<?php echo base_url(); ?>index.php/new/PrintPrev";
            $(location).attr("href", url);
            if (status === "error") {
                var msg = "Sorry but there was an error: ";
                $("#errors").html(msg + xhr.status + " " + xhr.statusText);
                $('#errors').html(html).show('slow');
            }

        }, 3000);
    }

    $(document).ready(function () {
        // $.AJAX Example Request
        $('#admincheck0').submit(function (eve) {
            eve.preventDefault();
            var input_data = $('#RegNumb').val();
            var input_data2 = $('#surname').val();
            if ((input_data.length === 0) && (input_data2.length === 0)) {
                $('#suggestions').hide();
            } else {
                var post_data = {
                    'RegNumb': input_data, 'RefNumb': input_data2,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };

                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/new/PrintPrev/printpdf",
                    type: "POST",
                    dataType: "html",
                    data: $('#admincheck0').serialize(),
                    //data: post_data,
                    beforeSend: function () {
                        showBusy();
                    },
                    success: function (html) {
                        processForm(html);

                    }
                });
            }
        });
    });
</script>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php echo anchor('/Newstudentc', 'Back to Dashboard'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="table-responsive text-center">
                            <div id="busy" style="display:none">Processing Form <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" /></div>
                            <br />
                            <div id="errors" style="display:none">Form Errors</div>

                            <table width="" border="0" align="center" class="table table-sm table-hover table-striped table-responsive">
                                <?php
                                $attributes = array('name' => 'admincheck', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'admincheck');
                                echo form_open('new/PrintPrev', $attributes);
                                ?>
                                <tr><td></td>
                                    <td><h3>Printing Admission Notification !!!</h3></td></tr>
                                <tr>
                                    <td></td>
                                    <td><span class="alert-danger"><?php echo validation_errors(); ?></span></td></tr>

                                <tr>
                                    <td align="right"><label for="RegNumb" class="control-label"><span class="glyphicon glyphicon-user"></span>Enter JambID</label></td>
                                    <td align="left">
                                        <input class="form-control" id="RegNumb" name="RegNumb" maxlength="10" placeholder="Enter Jamb number" type="text" size="45" required/></td>
                                </tr>
                                <tr>
                                    <td align="right"><label for="Surname" class="control-label"><span class="glyphicon glyphicon-user"></span>Enter Surname</label></td>
                                    <td align="left"><input class="form-control" type="text" name="surname" id="surname" placeholder="Enter surname" size="45"  required/></td>
                                </tr>
                               
                                <tr>
                                    <td></td>
                                    <td colspan="4"><button type="submit" class="btn btn-success btn-sm" name="submitButton" id="submit_enquiry">
                                            <span class="glyphicon glyphicon-download-alt"></span>
                                            <b>Print Admission Notification</b></button>
                                        &nbsp;
                                        <button type="reset" class="btn btn-success btn-sm" name="submitButton" id="submit_enquiry">
                                            <span class="glyphicon glyphicon-download-alt"></span>
                                            <b>Reset</b>
                                        </button>
                                    </td>                     
                                </tr>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <span id="result"></span>

            <div class="col-sm-2 sidenav">
                <?php ?>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("a.refresh").click(function () {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "index.php/new/Checkadminstatus/refresh",
                    success: function (res) {
                        if (res)
                        {
                            jQuery("div.image").html(res);
                        }
                    }
                });
            });
        });
    </script>