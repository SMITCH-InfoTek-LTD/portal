<title>upload staff passport photo</title>
<fieldset>
    <?php echo $error;?>
    <legend>Upload Passport</legend>
    <?php
    echo form_open_multipart('staff/uploadpicc/do_upload');
    ?>
    <p>
        <label for="passport">upload passport photo</label>
        <input name="userfile" type="file" />
    </p>
    <p class="submit">
        <button type="submit" name="submitButton">
            <img src="<?php echo base_url(); ?>assets/images/b_save.png" width="16" height="16" />
            Submit your form
        </button>
        <button type="reset" name="restButton">
            <img src="<?php echo base_url(); ?>assets/images/reset.png" width="16" height="16" />
            Start over
        </button>
    </p>
    <?php
    echo form_close();
    ?>
</fieldset>