<?php  ?>
<style>
    /*
 * Start Bootstrap - Business Frontpage (http://startbootstrap.com/)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */

body {
    padding-top: 50px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
}


/* Customize the text color and shadow color and to optimize text legibility. */

.tagline {
    text-shadow: 0 0 10px #000;
    color: #fff;
}

.img-center {
    margin: 0 auto;
}

footer {
    margin: 50px 0;
} 
</style>
<body>
    <div class="container-fluid">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            
        </div>
        <!-- /.container -->
    </nav>

    <!-- Image Background Page Header -->
    <!-- Note: The background image is set within the business-casual.css file. -->

    <!-- Page Content -->
    <div class="container">

        <hr>
        <!-- /.row -->

        <hr>

        <div class="row">
            <div class="col-sm-4 text-center">
                <img class="img-circle img-responsive img-center" src="<?php echo base_url(); ?>assets/images/logo2.png" alt="" />
            <h2><?php print '<a href="' . base_url() . 'index.php/bursary/Loginc" class="btn  btn-success" role="button">Bursary Department</a>' ?></h2>
            </div>
            <div class="col-sm-4 text-center">
                <img class="img-circle img-responsive img-center" src="<?php echo base_url(); ?>assets/images/convoc.png" alt="" />
                <h2><?php print '<a href="' . base_url() . 'index.php" class="btn  btn-success" role="button">Academic Planning Unit</a>'?></h2>
            </div>
            <div class="col-sm-4 text-center">
                <img class="img-circle img-responsive img-center" src="<?php echo base_url(); ?>assets/images/convoc.png" alt="" />
                <h2><?php print '<a href="' . base_url() . 'index.php" class="btn  btn-success" role="button">Registry</a>'?></h2>
            </div>
        </div>
                <div class="row">
            <div class="col-sm-4 text-center">
                <img class="img-circle img-responsive img-center" src="<?php echo base_url(); ?>assets/images/logo2.png" alt="" />
                <h2><?php print '<a href="' . base_url() . 'index.php/admin/Loginc" class="btn  btn-success" role="button">ICT Staff</a>' ?></h2>
            </div>
            <div class="col-sm-4 text-center">
                <img class="img-circle img-responsive img-center" src="<?php echo base_url(); ?>assets/images/stud1.jpg" alt="" />
                <h2><?php print '<a href="' . base_url() . 'index.php" class="btn  btn-success" role="button">Remedial Studies</a>'?></h2>
            </div>
            <div class="col-sm-4 text-center">
                <img class="img-circle img-responsive img-center" src="<?php echo base_url(); ?>assets/images/stud2.jpg" alt="" />
                <h2></h2>
            </div>
        </div>
        <!-- /.row -->

        <hr>

    </div>
  </div>
</body>
