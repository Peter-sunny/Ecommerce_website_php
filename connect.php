<?php






 
if (isset($_POST['contact_name'], $_POST['contact_email'], $_POST['contact_comment'], $_POST['contact_subject'])) {
    // Sanitize and validate the data passed in

    $name = filter_input(INPUT_POST, 'contact_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'contact_email', FILTER_SANITIZE_EMAIL);
    $comment = filter_input(INPUT_POST, 'contact_comment', FILTER_SANITIZE_STRING);
    $msg = filter_input(INPUT_POST, 'contact_subject', FILTER_SANITIZE_STRING);


    
    // your email
    $user_email = "ToAddress@gmail.com";



 $content= $name."\n".$email."\n".$comment;

         mail($user_email,$msg,$content );

  



?>