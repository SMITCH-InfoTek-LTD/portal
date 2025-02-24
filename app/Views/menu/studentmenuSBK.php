<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 if (isset($_SESSION['JambID'])) {
    //print '<li><a href="' . base_url() . 'index.php/student/viewcourseinfoc" accesskey="v"><span class="akey">V</span>iew Courses</a></li>';
    print '<li><a href="' . base_url() . 'index.php/student/displaystudentinfoc" accesskey="d"><span class="akey">D</span>isplay Info</a></li>';
    print '<li><a href="' . base_url() . 'index.php/student/displaystudentreginfoc" accesskey="c"><span class="akey">C</span>ource Registration</a></li>';
    print '<li><a href="' . base_url() . 'index.php/student/printregcoursesc" accesskey="g"><span class="akey">P</span>rint Course Sheet</a></li>';
    //print '<li><a href="" >Update Your Profile</a></li>';
    print '<li><a href="' . base_url() . 'index.php/contactusc">Contact Us</a></li>';
    print '<li><a href="' . base_url() . 'index.php/logoutc" accesskey="u"><span class="akey">L</span>ogout</a></li>';
}
