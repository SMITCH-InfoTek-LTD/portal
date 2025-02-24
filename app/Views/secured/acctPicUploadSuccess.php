<?php

if (!isset($_SESSION['RegNumb'])) {
    redirect('Newstudentc', 'refresh');
}
?>
<body style="color:black;">
    <!-- content -->
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p></p>
            </div>
            <div class="col-sm-8">
                <div id="columnMainS">
                    <div class="clearfix">
                        <fieldset title="Biodata update was successful" style=" border-color:  whitesmoke">
                            <h1 style="color: green">Congratulations!!!</h1>
                            <h2 style="color: black;font-style: italic"> update was successful!!!
                            </h2>
                            <p>
                                You can now use your Registration as username and your newly created password <br/>
                            </p>
                            <p>
                                For your information login credentials are as follows:<br/>
                                Username : <?php echo $this->session->userdata('RegNumb') ?> <br/>
                                Password : <?php echo $this->session->userdata('cpwd') ?><br/>
                            </p>
                            <p>
                            <h4><?php print '<a href="' . base_url() . 'index.php/secured/Studentloginc" class="btn btn-success" role="button">return to main dashboard</a>' ?></h4>
                            </p>
                        </fieldset><br />
                    </div>
                </div></div>
            <!-- / content body -->

        </div>
    <div class="col-sm-2 sidenav">
        <?php ?>
    </div>
</div>
<?php
$this->session->sess_destroy();
