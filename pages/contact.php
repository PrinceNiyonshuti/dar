<?php
include "../admin/config/config.php";

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$message = $_POST['message'];
$date = date("Y-m-d");

$start = $date." 00:00:00";
$end = $date." 23:59:00";


$sql = " SELECT * FROM contact WHERE email='$email' AND gen_date BETWEEN '$start' AND '$end' ";
$query = $conn->prepare($sql);
$query->execute();
$data = $query->rowCount();

if ($data >=2) {
    ?>
        <div class="alert-list">
            <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close">x</i></span></button> Sorry <?php echo $full_name;?> , you can't send more than 2 message today.
            </div>
        </div>
    <?php
} else {
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = " INSERT INTO `contact`(`full_name`, `email`, `detail`) VALUES ('$full_name','$email','$message') ";
    $conn->exec($sql);
    $lastId = $conn->lastInsertId();

    if ($sql) {
        
        ?>
        <div class="alert-list">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close">x</i></span></button> Your Message Was Successfully Sent.
            </div>
        </div>
        <?php

    } else {

        ?>
        <div class="alert-list">
            <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close">x</i></span></button> Something went wrong. Don't panic! Please try again later.
            </div>
        </div>
        <?php
    }
}


?>