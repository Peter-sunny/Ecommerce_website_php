<?php

include_once 'db-connect.php';
include_once 'session.php';
$error_msg = "";
sec_session_start();

if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}
if (isset($_POST['name1'])) {
    // Sanitize and validate the data passed in

    $name = filter_input(INPUT_POST, 'name1', FILTER_SANITIZE_STRING);

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //


            // Execute the prepared query.
            
      
    if ($name != '') {
              $insert_stmt = $mysqli->prepare("INSERT INTO app_count (count) VALUES (?)"); 
            $insert_stmt->bind_param('s', $name);
         $insert_stmt->execute();
                 echo "success";
    }
    else echo "error";
}
else echo "please try again";
?>