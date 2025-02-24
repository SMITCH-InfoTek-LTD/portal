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
                                        Welcome
                                    </legend>
                                    <div class="clearfix">
                                        <?php
                                        echo form_open('secured/admin/Searchcandidatec');
                                        ?>
                                        <div id="login">
                                            <fieldset>
                                                <legend><img src="<?php echo base_url(); ?>assets/images/b_search.png" alt="search" width="20" height="20"/>
                                                    Search for candidate</legend><br/>
                                                <label> Enter your JambID:</label>
                                                <input name="JambID" type="text" id="JambID"  value="" size="20" required />

                                                <button type="submit" name="submitButton">
                                                    <img src="<?php echo base_url(); ?>assets/images/b_search.png" width="16" height="16" />
                                                    Submit your form
                                                </button>  
                                            </fieldset>
                                            <?php
                                            form_close()
                                            ?>
                                            <div id="errormessage">
                                                <?php
                                                echo form_error('staffID');
                                                ?>
                                            </div>
                                        </div>
                                    </div>
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