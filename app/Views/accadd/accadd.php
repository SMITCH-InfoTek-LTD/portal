<?php
if (!isset($_SESSION['RegNumb'])) {
    //redirect('/Newstudentc', 'refresh');
}
?>
<title>
    PAY NOW!!!
</title>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php echo anchor('/Welcome', 'Back to Dashboard'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <legend>
                    <span class="glyphicon glyphicon-user">
                        Welcome User
                    </span>
                </legend>
                <div class="table-responsive">
                    <?php
                    $attributes = array(
                        'id' => 'RemitaPaymentForm', 'class' => 'form-horizontal',
                        'role' => 'form', 'name' => 'RemitaPaymentForm');
                    echo form_open('accadd/AccAdd', $attributes);
                    ?>
                    <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-responsive">
                        <tr><legend><img src="<?php echo base_url(); ?>assets/images/remita-payment-logo-horizonal.png"/></legend></tr>
                        <tr><legend><?php if (isset($_SESSION['paymsg'])) {
                        echo $_SESSION['paymsg'];
                    } ?></legend></tr>
                        <tr>
                        <font color="red">
<?php echo validation_errors(); ?>
                        </font>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Enter Regno:</label></td>
                            <td align="left"><input class="form-control" name="RegNumb" value="" type="text" onblur="ShowCandName(this.value)"/></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Payer Name:</label></td>
                            <td align="left"><input class="form-control" name="payerName" id="payerName" value="" type="text" readonly="true"/></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Faculty:</label></td>
                            <td align="left"><input class="form-control" name="faculty" id="faculty" value="" type="text" readonly="true"/></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Course:</label></td>
                            <td align="left"><input class="form-control" name="Course" id="Course" value="" type="text" readonly="true"/></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Dept:</label></td>
                            <td align="left"><input class="form-control" name="dept" id="dept" value="" type="text" readonly="true"/></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Level:</label></td>
                            <td align="left"><input class="form-control" name="level" id="level" value="" type="text" readonly="true"/></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Student Type:</label></td>
                            <td align="left"><input class="form-control" name="studentype" id="studentype" value="UNDERGRADUATE STUDENT" type="text" readonly="true"/></td>
                        <input class="form-control" id="academic_session" name="academic_session" value="2016/2017" type="hidden" readonly="true"/>
                        <input class="form-control" id="amtO" name="smitch" value="25000" type="hidden" readonly="true"/>
                        <tr>
                            <td align="right"><label class="control-label">Payer Email: <font color="red">*</font></label></td>
                            <td align="left"><input class="form-control"  name="payerEmail" value="" type="email"></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Payer Phone:</label></td>
                            <td align="left"><input class="form-control"  name="payerPhone" value="" type="text"></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Payment Item:</label></td>
                            <td><input class="form-control" title="Payment Item" id="paymentItem" name="paymentItem" value="New Female Hostel2(Main Campus)" type="text" readonly="true"/>
                            </td>
                        </tr>
                        <input class="form-control" id="itemcode" name="ItemCode" value="1052" type="hidden" readonly="true"/>
                        <tr>
                            <td align="right"><label class="control-label">Amount: <font color="red">*</font></label></td>
                            <td align="left">
                                <input class="form-control" id="amt" name="Amount" value="25000" type="text" readonly="true"/>
                            </td>
                        </tr>
                        <td align="right"><label class="control-label">Payment Type:</label></td>
                        <td><input class="form-control" id="itemname" value="New Female Hostel2(Main Campus)" name="itemname" type="hidden" readonly="true"/>
                            <select class="form-control" title="Credit Card Type" name="paymenttype" id="paymenttype">
                                <option value="">-- Select Payment Type --</option>
                                <option value="VERVE"> Verve Card</option>
                                <option value="VISA"> Visa</option>
                                <option value="MASTERCARD"> MasterCard</option>
                            </select>
                        </td>
                        <input class="form-control" id="servicetypeid" name="servicetypeid" value="1277348654" type="hidden" readonly="true"/>
                        <tr>
                            <td></td>
                            <td colspan="">
                                <div class="image"><?php echo $cap_img; ?>
                                    <a  style="background-color: transparent" href='#' class ='refresh'><img id = 'ref_symbol' src ="<?php echo base_url() . 'assets/images/refresh.png'; ?>" width="50px" height="50px"</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Captcha: <font color="red">*</font></label></td>
                            <td><input type="text" name="captcha" value="" size="40" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <button type="submit" class="btn btn-success btn-sm" name="submitButton" id="submit_enquiry">
                                    <span class="glyphicon glyphicon-cog"></span>
                                    <b>Pay via Remita</b></button>
                                <button type="reset" class="btn btn-success btn-sm" name="reset" id="reset">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                    <b>Reset</b></button>
                                <a href="<?php echo base_url(); ?>index.php/new/Exitc">
                                    <button type="button" class="btn btn-success glyphicon glyphicon-log-out"> <b>Exit</b></button>
                                </a>
                            </td>
                        </tr>
                    </table>
<?php echo form_close(); ?>
                </div>
            </div>

            <div class="col-sm-2 sidenav">
                <p>  </p>
            </div>
        </div>
    </div>
    <script>
        function payment(str) {
            var post_data = {"<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"};
            jQuery.ajax({type: "GET", data: post_data, url: "<?php echo base_url(); ?>" + "index.php/accadd/AccAdd/paymentItem?q=" + str,
                dataType: "json", success: function (res) {
                    if (res) {
                        document.getElementById("amt").value = res[0].ItemCost;
                        document.getElementById("amtO").value = res[0].ItemCost;
                        document.getElementById("itemcode").value = res[0].ItemCode;
                        document.getElementById("itemname").value = res[0].ItemName;
                    }
                }});
        }
        function ShowCandName(str) {
            var post_data = {"<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"};
            jQuery.ajax({type: "GET", data: post_data, url: "<?php echo base_url(); ?>" + "index.php/accadd/AccAdd/showCandName?q=" + str,
                dataType: "json", success: function (res) {
                    if (res) {
                        document.getElementById("payerName").value = res[0].NAME;
                        document.getElementById("Course").value = res[0].DEPARTMENT;
                        document.getElementById("faculty").value = res[0].FACULTY;
                        document.getElementById("dept").value = res[0].DEPARTMENT;
                        document.getElementById("level").value = res[0].LEVEL;
                    }
                }});
        }
    </script>