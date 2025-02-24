 <div class="row navLeft" style="background-color: green">
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <?php
            /*
             * To change this template, choose Tools | Templates
             * and open the template in the editor.
             */
            if(($_SESSION['roleid'])== '1') {
                print '<li><a href="' . base_url() . 'index.php/admin/Mainstaffc" class="btn btn-success btn-lg active" role="button">Home page</a></li>'; 
                print '<li><a href="' . base_url() . 'index.php/admin/QueryFailedTransactions" class="btn btn-success btn-lg active" role="button">Query Failed Trans</a></li>';                
                print '<li><a href="' . base_url() . 'index.php/admin/GetPaymentStatusRRR" class="btn btn-success btn-lg active" role="button">Get Status RRR</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/GetPaymentStatusID" class="btn btn-success btn-lg active" role="button">Get Status OrderID</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/GetPaymentStatus" class="btn btn-success btn-lg active" role="button">Update Payment<br/> Status(RRR)</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/CsvPushUp" class="btn btn-success btn-lg active" role="button">CsVPushUp</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/SortAllocations" class="btn btn-success btn-lg active" role="button">SortAllocations</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/Booked2Paid" class="btn btn-success btn-lg active" role="button">Booked2Paid</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/Jambtoregnoc" class="btn btn-success btn-lg active" role="button">Jamb to Regno</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/Displaycandidateinfoc" class="btn btn-success btn-lg active" role="button">Jamb2Reg</a></li>';
print '<li><a href="' . base_url() . 'index.php/admin/UpdateStudentRecord" class="btn btn-success btn-lg active" role="button">Update Student<br/>Profile</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/RevokeHostelsc" class="btn btn-success btn-lg active" role="button">Revoke Hostel</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/Logoutc" class="btn btn-success btn-lg active" role="button">Logout</a></li>';
                print '<li class="btn btn-success btn-lg" role="button"></li>';
                print '<li class="btn btn-success btn-lg" role="button"></li>';
                print '<li class="btn btn-success btn-lg" role="button"></li>';
            }else
            if(($_SESSION['roleid'])== '2'){
                print '<li class="btn btn-success btn-lg" role="button"></li>';
 print '<li><a href="' . base_url() . 'index.php/bursary/Mainbursarystaffc" class="btn btn-success btn-lg active" role="button">Home</a></li>';
 print '<li><a href="' . base_url() . 'index.php/admin/Logoutc" class="btn btn-success btn-lg active" role="button">Logout</a></li>';
            }elseif(($_SESSION['roleid'])== '3'){
                print '<li><a href="' . base_url() . 'index.php/admin/Mainstaffc" class="btn btn-success btn-lg active" role="button">Home page</a></li>'; 
                print '<li><a href="' . base_url() . 'index.php/admin/GetPaymentStatusRRR" class="btn btn-success btn-lg active" role="button">Get Status RRR</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/GetPaymentStatus" class="btn btn-success btn-lg active" role="button">Update Students<br/>Payment(RRR)</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/Displaycandidateinfoc" class="btn btn-success btn-lg active" role="button">Jamb2Reg</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/GetPaymentStatus" class="btn btn-success btn-lg active" role="button">Update Students<br/>Payment(RRR)</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/Logoutc" class="btn btn-success btn-lg active" role="button">Logout</a></li>';
            }elseif(($_SESSION['roleid'])==4){
                print '<li><a href="' . base_url() . 'index.php/admin/Mainstaffc" class="btn btn-success btn-lg active" role="button">Home page</a></li>'; 
print '<li><a href="' . base_url() . 'index.php/admin/QueryFailedTransactions" class="btn btn-success btn-lg active" role="button">Query Failed Trans</a></li>';                
                print '<li><a href="' . base_url() . 'index.php/admin/GetPaymentStatusRRR" class="btn btn-success btn-lg active" role="button">Get Status RRR</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/GetPaymentStatus" class="btn btn-success btn-lg active" role="button">Update Students<br/>Payment(RRR)</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/GetPaymentStatusID" class="btn btn-success btn-lg active" role="button">Get Status OrderID</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/Displaycandidateinfoc" class="btn btn-success btn-lg active" role="button">Jamb2Reg</a></li>';
print '<li><a href="' . base_url() . 'index.php/admin/UpdateStudentRecord" class="btn btn-success btn-lg active" role="button">Update Student Profile</a></li>';
print '<li><a href="' . base_url() . 'index.php/admin/Booked2Paid" class="btn btn-success btn-lg active" role="button">Booked2Paid</a></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/Logoutc" class="btn btn-success btn-lg active" role="button">Logout</a></li>';
            }elseif(($_SESSION['roleid'])=='5'){
                
            }elseif(($_SESSION['roleid'])=='6'){
                
            }else{
                print '<li class="btn btn-success btn-lg" role="button"></li>';
                print '<li><a href="' . base_url() . 'index.php/admin/Logoutc" class="btn btn-success btn-lg active" role="button">Logout</a></li>';
                print '<li class="btn btn-success btn-lg" role="button"></li>';
            }
            ?>
      </ul>
    </div>