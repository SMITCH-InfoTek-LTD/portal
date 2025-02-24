<?php

  if (!isset($_SESSION["RegNumb"])) {
        redirect("Welcome", "refresh");
    }
?>
<title>remita payment</title>
<script>
    function readyFn() {
        // Code to run when the document is ready.
        var str;
        var post_data = {'str': str,
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        };
        jQuery.ajax({
            type: "GET",
            data: post_data,
            url: "<?php echo base_url(); ?>" + "index.php/secured/Receiptc/remita_transaction_details?q=" + str,
            dataType: "json",
            success: function (res) {
                if (res)
                {
                    alert(res);
                }
            }
        });
    }
    //$(document).ready(readyFn);
</script>
<body>
    <div class="container-fluid text-center">
        <div class="col-sm-2 sidenav">
                       <p><?php echo anchor('/Welcome', 'Back to Dashboard'); ?></p>
            </div>
            <!-- main content -->
            <div class="col-sm-8 text-center">
                <legend>
                    <span class="glyphicon glyphicon-user"></span>
                    Welcome
                    <?php echo "(RegNumb  :" . $_SESSION['RegNumb'] . ")"; ?>
                </legend>
        <div class="row content">
        <?php if ($_SESSION['status'] == '01' || $_SESSION['status'] == '00') { ?>
            <h2>Transaction Successful</h2>
            <p><b>Remita Retrieval Reference: </b><?php echo $_SESSION['RRR']; ?><p>
            <?php } else if ($_SESSION['status'] == '021') { ?>
            <h2>RRR Generated Successfully</h2>
            <p><b>Remita Retrieval Reference: </b><?php echo $_SESSION['RRR']; ?><p>
            <?php } else { ?>
            <h2>Your Transaction was not Successful</h2>
            <?php if ($_SESSION['RRR'] != null) { ?>
                <p>Your Remita Retrieval Reference is <span><b><?php echo $_SESSION['RRR']; ?></b></span><br />
                <?php } ?> 
            <p><b>Reason: </b><?php echo $_SESSION['message']; ?><p>
            <?php } ?>
                <div class="col-sm-2 sidenav">
                <?php //$this->load->view('template/menu/sidenav'); ?>
            </div>
        </div>
    </div>
</body>