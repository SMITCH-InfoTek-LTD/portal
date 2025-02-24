<div id="menu">
    <ul> 
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_SESSION['roleid']) == '') {
    print '<li><a href="' . base_url() . 'index.php/secured/Preadmissionloginc" accesskey="h"><span class="akey">H</span>ome</a></li>';
    print '<li><a href="" accesskey="g"><span class="akey">G</span>eneral News</a></li>';
    print '<li><a href="' . base_url() . 'index.php/secured/UpdateOlevelc" accesskey="e"><span class="akey">OLevel</span>Updates</a></li>';
    print '<li><a href="' . base_url() . 'index.php/" accesskey="c"><span class="akey">C</span>ontact Us</a></li>';
    print '<li><a href="' . base_url() . 'index.php/secured/Logoutc" accesskey="u"><span class="akey">L</span>ogout</a></li>';
}else{
    print '<li><a href="' . base_url() . 'index.php/secured/loginc" accesskey="u"><span class="akey">L</span>ogin</a></li>';
}
?>
</ul>
</div> 
