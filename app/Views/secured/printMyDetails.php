<?php

?>
<title>
    <?php
    if (isset($title)) {
        echo $title;
    } else {
        echo $this->pdf->SetTitle('My POST UTME - Details');
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
                                    <div width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                        <fieldset>
                                            <div>
                                                Jamb Registration Number:<b>
                                                    <?php echo $this->session->userdata('JambID'); ?></b>
                                                &nbsp;&nbsp;&nbsp;
                                                <?php  
                                                $image_properties = array(
                                                    'src' => 'assets/uploads/student/secured/' . $_SESSION['passport'],
                                                    'alt' => ucwords($_SESSION['fname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']),
                                                    'class' => 'post_images',
                                                    'width' => '100',
                                                    'height' => '100',
                                                    'title' => ucwords($_SESSION['fname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']),
                                                    'rel' => 'lightbox',
                                                );
                                                echo img($image_properties);
                                                ?>
                                                <br/><br/>
                                                <strong>CandName:</strong>
                                                <?php echo ucwords($_SESSION['fname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']); ?>
                                            </div><br/>
                                            <div>
                                                State Of Origin:
                                                <b><?php echo $this->session->userdata('StateOforigin'); ?></b><br/>
                                                LGA Of Origin
                                                <b><?php echo $this->session->userdata('LGAOfOrigin'); ?></b><br/>
                                                Sex:
                                                <b><?php echo $this->session->userdata('Sex'); ?></b><br/>                                 
                                            </div>
                                        </fieldset>
                                        <fieldset><legend>Subjects Taken</legend>
                                            <strong>Use of English:</strong>
                                            <?php echo $this->session->userdata('EnglishScore'); ?>
                                            &nbsp;&nbsp;&nbsp;
                                            <strong><?php echo $this->session->userdata('Subject2'); ?></strong>
                                            <?php echo $this->session->userdata('Subject2Score'); ?>
                                            &nbsp;&nbsp;&nbsp;
                                            <strong><?php echo $this->session->userdata('Subject3'); ?></strong>
                                            <?php echo $this->session->userdata('Subject3Score'); ?>
                                            &nbsp;&nbsp;&nbsp;
                                            <strong><?php echo $this->session->userdata('Subject4'); ?></strong>
                                            <?php echo $this->session->userdata('Subject4Score'); ?>
                                            <br/><br/>
                                            <p style="text-align: center;">
                                                <strong>Aggregate:</strong>
                                                <?php echo $this->session->userdata('Aggregate'); ?>
                                            </p>
                                        </fieldset>
                                        <fieldset><legend>University Choices</legend>
                                            First Choice University :<strong><?php echo $this->session->userdata('FirstChoiceUniv') ?></strong><br/>
                                            First Choice Faculty :<strong><?php echo $this->session->userdata('FirstChoiceFaculty') ?></strong>&nbsp;
                                            First Choice Course:<strong><?php echo $this->session->userdata('FirstChoiceCourse') ?></strong>
                                            <br/><br/>
                                            Second Choice University :<strong><?php echo $this->session->userdata('SecondChoiceUniv') ?></strong><br/>
                                            Second Choice Faculty :<strong><?php echo $this->session->userdata('SecondChoiceFaculty') ?></strong>&nbsp;
                                            Second Choice Course:<strong><?php echo $this->session->userdata('SecondChoiceCourse') ?></strong>
                                            <br/>
                                        </fieldset>
                                        <fieldset>
                                            <?php
                                            //ob_start();
                                            $bg = '#eeeeee';
                                            $this->JambID = $this->session->userdata('JambID');
                                            $this->exambody = $this->session->userdata('exambody');
                                            $this->others = $this->session->userdata('others');
                                            $this->examyear = $this->session->userdata('examyear');
                                            $this->examyear_1 = $this->session->userdata('examyear_1');
                                            $this->examnumber = $this->session->userdata('examnumber');
                                            $this->subject = ($this->session->userdata('subject'));
                                            $this->grade = ($this->session->userdata('grade'));
                                            $this->dateOfreg = $this->session->userdata('dateOfreg');
                                            $this->sitting = $this->session->userdata('sittings');
                                            $this->candCount = count($this->JambID);
                                            $this->examCount = count($this->exambody);
                                            $this->subjectCount = count($this->subject);
                                            $this->sittingCount = count($this->sitting);
                                            //print_r($this->session->userdata());
                                            //echo 'Cand count ' . $this->candCount . ' Subjectcount' . $this->subjectCount;
                                            if ($this->session->userdata('sittings') == 'onesitting') {
                                                echo '<table align="left" cellspacing="2" cellpadding="2" style="width:100%"><tr>'.
                                                     '<th colspan="7"><p><font color="#eeeeee"><b>Olevel Subjects - Single sitting</b>'.
                                                     '</font></p></th></tr><tr><th align="left"><b>Examnumber</b></th><th align="left">'.
                                                     '<b>Exambody</b></th><th align="left"><b>ExamYear</b></th>'.
                                                     '<th align="left">ExamYear(Period)</th><th>Others</th></tr>';
                                                for ($values = 0; $values <= ($this->candCount - 1); $values++) {
                                                    if ((($this->JambID[$values])) && isset($this->exambody[$values]) && isset($this->examyear[$values])) {
                                                        //$this->table->add_row($this->examnumber, $this->exambody, $this->examyear, $this->examyear_1, $this->others);
                                                        $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');
                                                        $text = "\n<tr bgcolor='$bg'>" .
                                                                "\n\t<td align='left'>" . $this->examnumber . "</td>" .
                                                                "\n\t<td align='left'>" . $this->exambody . "</td>" .
                                                                "\n\t<td align='left'>" . $this->examyear . "</td>" .
                                                                "\n\t<td align='left'>" . $this->examyear_1 . "</td>" .
                                                                "\n\t<td align='left'>" . $this->others . "</td>";
                                                        $text .='<table align="left" cellspacing="1" cellpadding="1" style="width:100%">';
                                                        $text .= '<tr bgcolor="$bg"><th rowspan="0"><font color="#eeeeee"><b>Olevel Subjects & Grades</b></font></th></tr>';
                                                        for ($value = 0; $value <= ($this->subjectCount - 1); $value++) {
                                                            $text .= "<tr bgcolor='$bg'><td align='center' colspan='7'>" . $this->subject[$value] .
                                                                    "              =>                " .
                                                                    $this->grade[$value] . "</td></tr>";
                                                        }
                                                        echo $text . "</table>";
                                                    } else {
                                                        echo '<table align="left" cellspacing="2" cellpadding="2" style="width:100%" class="table">'.
                                                             '<tr><th colspan="7"><p><font color="red"><b>Olevel Subjects</b></font></p>'.
                                                             '</th></tr><tr><th rowspan="0"><font color="#eeeeee">'.
                                                             '<b>Olevel Subjects - You have not uploaded Yet!!!</b></font></th></tr>';
                                                    }
                                                }
                                                
                                                //echo $text . "</table>";
                                            } else if ($this->session->userdata('sittings') == 'doublesittings') {
                                                echo'<table align="left" cellspacing="2" cellpadding="2" style="width:100%">
                    <tr><th colspan="7"><p><font color="#eeeeee"><b>Olevel Subjects - Double sittings</b></font></p></th></tr>
                    <tr><th align="left"><b>Examnumber</b></th><th align="left"><b>Exambody</b></th>
			<th align="left"><b>ExamYear</b></th><th align="left">ExamYear(Period)</th><th>Others</th>';
                                                //echo "++++++++++++++++++++++++++++++++++++++++";
                                                //print_r($this->session->userdata());
                                                //echo "++++++++++++++++++++++++++++++++++++++++";
                                                for ($values = 0; $values <= ($this->examCount - 1); $values++) {
                                                    if ((isset($this->JambID)) && isset($this->exambody[$values]) && isset($this->examyear[$values])) {
                                                        $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');
                                                        //echo $this->JambID . $this->exambody[$values] . $this->examyear[$values]."Output";
                                                        
                                                        $text = "\n<tr bgcolor='$bg'>" .
                                                                "\n\t<td align='left'>" . $this->examnumber[$values] . "</td>" .
                                                                "\n\t<td align='left'>" . $this->exambody[$values] . "</td>" .
                                                                "\n\t<td align='left'>" . $this->examyear[$values] . "</td>" .
                                                                "\n\t<td align='left'>" . $this->examyear_1[$values] . "</td>" .
                                                                "\n\t<td align='left'>" . $this->others[$values] . "</td></tr>";
                                                        echo $text;                                             
                                                    }else {
                                                        echo '<table align="left" cellspacing="2" cellpadding="2" style="width:100%" class="table">'.
                                                             '<tr><th colspan="7"><p><font color="red"><b>Olevel Subjects</b></font></p>'.
                                                             '</th></tr><tr><th rowspan="0"><font color="#eeeeee">'.
                                                             '<b>Olevel Subjects - You have not uploaded Yet!!!</b></font></th></tr>';
                                                    }
                                                    //echo $text;
                                                }
                                                //echo $text;
                                                $text .='<table align="left" cellspacing="1" cellpadding="1" style="width:100%">';
                                                $text .= '<tr bgcolor="$bg"><th rowspan="0"><font color="#eeeeee"><b>Olevel Subjects & Grades</b></font></th></tr>';
                                                for ($value = 0; $value <= ($this->subjectCount - 1); $value++) {
                                                    $text .= "<tr bgcolor='$bg'><td align='left' colspan='6'>" . $this->subject[$value] .
                                                            "              =>                " .
                                                            $this->grade[$value] . "</td></tr>";
                                                }


                                                echo $text . "</table>";
                                            } else {

                                                echo'<font color="#eeeeee"><b>Olevel Subjects - You have not uploaded Yet!!!</b></font>';
                                            }
                                            ?>
                                            <br/>
                                            <table><tr bgcolor='#eee'>
                                                    <?php
                                                    print '<a href="' . base_url() . 'index.php/secured/PrintMyDetailspdfc"><img src="' . base_url() . 'assets/images/b_pdfdoc.png" alt="pdf" width="15" height="15"/>Print my data sheet</a>';
                                                    //ob_end_clean();
                                                    ?>
                                                </tr></table>
                                        </fieldset>
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