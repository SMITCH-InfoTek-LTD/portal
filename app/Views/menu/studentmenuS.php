<?php 
//if(isset($_SESSION["StatChange"])&&($_SESSION["StatChange"]=='F')):
?>
  <script type="text/javascript">
  /****
    $(document).ready(function(){
        $("body").find("*").attr("disabled", "disabled");
        $('body').prop('disabled',true);
        $("body").find("*").click(function (e) { e.preventDefault(); });
    });
    ****/
</script>
<?php //endif; ?>
    <div class="row navLeft" style="background-color: green">
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <?php
            /*
             * To change this template, choose Tools | Templates
             * and open the template in the editor.
             */
            if (isset($_SESSION['RegNumb'])) {
                
                print '<li><a href="' . base_url() . 'index.php/secured/Mainstudentc" class="btn btn-success btn-lg active" role="button">Home page</a></li>';                
                print '<li><a href="' . base_url() . 'index.php/secured/Updatestudentinfoc" class="btn btn-success btn-lg active" role="button">Update Profile</a></li>';
                print '<li><a href="' . base_url() . 'index.php/secured/Displaystudentreginfoc" class="btn btn-success btn-lg active" role="button">Course Registration</a></li>';
                print '<li><a href="' . base_url() . 'index.php/secured/Printregisteredcourses" class="btn btn-success btn-lg active" role="button">Print Course form</a></li>';
                print '<li><a href="' . base_url() . 'index.php/secured/Mainstudentc" class="btn btn-success btn-lg active" role="button">Add/Drop courses</a></li>';
                print '<li><a href="' . base_url() . 'index.php/secured/Mainstudentc" class="btn btn-success btn-lg active" role="button">Check results</a></li>';
                print '<li><a href="' . base_url() . 'index.php/secured/MyReceipt" class="btn btn-success btn-lg active" role="button">Print receipt</a></li>';
                print '<li><a href="' . base_url() . 'index.php/secured/Mainstudentc" class="btn btn-success btn-lg active" role="button">Upload credential</a></li>';
                print '<li><a href="' . base_url() . 'index.php/secured/Logoutc" class="btn btn-success btn-lg active" role="button">Logout</a></li>';
                print '<li class="btn btn-success btn-lg" role="button"></li>';
                print '<li class="btn btn-success btn-lg" role="button"></li>';
                print '<li class="btn btn-success btn-lg" role="button"></li>';
            }
            ?>
      </ul>
    </div>
