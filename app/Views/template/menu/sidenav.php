<div class="well">
    <p>
        <?php
        $image_properties = array(
            'src' => 'assets/uploads/student/' . $_SESSION['passport'],
            'alt' => ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']),
            'class' => 'img-responsive img-rounded',
            'width' => '100',
            'height' => '100',
            'title' => ucwords($_SESSION['lname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['sname']),
            'rel' => 'lightbox',
        );
        echo "<td rowspan='3'>" . img($image_properties) . "</td>";
        ?>
    </p>
</div>
<div class="well">
    <p>
        ADS
    </p>
</div>
<div class="well">
    <p>ADS</p>
</div>
