<script type="text/javascript">
    $(document).ready(function () {
        $('.spoiler').hide();
        $('<input type="button" class="revealer" value="Reveal Password field!"/>').insertBefore('.spoiler');
        $('.revealer').click(function () {
            $(this).hide();
            $(this).next().fadeIn();
        });
    });
</script>
<script type="text/javascript">
    /************************************************************************************************************
     Ajax chained select
     Copyright (C) 2006  DTHMLGoodies.com, Alf Magne Kalleland
     
     This library is free software; you can redistribute it and/or
     modify it under the terms of the GNU Lesser General Public
     License as published by the Free Software Foundation; either
     version 2.1 of the License, or (at your option) any later version.
     
     This library is distributed in the hope that it will be useful,
     but WITHOUT ANY WARRANTY; without even the implied warranty of
     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
     Lesser General Public License for more details.
     
     You should have received a copy of the GNU Lesser General Public
     License along with this library; if not, write to the Free Software
     Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
     
     Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
     written by Alf Magne Kalleland.
     
     Alf Magne Kalleland, 2006
     Owner of DHTMLgoodies.com
     
     
     ************************************************************************************************************/
    var ajax = new Array();
    function getLGAList(sel)
    {
        var stateCode = sel.options[sel.selectedIndex].value;
        document.getElementById('frmbirthlga').options.length = 0; // Empty city select box
        if (stateCode.length > 0) {
            var index = ajax.length;
            ajax[index] = new sack();
            ajax[index].requestFile = '<?php echo base_url(); ?>assets/files/getLGA.php?stateCode=' + stateCode; // Specifying which file to get
            ajax[index].onCompletion = function () {
                createDepts(index)
            }; // Specify function that will be executed after file has been found
            ajax[index].runAJAX(); // Execute AJAX function
        }
    }
    function getLGAOfOriginList(sel)
    {
        var stateCode = sel.options[sel.selectedIndex].value;
        document.getElementById('frmoriginlga').options.length = 0; // Empty city select box
        if (stateCode.length > 0) {
            var index = ajax.length;
            ajax[index] = new sack();
            ajax[index].requestFile = '<?php echo base_url(); ?>assets/files/getLGA.php?stateCode=' + stateCode; // Specifying which file to get
            ajax[index].onCompletion = function () {
                createListLGAOrigin(index)
            }; // Specify function that will be executed after file has been found
            ajax[index].runAJAX(); // Execute AJAX function
        }
    }
    function createListLGAOrigin(index)
    {
        var obj = document.getElementById('frmoriginlga');
        eval(ajax[index].response); // Executing the response from Ajax as Javascript code	
    }
    function createDepts(index)
    {
        var obj = document.getElementById('frmbirthlga');
        eval(ajax[index].response); // Executing the response from Ajax as Javascript code	
    }
    $(function () {
        $('#frmdob').datepicker({
            changeMonth: true,
            changeYear: true,
            showOn: 'button',
            buttonText: 'Choose a date',
            buttonImage: '<?php echo base_url(); ?>assets/images/cal.gif',
            buttonImageOnly: true
        });
    });
    $(function () {
        $('#frmdateobt').datepicker({
            changeMonth: true,
            changeYear: true,
            showOn: 'button',
            buttonText: 'Choose a date',
            buttonImage: '<?php echo base_url(); ?>assets/images/cal.gif',
            buttonImageOnly: true
        });
    });</script>
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
                                    <legend><img src="<?php echo base_url(); ?>assets/images/b_search.png" alt="login"/>
                                        Welcome
                                    </legend>
                                    <div class="clearfix">
                                        <?php
                                        echo "<font color='red'>" . validation_errors() . "</font>";
                                        echo form_open('secured/admin/Updatecandidateprofilec');
                                        ?>
                                        <h2 align="center">UPDATE - POSTUME MANAGEMENT SYSTEM</h2>
                                        <legend>Registration Details</legend>
                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
                                            <tr>
                                                <td><label>JambID</label>
                                                    <input type="text" name="JambID" value="<?php echo $this->session->userdata('JambID'); ?>" size="20" required class="text" readonly="true" onmouseover="window.alert('This JambID field is read only')"/><span id="usr_verify" class="verify"></span> 
                                                </td> 
                                                <td>
                                                    <div class="row">
                                                        <div class="col-xs-6 col-md-3">
                                                            <?php
                                                            $image_properties = array(
                                                                'src' => 'assets/uploads/staff/' . $_SESSION['photo'],
                                                                'alt' => ucwords($_SESSION['fname'] . ' ' . $_SESSION['surname']),
                                                                'class' => 'post_images',
                                                                'width' => '80',
                                                                'height' => '80',
                                                                'title' => ucwords($_SESSION['fname'] . ' ' . $_SESSION['surname']),
                                                                'rel' => 'lightbox',
                                                            );
                                                            echo img($image_properties);
                                                            ?>
                                                        </div>

                                                    </div>

                                                </td>
                                            </tr> 
                                            <tr>                                                        
                                                <td><label>Surname</label><br/><input type="text" name="sname" value="<?php echo $this->session->userdata('sname'); ?>" size="15" required/><span id="usr_verify" class="verify"></span> </td> 
                                            </tr>
                                            <tr>
                                                <td><label>Firstname</label><br/><input type="text" name="fname" value="<?php echo $this->session->userdata('fname'); ?>" size="15" /><span id="usr_verify" class="verify"></span></td>
                                                <td><label>Middlename</label><br/><input type="text" name="mname" value="<?php echo $this->session->userdata('mname'); ?>"  size="15" /><span id="usr_verify" class="verify"></span></td>
                                            </tr> 

                                            <tr>
                                                <td><label>Gender</label><br/>
                                                    <select name="sex">
                                                        <option VALUE="Male">Male</option>
                                                        <option VALUE="Female">Female</option>
                                                    </select><span id="usr_verify" class="verify"></span>
                                                    <br/>
                                                    <label>Nationality</label><br/>
                                                    <select name="nation">
                                                        <option VALUE="<?php echo $this->session->userdata('nation'); ?>"><?php echo $this->session->userdata('nation'); ?></option>
                                                        <option VALUE="Nigerian">Nigerian</option>
                                                        <option VALUE="Foreigner">Foreigner</option>
                                                    </select><span id="usr_verify" class="verify"></span>    
                                                </td>
                                                <td>
                                                    <label>Dob</label><br/>
                                                    <input name="dob" type="text" value="<?php echo $this->session->userdata('dob'); ?>" id="dob" maxlength="15" size="15">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="maritalstatus">Marital Status</label>
                                                    <select name="maritalStatus" required>
                                                        <option value="<?php echo $this->session->userdata('maritalStatus'); ?>"><?php echo $this->session->userdata('maritalStatus'); ?></option>
                                                        <option value="married">Married</option>
                                                        <option value="single">Single</option>
                                                        <option value="divorced">Divorced</option>
                                                        <option value="separated">Separated</option>
                                                        <option value="widow">Widow</option>
                                                        <option value="widower">Widower</option>
                                                    </select><span id="usr_verify" class="verify"></span>
                                                </td>
                                                <td>
                                                    <label>Religion</label>
                                                    <select name="religion">
                                                        <option value="<?php echo $this->session->userdata('religion'); ?>"><?php echo $this->session->userdata('religion'); ?></option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Traditional">Traditional</option>
                                                        <option value="Others">Others</option>
                                                    </select>  
                                                </td>
                                            </tr>   
                                            <tr>            
                                                <td>
                                                    <label>Permanent Address</label><br/>
                                                    <textarea name="permaddr" id="permaddr" wrap="soft"  cols="20" rows="4"><?php echo $this->session->userdata('permaddr'); ?></textarea>  
                                                    <br/>
                                                    <label for="contactaddr">Contact Address</label><br/>
                                                    <textarea name="contactaddr" id="contactaddr" wrap="soft" cols="20" rows="4"><?php echo $this->session->userdata('contactaddr'); ?></textarea>
                                                </td>
                                                <td>
                                                    <label>Email Address</label>
                                                    <input type="email" name='email' value="<?php echo $this->session->userdata('email'); ?>" size="25" required/><span id="usr_verify" class="verify"></span>
                                                    <label>GSM</label>
                                                    <input type="text" name='gsm' value="<?php echo $this->session->userdata('gsm'); ?>" required/><span id="usr_verify" class="verify"></span>
                                                    <input type="hidden" name='frmroleid' value="4"/>
                                                </td>
                                            </tr>
                                            <tr>
                                            
                                                <td>
                                                    <label>Password</label><br/>
                                                    <span class="spoiler"><input type="password" name='password' value="<?php echo $this->session->userdata('password'); ?>"  required/><span id="usr_verify" class="verify"></span></span>
                                                </td>
                                                <td>
                                                    <label>Confirm Password</label><br/>
                                                    <span class="spoiler"><input type="password" name='cpassword' value="<?php echo $this->session->userdata('password'); ?>"  required/><span id="usr_verify" class="verify"></span></span>
                                                </td>
                                                </span>
                                            </tr>                                                      
                                            <tr>
                                                <th>State & LGA of Origin</th>
                                            </tr>
                                            <tr>
                                                <td>    
                                                    <label>State</label><br/>
                                                    <select name="originstate" onchange="getLGAOfOriginList(this)">
                                                        <option value="<?php echo $this->session->userdata('originstate') ?>"><?php echo $this->session->userdata('originstate') ?></option>
                                                    </select><span id="usr_verify" class="verify"></span>
                                                </td>
                                                <td>
                                                    <label>LGA Origin</label><br/>
                                                    <select name="originlga" id="originlga">
                                                        <option value="<?php echo $this->session->userdata('originlga') ?>"><?php echo $this->session->userdata('originlga') ?></option>
                                                    </select>
                                                </td>
                                            <tr>
                                                <th>Next of kin Information</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="nokname">Name</label>
                                                    <input name="nokname" type="text" value="<?php echo $this->session->userdata('nokname'); ?>" size="44" value="" />
                                                <td>
                                                    <label>Address</label>
                                                    <textarea name="nokpermaddr" wrap="hard" cols="20" rows="4"><?php echo $this->session->userdata('nokpermaddr'); ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Phone</label>
                                                    <input name="nokphone" type="text" value="<?php echo $this->session->userdata('nokphone'); ?>" size="44" value="" />

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <button type="submit" name="submitButton" id="submit">
                                                        <img src="<?php echo base_url(); ?>assets/images/tick.png" width="16" height="16" />
                                                        Submit your form
                                                    </button>
                                                    <button type="reset" name="restButton" id="reset">
                                                        <img src="<?php echo base_url(); ?>assets/images/reset.png" width="16" height="16" />
                                                        Start over
                                                    </button>
                                                </td>
                                            </tr>
                                            </fieldset>
                                        </table>
                                    </div>
                                    <?php
                                    echo form_close()
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