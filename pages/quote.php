<?php
include "../admin/config/config.php";

$f_name = $_POST['f_name'];
$mail = $_POST['mail'];
$address = $_POST['address'];
$detail = $_POST['detail'];
$date = date("Y-m-d");

$start = $date." 00:00:00";
$end = $date." 23:59:00";

$sql = " SELECT * FROM quote WHERE email='$mail' AND gen_date BETWEEN '$start' AND '$end' ";
$query = $conn->prepare($sql);
$query->execute();
$data = $query->rowCount();

if ($data >=1) {
    ?>
        <div class="alert-list">
            <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close">x</i></span></button> Sorry <?php echo $f_name;?> , you can't generate more quotes today.
            </div>
        </div>
    <?php
} else {
   
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = " INSERT INTO `quote`(`full_name`, `email`, `addres`, `detail`) VALUES ('$f_name','$mail','$address','$detail') ";
    $conn->exec($sql);
    $lastId = $conn->lastInsertId();

    if ($sql) {
        
        ?>
        <div class="alert-list">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close">x</i></span></button> Your Quote successfully Generated.
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