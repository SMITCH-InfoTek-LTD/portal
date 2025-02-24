<title>
    <?php echo $title; ?>
</title>
<body>
    <div id="columnLeft">
        <div id="menuleft">
            <ul><h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Side Menu</h5>
                <?php
                $this->load->view('menu/sidemenu');
                ?>
            </ul>
        </div>
    </div>
    <div id="columnMain">
        <div class="clearfix">
            <?php
            echo form_open('staff/grantaccessstaffinfoc');
            ?>
            <fieldset>
                <legend><img src="<?php echo base_url(); ?>assets/images/s_info.png" alt="login" width="30" height="30"/>
                    staff access information</legend><br/>
                <strong>Staff Number:</strong> <?php echo $this->session->userdata('staffNo'); ?><br/>
                Surname:<strong><?php echo $this->session->userdata('surname'); ?></strong>
                Othernames:<strong><?php echo $this->session->userdata('fname') . ' ' . $this->session->userdata('mname'); ?></strong><br/>
                Sex: <strong><?php echo $this->session->userdata('sex'); ?></strong><br/>
                Date & Place of Birth:<strong><?php echo $this->session->userdata('dob') ?>,</strong><br/>
                State/LGA Of Origin:<strong><?php echo $this->session->userdata('frmoriginstate') . ',' . $this->session->userdata('frmoriginlga') . ',' . $this->session->userdata('frmoriginplace') ?></strong><br/>
                Nationality:<strong><?php echo $this->session->userdata('frmnation') ?></strong><br/>
                Permanent Address:<strong><?php echo $this->session->userdata('permaddr') ?></strong><br/>
                Contact Address:<strong><?php echo $this->session->userdata('contactaddr') ?></strong><br/>
                Religion:<strong><?php echo $this->session->userdata('religion') ?></strong><br/>
                Phone & Email Address:<strong><?php echo $this->session->userdata('gsm') . ',' . $this->session->userdata('email'); ?></strong><br/>
                Marital Status:<strong><?php echo ucfirst($this->session->userdata('maritalstatus')); ?></strong><br/>
                <div id="photopic">
                    <?php
                    $image_properties = array(
                        'src' => 'assets/uploads/staff/' . $this->session->userdata('photopic'),
                        'alt' => ucwords($this->session->userdata('fname') . ' ' . $this->session->userdata('surname')),
                        'class' => 'post_images',
                        'width' => '100',
                        'height' => '100',
                        'title' => ucwords($this->session->userdata('fname') . ' ' . $this->session->userdata('surname')),
                        'rel' => 'lightbox',
                    );
                    echo img($image_properties);
                    ?>
                    <input name="staffID" value="<?php echo $this->session->userdata('staffNo');?>" type="hidden"/>
                </div>
            </fieldset>
            <fieldset><legend>Qualification & Career Progression</legend>
                Qualification:<strong><?php echo ucfirst($this->session->userdata('qualification')); ?></strong><br/>
                Career Progression:<strong><?php echo ucfirst($this->session->userdata('careerProgression')); ?></strong><br/>
            </fieldset>
            <fieldset><legend>Faculty/Unit & Department/Section</legend>
                Faculty/Unit:<strong><?php echo ucfirst($this->session->userdata('frmfaculty')); ?></strong><br/>
                Department/Section:<strong><?php echo ucfirst($this->session->userdata('frmdept')); ?></strong><br/>
            </fieldset>
            <fieldset><legend>Role</legend>
                <label>RoleID</label>&nbsp;&nbsp;&nbsp
                <select name="roleid">
                    <option value="<?php echo $this->session->userdata('frmroleid')?>" <?php echo set_select('roleid', $this->session->userdata('frmroleid'), TRUE); ?> >No Role</option>
                    <option value="1"<?php echo set_select('roleid', '1'); ?>>MIS Admin</option>
                    <option value="2"<?php echo set_select('roleid', '2'); ?>>MIS Secretary</option>
                    <option value="3"<?php echo set_select('roleid', '3'); ?>>MIS Director</option>
                    <option value="5"<?php echo set_select('roleid', '5'); ?>>No Role</option>
                </select> <br/>
             </fieldset>
                <button type="submit" name="submitButton">
                                <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
                                Submit your form
                </button>  
            <?php
                form_close()
            ?>
        </div>
    </div>
    <div id="columnRight">
        <label>The development of the online repository and search engine of a college has benefits as follows</label>
        <a href="#" onclick="return kadabra('list');"><br/>More... (+/-)</a>
        <ul id="list">
            <li>To create a database that has the information of past student of a collage</li>
            <li>To create users account and tracking of old students record</li>
            <li>To create a means of retrieving past student record</li>
            <li>To maintain connection to educational institution and fellow graduates</li>
            <li>To provide a forum to form new friendship and business friendship with people of similar background</li>;
        </ul>
    </div>
