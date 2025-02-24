<?php

?>
<title>
    <?php
    if (isset($title)) {
        echo $title;
    } else {
        echo $this->pdf->SetTitle('My POST UTME - Sittings select');
    }
    if (!isset($_SESSION['JambID'])) {
        redirect('/Indexc', 'refresh');
    }
    ?>
</title>
<body>
    <!-- content -->
    <div class="wrapper row2">
        <div id="container" class="clear">
            <div id="newsflash">
                <marquee>Registration closes on 1st August 2016!!!   
                    &nbsp;&nbsp;&nbsp;<a href="">Check your POST UME results!!!</a></marquee>
            </div>
            <!-- main content -->
            <div id="homepage">
                <!-- Services -->
                <!---->
                <section id="intro" class="last clear">
                    <article class="one_third">
                        <figcaptionmenuL>
                            <?php $this->load->view('menu/secured/studentmenuS'); ?>
                        </figcaptionmenuL>
                    </article>
                    <article>
                        <figure>
                            <figcaptionHome>
                                <h5><strong>Post Data Page</strong></h5>
                                <fieldset>
                                    <legend><img src="<?php echo base_url(); ?>assets/images/b_search.png" alt="login"/>
                                        <?php echo ucwords($_SESSION['fname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?></legend>
                                    <?php echo form_open('secured/SelectSittingsc'); ?>
                                    <fieldset>
                                        <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" id="table">
                                            <tr>
                                                <th width="60%">Course:</th>
                                                <td width="40%">
                                                    <select name="sittings" required>
                                                        <option value="">[select one]</option>
                                                        <?php
                                                        $query = $this->db->get_where('tblsittings', array('JambID' => $_SESSION['JambID']));
                                                        foreach ($query->result() as $row) {
                                                            echo '<option value="' . $row->sittings . '">' . $row->sittings . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div align="center">
                                                        <button type="submit" name="submitButton">
                                                            <img src="<?php echo base_url(); ?>assets/images/b_search.png" width="16" height="16" />
                                                            Proceed to print details
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>

                                    <?php echo form_close(); ?>
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