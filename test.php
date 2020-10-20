 <?php
   //Starting Query...
include "admin/config/config.php";

    if(ISSET($_POST['send_message'])){
        try {
            $f_name = $_POST['f_name'];
            $mail = $_POST['mail'];
            $message = $_POST['message'];
                        
                //for new Schedule..
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = " INSERT INTO `contact`(`full_name`, `email`, `detail`) VALUES ('$f_name','$mail','$message') ";
                $conn->exec($sql);
                $lastId = $conn->lastInsertId();
                
              // $message=" Worship Schedule Added Successfully";
                 echo '<script language="javascript">
                      alert(" Thanks  For Contacting Us ");
                      window.location.href = "index.php?contact";
                      </script>';
                
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                
                $conn = null;
                header('location: index.php?contact');
             }
        
    ?> 