<?php
if (!isset($_SESSION['staffID'])) {
    redirect('/Indexc', 'refresh');
}
?>
<title><?php echo $title; ?></title>
<body>
    <!-- content -->
    <div class="wrapper row2">
        <div id="container" class="clear">
            <!-- main content -->
            <div id="homepage">
                <!-- Services -->
                <!---->
                <section id="services" class="last clear">
                    <article class="one_third">
                        <figcaptionmenuL>
                            <?php echo view('menu/secured/staffmenu'); ?>
                        </figcaptionmenuL>
                    </article>
                    <article>
                        <figure>
                            <figcaptionHome>
                                <fieldset>
                                    <legend><img src="<?php echo base_url(); ?>assets/images/b_search.png" alt="login"/>
                                        Update Success
                                    </legend>
                                    <table width="100%" border="" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                        
                                                <fieldset title="database update was successful" style=" border-color:  whitesmoke">
                                                    <h1 style="color: green">Congratulations!!!! </h1>
                                                    <h3 style="color: black;font-style: italic"> update was successful!!!
                                                        <?php
                                                        echo '<a href="' . base_url() . 'index.php/secured/admin/Mainstaffc">continue</a>';
                                                        ?>
                                                    </h3>
                                                </fieldset>
                                            
                                        </tr>
                                    </table>
                                </fieldset>
                            </figcaptionhome>
                        </figure>
                    </article>
                </section>
                </body>
            </div>
            <!-- / content body -->
        </div>
    </div>