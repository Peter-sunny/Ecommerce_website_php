<?php

include_once 'db-connect.php';
include_once 'session.php';
$error_msg = "";
sec_session_start();

if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}
// echo $_SESSION['user_type'];
if (isset($_GET['id'])) {
    // Sanitize and validate the data passed in

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //


            // Execute the prepared query.
            
      
    if ($id !='') {
    
               
               
              $insert_stmt = $mysqli->prepare("DELETE FROM applications WHERE id = ?"); 
            $insert_stmt->bind_param('i', $id);

            
        
         $insert_stmt->execute();
         header('Location: applications.php');
        
    }
    else echo "error";
}
else echo "please try again";
?>