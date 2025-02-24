<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('/Newstudentc', 'refresh');
}
?>

<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <!-- main content -->
            <p style="text-align:center; font-weight:bold">
                <img src="<?php echo base_url(); ?>assets/images/logo.jpg" style="width:70px; height:70px;" />
            <h3 align="center">UNIVERVERSITY OF ABUJA</h3>
            <h4 align="center">Management Information System</h4>
            </p>
            <div class="panel-body">
                <div style="text-align: justify">
                    No.: .....................
                    WEB-PORTAL USER’S APPLICATION FORM<br/>
                    USER’S ACCOUNT DETAILS:<br/>
                    Surname ___________________________ Other Names_________________________<br/>
                    Matric Number______________________<br/>
                    Faculty________________________________<br/>
                    Department___________________________________<br/>
                    Level __________________ Programme of Study: ____________________________<br/>
                    Phone number (Mobile only)__________________________________<br/>
                    E-mail_________________________________<br/>
                    <br/>
                    <b>Memorandum of Understanding</b><br/>
                    I shall keep my Password safely under my control and custody. I undertook and sealed that my
                    Personal Password shall not be revealed to third party. The University Systems Administrator shall
                    not be liable for impersonation, loss or damage I may suffer as a result of inability or failure to
                    protect my password. By this memorandum of understanding, I hereby declared that all
                    information including scanned Signature and Passport photograph supplied on the University Portal
                    are correct, valid and genuine, if found contrary, the law shall take its course against me.
                    I hereby do agree with the terms and conditions herein and as stated in the University Portal.
                    
                    <br/>

                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <br/>
                            <img src="<?php echo base_url(); ?>assets/images/rotimi.jpg" style="width:80px; height:40px;" /><br/>
                            Signature and date<br/>
                            Onakoya, J. R. (Witness)<br/>
                            The University Systems Administrator<br/>
                        </div>
                        <div class="col-sm-4 text-center">
                            <br/>
                            ________________________<br/>
                            Officer Stamp & Signature
                        </div>
                        <div class="col-sm-4 text-center">
                            <br/>
                            ________________________<br/>
                            Date
                        </div>
                    </div>
                    * Submit this form along with other documents in your file.
                </div>
            </div>
            <?php
            session_destroy();
            