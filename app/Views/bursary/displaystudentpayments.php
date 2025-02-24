<?php

if (!isset($_SESSION["username"])) {
    redirect("/", "refresh");
}
?>
<title><?php echo $title; ?></title>
<script type="text/css">
    #pagination{
        margin: 40 40 0;
    }
    .input_text {
        display: inline;
        margin: 100px;
    }
    .input_name {
        display: inline;
        margin: 65px;
    }
    .input_email {
        display: inline;
        margin-left: 73px;
    }
    .input_num {
        display: inline;
        margin: 36px;
    }
    .input_country {
        display: inline;
        margin: 53px;
    }
    ul.tsc_pagination li a
    {
        border:solid 1px;
        border-radius:3px;
        -moz-border-radius:3px;
        -webkit-border-radius:3px;
        padding:6px 9px 6px 9px;
    }
    ul.tsc_pagination li
    {
        padding-bottom:1px;
    }
    ul.tsc_pagination li a:hover,
    ul.tsc_pagination li a.current
    {
        color:#FFFFFF;
        box-shadow:0px 1px #EDEDED;
        -moz-box-shadow:0px 1px #EDEDED;
        -webkit-box-shadow:0px 1px #EDEDED;
    }
    ul.tsc_pagination
    {
        margin:4px 0;
        padding:0px;
        height:100%;
        overflow:hidden;
        font:12px 'Tahoma';
        list-style-type:none;
    }
    ul.tsc_pagination li
    {
        float:left;
        margin:0px;
        padding:0px;
        margin-left:5px;
    }
    ul.tsc_pagination li a
    {
        color:black;
        display:block;
        text-decoration:none;
        padding:7px 10px 7px 10px;
    }
    ul.tsc_pagination li a img
    {
        border:none;
    }
    ul.tsc_pagination li a
    {
        color:#0A7EC5;
        border-color:#8DC5E6;
        background:#F8FCFF;
    }
    ul.tsc_pagination li a:hover,
    ul.tsc_pagination li a.current
    {
        text-shadow:0px 1px #388DBE;
        border-color:#3390CA;
        background:#58B0E7;
        background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
        background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
    }
</script>
</head>
<body>
<div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <?php $this->load->view('menu/menu'); ?>
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
                    <table border="1" class="table table-sm table-hover table-striped table-responsive">
                        <?php foreach ($vals as $data): ?>
                            <tr><td align="left">Regno </td><td align="left"><?= $data->RegNumb ?></td></tr>
                            <tr><td align="left">Student_type </td><td align="left"><?= $data->Student_type ?></td></tr>
                            <tr><td align="left">Item Code </td><td align="left"><?= $data->Item_Code ?></td></tr>
                            <tr><td align="left">Payment Type </td><td align="left"><?= $data->payment_type ?></td></tr>
                            <tr><td align="left">RRR </td><td align="left"><?= $data->RRR ?></td></tr>
                            <tr><td align="left">Amount </td><td align="left"><?= $data->Amount ?></td></tr>
                            <tr><td align="left">Transaction ID </td><td align="left"><?= $data->transID ?></td></tr>
                            <tr><td align="left">Transaction Time </td><td align="left"><?= $data->transactiontime ?></td></tr>
                            <tr><td align="left">Academic Session</td><td align="left"><?= $data->academic_session ?></td></tr>
                            <tr><td colspan="2">=========================================================================================</td></tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
                <div class="col-sm-2 sidenav">
                    <p>  </p>
                </div>
            </div>
        </div>
</body>