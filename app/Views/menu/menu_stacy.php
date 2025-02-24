    <div class="row navLeft" style="background-color: green">
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <?php
            /*
             * To change this template, choose Tools | Templates
             * and open the template in the editor.
             */
            if (isset($_SESSION['RegNumb'])) {                
                print '<li><a href="' . base_url() . 'index.php/secured/Logoutc" class="btn btn-success btn-lg active" role="button">Logout</a></li>';
            }
            ?>
      </ul>
    </div>