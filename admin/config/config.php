<?php
date_default_timezone_set('Africa/Kigali');

// $script_tz = date_default_timezone_get();

// if (strcmp($script_tz, ini_get('date.timezone'))){
//     echo 'Script timezone differs from ini-set timezone.';
// } else {
//     echo 'Script timezone and ini-set timezone match.';
// }

//PDO Connection 
$db = new PDO('mysql:host=localhost;dbname=dar;charset=utf8', 'root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->query('SET SESSION SQL_BIG_SELECTS=1');

//2and PDO CONNECTION

    $db_username = 'root';
    $db_password = '';
    $conn = new PDO( 'mysql:host=localhost;dbname=dar', $db_username, $db_password );
    if(!$conn){
        die("Fatal Error: Connection Failed!");
    }
    
    
//  function simple_crypt( $string, $action = 'e' ) {
//     // you may change these values to your own
//     $secret_key = 'Information Technology & Engineering Construction Ltd (ITEC Ltd) website,
//                   we make thinks that live on the web, we are an Android and IPhone app design 
//                   & Development, studio based in Edmonton, We are concept- a concept development 
//                   team of 12 staffs with over 10 years of internet experience (Bushenge Doctor Appoitment System)';
//     $secret_iv = 'Information Technology & Engineering Construction Ltd Tracking Software (COVID-19)';
 
//     $output = false;
//     $encrypt_method = "AES-256-CBC";
//     $key = hash( 'sha256', $secret_key );
//     $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
//     if( $action == 'e' ) {
//         $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
//     }
//     else if( $action == 'd' ){
//         $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
//     }
 
//     return $output;
// }

?>

