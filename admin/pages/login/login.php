<!DOCTYPE html>
<html lang="en">

<head>

     <link rel="apple-touch-icon" href="asset/images/log.png">
    <link rel="shortcut icon" href="asset/images/log.png"> 

    <link rel="stylesheet" href="asset/css/normalize.css">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/themify-icons.css">
<link rel="stylesheet" href="asset/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="asset/css/flag-icon.min.css">
    <link rel="stylesheet" href="asset/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="asset/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="asset/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

 <script src="js/jquery-3.2.1.min.js"></script>
<script src="js/princeop.js"></script>

</head>

<body>


<?php
include "../../config/config.php";
?>

<?php

session_start();

$username=$_POST["username"];
$password=$_POST['password'];
$password= md5($password);
// $password = md5($passwor); 

if(empty($username) || empty($password)){
    ?>
    <div class="alert alert-danger" role="alert">
    <i class='fa fa-times-circle'></i> Invalid username or password
        </div>
    <?php
}else{
  $query = " SELECT * from tbl_users_login where username='$username' and password='$password'  ";
  $result = $conn->query($query); 
  $row = $result->rowCount();

  $sql4=" SELECT * from tbl_users_login where username='$username' and password='$password'  ";
    $result4=$conn->query($sql4);
    while ($row4 = $result4->fetch()) {
      $role = $row4['role_id'];
      $profile_id = $row4['profile_id'];
      $username_real=$row4['username'];
      $password_real=$row4['password'];
    }

  if($row >= 1){

    $_SESSION['username']=$username;
    $_SESSION['profile'] = $profile_id;

    if ($username===$username_real and $password===$password_real) {   

      ?>
        <div class="alert alert-success" role="alert">
          <i class='fa  fa-check-circle'></i> Login successfull. Redirecting ...
        </div>
      <?php
      echo "<script>location.href='panel/index.php'</script>";
              
    }else {
      ?>
        <div class="alert alert-danger" role="alert">
          <i class='fa fa-times-circle'></i> Invalid username or password 1 <?php echo $role; ?>     
        </div>
      <?php
    }

  }else{
    ?>
      <div class="alert alert-danger" role="alert">
        <i class='fa fa-times-circle'></i> Invalid username or password
     </div>
    <?php      
  }
}
    

?>

</body>
</html>