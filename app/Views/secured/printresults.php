<title>
    <?php
if (isset($title)) {
    echo $title;
}

if (!isset($_SESSION['staffID'])) {
    redirect('/home', 'refresh');
}
?>
</title>
<body>
    <div id="columnLeft">
        <?php
        echo "";
        ?>
        <div id="menuleft">
            <ul><h5>more menu...</h5>
                <?php
                $this->load->view('menu/sidemenu');
                ?>
            </ul>
        </div>
    </div>
    <div id="columnMain">
        <div style="font-family: Corbel;">
            <?php
            echo form_open('student/printresultsc');
            ?>
            <label id="label2">
                <legend><img src="<?php echo base_url(); ?>assets/images/b_edit.png" alt="login" width="30" height="30"/>
                    Reports Generation   ----   Print reports</legend>
                <h3>Please read the instructions carefully before you preceed!</h3>
                <fieldset>
                    <hr> 
                    <a href="#" title="File will be genrated as plain HTML then you can export as PDF">instructions.</a><br/>
                    <label> Enter your Regno:</label>
<?php echo '<input name="regno" type="text" id="regno"  value="" size="20" required/>'; ?>
                    <button type="submit" name="submitButton">
                        <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
                        Generate for one student
                    </button><br/>  
                    <hr>
                    <!---
                    <label>Generate ALL results</label>
<?php //echo '<input name="regno" type="text" id="regno"  value="" size="20" required/>';  ?>
                    <button type="submit" name="submitButton">
                        <img src="<?php //echo base_url();  ?>assets/images/b_save.png" width="16" height="16" />
                        Generate for one student
                    </button> 
                    ---->
                    </label>
                </fieldset>
        </div>
    </div>