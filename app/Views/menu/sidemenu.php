<?php
if (isset($_SESSION['roleid']) == '1') {
    
    print '<li><a href="' . base_url() . 'index.php/staff/registerstaffc">
        <img src="' . base_url() . 'assets/images/b_usradd.png" alt="usradd" width="15" height="15"/>Register Staff</a></li>';
    print '<li><a href="' . base_url() . 'index.php/staff/grantaccessc">
        <img src="' . base_url() . 'assets/images/s_rights.png" alt="access" width="15" height="15"/>
            Grant Access</a></li>';
    print '<li><a href="' . base_url() . 'index.php/staff/searchstaffc">
        <img src="' . base_url() . 'assets/images/b_search.png" alt="login" width="15" height="15"/>Search for Staff</a></li>';
    print '<li><a href="' . base_url() . 'index.php/staff/searchupdatec">
        <img src="' . base_url() . 'assets/images/b_edit.png" alt="edit" width="15" height="15"/>Update Staff Profile</a></li>';
    print '<li><a href="' . base_url() . 'index.php/staff/printslip">
        <img src="' . base_url() . 'assets/images/b_pdfdoc.png" alt="pdf" width="15" height="15"/>Print Staff Profile</a></li>';
    print "<hr/>";
    print '<li><a href="' . base_url() . 'index.php/student/reginfoc" accesskey="r">
        <img src="' . base_url() . 'assets/images/b_usradd.png" alt="usradd" width="15" height="15"/>Register Student</a></li>';
    print '<li><a href="' . base_url() . 'index.php/student/searchupdatestudentc">
        <img src="' . base_url() . 'assets/images/b_edit.png" alt="edit" width="15" height="15"/>Update Student Profile</a></li>';
    print '<li><a href="' . base_url() . 'index.php/student/courseregc" accesskey="c">
        <img src="' . base_url() . 'assets/images/b_edit_2.png" alt="edit" width="15" height="15"/>Course Registration</a></li>';
    print '<li><a href="' . base_url() . 'index.php/student/printregcoursesc" class="akey">
        <img src="' . base_url() . 'assets/images/printer.gif" alt="edit" width="15" height="15"/>Print Registered Courses</a></li>';
    print '<li><a href="' . base_url() . 'index.php/student/resultsuploadc" class="akey">
        <img src="' . base_url() . 'assets/images/b_edit.png" alt="edit" width="15" height="15"/>Enter Result</a></li>';
    print '<li><a href="' . base_url() . 'index.php/student/printresultsc" <span class="akey"></span>
        <img src="' . base_url() . 'assets/images/printer.gif" alt="edit" width="15" height="15"/>Print Result</a></li>';
    print '<li><a href="' . base_url() . 'index.php">
          <img src="' . base_url() . 'assets/images/printer.gif" alt="edit" width="15" height="15"/><span class="akey">P</span>rint Transcript</a></li>';
    print '<li><a href="' . base_url() . 'index.php/student/searchstudentc">
          <img src="' . base_url() . 'assets/images/b_search.png" alt="login" width="15" height="15"/>Search Student</a></li>';   
    print '<li><a href="" >Send Mail</a></li>';
    print '<li><a href="' . base_url() . 'index.php/logoutc" accesskey="u"><span class="akey">L</span>ogout</a></li>';
} else if (isset($_SESSION['roleid']) == '2') {
    print '<li><a href="' . base_url() . 'index.php/staff/mainstaffc" accesskey="h"><span class="akey">H</span>ome</a></li>';
    print '<li><a href="" accesskey="g"><span class="akey">G</span>eneral News</a></li>';
    print '<li><a href="' . base_url() . 'index.php/contactusc" accesskey="c"><span class="akey">C</span>ontact Us</a></li>';
    print '<li><a href="' . base_url() . 'index.php/logoutc" accesskey="u"><span class="akey">L</span>ogout</a></li>';
} else if (isset($_SESSION['roleid']) == '3') {
    print '<li><a href="' . base_url() . 'index.php/staff/mainstaffc" accesskey="h"><span class="akey">H</span>ome</a></li>';
    print '<li><a href="" accesskey="g"><span class="akey">G</span>eneral News</a></li>';
    print '<li><a href="' . base_url() . 'index.php/logoutc" accesskey="u"><span class="akey">L</span>ogout</a></li>';
} else {
   print '<li><a href="' . base_url() . 'index.php/home" accesskey="h">
                  <img src="' .base_url() . 'assets/images/b_home.png" alt="login" width="20" height="20"/>
                  <span class="akey">H</span>ome</a></li>';
            print '<li><a href="" accesskey="g"><span class="akey">G</span>eneral News</a></li>';
            print '<li><a href="' . base_url() . 'index.php/staff/loginc" accesskey="l">
                  <img src="' .base_url() . 'assets/images/s_rights.png" alt="login" width="22" height="22"/>
                  <span class="akey">L</span>ogin</a></li>';
}
?>