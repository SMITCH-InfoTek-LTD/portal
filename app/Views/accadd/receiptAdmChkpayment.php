<?php

if (!isset($_SESSION["RegNumb"])) {
    redirect('/Newstudentc', 'refresh');
}
?>
<title>remita payment response</title>
<body>
    <div class="container-fluid text-center">
        <!-- main content -->
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php //echo anchor('/Newstudentc', 'Back to Dashboard'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <?php
                            $atts = array(
                                'width' => 900,
                                'height' => 700,
                                'scrollbars' => 'yes',
                                'status' => 'yes',
                                'resizable' => 'yes',
                                'screenx' => 0,
                                'screeny' => 0,
                                'class' => 'btn btn-success btn-lg glyphicon glyphicon-download-alt',
                                'role' => 'button',
                                'window_name' => '_blank'
                            );?>
                        <tbody>
                            <?php if ($_SESSION['status'] == '01' || $_SESSION['status'] == '00') { ?>
                                <tr><td colspan="2"><h2>Transaction Successful</h2></td></tr>
                                <tr><td align="right"><b>Payer's name</b></td>
                                    <td align="left"><b><?php echo ucwords($_SESSION['PayerName']); ?></b></td>
                                </tr>
                                <tr><td align="right"><b>Registration number</b></td>
                                    <td align="left"><b><?php echo $_SESSION['RegNumb']; ?></b></td>
                                </tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Date of payment:</b></td><td align="left"><?php echo $_SESSION['transactiontime'] ;?></td></tr>
                                <tr><td align="right"><b>Amount paid: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr>
                                    <td align="right">
                                        
                                        <?php echo anchor_popup('/new/Printpayreceiptadmchk', ' Print-receipt', $atts);?>
                                    </td>
                                    <td align="left">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <tr><td colspan="2"><b style="font-family: cursive;color: green;">Note:Please make sure you print your receipt and keep it safe!!!</b></td></tr>
                            <?php } else if ($_SESSION['status'] == '02') { ?>
                                <tr><td colspan="2"><h2>Transaction Failed</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '012') { ?>
                                <tr><td colspan="2"><h2>User Aborted Transaction</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                                <?php } else if ($_SESSION['status'] == '020') { ?>
                                <tr><td colspan="2"><h2>Invalid User Authentication</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                                <?php } else if ($_SESSION['status'] == '021') { ?>
                                <tr><td colspan="2"><h2>RRR Generated Successfully</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above, and proceed to the bank to pay cash</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                </tr>
                                <?php } else if ($_SESSION['status'] == '022') { ?>
                                <tr><td colspan="2"><h2>Invalid Request</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                                <?php } else if ($_SESSION['status'] == '023') { ?>
                                <tr><td colspan="2"><h2>Service Type or Merchant Does not Exist</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                                <?php } else if ($_SESSION['status'] == '025') { ?>
                                <tr><td colspan="2"><h2>Payment Reference Generated</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                                <?php } else if ($_SESSION['status'] == '029') { ?>
                                <tr><td colspan="2"><h2>Invalid Bank Code</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                                <?php } else if ($_SESSION['status'] == '030') { ?>
                                <tr><td colspan="2"><h2>Insufficient Balance</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                                <?php } else if ($_SESSION['status'] == '031') { ?>
                                <tr><td colspan="2"><h2>No Funding Account</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                                <?php } else if ($_SESSION['status'] == '032') { ?>
                                <tr><td colspan="2"><h2>Invalid Date Format</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                                <?php } else if ($_SESSION['status'] == '040') { ?>
                                <tr><td colspan="2"><h2>Initial Request OK</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $_SESSION['OrderId']; ?></td></tr>
                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $_SESSION['amount']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                                 <?php } else if ($_SESSION['status'] == '999') { ?>
                                <tr><td colspan="2"><h2>Unknown Error</h2></td></tr>
                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $_SESSION['RRR']; ?></td></tr>
                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $_SESSION['message']; ?></td></tr>
                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                                <?php } else { ?>
                                <tr><td colspan="2"><h2>Your Transaction was not Successful</h2></td></tr>
                                <?php if ($_SESSION['RRR'] != null) { ?>
                                    <tr><td colspan="2">Your Remita Retrieval Reference(RRR) is  <b><?php echo $_SESSION['RRR']; ?></b></td></tr>
                                <?php } ?> 
                                <tr><td><b>Reason: </b></td><td><?php echo $_SESSION['message']; ?></td></tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/new/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="15" height="15" />
                                            </button><b>Exit</b></a>
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