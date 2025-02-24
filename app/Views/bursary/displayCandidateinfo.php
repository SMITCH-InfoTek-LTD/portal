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
                                        <fieldset>
                                            <legend><img src="<?php echo base_url(); ?>assets/images/s_info.png" alt="login" width="30" height="30"/>
                                                staff information</legend>
                                            <strong>Staff Number:</strong> <?php echo $this->session->userdata('JambID'); ?><br/>
                                            Surname:<strong><?php echo $this->session->userdata('sname'); ?></strong>
                                            Othernames:<strong><?php echo $this->session->userdata('fname') . ' ' . $this->session->userdata('mname'); ?></strong><br/>
                                            Sex: <strong><?php echo $this->session->userdata('sex'); ?></strong><br/>
                                            Date of Birth:<strong><?php echo $this->session->userdata('dob') ?></strong><br/>
                                            State/LGA Of Origin:<strong><?php echo $this->session->userdata('originstate') . ',' . $this->session->userdata('originlga')?></strong><br/>
                                            Nationality:<strong><?php echo $this->session->userdata('nation') ?></strong><br/>
                                            Permanent Address:<strong><?php echo $this->session->userdata('permaddr') ?></strong><br/>
                                            Contact Address:<strong><?php echo $this->session->userdata('contactaddr') ?></strong><br/>
                                            Religion:<strong><?php echo $this->session->userdata('religion') ?></strong><br/>
                                            Phone & Email Address:<strong><?php echo $this->session->userdata('gsm') . '   ,   ' . $this->session->userdata('email'); ?></strong><br/>
                                            Marital Status:<strong><?php echo ucfirst($this->session->userdata('maritalStatus')); ?></strong><br/>
                                            <div id="photopic">
                                                <?php
                                                $image_properties = array(
                                                    'src' => 'assets/uploads/student/secured/' . $this->session->userdata('passport'),
                                                    'alt' => ucwords($this->session->userdata('fname') . ' ' . $this->session->userdata('sname')),
                                                    'class' => 'post_images',
                                                    'width' => '100',
                                                    'height' => '100',
                                                    'title' => ucwords($this->session->userdata('fname') . ' ' . $this->session->userdata('sname')),
                                                    'rel' => 'lightbox',
                                                );
                                                echo img($image_properties);
                                                ?>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Next of Kin Information</legend>
                                            Next Of Kin:<?php echo $this->session->userdata('nokname') ?><br/>
                                            Next of Kin Phoneno: <?php echo $this->session->userdata('nokphone') ?> <br/>
                                            Next of Kin Address: <?php echo $this->session->userdata('nokpermaddr') ?><br/>
                                            
                                        </fieldset>
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