<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
         $to = "npprince47@gmail.com";
         $subject = "Notification Receiver ";
         
         $message = "<b> Hello , I want to receive your notification when site launched </b> <br> My E-mail is :  ";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:abc@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>
      
   </body>
</html>

<div class="row">
   <div class="col-lg-5">
      
   </div>
   <div class="col-lg-7">
      <h1>Welcome To Rwanda</h1>
      <p>Discover the hidden beauty from the bottom</p>
   </div>
</div>