<?php

if (!isset($_SESSION["RegNumb"])) {
    redirect("Welcome", "refresh");
}
?>
<title>remita payment</title>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><?php $this->load->view('menu/studentmenuS'); ?></p>
        </div>
        <!-- main content -->
        <div class="col-sm-8 text-center">
            <legend>
                    <span class="glyphicon glyphicon-user"></span>
                    Welcome
                    <?php echo ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?>
                    <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")"; ?>
                </legend>
            <div class="table-responsive">
                
            </div>
            </div>
        </div>

        <div class="col-sm-2 sidenav">
            <p>  </p>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("button#statusButton").click(function () {
            $('form[name=RemitaGetPayStatusForm1]').submit();
        });

    });
</script>