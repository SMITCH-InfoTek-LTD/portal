  <div class="row navLeft" style="background-color: green">
        <ul class="nav nav-pills nav-stacked" role="tablist">
    
        <?php
        if (isset($_SESSION['roleid']) == "2") {
                print '<li><a href="' . base_url() . 'index.php/bursary/Mainbursarystaffc" class="btn btn-success btn-lg active" role="button">Home page</a></li>';                
                print '<li><a href="' . base_url() . 'index.php/bursary/Logoutc" class="btn btn-success btn-lg active" role="button">Logout</a></li>';
        } 
        ?>
    </ul>
</div> 