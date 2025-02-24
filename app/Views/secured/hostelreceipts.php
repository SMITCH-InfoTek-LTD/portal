<?php

if (!isset($_SESSION["RegNumb"])) {
    redirect('Welcome', 'refresh');
}
?>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php $this->load->view('menu/studentmenuS'); ?></p>
            </div>

            <!-- main content -->
            <div class="col-sm-10 text-center">
                <legend>
                    <span class="glyphicon glyphicon-user"></span>
                    Welcome
                    <?php echo ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?>
                    <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")"; ?>
                    <?php if(isset($_SESSION['paymsg'])){echo $_SESSION['paymsg'];}?>
                </legend>
                <div class="table-responsive">
                    <?php
                    $attributes = array(
                        'id' => 'RemitaGetPayStatusForm1', 'class' => 'form-horizontal',
                        'role' => 'form', 'name' => 'RemitaGetPayStatusForm1');
                    echo form_open('secured/HostelReceipts', $attributes);
                    ?>
                    <div class="row text-center">
                        <div class="col-sm-2"><p><b>Regno</b></p></div>
                        <div class="col-sm-2"><p><b>ItemCode</b></p></div>
                        <div class="col-sm-1"><p><b>Amount</b></p></div>
                        <div class="col-sm-2"><p><b>RRR</b></p></div>
                        <div class="col-sm-3"><p><b>Payment type</b></p></div>
                        <div class="col-sm-2"><p><b></b></p></div>
                    </div>

                    <div class="row text-centers">
                        <?php
                        
                        $sql = "SELECT * FROM paymentTrans WHERE ((status = '01') OR (status = '00'))"
                                ."AND((paymentTrans.Item_Code = '1046')||(paymentTrans.Item_Code = '1047')||(paymentTrans.Item_Code = '1048')||(paymentTrans.Item_Code = '1049')"
                                ."||(paymentTrans.Item_Code ='1050')||(paymentTrans.Item_Code ='1051')||(paymentTrans.Item_Code ='1052'))"
                                ."AND (paymentTrans.academic_session='" . ACADEMIC_SESSION . "')"
                                ."AND RegNumb = " .$_SESSION['RegNumb'];
                        $query  = $this->db->query($sql);
                        if ($query->num_rows() > 0):  
                        $row    = $query->row();
                        $_SESSION['receiptno'] = $row->transID;$_SESSION['paymentDate'] = $row->transactiontime;
                        $_SESSION['amount'] = $row->Amount;$_SESSION['RRR']=$row->RRR;                  
if(isset($_SESSION['receiptno'])):
                        foreach ($query->result() as $row):
                            ?>
                            <div class="col-sm-2">
                                <?= $row->RegNumb ?>
                                <input type="hidden" class="form-control" name="RegNumb" value="<?= $row->RegNumb ?>" />
                            </div>
                        <div class="col-sm-2">
                                <?= $row->Item_Code ?>
                                <input type="hidden" class="form-control" name="Item_Code" value="<?= $row->Item_Code ?>" />
                            </div>

                            <div class="col-sm-1">
                                <?= $row->Amount ?></div>
                            <div class="col-sm-2">
                                <?= $row->RRR ?>
                                <input type="hidden" class="form-control" name="RRR" value="<?= $row->RRR ?>" /></div>
                            <div class="col-sm-3"><?= $row->payment_type ?></div>
                            <div class="col-sm-2">
                                <button class="btn btn-sm btn-primary" id="statusButton" type="button">
                                    <img src="<?php echo base_url(); ?>assets/images/eye.png" width="16" height="16" />
                                    <b>Print Receipt</b>
                                </button>
                            </div>
                        <?php endforeach; ?>
                        <?php endif ;?>
<?php else: ?>
<div class="col-sm-12 text-center">
<label>You have NOT paid for hostel!!!</label>
</div>
<?php endif ;?>

                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(function () {
        $("button#statusButton").click(function () {
            $('form[name=RemitaGetPayStatusForm1]').submit();
        });

    });
</script>