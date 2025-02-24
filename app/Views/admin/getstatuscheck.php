<?php

if (!isset($_SESSION["username"])) {
    redirect("/", "refresh");
}
?>
<title>remita payment</title>
<?php
if (isset($_SESSION["response"])) {
    $response = $_SESSION["response"];
} else {
    redirect("admin/GetPaymentStatus", "refresh");
}
?>

<body>
    <div class="container-fluid text-center">
        <!-- main content -->
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <?php $this->load->view('menu/menu'); ?>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <?php if ($_SESSION['status'] == '01' || $_SESSION['status'] == '00') { ?>
                                <tr><td colspan="2"><h2>Transaction Successful</h2></td></tr>                               
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Date of payment:</b></td><td align="left"><?php echo $_SESSION['transactiontime'] ;?></td></tr>
                                <tr><td align="right"><b>Amount paid: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <tr><td colspan="2"><b style="font-family: cursive;color: green;">Note:Please make sure you print your receipt and keep it safe!!!</b></td></tr>
                            <?php } else if ($_SESSION['status'] == '02') { ?>
                                <tr><td colspan="2"><h2>Transaction Failed</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                               <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '012') { ?>
                                <tr><td colspan="2"><h2>User Aborted Transaction</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '020') { ?>
                                <tr><td colspan="2"><h2>Invalid User Authentication</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/Exitc ">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                <?php } else if ($_SESSION['status'] == '021') { ?>
                                <tr><td colspan="2"><h2>Transaction still pending</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3></h3></td></tr>
                               <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '022') { ?>
                                <tr><td colspan="2"><h2>Invalid Request</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '023') { ?>
                                <tr><td colspan="2"><h2>Service Type or Merchant Does not Exist</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                               <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '025') { ?>
                                <tr><td colspan="2"><h2>Payment Reference Generated</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Transaction in progress</h3></td></tr>
                               <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '029') { ?>
                                <tr><td colspan="2"><h2>Invalid Bank Code</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                               <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '030') { ?>
                                <tr><td colspan="2"><h2>Insufficient Balance</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                               <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '031') { ?>
                                <tr><td colspan="2"><h2>No Funding Account</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '032') { ?>
                                <tr><td colspan="2"><h2>Invalid Date Format</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                               <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '040') { ?>
                                <tr><td colspan="2"><h2>Initial Request OK</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                              <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                 <?php } else if ($_SESSION['status'] == '999') { ?>
                                <tr><td colspan="2"><h2>Unknown Error</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                               <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                                <?php } else { ?>
                                <tr><td colspan="2"><h2>Your Transaction was not Successful</h2></td></tr>
                                <?php if ($_SESSION['RRR'] != null) { ?>
                                    <tr><td colspan="2">Your Remita Retrieval Reference is  <b><?php echo $_SESSION['RRR']; ?></b></td></tr>
                                <?php } ?> 
                                <tr><td><b>Reason: </b></td><td><?php echo $_SESSION['message']; ?></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/admin/GetPaymentStatus">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Next payment verification</b></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-sm-2 sidenav">

            </div>
        </div>
    </div>
</body>