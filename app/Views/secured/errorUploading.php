<?php

?>
<!-- content -->
<body style="color:black;">
    <!-- content -->
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2">
                <p style="background-color: transparent">
                    <?php echo view('menu/studentmenuS'); ?>
                </p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <fieldset>
                    <legend>Upload Passport</legend>

                    <div id="columnMain">
                        <div class="clearfix">
                            <fieldset title="database update was not successful" style=" border-color:  whitesmoke">
                                <h1 style="color: green">There seems to be an issue with your update </h1>
                                <h3 style="color: black;font-style: italic">
                                    <?php
                                    echo $errorUploading;
                                    if (isset($_SESSION)) {
                                        session_destroy();
                                    }
                                    echo '<a href="' . base_url() . 'index.php/secured/Preadmissionloginc">continue</a>';
                                    ?>
                                </h3>
                            </fieldset><br />
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-sm-2 sidenav">
<?php echo view('template/menu/sidenav'); ?>
            </div>
        </div>
    </div>