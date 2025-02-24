<?php

?>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php echo anchor('', 'Home'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">

                <h3><b>New Students</b></h3>
                <h4></h4>
                <br>

                <div class="row">
                    <div class="col-sm-6">
                        <span class="glyphicon glyphicon-search"></span>
                        <h4><?php
                            $atts = array(
                                'width' => 900,
                                'height' => 700,
                                'scrollbars' => 'yes',
                                'status' => 'yes',
                                'resizable' => 'yes',
                                'screenx' => 0,
                                'screeny' => 0,
                                'class' => 'btn btn-success',
                                'role' => 'button',
                                'window_name' => '_blank'
                            );
                            $_SESSION['studenttype'] = "NEW STUDENT";
                            print '<a href="' . base_url() . 'index.php/new/Checkadminstatus" class="btn btn-success" role="button">Check Admission status</a>'
                            ?></h4>
                        <small style="color: green">check admission status</small>
                    </div>
                    <div class="col-sm-6">
                        <span class="glyphicon glyphicon-search"></span>
                        <h4><?php
                            //echo anchor_popup('/new/AdminCheckPay', 'Pay Acceptance Fee', $atts);
                            print '<a href="' . base_url() . 'index.php/new/AdminCheckPay" class="btn btn-success" role="button">Pay Admission Notification Fee</a>'
                            ?></h4>
                        <small style="color: green">pay admission notification fee</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <span class="glyphicon glyphicon-print"></span>
                        <h4><?php
                            //echo anchor_popup('/new/PrintPrev', 'Print Admission Notification', $atts);
                            print '<a href="' . base_url() . 'index.php/new/PrintPrev" class="btn btn-success" role="button">Print Admission Notification</a>'
                            ?>
                        </h4>
                        <small style="color: green">print admission notification</small>
                    </div>
                    <div class="col-sm-6">
                        <span class="glyphicon glyphicon-download"></span>
                        <h4><?php
                            echo anchor_popup(base_url().'assets/files/NewStudentAdmissionPack.pdf','Download admission pack',$atts);
                            ?>
</h4>
                        <small style="color: green">download admission pack</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <span class="glyphicon glyphicon-edit"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/new/UpdateBiodata" class="btn btn-success" role="button">Complete bio-data form</a>' ?></h4>
                        <small style="color: green">complete bio-data form</small>
                    </div>
                    <div class="col-sm-6">
                        <span class="glyphicon glyphicon-search"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/new/GetPaymentStatus" class="btn btn-success" role="button">Get payment status</a>' ?></h4>
                        <small style="color: green">get payment status</small>
                    </div>
                </div>
 <div class="row">
                    <div class="col-sm-6">
                        <span class="glyphicon glyphicon-edit"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/new/ChangeOfAdmissionapplication" class="btn btn-success" role="button">Pay for Change of Admission(Application Form)</a>' ?></h4>
                        <small style="color: green">change of application form </small>
                    </div>
     <div class="col-sm-6">
                        <span class="glyphicon glyphicon-edit"></span>
                        <h4><?php print '<a href="' . base_url() . 'index.php/new/Prescreening" class="btn btn-success" role="button">Pay for Pre-screening Fee</a>' ?></h4>
                        <small style="color: green">pay for pre-screening fee </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p style="color:red;background-color: whitesmoke">
                        <marquee>
                            <h2>NOTICE!!! Proceed to bio-data update after screening.</h2>
                        </marquee>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 sidenav">
                <?php ?>
            </div>
        </div>
    </div>
