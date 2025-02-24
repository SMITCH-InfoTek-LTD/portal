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
                <p>
                    <?php
                    echo view('menu/studentmenuS');
                    ?>
                </p>
            </div>
            <div class="col-sm-8">
                <div id="columnMainS">
                    <div class="clearfix">
                        <fieldset title="Biodata update was successful" style=" border-color:  whitesmoke">
                            <h1 style="color: green">Congratulations!!!</h1>
                            <h2 style="color: black;font-style: italic"> update was successful!!!
                            </h2>
                            <h4><p style="color: red">
                                NOTE: For every receipt print your passport photograph must be embossed!!!<br/>
                            </p>
                            </h4>

                        </fieldset><br />
                    </div>
                </div></div>
            <!-- / content body -->
        <div class="col-sm-2 sidenav">
            <?php echo view('template/menu/sidenav'); ?>
        </div>
    </div>
    </div>
