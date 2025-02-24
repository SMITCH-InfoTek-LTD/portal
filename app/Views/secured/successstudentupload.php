<?php
$this->load->library('session');
//$logsessiondata = $this->session->all_userdata();
//if (!isset($logsessiondata['email'])) {
//    redirect('', 'refresh');
//}
$this->load->helper('url');
?>
<body>
    <div id="columnLeft">
           <?php
        echo "
This project is aimed at developing the automated system and service centre. 
The system is an online application that can be accessed throughout the 
organization and outside students as well with proper login provided, 
which will give better service to the alumni students.";
        ?>
            <div id="menuleft">
                <ul><h5>more menu...</h5>
                    <?php
                    //$this->load->view('sidemenu');
                    ?>
                </ul>
            </div>
        </div>
    <div id="formreg">
        <div class="clearfix">
            <fieldset title="database update was successful" style=" border-color:  whitesmoke">
                <h1 style="color: green">Congratulations!!!! </h1>
                <h3 style="color: black;font-style: italic"> update was successful!!!</h3>
                <p>
                    <?php
                    echo '<a href="' . base_url() . 'index.php/student/reginfoc">register more</a>';
                    
                    ?>
                </p>
                <div>
                    <table class="table table-striped table-hover table-bordered" style="table-layout: fixed;">
                <caption>Address Book List</caption>
                <thead>
                    <tr>
                        <th>Sno</th>
                        <th>Regno</th>
                        <th>Leve</th>
                        <th>CCode</th>
                        <th>Semester</th>
                        <th>Examyear</th>
                        <th>Score</th>
                        <th>Grade</th>
                        <th>Session</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($tblresults == FALSE): ?>
                        <tr><td colspan="4">There are currently No Addresses</td></tr>
                    <?php else: ?>
                        <?php foreach ($tblresults as $row): ?>
                            <tr>
                                <td><?php echo $row['sno']; ?></td>
                                <td><?php echo $row['regno']; ?></td>
                                <td><?php echo $row['level']; ?></td>
                                <td><?php echo $row['ccode']; ?></td>
                                <td><?php echo $row['semester']; ?></td>
                                <td><?php echo $row['examyear']; ?></td>
                                <td><?php echo $row['score']; ?></td>
                                <td><?php echo $row['score']; ?></td>
                                <td><?php echo $row['grade']; ?></td>
                                <td><?php echo $row['session']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php redirect('student/resultsuploadc', 'refresh'); ?>
                </tbody>
            </table>
        </div>
            </fieldset><br />
        </div>
    </div>
    <div id="columnRightH" style=" padding-bottom: 1em;margin-top: -16.5em;">
        <div id="menuRightH">
            <ul><h5>more menu...</h5>
                <?php
                $this->load->view('menu/sidemenu');
                ?>
            </ul>    
        </div>
    </div>
</body>