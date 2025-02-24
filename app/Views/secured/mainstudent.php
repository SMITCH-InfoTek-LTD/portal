<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
if (!isset($_SESSION['RegNumb'])) {
    redirect('/secured/Studentloginc', 'refresh');
}
if(isset($_SESSION['RegNumb'])&&($_SESSION["StatChange"]=="F")) {
    redirect('secured/SecuredPayment', 'refresh');
}
?>
<body style="color:black;">
    <div class="container-fluid text-center" id="m">
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
                    <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")";?>
                </legend>
                <h3 style="color:green"><span class="glyphicon glyphicon-cog">My Services</span></h3>
                <?php 
                	if(isset($_SESSION['text'])){
                		echo "<font color='red'>".$_SESSION['text']."</font><br/>";
                		//echo "<font color='red'><b>Your ACCOUNT HAS BEEN FROZEN</b></font>";
                        }
echo "<font color='red'><b>MAKE SURE YOU BOOKED FOR AN HOSTEL BEFORE PAYING!!!<br/>IF YOU PAY WITHOUT BOOKING FOR HOSTEL YOU ARE ON YOUR OWN!!! BE WARNED!!!</b></font>";
                ?>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-edit"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/Showstudentinfoc" class="btn btn-success" role="button">Print Profile</a>'?></h4>
                        <p>view your profile</p>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-edit"></span>
                        <h4><a href="" class="btn btn-success" role="button">Change Password</a></h4>
                        <p>change password</p>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-picture"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/Uploadpicc" class="btn btn-success" role="button">Upload Passport</a>'?></h4>
                        <p>upload my passport</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-education"></span>
                        <h4><a href="" class="btn btn-success" role="button">My Results</a></h4>
                        <p>view my results</p>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-record"></span>
                         <h4><?php print '<a href="' . base_url() . 'index.php/secured/Printregisteredcourses" class="btn btn-success" role="button">My Registered Courses</a>'?></h4>
                        <p>my registered courses</p>
                    </div>
                      <div class="col-sm-4">
                        <span class="glyphicon glyphicon-education"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/PrintExamCard" class="btn btn-success" role="button">Exam Slip</a>'?></h4>
                        <p>print exam slip</p>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/Updatestudenthostelinfoc" class="btn btn-success" role="button">Hostel allocation</a>'?></h4>
                        <p>hostel allocation</p>
                    </div>
                        <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/PayforHostel" class="btn btn-success" role="button">Pay For Hostel</a>'?></h4>
                        <p></p>
                    </div>
<div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/HostelReceipts" class="btn btn-success" role="button">Print Hostel receipts</a>' ?></h4>
                        <p>print hostel receipts</p>
                    </div>
                </div>
                <div class="row">
          
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/GetPaymentStatus" class="btn btn-success" role="button">Get Payment Status(RRR)</a>'?></h4>
                        <p>get payment status use your RRR </p>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/SecuredPayment" class="btn btn-success" role="button">Make Payment</a>'?></h4>
                        <p>make payment</p>
                    </div>
<div class="col-sm-4">
                        <span class="glyphicon glyphicon-education"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/MyReceipt" class="btn btn-success" role="button">Print receipt(School Fees)</a>'?></h4>
                        <p>print receipts</p>
                    </div>
                </div>

<div class="row">
<div class="col-sm-4">
                        <span class="glyphicon glyphicon-education"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/MyReceipt2" class="btn btn-success" role="button">Print receipt</a>'?></h4>
                        <p>Change of admission application</p>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/MyReceipt3" class="btn btn-success" role="button">Print receipt<br/>(Change of admission)</a>'?></h4>
                        <p>change of admission </p>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-cog"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/MyReceipt4" class="btn btn-success" role="button">Print receipt<br/>(Change of Institution)</a>'?></h4>
                        <p>change of institution</p>
                    </div>
                </div>
<div class="row">
    <div class="col-sm-6">
                        <span class="glyphicon glyphicon-education"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/MyReceipt6" class="btn btn-success" role="button">Print receipt(Prescreening Fees)</a>'?></h4>
                        <p>Prescreening Fees</p>
</div>
<div class="col-sm-6">
                        <span class="glyphicon glyphicon-education"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/secured/MyReceipt5" class="btn btn-success" role="button">Print receipt(School Fees Shortfall)</a>'?></h4>
                        <p>School Fees Shortfall</p>
</div>
</div>
            </div>


            <div class="col-sm-2 sidenav">
                <?php $this->load->view('template/menu/sidenav'); ?>
            </div>
        </div>
    </div>
    