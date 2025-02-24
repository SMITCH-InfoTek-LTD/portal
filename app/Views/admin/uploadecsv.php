<?php  ?>
<?php
if (!isset($_SESSION['username'])) {
    redirect(''
            . '', 'refresh');
}
?>
<title>Upload File to server</title>
<style type="text/css">
    #autoSuggestionsList > li {
        background: none repeat scroll 0 0 #F3F3F3;
        border-bottom: 1px solid #E3E3E3;
        list-style: none outside none;
        padding: 3px 15px 3px 15px;
        text-align: left;
    }
    #autoSuggestionsList > li a { color: #800000; }
    .auto_list {
        border: 1px solid #E3E3E3;
        border-radius: 5px 5px 5px 5px;
        position: absolute;
    }
</style>
<body style="color:black;">
    <!-- content -->
    <div class="container-fluid text-center">
        <div class="row content">
           <div class="col-sm-2 sidenav">
                <?php $this->load->view('menu/menu'); ?>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <legend>
                    <span class="glyphicon glyphicon-user"></span>
                    Welcome
                    <?php echo ucwords($_SESSION['fname'] . ' ' . $_SESSION['surname']); ?>
                    <?php echo "(Username  :" . $_SESSION['username'] . ")"; ?>
                </legend>
                <div class="table-responsive">

                    <table border="0" cellpadding="0" cellspacing="0" width="" class="table table-responsive">

                        <?php
                        echo validation_errors();
                        $attributes = array('class' => 'form-inline', 'role' => 'form', 'name' => 'jambtoregno', 'id' => 'jambtoregno');
                        echo form_open_multipart('admin/CsvPushUp', $attributes);
                        ?>
                        <tr>
                            <td align="left"><label>Select file</label></td>
                            <td align="center"><input type="file" name="userfile"/></td>
                        </tr>
                        <tr>
                        <td colspan="4">                            
<button type="submit" class="btn btn-success btn-sm" name="submitButton" id="submit_enquiry">
                                    <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
                                    <b>Push Up</b></button></td>
                        </tr>
                        <tr>
                        <marquee>
                            <h2>NOTICE!! All Candidates Captured In Excel Are Automatically Updated.</h2> 
                        </marquee>
                        <tr>
                            
                        </tr>

                        <?php
                        form_close()
                        ?>
                    </table>
                </div>
            </div>
            <div class="col-sm-2 sidenav">
                <?php ?>
            </div>
        </div>
    </div>