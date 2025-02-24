<?php
if (!isset($_SESSION['staffID'])) {
    redirect('/Indexc', 'refresh');
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
                                    <legend><img src="<?php echo base_url(); ?>assets/images/b_search.png" alt="login"/>
                                        Welcome
                                    </legend>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>JambID</th>
                                                            <th>Candidate Name</th>
                                                            <th>Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php for ($i = 0; $i < count($applicantlist); ++$i) { ?>
                                                            <tr>
                                                                <td><?php echo ($page + $i + 1); ?></td>
                                                                <td><?php echo $applicantlist[$i]->JambID; ?></td>
                                                                <td><?php echo $applicantlist[$i]->AppName; ?></td>
                                                                <td><?php echo $applicantlist[$i]->EmailAddress; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="pagination">
                                                <?php 
                                                     if(isset($pagination)){
                                                        echo $pagination; 
                                                     }else{
                                                         echo "No records found!!!";
                                                     }
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
