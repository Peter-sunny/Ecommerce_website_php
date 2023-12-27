<?php
include_once 'db-connect.php';
include_once 'session.php';
$error_msg = "";
sec_session_start();

if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}
if (isset($_POST['name'],$_POST['lnote'])) {
    // Sanitize and validate the data passed in

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $lnote = filter_input(INPUT_POST, 'lnote', FILTER_DEFAULT );

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //


            // Execute the prepared query.
            
      
    if ($name != '' && $lnote != '') {
              $insert_stmt = $mysqli->prepare("INSERT INTO applications (title, description) VALUES (?, ?)"); 
            $insert_stmt->bind_param('ss', $name, $lnote);
         $insert_stmt->execute();
                 echo "success";
    }
    else echo "error";
}
else echo "please try again";
?>