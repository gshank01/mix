
 <?php
         $name= $_POST['fullname'];
         $visitor_email = $_POST['email'];
         $sub = $_POST['subject'];
         $message = $_POST['message'];

     
    //Validate first
     if(empty($name)||empty($visitor_email)) 
     {
         echo "Name and email are mandatory!";
         exit;
     }

     if(IsInjected($visitor_email))
     {
         echo "Bad email value!";
         exit;
     } 

    $email_from = "gracieshank@gmail.com";

 

    $email_subject = "New Form submission";

 

    $email_body = "You have received a new message from the user $name.\n".
    
    "Remember than when replying to this email, your messages will be sent to the customer who filled out the form.\n"
    
    "Subject: $sub.\n".
7
    "Here is the message:\n $message".
8
?>
     
<?php
    
3
  $to = "gracieshank@gmail.com";
4
 
5
  $headers = "From: $email_from \r\n";
6
 
7
  $headers .= "Reply-To: $visitor_email \r\n";
8
 
9
  mail($to,$email_subject,$email_body,$headers);
     
header('Location: thank-you.html');     

  
     
    // Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
    
     
    ?>
     
