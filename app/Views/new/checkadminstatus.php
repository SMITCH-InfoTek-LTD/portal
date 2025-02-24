<?php

?>
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
<script type="text/javascript">
    // Functon to Show out Busy Div
    function showBusy() {
        $('#busy').show('slow');
    }

// function to process form response
    function processForm(html) {

        $('#errors').hide('slow');
        window.setTimeout(function () {

            var r = confirm("Please wait while you are being redirected.....Press OK to continue");
            if (r === true) {
                $('#busy').hide('slow');
                $('#admincheck').after('Thank you for submitting');
                $('#admincheck').hide('slow');
                var url = "<?php echo base_url(); ?>index.php/new/Checkadminstatus/adminCheck";
                window.open(url, "", "status");
            } else {
                var url = "<?php echo base_url(); ?>index.php/new/Checkadminstatus";
                $(location).attr("href", url);
                $('#errors').html(html).show('slow');
            }
            url = "<?php echo base_url(); ?>index.php/new/Checkadminstatus";
            $(location).attr("href", url);
            if (status === "error") {
                var msg = "Sorry but there was an error: ";
                $("#errors").html(msg + xhr.status + " " + xhr.statusText);
                $('#errors').html(html).show('slow');
            }

        }, 3000);
    }

    $(document).ready(function () {
        $('#admincheck').submit(function (eve) {
            eve.preventDefault();
            var input_data = $('#RegNumb').val();
            if (input_data.length === 0) {
                $('#suggestions').hide();
            } else {

                var post_data = {
                    'RegNumb': input_data,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/new/Checkadminstatus/adminCheck",
                    dataType: "html",
                    data: post_data,
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
                <h2>Check admission Status!!!</h2>
                <div class="row">
                </div>
                <div class="col-sm-8">
                    <div clas="table-responsive">
                        <div id="busy" style="display:none">Processing Form <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" /></div>
                        <br />
                        <div id="errors" style="display:none">Form Errors</div>
                        <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                            <?php
                            $attributes = array('class' => 'form-inline', 'role' => 'form', 'name' => 'admincheck', 'id' => 'admincheck1');
                            echo form_open('new/Checkadminstatus/adminCheck', $attributes);
                            ?>
                            <div class="text-center" id="suggestions" align="center">
                                <div id="autoSuggestionsList">  </div>
                                <fieldset>
                                    <b><span class="alert-danger"><?php echo validation_errors(); ?></span></b>
                                </fieldset>
                                <tr>
                                    <td align="right"><label class="control-label" for="RegNumb">Enter Jamb Reg number</label></td>
                                    <td align="right">
                                        <input type="text" name="RegNumb" class="form-control input-sm" id="RegNumb" placeholder="Enter JambID">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"><button type="submit" class="btn btn-success" name="submitButton" id="submit_enquiry">
                                            <span class="glyphicon glyphicon-search"></span>
                                            <b>Check Admission status</b></button></td>
                                </tr>
                                <tr>
                                </tr>
                                <?php echo form_close(); ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 sidenav">
                <?php ?>
            </div>
            </div>
    </div>
</div>
    <script>
    $(document).ready(function () {
        $("a.refresh").click(function () {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/admin/Loginc/refresh",
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
