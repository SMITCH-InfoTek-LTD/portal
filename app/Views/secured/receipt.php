<?php

if (!isset($_SESSION["RegNumb"])) {
	redirect("Welcome", "refresh");
}
?>
<title>remita payment response</title>

<?php
if (isset($_SESSION["response"])) {
	$response = $_SESSION["response"];
	//echo $response['status'] ;
	//var_dump($response);die();
}
// else {
//redirect("secured/SecuredPayment", "refresh");
//}
?>
<body>
    <div class="container-fluid text-center">
        <!-- main content -->
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p>
                     <p><?php $this->load->view('menu/studentmenuS');?></p>
                </p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
<?php
$atts = array(
	'width'       => 900,
	'height'      => 700,
	'scrollbars'  => 'yes',
	'status'      => 'yes',
	'resizable'   => 'yes',
	'screenx'     => 0,
	'screeny'     => 0,
	'class'       => 'btn btn-success btn-lg glyphicon glyphicon-download-alt',
	'role'        => 'button',
	'window_name' => '_blank',
);?>
<tbody>
<?php if ($response['status'] == '01' || $response['status'] == '00') {?>
				                                <tr><td colspan="2"><h2>Transaction Successful</h2></td></tr>
				                                <tr><td align="right"><b>Payer's name</b></td>
				                                    <td align="left"><b><?php echo ucwords($_SESSION['PayerName']);?></b></td>
				                                </tr>
				                                <tr><td align="right"><b>Registration number</b></td>
				                                    <td align="left"><b><?php echo $_SESSION['RegNumb'];?></b></td>
				                                </tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Date of payment:</b></td><td align="left"><?php echo $response['transactiontime'];?></td></tr>
				                                <tr><td align="right"><b>Amount paid: </b></td><td align="left"><?php echo $response['amount'];?></td></tr>
				                                <tr>				                                    <td align="left">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
				                                </tr>
				                                <tr><td colspan="2"><b style="font-family: cursive;color: green;">Note:Please make sure you print your receipt and keep it safe!!!</b></td></tr>
	<?php } else if ($response['status'] == '02') {?>
				                                <tr><td colspan="2"><h2>Transaction Failed</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '012') {?>
				                                <tr><td colspan="2"><h2>User Aborted Transaction</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '020') {?>
				                                <tr><td colspan="2"><h2>Invalid User Authentication</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '021') {?>
				                                <tr><td colspan="2"><h2>RRR Generated Successfully</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above, and proceed to the bank to pay cash</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '022') {?>
				                                <tr><td colspan="2"><h2>Invalid Request</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '023') {?>
				                                <tr><td colspan="2"><h2>Service Type or Merchant Does not Exist</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                               <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '025') {?>
				                                <tr><td colspan="2"><h2>Payment Reference Generated</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '029') {?>
				                                <tr><td colspan="2"><h2>Invalid Bank Code</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '030') {?>
				                                <tr><td colspan="2"><h2>Insufficient Balance</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '031') {?>
				                                <tr><td colspan="2"><h2>No Funding Account</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '032') {?>
				                                <tr><td colspan="2"><h2>Invalid Date Format</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '040') {?>
				                                <tr><td colspan="2"><h2>Initial Request OK</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Transaction ReferenceID: </b></td><td align="left"><?php echo $response['orderId'];?></td></tr>
				                                <tr><td align="right"><b>Amount: </b></td><td align="left"><?php echo $response['amount'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else if ($response['status'] == '999') {?>
				                                <tr><td colspan="2"><h2>Unknown Error</h2></td></tr>
				                                <tr><td align="right"><b>Remita Retrieval Reference(RRR): </b></td><td align="left"><?php echo $response['RRR'];?></td></tr>
				                                <tr><td align="right"><b>Message</b></td><td align="left"><?php echo $response['message'];?></td></tr>
				                                <tr><td colspan="2"><h3>Kindly write down the details above</h3></td></tr>
				                                <tr>
				                                     <td align="center" colspan="2">
				                                        <a class="btn btn-success btn-lg" href="<?php echo base_url();?>index.php/secured/Mainstudentc">
				                                            <button type="submit" class="btn btn-success btn-sm">
				                                                <img src="<?php echo base_url();?>assets/images/s_cancel.png" width="15" height="15" />
				                                            </button><b>Close</b></a>
				                                    </td>
                                                                </tr>
	<?php } else {?>
	<tr><td colspan="2"><h2>Your Transaction was not Successful</h2></td></tr>
	<?php if ($response['RRR'] != null) {?>
								                                    <tr><td colspan="2">Your Remita Retrieval Reference(RRR) is  <b><?php echo $response['RRR'];?></b></td></tr>
		<?php }?>
				                                <tr><td><b>Reason: </b></td><td><?php echo $response['message'];?></td></tr>
	<?php }?>
</tbody>
                    </table>
                </div>

            </div>
            <div class="col-sm-2 sidenav">
<?php $this->load->view('template/menu/sidenav');?>
</div>
        </div>
    </div>
</body>
