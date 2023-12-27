<?php

include_once 'db-connect.php';
include_once 'session.php';
sec_session_start();

$error_msg = "";
if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}
 
if (isset($_POST['name'],$_POST['lnote'])) {
    // Sanitize and validate the data passed in
    $id = filter_input(INPUT_POST, 'nid', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $lnote = filter_input(INPUT_POST, 'lnote', FILTER_SANITIZE_STRING);

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //


            // Execute the prepared query.
            
      
    if ($name != '' && $id != '' && $lnote != '') {
    
              $insert_stmt = $mysqli->prepare("UPDATE testimonials SET customer=?, testimonial=? WHERE id = ?"); 
            $insert_stmt->bind_param('ssi', $name,$lnote,$id);
         $insert_stmt->execute();
                 echo "success";

        
    }
    else echo "error";
}
else echo "please try again";
?>