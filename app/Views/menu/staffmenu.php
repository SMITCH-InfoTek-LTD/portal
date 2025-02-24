
<legend><b>Main menu</b>
    <div id="menuS">
        <ul> 
            <?php
            /*
             * To change this template, choose Tools | Templates
             * and open the template in the editor.
             */
            if (isset($_SESSION['roleid']) == '1') {
                print '<li><a href="' . base_url() . 'index.php/secured/admin/Mainstaffc" accesskey="h">
                <img src="' . base_url() . 'assets/images/b_home.png" alt="home" width="13" height="13"/>
                    Home</a></li>';
                /****
                print '<li><a href="' . base_url() . 'index.php/staff/Searchstaffc" accesskey="l">
                  <img src="' . base_url() . 'assets/images/b_search.png" alt="search" width="13" height="13"/>Search</a></li>';
                print '<li><a href="' . base_url() . 'index.php/staff/Registerstaffc" accesskey="r">
                <img src="' . base_url() . 'assets/images/b_usradd.png" alt="usradd" width="13" height="13"/>
                    Register</a></li>';
                print '<li><a href="' . base_url() . 'index.php/contactusc" accesskey="c">
                <img src="' . base_url() . 'assets/images/contact.jpeg" alt="contact" width="13" height="13"/>Contact Us</a></li>';                
                print '<li><a href="' . base_url() . 'index.php/staff/searchupdatec">
        <img src="' . base_url() . 'assets/images/b_edit.png" alt="edit" width="15" height="15"/>Update Staff Profile</a></li>';
                print '<li><a href="' . base_url() . 'index.php/staff/printslip">
        <img src="' . base_url() . 'assets/images/b_pdfdoc.png" alt="pdf" width="15" height="15"/>Print Staff Profile</a></li>';
                print "<hr/>";
                 ***/
                 
                print '<li><a href="' . base_url() . 'index.php/secured/admin/ViewRegCand" accesskey="r">
        <img src="' . base_url() . 'assets/images/b_usradd.png" alt="usradd" width="15" height="15"/>View Register Candidate</a></li>';
                print '<li><a href="' . base_url() . 'index.php/secured/admin/Searchupdatecandidatec">
        <img src="' . base_url() . 'assets/images/b_edit.png" alt="edit" width="15" height="15"/>Update Candidate Profile</a></li>';
                /**
                print '<li><a href="' . base_url() . 'index.php/student/courseregc" accesskey="c">
        <img src="' . base_url() . 'assets/images/b_edit_2.png" alt="edit" width="15" height="15"/>Print by Course</a></li>';
                print '<li><a href="' . base_url() . 'index.php/student/printregcoursesc" class="akey">
        <img src="' . base_url() . 'assets/images/printer.gif" alt="edit" width="15" height="15"/>Print by Faculty</a></li>';
                print '<li><a href="' . base_url() . 'index.php/student/resultsuploadc" class="akey">
       <img src="' . base_url() . 'assets/images/b_edit.png" alt="edit" width="15" height="15"/>Print by Score</a></li>';
                 * 
                 */
                print '<li><a href="' . base_url() . 'index.php/secured/admin/Searchcandidatec">
          <img src="' . base_url() . 'assets/images/b_search.png" alt="login" width="15" height="15"/>Search Student</a></li>';
                print '<li><a href="' . base_url() . 'index.php/secured/admin/Logoutc" accesskey="u">
                <img src="' . base_url() . 'assets/images/s_loggoff.png" alt="login" width="13" height="13"/>Logout</a></li>';
            } elseif (isset($_SESSION['roleid']) == '2') {
                print '<li><a href="' . base_url() . 'index.php/staff/mainstaffc" accesskey="h">
                <img src="' . base_url() . 'assets/images/b_home.png" alt="login" width="20" height="20"/>Home</a></li>';
                print '<li><a href="" accesskey="g">General News</a></li>';
                print '<li><a href="' . base_url() . 'index.php/contactusc" accesskey="c">Contact Us</a></li>';
            } elseif (isset($_SESSION['roleid']) == '3') {
                print '<li><a href="' . base_url() . 'index.php/staff/mainstaffc" accesskey="h">Home</a></li>';
                print '<li><a href="" accesskey="g"><span class="akey">G</span>eneral News</a></li>';
                print '<li><a href="' . base_url() . 'index.php/contactusc" accesskey="c">Contact Us</a></li>';
                print '<li><a href="' . base_url() . 'index.php/Logoutc" accesskey="u">Logout</a></li>';
            } else {
                print '<li><a href="' . base_url() . 'index.php/home" accesskey="h">
                  <img src="' . base_url() . 'assets/images/b_home.png" alt="login" width="20" height="20"/>Home</a></li>';
                print '<li><a href="" accesskey="g">General News</a></li>';
                print '<li><a href="' . base_url() . 'index.php/staff/loginc" accesskey="l">
                  <img src="' . base_url() . 'assets/images/s_rights.png" alt="login" width="22" height="22"/>
                  Login</a></li>';
            }
            ?>
        </ul>
    </div>
</legend>