<?php

redirect('secured/Preadmissionloginc',"redirect");
?>
<body>
    <!-- content -->
    <div class="wrapper row2">
        <div id="container" class="clear">
            <!-- main content -->
            <div id="homepage">
                <section id="intro" class="last clear">
                    <article>
                        <figure>
                            <figcaptionHome>
                                <fieldset>
                                    <legend><h2>Welcome to UniAbuja - portal</h2></legend>
                                <p>
                                    New account click <a class="drop" href="<?php echo base_url(); ?>index.php/secured/CreateAcct">here to create account...</a>
                                </p>
                                <p>
                                    Already have account click here to <a href="<?php echo base_url(); ?>index.php/secured/Preadmissionloginc">login</a>
                                </p>
                                <p>
                                    Staff Login<a href="<?php echo base_url(); ?>index.php/secured/admin/loginc">login</a>
                                </p>
                                </fieldset>
                            </figcaptionHome>
                            <figcaptionmenu>
                            <?php echo view('template/sidemenu');?>
                            </figcaptionmenu>
                            
                        </figure>
                    </article>
                </section>
                <!-- / Introduction -->
            </div>
            <!-- / content body -->
        </div>
    </div>