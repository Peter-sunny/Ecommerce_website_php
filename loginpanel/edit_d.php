<?php

include_once 'db-connect.php';
include_once 'session.php';
sec_session_start();

$error_msg = "";
if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}
 
if (isset($_POST['name'],$_POST['nid'],$_POST['date'], $_POST['snote'])) {
    // Sanitize and validate the data passed in

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'nid', FILTER_SANITIZE_NUMBER_INT);
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
                    $target_dir = "uploads/news/";
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
               
              $insert_stmt = $mysqli->prepare("UPDATE downloads SET title=?, date=? , dlink=? , snote=?  WHERE id = ?"); 
              $imm = serialize($images_arr);
            $insert_stmt->bind_param('ssssi', $name, $date,$imm, $snote,$id);

            
        
         $insert_stmt->execute();
                 echo "success";

        
    }
    else echo "error";
}
else echo "please try again";
?>