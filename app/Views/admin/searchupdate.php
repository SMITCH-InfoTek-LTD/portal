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
                            <?php $this->load->view('menu/secured/staffmenu'); ?>
                        </figcaptionmenuL>
                    </article>
                    <article>
                        <figure>
                            <figcaptionHome>
                                <fieldset>
                                    <legend><img src="<?php echo base_url(); ?>assets/images/b_edit.png" alt="search" width="20" height="20"/>
                                        edit candidate info</legend>
                                    <div class="clearfix">
                                        <?php
                                        echo form_open('secured/admin/Searchupdatecandidatec');
                                        ?>
                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <div id="errormessage">
                                                <?php
                                                echo validation_errors();
                                                ?>
                                            </div>

                                            <tr>
                                                <th width="60%">JAMB Registration ID:</th>
                                                <td width="40%"><input name="JambID" type="text" id="JambID" size="40" /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div align="center">
                                                        <button type="submit" name="submitButton">
                                                            <img src="<?php echo base_url(); ?>assets/images/b_edit.png" width="16" height="16" />
                                                            <b>Search</b>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            </fieldset>
                                        </table>
                                        <?php
                                        form_close()
                                        ?>
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