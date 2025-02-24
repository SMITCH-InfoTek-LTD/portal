<?php


if (!isset($_SESSION['JambID'])) {
    redirect('/Indexc', 'refresh');
}
?>
<script>
    $(document).ready(function () {
        $('#sittings').change(function () {
            if ($(this).val() == "onesitting") {
                $("#txtTab").load("<?php echo base_url(); ?>assets/files/onesittings.php");
            }
            if ($(this).val() == "doublesittings") {
                $("#txtTab").load("<?php echo base_url(); ?>assets/files/doublesittings.php");
            }
        });
    });

    $(function () {
        $('#examyear').datepicker({
            changeMonth: true,
            changeYear: true,
            showOn: 'button',
            buttonText: 'Choose a date',
            buttonImage: '<?php echo base_url(); ?>/assets/images/cal.gif',
            buttonImageOnly: true
        });
    });
    $(function () {
        $('#examyear2').datepicker({
            changeMonth: true,
            changeYear: true,
            showOn: 'button',
            buttonText: 'Choose a date',
            buttonImage: '<?php echo base_url(); ?>/assets/images/cal.gif',
            buttonImageOnly: true
        });
    });
    function checkValue(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            status = "This field accepts numbers only.";
            var msg = "Sorry, this field only accepts numeric values and it can not be empty  ";
            msg += "You can not proceed unless you provide a valid registration number.";
            alert(msg);
            return false;
        }
        status = "";
        return true;
    }
</script>
<body>
    <!-- content -->
    <div class="wrapper row2">
        <div id="container" class="clear">
            <!-- main content -->
            <div id="homepage">
                <!-- Services -->
                <!---->

                <section id="services" class="last clear">
                    <article class="one_third">
                        <figcaptionmenuL>
                            <?php echo view('menu/secured/studentmenuS'); ?>
                        </figcaptionmenuL>
                    </article>
                    <article>
                        <figure>
                            <figcaptionHome>
                                <h5><strong>Pre-Admission Screening - O Levels Updating</strong></h5>

                                <fieldset>
                                    <legend><img src="<?php echo base_url(); ?>assets/images/b_search.png" alt="login"/>
                                        OLevel updating</legend>
                                    <?php echo form_open('secured/UploadOlevelc'); ?>
                                    <table width="100%" border="2" align="center" cellpadding="0" cellspacing="0" class="table-responsive">
                                        <fieldset>
                                            <legend><img src="<?php echo base_url(); ?>assets/images/error.png" alt="error"/></legend>
                                            <?php echo validation_errors('<div class="errormessage">', '</div>'); ?>
                                        </fieldset>
                                        <tr>
                                            <th>JAMB Registration Number:</th>
                                            <td width="20px">
                                                <input name="JambID" type="text" id="RegNumber" size="40" value="<?php echo (htmlspecialchars($this->session->userdata('JambID'))); ?>" readonly/></td>
                                        </tr>
                                        <tr>
                                            <th><strong>Candidate's name:</strong>:</th>
                                            <td width="20px">
                                                <input type="text" name="CandName" value="<?php echo $this->session->userdata('fname') . ' ' . $this->session->userdata('mname') . ' ' . $this->session->userdata('sname'); ?>" size="40" readonly/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><strong>Sex or Gender</strong>:</th>
                                            <td width="40%">
                                                <input type="text" name="Sex" value="<?php echo $this->session->userdata('Sex'); ?>" size="6" readonly="" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>No. of Sittings</th>
                                            <td width="20%">
                                                <select name="sittings" id="sittings">
                                                    <option value="">Select no. of sittings:</option>
                                                    <option value="onesitting">One sitting</option>
                                                    <option value="doublesittings">Double sitting</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="table-responsive">
                                        <tr>

                                        <div id="txtTab"><b>Table for input  will be loaded here...</b></div>
                                        </tr>
                                    </table>
                                    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="table-responsive">
                                        <tr>
                                            <td colspan="4">
                                                <div align="center">
                                                    <button type="submit" name="submitButton" id="submitButton">
                                                        <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
                                                        Submit your form
                                                    </button> 
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php echo form_close(); ?>
                                </fieldset>
                            </figcaptionhome>
                        </figure>
                    </article>
                </section>
                </body>
            </div>
            <!-- / content body -->
        </div>
    </div>