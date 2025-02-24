<title>
    <?php echo $title; ?>
</title>
<body>
    <div id="columnLeft">
           <?php  echo "";  ?>
            <div id="menuleft">
                <ul><h5>more menu...</h5>
                    <?php
                    echo view('menu/sidemenu');
                    ?>
                </ul>
            </div>
        </div>
    <div id="columnMain">
        <div class="clearfix">
            <?php
            echo form_open('staff/grantaccessc');
            ?>
            <div id="login">
                <fieldset>
                    <legend><img src="<?php echo base_url(); ?>assets/images/b_search.png" alt="search" width="30" height="30"/>
                        Grant higher privileges</legend><br/>
                     <label> Enter your StaffID:</label>
                     <input name="staffID" type="text" id="staffID"  value="" size="20" required />
                    
                <button type="submit" name="submitButton">
                                <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
                                Submit your form
                            </button>  
                </fieldset>
             <?php
                form_close()
             ?>
                <div id="errormessage">
                    <?php
                    echo form_error('staffID');
                    ?>
                </div>
             </div>
            <div id="update">
                <?php
                    $affectedRow = $this->session->flashdata('affectedRow');
                    if(!empty($affectedRow)){
                        echo "The number row(s) affected is :  " . $affectedRow;
                    }
                ?>
            </div>
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
            </body>