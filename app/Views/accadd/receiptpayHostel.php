<?php

if (!isset($_SESSION["RegNumb"])) {
    redirect('/Newstudentc', 'refresh');
}
?>
<title>Candidate summary details</title>
<!-- main content -->
<div class="row content">
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
                );
                ?>
                <tbody>
<?php if (($_SESSION['status'] == '01') || ($_SESSION['status'] == '00')) { ?>
                        <tr><td colspan="2" align="center"><h2>Transaction Successful</h2></td></tr>
                        <tr><td align="right"><b>Candidate's name</b></td>
                            <td align="left"><b><?php echo ucwords($_SESSION['name']) . ' ('.$_SESSION['RegNumb'].')'; ?></b></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Faculty</b></td>
                            <td align="left"><b><?php echo $_SESSION['faculty']; ?></b></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Department</b></td>
                            <td align="left"><b><?php echo $_SESSION['dept']; ?></b></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Level</b></td>
                            <td align="left"><b><?php echo $_SESSION['level']; ?></b></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Remita Retrieval Reference(RRR): </b></td>
                            <td align="left"><?php echo $_SESSION['RRR']; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Date of payment:</b></td>
                            <td align="left"><?php echo $_SESSION['transactiontime']; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Amount paid: </b></td>
                            <td align="left"><?php echo $_SESSION['Amount']; ?></td>
                        </tr>
                    <tr>
                    <tr><td colspan="2"><b style="font-family: cursive;color: green;">Note:Please make sure you print out this receipt and keep it safe!!!</b></td></tr>
                    <tr>
                                    <td align="center" colspan="2">
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/accadd/PrintReceipt">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/b_pdfdoc.png" width="10" height="10" />
                                            </button><b>Print Receipt</b></a>
                                        <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>index.php/accadd/Exitc">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <img src="<?php echo base_url(); ?>assets/images/s_cancel.png" width="10" height="10" />
                                            </button><b>Exit</b></a>
                                    </td>
                                    </tr>
                 <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>