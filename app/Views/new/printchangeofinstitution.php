<?php



if (!isset($_SESSION['RegNumb'])) {
    redirect('/Newstudentc', 'refresh');
}
?>

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->RegNumb = $_SESSION['RegNumb'];
//echo $this->RegNumb;
$Sqlqry = "SELECT paymentItems.ItemCode,paymentTrans.Item_Code,admittedstudents.RegNumb,paymentTrans.status,paymentTrans.message,"
        . "paymentTrans.RRR,paymentTrans.transID,paymentItems.ItemName,paymentTrans.status,paymentTrans.Student_type,"
        . "paymentTrans.Amount,paymentTrans.transactiontime,paymentTrans.academic_session"
        . " FROM paymentTrans,paymentItems,admittedstudents"
        . " WHERE (paymentItems.ItemCode = paymentTrans.Item_Code) AND (admittedstudents.RegNumb = paymentTrans.RegNumb)"
        . " AND((paymentTrans.status = '00') || (paymentTrans.status = '01'))AND((paymentItems.ItemCode = '3003'))"
        . " AND (paymentTrans.RegNumb='" . $this->RegNumb . "')";
$qry = $this->db->query($Sqlqry);
?>
<?php if ($qry->num_rows() > 0) :
    $row1 = $qry->row_array();
    var_dump($row1);//die();
    $_SESSION['message'] = $row1['message'];
    $_SESSION['ItemName'] = $row1['ItemName'];
    $_SESSION['transID'] = $row1['transID'];
    $_SESSION['RRR'] = $row1['RRR'];
    $_SESSION['academic_session'] = $row1['academic_session'];
    $_SESSION['transactiontime'] = $row1['transactiontime'];
    $_SESSION['amount'] = $row1['Amount'];
    $_SESSION['orderId'] = $row1['transID'];
    $_SESSION['Student_type'] = $row1['Student_type'];
?>
<body>
    <!-- main content -->
    <div class="container-fluid">
      <div class="row pad-top-botm ">
         <div class="col-lg-12 col-md-12 col-sm-12 " align="center">
            
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6" align="center">
              <strong>UNIVERSITY OF ABUJA</strong>
              <br/>
              <i>Main Campus, Airport Road,</i>
              <br />
              <i>FCT - Abuja,</i> 
              <i>Nigeria.</i><br/>
              Email: bursary@uniabuja.edu.ng<br/>
              <img src="<?php echo base_url(); ?>assets/images/logo.jpg" style="width:80px; height:80px" />
              <br/>Office Of the Bursar
         </div>
     </div>
     <div  class="row pad-top-botm client-info">
         <div class="col-lg-6 col-md-6 col-sm-6" align="left">
         <h4>  <strong>Candidate's Information</strong></h4>
           <strong><?php echo ucwords($_SESSION['CandName']); ?></strong>
             <br />
             <b>Reg number:</b> <?php echo $_SESSION['RegNumb']; ?>
             <br/>
             <b>Faculty   :</b> <?php echo $_SESSION['Faculty']; ?>
             <br/>
             <b>Department:</b> <?php echo $_SESSION['Dept']; ?>
             <br/>
             <b>Course    :</b> <?php echo $_SESSION['Course']; ?>
             <br/>
             <b>Level     :</b> <?php echo $_SESSION['Student_type']; ?>
             <br/>
             <b>Session   :</b> <?php echo $_SESSION['academic_session']; ?>
             <br/>
             <b>Email     :</b> <?php  ?><br/>
             <b>Phone     :</b> <?php  ?><br/>
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6" align="right">
               <h4 align="right">  <b>Payment Details </b></h4>
            <b>Remita Retrieval Reference(RRR) :  <?php echo $_SESSION['RRR']; ?></b>
              <br />
               <b>Payment Status :  <?php echo $_SESSION['message']; ?> </b>
               <br />
               Amount paid :  <?php echo $_SESSION['amount']; ?>
              <br />
               Payment Date : <?php echo $_SESSION['transactiontime'] ;?>
               <br/>
               Transaction ReferenceID : <?php echo $_SESSION['orderId']; ?>
         </div>
     </div>
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="width:100%">
                                <tr>
                                    <th align="left">S.No</th>
                                    <th align="left">Particular(s)</th>
                                    <th align="left">Amount</th>
                                    <th align="left">Total</th>
                                </tr>
 
                                <tr>
                                    <td>1</td>
                                    <td><?php echo $_SESSION['ItemName']; ?></td>
                                    <td><?php echo $_SESSION['amount'] ;?></td>
                                    <td><?php echo $_SESSION['amount'] ;?></td>
                                </tr>                 
                        </table>
               </div>
             <hr />
             <div class="ttl-amts">
               <h5>  Total Amount : <?php echo $_SESSION['amount'] ;?> </h5>
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
<?php else:  ?>
   Nopayment made
<?php endif ?>
            