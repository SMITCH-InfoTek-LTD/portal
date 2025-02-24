<?php

if (!isset($_SESSION['RegNumb'])) {
    redirect('/secured/Studentloginc', 'refresh');
}

if (isset($_SESSION["response3"])) {
    $response3 = $_SESSION["response3"];
}
?>
<body>
    <!-- main content -->
    <div class="container-fluid">
      <div class="row pad-top-botm ">
         <div class="col-lg-12 col-md-12 col-sm-12 " align="center">
            <img src="<?php echo base_url(); ?>assets/images/logo.jpg" style="width:70px; height:70px" /><br/> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6" align="center">
              <strong>UNIVERSITY OF ABUJA</strong>
              <br/>
              <i>Main Campus, Airport Road,</i>
              <br />
              <i>FCT - Abuja,</i> 
              <i>Nigeria.</i><br/>
              Email: bursary@uniabuja.edu.ng
              <br/>Office Of the Bursar
         </div>
     </div>
     <div  class="row pad-top-botm client-info">
         <div class="col-lg-6 col-md-6 col-sm-6" align="left">
         <h4>  <strong>Candidate's Information</strong></h4>
           <strong><?php echo ucwords($_SESSION['lname'].'  '.$_SESSION['mname']. '  ' .$_SESSION['sname'] ); ?></strong>
             <br />
             <b>Reg number:</b> <?php echo $_SESSION['RegNumb']; ?>
             <br/>
             <b>Faculty   :</b> <?php echo $_SESSION['FacAbrev']; ?>
             <br/>
             <b>Department:</b> <?php echo $_SESSION['degree']; ?>
             <br/>
             <b>Course    :</b> <?php echo $_SESSION['degree']; ?>
             <br/>
             <b>Level     :</b> <?php echo $_SESSION['level']; ?>
             <br/>
             <b>Session   :</b> <?php echo ACADEMIC_SESSION; ?>
             <br/>
             <b>Email     :</b> <?php  ;?><br/>
             <b>Phone     :</b> <?php  ?><br/>
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6" align="right">
               <h4 align="right">  <b>Payment Details </b></h4>
               <b>Remita Retrieval Reference(RRR) : </b> <?php echo $response3['RRR']; ?>
              <br />
               <b>Payment Status :</b>  <?php echo $response3['message']; ?> 
               <br />
               <b>Amount paid :</b>  <?php echo $response3['Amount']; ?>
              <br />
               <b>Payment Date :</b> <?php echo $response3['transactiontime'] ;?>
               <br/>
               <b>Transaction ReferenceID :</b> <?php echo $response3['OrderID']; ?>
         </div>
     </div>
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Particular(s)</th>
                                    <th>Amount</th>
                                     <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><?php echo $response3['ItemName']; ?></td>
                                    <td><?php echo $response3['Amount'] ;?></td>
                                    <td><?php echo $response3['Amount'] ;?></td>
                                </tr>                 
                            </tbody>
                        </table>
               </div>
             <hr />
             <div class="ttl-amts">
               <h5>  Total Amount : <?php echo $response3['Amount'] ;?> </h5>
             </div>
             <hr />
              <div class="ttl sign" align="left">
                  <img src="<?php echo base_url(); ?>assets/images/bursar1.jpg" style="width:200px; height:100px" />
             </div>
         </div>
     </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
             <ol>
                 <li><b style="font-family: cursive;color: red;">Do NOT alter this receipt, ANY ALTERATION RENDERS IT INVALID</b></li>
                 <li><b style="font-family: cursive;color: green;">Please make sure you print your receipt and keep it safe!!!</b></li>
             </ol>
             </div>
         </div>
 </div>
