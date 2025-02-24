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
    redirect("burasry/GetPaymentStatus", "refresh");
}
?>

<body>
    <div class="container-fluid text-center">
        <!-- main content -->
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <?php echo view('menu/menu'); ?>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                 <legend>
                <span class="glyphicon glyphicon-user"></span>
                Welcome
                <?php echo ucwords($_SESSION['fname'] . ' ' . $_SESSION['surname']); ?>
                <?php echo "(Username  :" . $_SESSION['username'] . ")"; ?>
            </legend>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <?php if ($response['status'] == '01' || $response['status'] == '00') { ?>
                                <tr><td colspan="2"><h2>Transaction Successful</h2></td></tr>                               
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Date of payment:</b></td><td align="left"><?php echo $response['transactiontime'] ;?></td></tr>
                                <tr><td align="right"><b>Amount paid: </b></td><td align="left"><?php echo $response['amount']; ?></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <tr><td colspan="2"><b style="font-family: cursive;color: green;">Note:Please make sure you print your receipt and keep it safe!!!</b></td></tr>
                            <?php } else if ($response['status'] == '02') { ?>
                                <tr><td colspan="2"><h2>Transaction Failed</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                 <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($response['status'] == '012') { ?>
                                <tr><td colspan="2"><h2>User Aborted Transaction</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                 <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($response['status'] == '020') { ?>
                                <tr><td colspan="2"><h2>Invalid User Authentication</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                 <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($response['status'] == '021') { ?>
                                <tr><td colspan="2"><h2>Transaction still pending</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3></h3></td></tr>
                                 <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($response['status'] == '022') { ?>
                                <tr><td colspan="2"><h2>Invalid Request</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                 <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($response['status'] == '023') { ?>
                                <tr><td colspan="2"><h2>Service Type or Merchant Does not Exist</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($response['status'] == '025') { ?>
                                <tr><td colspan="2"><h2>Payment Reference Generated</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Transaction in progress</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($response['status'] == '029') { ?>
                                <tr><td colspan="2"><h2>Invalid Bank Code</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($response['status'] == '030') { ?>
                                <tr><td colspan="2"><h2>Insufficient Balance</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                 <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($response['status'] == '031') { ?>
                                <tr><td colspan="2"><h2>No Funding Account</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                 <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($response['status'] == '032') { ?>
                                <tr><td colspan="2"><h2>Invalid Date Format</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                 <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($response['status'] == '040') { ?>
                                <tr><td colspan="2"><h2>Initial Request OK</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                 <?php } else if ($response['status'] == '999') { ?>
                                <tr><td colspan="2"><h2>Unknown Error</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference: </b></td><td align="left"><?php echo $response['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                 <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/bursary/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else { ?>
                                <tr><td colspan="2"><h2>Your Transaction was not Successful</h2></td></tr>
                                <?php if ($response['RRR'] != null) { ?>
                                    <tr><td colspan="2">Your Remita Retrieval Reference is  <b><?php echo $response['RRR']; ?></b></td></tr>
                                <?php } ?> 
                                <tr><td><b>Reason: </b></td><td><?php echo $response['message']; ?></td></tr>
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