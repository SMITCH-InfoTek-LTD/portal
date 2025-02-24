<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('/Newstudentc', 'refresh');
}
?>

<body>

<div class="row content">
    <!-- main content -->
    <p style="text-align:center;">
        <img src="<?php echo base_url(); ?>assets/images/logo.jpg" style="width:70px; height:70px;" />
    <h3 align="center">UNIVERSITY OF ABUJA</h3>
    <h4 align="center">ACADEMIC PLANNING UNIT</h4>
</p>
</div>
<div class="panel-body col-sm-12">
    <p style="text-align:right; padding-top:5mm;text-decoration: underline;">
        Form 02
    </p>
    <div class="row" style="text-align:justify">
        This is to certify that <b> <?php echo $_SESSION['CandName']; ?></b>  has been screened
            and cleared.<br/> He/She has been admitted to read <b> <?php echo $_SESSION['Course']; ?></b>
            in the <b> <?php echo $_SESSION['Faculty']; ?></b> Please, issue him/her
            Original Offer of Provisional Admission Letter accordingly.<br/><br/>
            For Office use:<br/><br/>
            Approved <img src="<?php echo base_url(); ?>assets/images/background.png" style="width:10px; height:10px;" />

            /<img src="<?php echo base_url(); ?>assets/images/background.png" style="width:10px; height:10px;" />Not approved<input type="checkbox"/>
    </div>
<div class="container">
            <div class="row">
                <div class="col-sm-4 text-center">
                <p style="text-align:center;">
                    <br/>
                    <b>DR. ISHAYA M. DAGWA<br/>
                    DIRECTOR, ACADEMIC PLANNING</b>
                 </p>
                </div>
                <div class="col-sm-4 text-center">
                <p style="text-align:center;">
                    <br/>
                    ________________________<br/>
                    Officer Stamp & Signature
                    </p>
                </div>
                <div class="col-sm-4 text-center">
                <p style="text-align:center;">
                    <br/>
                    ________________________<br/>
                    Date
                </p>
                </div>
            </div>
</div>
    </div>
</div>
</body>