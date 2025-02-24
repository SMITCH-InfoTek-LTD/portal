<title>Course registration successful</title>
<?php


if (!isset($_SESSION['RegNumb'])) {
    redirect('Welcome', 'refresh');
}
?>
<style>
    input.form-control,select.form-control,textarea.form-control {
        width: auto;
    }
    <!--
    /* style the auto-complete response */
    li.ui-menu-item { font-size:12px !important; }
    -->
    .ui-autocomplete-loading {
        background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
    }
</style>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><?php echo view('menu/studentmenuS'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <fieldset title="database update was successful" style=" border-color:  whitesmoke">
                    <h1 style="color: green">Congratulations!!!! </h1>
                    <h3 style="color: black;font-style: italic"> update was successful!!!</h3>
                    <br/>
                    <p>
                    <h4>
                        <?php
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
                        print '<a href="' . base_url() . 'index.php/secured/Printregisteredcourses" class="btn btn-success btn-lg" role="button">Print Course Form</a>'
                        ?></h4>
                    </p>
                </fieldset><br />
            </div>
            <div class="col-sm-2 sidenav">
                <?php echo view('template/menu/sidenav'); ?>
            </div>
        </div>
    </div>
</body>  