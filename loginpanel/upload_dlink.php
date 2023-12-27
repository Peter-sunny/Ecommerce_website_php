<?php

include_once 'db-connect.php';
include_once 'session.php';
$error_msg = "";
sec_session_start();

if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}
if (isset($_POST['name'], $_POST['date'], $_POST['snote'])) {
    // Sanitize and validate the data passed in

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $snote = filter_input(INPUT_POST, 'snote', FILTER_SANITIZE_STRING);

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //


            // Execute the prepared query.
            
      
    if ($date !='') {
    
                $a=array();
                $images_arr = array();
                foreach($_FILES['images']['name'] as $key=>$val){
                    //upload and stored images
                    $target_dir = "uploads/dlink/";
                    $target_file = $target_dir.$_FILES['images']['name'][$key];
                    if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file)){
                    $images_arr[] = $target_file;
                    }
                    }
                if(!empty($images_arr)){ 
                foreach($images_arr as $image_src){
                array_push($a,$image_src); 
                 }
                }
               
              $insert_stmt = $mysqli->prepare("INSERT INTO downloads (title, date , dlink , snote ) VALUES (?, ?, ?,?)"); 
              $i = serialize($images_arr);
            $insert_stmt->bind_param('ssss', $name, $date, $i, $snote);

            
        
         $insert_stmt->execute();
                 echo "success";

        
    }
    else echo "error";
}
else echo "please try again";
?>