<?php

?>
<?php
if (!isset($_SESSION['RegNumb'])) {
    redirect('/secured/Studentloginc', 'refresh');
}
?>
<title>
    remita payment
</title>
<body>
    <div class="container-fluid text-center col-sm-12">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php $this->load->view('menu/studentmenuS'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <legend>
                    <span class="glyphicon glyphicon-user"></span>
                    Welcome
                    <?php echo ucwords($_SESSION['PayerName']); ?>
                    <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")"; ?>
                </legend>
                <p>You will be redirected to Remita in few seconds.......</p>
                <form action="<?php echo GATEWAYURL; ?>" id="remita_form" name="remita_form" method="POST">
                    <input id="merchantId" name="merchantId" value="<?php echo MERCHANTID; ?>" type="hidden"/>
                    <input id="serviceTypeId" name="serviceTypeId" value="<?php echo $_SESSION['servicetypeid']; ?>" type="hidden"/>
                    <input id="amt" name="amt" value="<?php echo $_SESSION['Amount']; ?>" type="hidden"/>
                    <input id="responseurl" name="responseurl" value="<?php echo $_SESSION['ResponseUrl'] ?>" type="hidden"/>
                    <input id="hash" name="hash" value="<?php echo $_SESSION['Hash']; ?>" type="hidden"/>
                    <input id="payerName" name="payerName" value="<?php echo $_SESSION['PayerName']; ?>" type="hidden"/>
                    <input id="paymenttype" name="paymenttype" value="<?php echo $_SESSION['PaymentType']; ?>" type="hidden"/>
                    <input id="payerEmail" name="payerEmail" value="<?php echo $_SESSION['PayerEmail']; ?>" type="hidden"/>
                    <input id="payerPhone" name="payerPhone" value="<?php echo $_SESSION['PayerPhone']; ?>" type="hidden"/>
                    <input id="orderId" name="orderId" value="<?php echo $_SESSION['OrderID']; ?>" type="hidden"/>
                </form>
                <script type="text/javascript">document.getElementById("remita_form").submit();</script>
              </div> 
            <div class="col-sm-2 sidenav">
                <?php $this->load->view('template/menu/sidenav'); ?>
            </div>
        </div>
    </div>