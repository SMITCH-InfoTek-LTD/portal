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
            echo form_open('student/searchupdatestudentc');
            ?>
            <div id="login">
                <fieldset>
                    <legend><img src="<?php echo base_url(); ?>assets/images/b_search.png" alt="search"/>
                        search</legend>
                      Enter your Regno:
                        <input type="text" name="regno" id="frmregno" size="30">
                       <button type="submit" name="submitButton">
                                <img src="<?php echo base_url(); ?>assets/images/b_search.png" width="16" height="16" />
                                Search
                       </button>  
                 </fieldset>
            </div>
            <?php
            form_close()
            ?>
        </div>
    </div>