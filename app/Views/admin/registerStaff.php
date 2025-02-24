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
        document.getElementById('frmbirthlga').options.length = 0;	// Empty city select box
        if(stateCode.length>0){
            var index = ajax.length;
            ajax[index] = new sack();
		
            ajax[index].requestFile = '<?php echo base_url(); ?>assets/files/getLGA.php?stateCode='+stateCode;	// Specifying which file to get
            ajax[index].onCompletion = function(){ createDepts(index) };	// Specify function that will be executed after file has been found
            ajax[index].runAJAX();		// Execute AJAX function
        }
    }
    function getLGAOfOriginList(sel)
    {
        var stateCode = sel.options[sel.selectedIndex].value;
        document.getElementById('frmoriginlga').options.length = 0;	// Empty city select box
        if(stateCode.length>0){
            var index = ajax.length;
            ajax[index] = new sack();
		
            ajax[index].requestFile = '<?php echo base_url(); ?>assets/files/getLGA.php?stateCode='+stateCode;	// Specifying which file to get
            ajax[index].onCompletion = function(){ createListLGAOrigin(index) };	// Specify function that will be executed after file has been found
            ajax[index].runAJAX();		// Execute AJAX function
        }
    }
    function createListLGAOrigin(index)
    {
        var obj = document.getElementById('frmoriginlga');
        eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
    }
    function createDepts(index)
    {
        var obj = document.getElementById('frmbirthlga');
        eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
    }
    
    function getDeptList(sel)
    {
        var facultyCode = sel.options[sel.selectedIndex].value;
        document.getElementById('frmdept').options.length = 0;	// Empty city select box
        if(facultyCode.length>0){
            var index = ajax.length;
            ajax[index] = new sack();
		
            ajax[index].requestFile = '<?php echo base_url(); ?>assets/files/getDept.php?facultyCode='+facultyCode;	// Specifying which file to get
            ajax[index].onCompletion = function(){ createDepartments(index) };	// Specify function that will be executed after file has been found
            ajax[index].runAJAX();		// Execute AJAX function
        }
    }

    function createDepartments(index)
    {
        var obj = document.getElementById('frmdept');
        eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
    }
    
    $(function() {
        $('#dob').datepicker({
            changeMonth: true,
            changeYear: true,
            showOn: 'button',
            buttonText: 'Choose a date',
            buttonImage: '<?php echo base_url(); ?>assets/images/cal.gif',
            buttonImageOnly: true
        });
    });
    
    $(function() {
        $('#dateobt').datepicker({
            changeMonth: true,
            changeYear: true,
            showOn: 'button',
            buttonText: 'Choose a date',
            buttonImage: '<?php echo base_url(); ?>assets/images/cal.gif',
            buttonImageOnly: true
        });
    });

</script>
<title><?php echo $title; ?></title>
<body>
    <div id="formreg">
        <div class="clearfix">
            <?php
            echo "<font color='red'>" . validation_errors() . "</font>";
            echo form_open('staff/registerstaffc');
            ?>
            <fieldset>
                <h2 align="center">STAFF'S INFORMATION MANAGEMENT SYSTEM</h2>
                <fieldset>
                    <legend>Registration Details</legend>
                    <div>
                        <label>StaffID</label>
                        <input type="text" name="staffID" value="<?php echo set_value('staffID'); ?>" size="20" required class="text"/><span id="usr_verify" class="verify"></span>  
                        <label>Surname</label>
                        <input type="text" name="surname" value="<?php echo set_value('surname'); ?>" size="25" required/><span id="usr_verify" class="verify"></span>  
                        <label>Firstname</label> 
                        <input type="text" name="fname" value="<?php echo set_value('fname'); ?>" size="25" required/><span id="usr_verify" class="verify"></span>  
                        <label>Middlename</label>
                        <input type="text" name="mname" value="<?php echo set_value('mname'); ?>"  size="25" required/><span id="usr_verify" class="verify"></span>
                    </div> 
                    <br/>
                    <div>
                        <label>Gender</label>
                        <select name="sex">
                            <option VALUE="Mal">Male</option>
                            <option VALUE="Female">Female</option>
                        </select><span id="usr_verify" class="verify"></span>
                        <label>Nationality</label>
                        <select name="frmnation">
                            <option VALUE="Nigerian">Nigerian</option>
                            <option VALUE="Foreigner">Foreigner</option>
                        </select><span id="usr_verify" class="verify"></span>  
                        <label>Dob</label>
                        <input name="dob" type="text" value="<?php echo set_value('dob'); ?>" id="dob" maxlength="15" size="15">
                        <span>pick a date</span>
                        <label for="maritalstatus">Marital Status</label>
                        <select name="maritalstatus" required>
                            <option value="">Select Status</option>
                            <option value="married">Married</option>
                            <option value="single">Single</option>
                            <option value="divorced">Divorced</option>
                            <option value="separated">Separated</option>
                            <option value="widow">Widow</option>
                            <option value="widower">Widower</option>
                        </select><span id="usr_verify" class="verify"></span>    
                        <label>Religion</label>
                        <select name="religion">
                            <option value="Christianity" selected>Christianity</option>
                            <option value="Islam">Islam</option>
                            <option value="Traditional">Traditional</option>
                            <option value="Others">Others</option>
                        </select></div><br/>
                    <div>
                        <label>Permanent Address</label>
                        <textarea name="permaddr" id="permaddr" value="<?php echo set_value('permaddr'); ?>" wrap="soft"  cols="20" rows="4"></textarea>  
                        <label for="contactaddr">Contact Address</label>
                        <textarea name="contactaddr" id="contactaddr" value="<?php echo set_value('contactaddr'); ?>" wrap="soft" cols="20" rows="4"></textarea>
                    </div><br/>
                    <div>
                        <label>Email Address</label>
                        <input type="email" name='email' value="<?php echo set_value('email'); ?>" required/><span id="usr_verify" class="verify"></span>
                        <label>GSM</label>
                        <input type="text" name='gsm' value="<?php echo set_value('gsm'); ?>" required/><span id="usr_verify" class="verify"></span>
                        <input type="hidden" name='frmroleid' value="5"/>
                    </div>
                </fieldset>
                <fieldset><legend>Appointment Information</legend>
                    <label>Level Of Appointment</label>&nbsp;&nbsp;&nbsp;
                    Senior<input type="radio" name="levelOfAppointment" value="senior" checked="checked" />
                    Junior<input type="radio" name="levelOfAppointment" value="junior" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Nature Of Appointment</label>
                    Tenure<input type="radio" name="natureOfAppointment" value="tenure" checked="checked" />
                    Temporary<input type="radio" name="natureOfAppointment" value="temporary" /><br /><br />
                    <label>Job Title/Rank</label>
                    <input type="text" name='rank' size="25" required/><span id="usr_verify" class="verify"></span>
                </fieldset>
                <fieldset><legend>Password Information</legend>
                    <div>
                        <label>Password</label>
                        <input type="password" name='password' value="" size="20" required/><span id="usr_verify" class="verify"></span>
                        <label>Confirm Password</label>
                        <input type="password" name='cpassword' value="" size="20" required/><span id="usr_verify" class="verify"></span>
                    </div>
                </fieldset>
                <fieldset><legend>State of Origin</legend>
                    <div>
                        <label>State</label>
                        <select name="frmoriginstate" onchange="getLGAOfOriginList(this)">
                            <option value="">Select one</option>
                            <option value="Abia">Abia</option>	
                            <option value="Adamawa">Adamawa</option>		
                            <option value="Akwa Ibom">Akwa Ibom</option>	
                            <option value="Anambra">Anambra</option><option value="Bauchi">Bauchi</option>
                            <option value="Bayelsa">Bayelsa</option><option value="Benue">Benue</option><option value="Bornu">Bornu</option>	
                            <option value="Cross Rivers">Cross Rivers</option><option value="Delta">Delta</option><option value="Ebonyi">Ebonyi</option>	
                            <option value="Edo">Edo</option><option value="Ekiti">Ekiti</option><option value="Enugu">Enugu</option>	
                            <option value="FCT">Federal Capital Territory</option><option value="Gombe">Gombe</option>	
                            <option value="Imo">Imo</option><option value="Jigawa">Jigawa</option><option value="Kaduna">Kaduna</option><option value="Kano">Kano</option>	<option value="Katsina">Katsina</option>	<option value="Kebbi">Kebbi</option>	<option value="Kogi">Kogi</option>	
                            <option value="Kwara">Kwara</option><option value="Lagos">Lagos</option><option value="Nasarawa">Nasarawa</option>	
                            <option value="Niger">Niger</option><option value="Ogun">Ogun</option>	<option value="Ondo">Ondo</option>	
                            <option value="Osun">Osun</option>	<option value="Oyo">Oyo</option>	<option value="Plateau">Plateau</option>	
                            <option value="Rivers">Rivers</option>	<option value="Sokoto">Sokoto</option>	<option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>	
                            <option value="Zamfara">Zamfara</option>
                        </select><span id="usr_verify" class="verify"></span>
                        <label>LGA Origin</label>
                        <select name="frmoriginlga" id="frmoriginlga"></select>  
                        <label>Town</label>
                        <input name="frmoriginplace" type="text" maxlength="30" value="" />
                    </div>
                </fieldset>

                <fieldset><legend>Next Of Kin Info</legend>
                    <div>
                        <label for="frmnokname">Name</label>
                        <input name="frmnokname" type="text" value="<?php echo set_value('frmnokname'); ?>" size="44" value="" />
                        <label>Address</label>
                        <textarea name="frmnokcontactaddr" value="<?php echo set_value('frmnokcontactaddr'); ?>" wrap="hard" cols="20" rows="4"></textarea>
                        <label>Phone</label>
                        <input name="frmnokphone" type="text" value="<?php echo set_value('frmnokphone'); ?>" size="44" value="" />
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Other Information</legend> 
                    <div>
                        <label>Details of Qualifications with Dates</label>
                        <textarea name="qualification" cols="20" rows="6"></textarea>
                        <label>Details of Career Progression</label>
                        <textarea name="careerProgression" cols="20" rows="6"></textarea>
                    </div>
                </fieldset><br/>
                <fieldset>
                    <div>
                        <label>Faculty</label>
                        <select id="frmfaculty" name="frmfaculty" class="text"  onchange="getDeptList(this)">
                            <option value=" ">[Select Your Faculty]</option>
                            <option value="CMED">COLLEGE OF MEDICINE/SURGERY</option>
                            <option value="FAGR">FACULTY OF AGRICULTURE</option>
                            <option value="FART">FACULTY OF ARTS</option>
                            <option value="FEDU">FACULTY OF EDUCATION</option>
                            <option value="FENG">FACULTY OF ENGINEERING</option>
                            <option value="FLAW">FACULTY OF LAW</option>
                            <option value="FMAN">FACULTY OF MANAGEMENT SCIENCES</option>
                            <option value="FSCI">FACULTY OF SCIENCE</option>
                            <option value="FSOC">FACULTY OF SOCIAL SCIENCE</option>
                            <option value="FVET">FACULTY OF VETERINARY MEDICINE</option>
                            <option value="OTHER-UNITS">OTHER UNITS</option>
                        </select>
                        <label>Department</label>
                        <select name="frmdept" id="frmdept"></select>
                    </div><br/>
                </fieldset>
                <fieldset style="border: none;float:right">
                    <p>
                        <button type="submit" name="submitButton" id="submit">
                            <img src="<?php echo base_url(); ?>assets/images/tick.png" width="16" height="16" />
                            Submit your form
                        </button>
                        <button type="reset" name="restButton" id="reset">
                            <img src="<?php echo base_url(); ?>assets/images/reset.png" width="16" height="16" />
                            Start over
                        </button>
                    </p>
                </fieldset>
            </fieldset>
        </div>
        <?php
        echo form_close()
        ?> 
    </div>
</body>