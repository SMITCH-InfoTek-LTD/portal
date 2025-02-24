<title>welcome to secured page</title>
<?php
if (!isset($_SESSION['username'])) {
    redirect('/Welcome', 'refresh');
}
?>
<body style="color:black;">
    <div class="container-fluid text-center">
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
                <h3 style="color:green"><span class="glyphicon glyphicon-cog">My Services</span></h3>
                <br>

                <div class="row">
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/bursary/QueryFailedTransactions" class="btn btn-success" role="button">View failed transactions</a>' ?></h4>
                        <p>view failed transaction</p>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="" class="btn btn-success" role="button">Get Payment Status via OrderID</a>' ?></h4>
                        <p>get payment status via OrderID</p>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/bursary/GetPaymentStatusRRR" class="btn btn-success" role="button">Get Payment Status via RRR</a>' ?></h4>
                        <p>get payment status via RRR</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/bursary/QueryPaidTransactions" class="btn btn-success" role="button">Query Paid Transaction</a>' ?></h4>
                        <p>view paid transaction</p>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/bursary/Searchcandidatec" class="btn btn-success" role="button">Search Student Fees</a>' ?></h4>
                        <p>search student fees</p>
                    </div>
                   <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/bursary/Export2Excel" class="btn btn-success" role="button">Export to Excel</a>' ?></h4>
                        <p>export to excel</p>
                    </div>  
</div>
            <div class="col-sm-2 sidenav">
                <?php ?>
            </div>
        </div>
    </div>
