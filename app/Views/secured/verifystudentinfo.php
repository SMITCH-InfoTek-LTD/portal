<title>
    <?php
    echo $title;
    if (!isset($_SESSION['RegNumber'])) {
        redirect('home', 'refresh');
    }
    ?>
</title>
<body>
    <div id="columnMain">
        <div class="clearfix">
            <?php
            $attributes = array('id' => 'regform');
            echo form_open('admissions/displaystudentinfoc', $attributes);
            ?>
            <fieldset>
                <legend><img src="<?php echo base_url(); ?>assets/images/s_info.png" alt="login" width="15" height="15"/>
                    student information</legend><br/>
                <strong>Jamb Registration Number:</strong> 
                <input type="text" name="RegNumber" value="<?php echo $this->session->userdata('RegNumber'); ?>" size="15" readonly="" />
                <br/><br/>
                <strong>Candidate's name:</strong>
                <input type="text" name="CandName" value="<?php echo $this->session->userdata('CandName'); ?>" size="25" readonly="" />
                <strong>Sex: </strong>
                <input type="text" name="Sex" value="<?php echo $this->session->userdata('Sex'); ?>" size="6" readonly="" />
                <br/><br/>
                <strong>State Of Origin:</strong>
                <input type="text" name="StateOforigin" value="<?php echo $this->session->userdata('StateOforigin'); ?>" size="15" readonly="" />
                <strong>LGA Of Origin</strong>
                <input type="text" name="LGAOfOrigin" value="<?php echo $this->session->userdata('LGAOfOrigin'); ?>" size="20" readonly="" />
            </fieldset>
            <fieldset><legend>Subjects Taken</legend>
                <strong>Use of English:</strong>
                <input type="text" name="EnglishScore" value="<?php echo $this->session->userdata('EnglishScore'); ?>" size="3" readonly="" />
                &nbsp;&nbsp;&nbsp;
                <strong><?php echo $this->session->userdata('Subject2'); ?></strong>
                <input type="text" name="Subject2Score" value="<?php echo $this->session->userdata('Subject2Score'); ?>" size="3" readonly="" />
                &nbsp;&nbsp;&nbsp;
                <strong><?php echo $this->session->userdata('Subject3'); ?></strong>
                <input type="text" name="Subject3Score" value="<?php echo $this->session->userdata('Subject3Score'); ?>" size="3" readonly="" />
                &nbsp;&nbsp;&nbsp;
                <strong><?php echo $this->session->userdata('Subject4'); ?></strong>
                <input type="text" name="Subject4Score" value="<?php echo $this->session->userdata('Subject4Score'); ?>" size="3" readonly="" />
                <br/><br/>
                <p style="text-align: center;">
                    <strong>Aggregate:</strong>
                    <input type="text" name="Subject4Score" value="<?php echo $this->session->userdata('Aggregate'); ?>" size="3" readonly="" />
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
                <legend><img src="<?php echo base_url(); ?>assets/images/contact.jpeg" alt="validate" width="15" height="15"/>
                    Phone number</legend>
                <label>Enter phone no.</label>
                <input type="tel" name="phoneno" id="phoneno" maxlength="14" required/>
                <legend>Declaration</legend>
                <p style="color:red;text-align:center;font-weight: bolder">
                    By continuing this YOU have accepted the above information given about YOU to be correct.
                </p>
                <label>I agree</label><input type="checkbox" name="agree" id="agree"value="Yes" required/>
            </fieldset>
            <fieldset><legend>
                    <img src="<?php echo base_url(); ?>assets/images/b_primary.png" alt="validate" width="15" height="15"/>
                    accept to continue</legend>
                <p style="text-align: center;">
                    <?php
                    //$data = array('agree' => 'Yes');
                    //$this->session->set_userdata($data);
                    ?>
                </p>
                <button type="submit" name="submitButton" id="submitButton">
                    <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
                    Submit your form
                </button>  
                <div id="errormessage">
                    <?php
                    echo form_error('phoneno');
                    echo form_error('agree');
                    ?>
                </div>
            </fieldset>
            <div id="pic">
                <?php
//                $image_properties = array(
//                    'src' => 'assets/uploads/student/' . $this->session->userdata('photo'),
//                    'alt' => ucwords($this->session->userdata('fname') . ' ' . $this->session->userdata('mname') . ' ' . $this->session->userdata('sname')),
//                    'class' => 'post_images',
//                    'width' => '100',
//                    'height' => '100',
//                    'title' => ucwords($this->session->userdata('fname') . ' ' . $this->session->userdata('mname') . ' ' . $this->session->userdata('sname')),
//                    'rel' => 'lightbox',
//                );
//                echo img($image_properties);
                ?>
            </div>
        </div>
    </div>