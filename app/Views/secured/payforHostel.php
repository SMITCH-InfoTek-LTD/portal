<?php

?>
<?php
if (!isset($_SESSION['RegNumb'])) {
    redirect('/Welcome', 'refresh');
}
 $vStatus = "BOOKED";
            $query = $this->db->get_where('allocations', array('regno' => $_SESSION['RegNumb'], 'status' => $vStatus));
            $row = $query->row(); //var_dump($_SESSION);die();
/*****/
            if ($query->num_rows() > 0) {
                //Booked Before
                $hostelname = $row->hostelname;
                $query1 = $this->db->get_where('hostels', array('hostelname' => $hostelname));
                $row2 = $query1->row();//var_dump($row2);
                $query3 = $this->db->get_where('paymentItems', array('ItemName' => $hostelname));
                $row3 = $query3->row();//var_dump($row3);die();
                //print_r($row3);
            }else{
                $msg = "Sorry. You Have NOT Booked A Hostel Yet!!!. You have to Book First!!! ";
                echo "<script type='text/javascript'>alert('$msg');</script>";
                redirect('secured/Updatestudenthostelinfoc', 'refresh');
            }
/***/
?>
<title>pay through remita now!!!</title>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <p><?php echo view('menu/studentmenuS'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-6 text-center">
                <legend>
                    <span class="glyphicon glyphicon-user"></span>
                    Welcome
                    <?php echo ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?>
                    <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")"; ?>

                </legend>

                <div class="table-responsive">
                    <?php
                    $attributes = array(
                        'id' => 'RemitaPaymentForm', 'class' => 'form-horizontal',
                        'role' => 'form', 'name' => 'RemitaPaymentForm');
                    echo form_open('secured/PayforHostel', $attributes);
                    ?>
                    <table border="0" cellpadding="0" cellspacing="0" class="table table-sm table-hover table-striped table-responsive">
                        <tr><legend><?php if(isset($_SESSION['paymsg'])){echo $_SESSION['paymsg'];}?></legend></tr>
                        <tr><legend><img src="<?php echo base_url(); ?>assets/images/remita-payment-logo-horizonal.png"/></legend></tr>
                    <tr>
                    <font color="red">
                         <?php echo validation_errors();?>
                        </font>
                    </tr>
                        <tr>
                            <td align="right"><label class="control-label">Payer Name:</label></td>
                            <td align="left"><input class="form-control" name="payerName" value="<?php echo ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?>" type="text" readonly="true"></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Faculty:</label></td>
                            <td align="left"><input class="form-control" name="faculty" id="faculty" value="<?php echo $_SESSION['FacAbrev']; ?>" type="text" readonly="true"/></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Course:</label></td>
                            <td align="left"><input class="form-control" name="Course" id="Course" value="<?php echo $_SESSION['CourseAbrev']; ?>" type="text" readonly="true"/></td>
                        </tr>
                        <tr>
                            <td align="right"><label class="control-label">Student Type:</label></td>
                            <td>
                                <input class="form-control" title="Student Type" name="studentype" id="studentype" value="RETURNING STUDENT" readonly="true">
                            </td>
                        <input class="form-control" id="academic_session" name="academic_session" value="2016/2017" type="hidden" readonly="true"/>
                        <input class="form-control" id="amtO" name="smitch" type="hidden" value="<?php echo $row2->rate;?>" readonly="true"/>
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
                            <td>
                                <input type="text" class="form-control" title="Payment Item" name="paymentItem" value="<?= $row2->hostelname;?>" readonly="true" />
                            </td>
                        </tr>
                        <input class="form-control" id="itemcode" name="ItemCode" value="<?= $row3->ItemCode;?>" type="hidden" readonly="true"/>
                        <tr>
                            <td align="right"><label class="control-label">Amount: <font color="red">*</font></label></td>
                            <td align="left">
                                <input class="form-control" id="amt" name="Amount" value="<?= $row2->rate;?>" type="text" readonly="true"/>
                            </td><input class="form-control" id="servicetypeid" name="servicetypeid" value="<?= $row2->serviceID;?>" type="hidden" readonly="true"/>
                        </tr>
                        <td align="right"><label class="control-label">Payment Type:</label></td>
                        <td>
                            <select class="form-control" title="Credit Card Type" name="paymenttype" id="paymenttype">
                                <option value="">-- Select Payment Type --</option>
                                <option value="VERVE"> Verve Card</option>
                                <option value="VISA"> Visa</option>
                                <option value="MASTERCARD"> MasterCard</option>
                            </select>
                        </td>
                        </tr>
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
                        <tr>
                            <td colspan="4">
                                <button type="submit" class="btn btn-success btn-sm" name="submitButton" id="submit_enquiry">
                                    <span class="glyphicon glyphicon-cog"></span>  <b>Pay via Remita</b></button>
                                <button type="reset" class="btn btn-success btn-sm" name="reset" id="reset">
                                    <span class="glyphicon glyphicon-refresh"></span> <b>Reset</b></button>
                            </td>
                        </tr>
                    </table>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <div class="col-sm-3 sidenav">
                <?php echo view('template/menu/sidenav'); unset($_SESSION['paymsg']);?>
            </div>
        </div>
    </div>
    <script>function payment(str){var post_data = {"<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"};
            jQuery.ajax({type: "GET", data: post_data, url: "<?php echo base_url(); ?>" + "index.php/secured/SecuredPayment/paymentItem?q=" + str, dataType: "json", success: function (res) {
                    if (res) {document.getElementById("amt").value = res[0].ItemCost;document.getElementById("amtO").value = res[0].ItemCost;document.getElementById("itemcode").value = res[0].ItemCode;}}});}</script>