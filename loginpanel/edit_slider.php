<?php

include_once 'db-connect.php';
include_once 'session.php';
sec_session_start();

$error_msg = "";
if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}
 
if (isset($_POST['title'],$_POST['nid'])) {
    // Sanitize and validate the data passed in
    $id = filter_input(INPUT_POST, 'nid', FILTER_SANITIZE_STRING);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
    // header('Location: slider.php');

            // Execute the prepared query.
            
      
    if ($title !='') {
    
                $a=array();
                $images_arr = array();
                foreach($_FILES['images']['name'] as $key=>$val){
                    //upload and stored images
                    $target_dir = "uploads/slide/";
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
               
              $insert_stmt = $mysqli->prepare("UPDATE slider SET title=?, image=? WHERE id = ?"); 
              $imm = serialize($images_arr);
            $insert_stmt->bind_param('ssi', $title, $imm, $id);

            
        
         $insert_stmt->execute();
         header('Location: slider.php');
                 echo "success";

        
    }
    else echo "error";
}
else echo "please try again";
?>