<?php

if (!isset($_SESSION["RegNumb"])) {
    redirect("Welcome", "refresh");
}
?>
<title><?php echo $title; ?>
</title>
<?php
if (isset($_SESSION["response"])) {
    $response = $_SESSION["response"];
} else {
    redirect("secured/SecuredPayment", "refresh");
}
?>
<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2">
                <p style="background-color: transparent">
                    <?php $this->load->view('menu/studentmenuS'); ?>
                </p>
            </div>
            <div class="col-sm-8 text-center">
                <div class="row pad-top-botm ">
                    <div class="col-lg-8 col-md-8 col-sm-8" align="center">
                        <h1><strong>University of Abuja</strong></h1>
                        <i>P.M.B 117,</i><br/>
                        <h4><i>Abuja, Nigeria</i></h4><br/>
                    </div>
                </div>
                <div class="row pad-top-botm ">
                    <div class="col-lg-3 col-md-3 col-sm-3" align="left">
                        <strong>Vice Chancellor,<br/></strong>
                        <br />Professor Michael 
                        <br/>
                        <i>Main Campus,Airport Road,</i>
                        <br />
                        <i>FCT - Abuja</i><br/>
                        <i>Nigeria.</i><br/>
                        <strong>Email : </strong><i>bursary@uniabuja.edu.ng</i>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 " align="center">
                        <img src="<?php echo base_url(); ?>assets/images/logo.png" style="width:100px; height:100px" />
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3" align="left">
                        <strong>University of Abuja<br/>Office Bursar</strong>
                        <br />Bursary Department
                        <br/>
                        <i>Main Campus,Airport Road,</i>
                        <br />
                        <i>FCT - Abuja</i><br/>
                        <i>Nigeria.</i><br/>
                        <strong>Email : </strong><i>bursary@uniabuja.edu.ng</i>
                    </div>
                </div>
                <div  class="row pad-top-botm client-info">
                    <div class="col-lg-4 col-md-4 col-sm-4" align="left">
                        <h4>  <strong>Candidate's Information</strong></h4>
                        <strong><?php echo ucwords($_SESSION['PayerName']); ?></strong>
                        <br />
                        <b>Reg number:</b> <?php echo $_SESSION['RegNumb']; ?>
                        <br/>
                        <b>Faculty   :</b> <?php echo $_SESSION['faculty']; ?>
                        <br/>
                        <b>Department:</b> <?php echo $_SESSION['CourseAbrev']; ?>
                        <br/>
                        <b>Course    :</b> <?php echo $_SESSION['Course']; ?>
                        <br/>
                        <b>Level     :</b> <?php echo $_SESSION['Student_type']; ?>
                        <br/>
                        <b>Session   :</b> <?php echo $_SESSION['academic_session']; ?>
                        <br/>
                        <b>Email     :</b> <?php ?><br/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4" align="right">
                        <h4 align="right">  <b>Payment Details </b></h4>
                        <b>Remita Retrieval Reference(RRR) :  <?php echo $response['RRR']; ?></b>
                        <br />
                        <b>Payment Status :  <?php echo $response['message']; ?> </b>
                        <br />
                        Amount paid :  <?php echo $response['amount']; ?>
                        <br />
                        Payment Date : <?php echo $response['transactiontime']; ?>
                        <br/>
                        Transaction ReferenceID : <?php echo $response['orderId']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Particulars</th>
                                        <th>Amount</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $_SESSION['PaymentItem']; ?></td>
                                        <td><?php echo $response['amount']; ?></td>
                                        <td><?php echo $response['amount']; ?></td>
                                    </tr>                 
                                </tbody>
                            </table>
                        </div>
                        <hr />
                        <div class="ttl-amts">
                            <h5>  Total Amount : <?php echo $response['amount']; ?> </h5>
                        </div>
                        <hr />
                        <div class="ttl-amts">
                            <h4> <strong>Bursar signature</strong> </h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <strong> Important: </strong>
                        <ol>
                            <li><b style="font-family: cursive;color: red;">Do NOT alter this receipt, ANY ALTERATION RENDERS IT INVALID</b></li>
                            <li><b style="font-family: cursive;color: green;">Please make sure you print your receipt and keep it safe!!!</b></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 sidenav">
                <?php $this->load->view('template/menu/sidenav'); ?>
            </div>
        </div>
    </div>
</body>