<?php

?>
<body>
    <!-- content -->
    <div class="wrapper row2">
        <div id="container" class="clear">
            <!-- main content -->
            <div id="homepage">
                <!-- Services -->
                <!---->
                <section id="intro" class="last clear">
                    <article>
                        <figure>
                            <figcaptionmenuL>
                                <?php echo view('menu/secured/studentmenuS'); ?>
                            </figcaptionmenuL>
                            <figcaptionHome>
                                <div id="columnMainS">
                                    <div class="clearfix">
                                        <fieldset title="database update was successful" style=" border-color:  whitesmoke">
                                            <h1 style="color: green">Congratulations ...still one more important step to go then you are done </h1>
                                            <h3 style="color: black;font-style: italic"> update was successful!!!
                                                <?php
                                                echo '<a href="' . base_url() . 'index.php/secured/securedPayment">continue</a>';
                                                ?>
                                            </h3>
                                        </fieldset><br />
                                    </div>
                                </div>
                            </figcaptionhome>
                        </figure>
                    </article>
                </section>
                </body>
            </div>
            <!-- / content body -->
        </div>
    </div>