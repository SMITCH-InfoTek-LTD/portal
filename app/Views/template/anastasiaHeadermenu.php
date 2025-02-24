<?php  ?>
<div class="imgHeader">
    <a href="https://wwww.uniabuja.edu.ng">
        <img src="<?php echo base_url(); ?>assets/images/header.png" alt="logo" class="img-responsive"/>
    </a>
</div>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <p class="navT">University of Abuja Portal Gateway</p>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar" >
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="https://www.uniabuja.edu.ng">Main site</a></li>
                <li><a href="#">CDL & CE</a></li>
                    <li class="">
                        <a href="https://ioe.uniabuja.edu.ng">Institute of Education</a>
                    </li>
                    <li class="">
                        <a href="https://rems.uniabuja.edu.ng">Remedial</a>
                    </li>
                    <li class="">
                        <?php print '<a href="' . base_url() . 'index.php/AWelcomec">Admin Only</a>'?>
                    </li>
            </ul>
        </div>
    </div>
</nav>