<?php  ?>
<title>welcome to secured page</title>
<?php
if (!isset($_SESSION['username'])) {
    redirect('/admin/Loginc', 'refresh');
}
?>
<body style="color:black;">
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <?php $this->load->view('menu/menu'); ?>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <legend>
                    <span class="glyphicon glyphicon-user"></span>
                    Welcome
                    <?php echo ucwords($_SESSION['fname'] . ' ' . $_SESSION['surname']); ?>
                    <?php echo "(Username  :" . $_SESSION['username'] . ")"; ?>
                </legend>
                <div class="jumbotron">
                    <h2 style="color:green"><span class="glyphicon glyphicon-cog">Welcome <?php echo ucwords($_SESSION['fname']. ' '.$_SESSION['surname']); ?></span></h2> 
                    <p align="left"> 
                        <?php 
                        echo "Staffname : " . ucwords($_SESSION['fname'] . ' ' . $_SESSION['surname'])."<br/>";
                        echo "RoleID    :"  .$_SESSION['roleid'] ."<br/>";
                        echo "RegDate   :"  .$_SESSION['regdate'] ."<br/>";
                        echo "StaffID   :"  .$_SESSION['staffID'] ."<br/>";
                        echo "Email     :"  .$_SESSION['email'] ."<br/>";
                ?>
                </p>
                    <p>You use the left menu to see task that you can do using your present profile.
                    </p>
                </div>
            </div>

            <div class="col-sm-2 sidenav">
                <?php ?>
            </div>
        </div>
    </div>
