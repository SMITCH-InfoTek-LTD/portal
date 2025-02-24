<?php

?>
<?php
if (!isset($_SESSION['RegNumb'])) {
    redirect('secured/Indexc', 'refresh');
}
?>
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
            function getLGAOfOriginList(sel)
            {
            var stateCode = sel.options[sel.selectedIndex].value;
                    document.getElementById('selLGA').options.length = 0; // Empty city select box
                    if (stateCode.length > 0){
            var index = ajax.length;
                    ajax[index] = new sack();
                    ajax[index].requestFile = '<?php echo base_url(); ?>assets/files/getLGA.php?stateCode=' + stateCode; // Specifying which file to get
                    ajax[index].onCompletion = function(){ createListLGAOrigin(index) }; // Specify function that will be executed after file has been found
                    ajax[index].runAJAX(); // Execute AJAX function
            }
            }
    function createListLGAOrigin(index)
    {
    var obj = document.getElementById('selLGA');
            eval(ajax[index].response); // Executing the response from Ajax as Javascript code	
    }
    function createDepts(index)
    {
    var obj = document.getElementById('frmbirthlga');
            eval(ajax[index].response); // Executing the response from Ajax as Javascript code	
    }

    function getDeptList(sel)
    {
    var facultyCode = sel.options[sel.selectedIndex].value;
            document.getElementById('selDept').options.length = 0; // Empty city select box
            if (facultyCode.length > 0){
    var index = ajax.length;
            ajax[index] = new sack();
            ajax[index].requestFile = '<?php echo base_url(); ?>assets/files/getDept.php?facultyCode=' + facultyCode; // Specifying which file to get
            ajax[index].onCompletion = function(){ createDepartments(index) }; // Specify function that will be executed after file has been found
            ajax[index].runAJAX(); // Execute AJAX function
    }
    }

    function createDepartments(index)
    {
    var obj = document.getElementById('selDept');
            eval(ajax[index].response); // Executing the response from Ajax as Javascript code	
    }
</script>
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-xs-10">    
                <legend><img src="<?php echo base_url(); ?>assets/images/b_search.png" alt="login"/>
                    Welcome new user : 
                    <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")"; ?>
                    <h3><strong>new student registration system</strong></h3>
                </legend>
                <?php
                $attributes = array('class' => 'form', 'role' => 'form');
                echo form_open('secured/CreateAcct', $attributes);
                ?>
                <fieldset>
                    <legend><img src="<?php echo base_url(); ?>assets/images/error.png" alt="error"/>
                        <?php echo validation_errors(); ?>
                    </legend>
                </fieldset>
                <div class="form-group row">
                    <label class="col-xs-2 col-form-label">Reg Number:</label>
                    <div class="col-xs-10">
                        <input class="form-control" id="focusedInput" name="regno" type="text" id="regno"
                               value="<?php echo $_SESSION['RegNumb'] ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-2 control-label">State:</label>
                    <div class="col-xs-10">
                        <select name="state" required class="form-control">
                            <option value="">[select one]</option>
                            <?php
                            $query = $this->db->query("SELECT DISTINCT StateOfOrigin from studentslogin  ORDER BY StateOfOrigin");

                            foreach ($query->result() as $row) {
                                echo '<option value="' . $row->StateOfOrigin . '">' . $row->StateOfOrigin . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-2 control-label">LGA:</label>
                    <div class="col-xs-10">
                        <select name="LGA" required class="form-control">
                            <option value="">[select one]</option>
                            <?php
                            $query = $this->db->query("SELECT DISTINCT LGA from studentslogin  ORDER BY LGA");

                            foreach ($query->result() as $row) {
                                echo '<option value="' . $row->LGA . '">' . $row->LGA . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-2 control-label">Faculty:</label>
                    <div class="col-xs-10">
                        <select name="faculty" required class="form-control">
                            <option value="">[select one]</option>
                            <?php
                            $query1 = $this->db->query("SELECT DISTINCT FacAbrev from studentslogin ORDER BY FacAbrev");

                            foreach ($query1->result() as $row) {
                                echo '<option value="' . $row->FacAbrev . '">' . $row->FacAbrev . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                    <div class="form-group row">
                        <label class="col-xs-2 control-label">Course:</label>
                        <div class="col-xs-10">
                            <select name="course" required class="form-control">
                                <option value="">[select one]</option>
                                <?php
                                $query2 = $this->db->query("SELECT DISTINCT CorsAbrev from studentslogin ORDER BY CorsAbrev");

                                foreach ($query2->result() as $row) {
                                    echo '<option value="' . $row->CorsAbrev . '">' . $row->CorsAbrev . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 control-label">Email:</label>
                        <div class="col-xs-10">
                            <input class="form-control" id="focusedInput" name="email" type="text" id="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 control-label">Password:</label>
                        <div class="col-xs-10">
                            <input class="form-control" id="password" name="password" type="password" id="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 control-label">Confirm Password:</label>
                        <div class="col-xs-10">
                            <input class="form-control" id="cpassword" name="cpassword" type="password" id="cpassword" required/>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="col-xs-10">
                            <img src="<?php echo base_url(); ?>assets/images/ugpics/demo_students.JPG" width="584" height="111" align="middle" />
                        </div>
                    </div> 
                    <div align="center">
                        <button type="submit" name="submitButton" class="btn btn-success">
                            <img src="<?php echo base_url(); ?>assets/images/s_rights.png" width="16" height="16" />
                            <b>Proceed And Create Account</b>
                        </button>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php echo base_url(); ?>index.php/secured/CreateAcct" class="btn btn-success" role="button">create new account</a>
                        </div>

                        <div class="col-sm-4">
                            <a href="<?php echo base_url(); ?>index.php/secured/Forgotpwd" class="btn btn-success" role="button">forgot password</a>
                        </div>

                        <div class="col-sm-4">
                            <a href="<?php echo base_url(); ?>index.php/secured/admin/loginc" class="btn btn-success" role="button">admin only!!!</a>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-sm-2 sidenav">
                    <div class="well">
                        <p>
                            ADS
                        </p>
                    </div>
                    <div class="well">
                        <p>ADS</p>
                    </div>
                </div>
            </div>
        </div>
