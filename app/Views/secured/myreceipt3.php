<?php

if (!isset($_SESSION["RegNumb"])) {
    redirect('Welcome', 'refresh');
}
?>
<title>Change of Admission</title>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php echo view('menu/studentmenuS'); ?></p>
            </div>

            <!-- main content -->
            <div class="col-sm-10 text-center">
                <legend>
                    <span class="glyphicon glyphicon-user"></span>
                    Welcome
                    <?php echo ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?>
                    <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")"; ?>
                </legend>
                <legend>Change of Admission</legend>
                <?php
                if (isset($_SESSION['text'])) {
                    echo "<font color='red'>" . $_SESSION['text'] . "</font><br/>";
                    //echo "<font color='red'><b>Your ACCOUNT HAS BEEN FROZEN</b></font>";
                }
                echo "<font color='red'><b>MAKE SURE YOU PAID FOR THE APPLICATION FORM!!!</b></font>";
                ?>
                <div class="table-responsive">
                    <?php
                    $attributes = array(
                        'id' => 'MyReceipt3', 'class' => 'form-horizontal', 'target' => '_blank',
                        'role' => 'form', 'name' => 'MyReceipt3');
                    echo form_open('secured/MyReceipt3', $attributes);
                    ?>
                    <div class="row">
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-2"><p><b>Regno</b></p></div>
                        <div class="col-sm-2"><p><b>ItemCode</b></p></div>
                        <div class="col-sm-1"><p><b>Amount</b></p></div>
                        <div class="col-sm-2"><p><b>RRR</b></p></div>
                        <div class="col-sm-2"><p><b>Payment type</b></p></div>
                        <div class="col-sm-1"><p><b>Status</b></p></div>
                        <div class="col-sm-2"><p><b></b></p></div>
                    </div>

                    <div class="row text-centers">
                        <?php
                        $sql1 = "SELECT * FROM paymentTrans WHERE ((status = '01') OR (status = '00'))"
                                . "AND((paymentTrans.Item_Code = '3002'))"
                                . "AND(paymentTrans.academic_session='" . ACADEMIC_SESSION . "')"
                                . "AND RegNumb = " . $_SESSION['RegNumb'];
                        $query = $this->db->query($sql1);
                        $vin = $query->row_array();
                        //var_dump($vin);
                        if (isset($vin)):
                            foreach ($query->result() as $row):
                                ?>
                                <div class="col-sm-2">
                                    <?= $row->RegNumb ?>
                                    <input align="centre" type="hidden" class="form-control" name="RegNumb" value="<?= $row->RegNumb ?>" size="18" required readonly/>
                                </div>
                                <div class="col-sm-2">
                                    <?= $row->Item_Code ?>
                                    <input align="centre" type="hidden" class="form-control" name="Item_Code" value="<?= $row->Item_Code ?>" size="18" required readonly/>
                                </div>

                                <div class="col-sm-1">
                                    <?= $row->Amount ?></div>
                                <div class="col-sm-2">
                                    <?= $row->RRR ?>
                                    <input align="centre" type="hidden" class="form-control" name="RRR" value="<?= $row->RRR ?>" required readonly/></div>
                                <div class="col-sm-2"><?= $row->payment_type ?></div>
                                <div class="col-sm-1"><?= $row->status ?></div>
                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-primary" id="statusButton" type="button">
                                        <img src="<?php echo base_url(); ?>assets/images/eye.png" width="16" height="16" />
                                        <b>Print Receipt</b>
                                    </button>
                                </div>
                            <?php endforeach ?>
                        <?php else: ?>

                            <div class="col-sm-12">
                                <?= "No record found " ?>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("button#statusButton").click(function () {
            $('form[name=MyReceipt3]').submit();
        });

    });
</script>