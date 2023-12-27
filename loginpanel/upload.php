<?php
include_once dirname(__FILE__).'/../loginpanel/config.php';
include_once dirname(__FILE__).'/../loginpanel/db-connect.php';
$error_msg = "";
include_once 'session.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
    header('Location: login.php');
}

if (isset($_POST['category'])) {
    // Sanitize and validate the data passed in

    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //


    if (empty($error_msg)) {
        

            // Execute the prepared query.
            	$images_arr = array();
    			foreach($_FILES['images']['name'] as $key=>$val){
        			//upload and stored images
        			$target_dir = "../uploads/";
        			$target_file = $target_dir.time()."_".$_FILES['images']['name'][$key];
        			if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file)){
            		$images_arr[] = $target_file;
        			}
    				}
    			if(!empty($images_arr)){ 
                $insert_stmt1 = $mysqli->prepare("INSERT INTO gallery (images,category) VALUES (?, ?)");
                $i = serialize($images_arr);
                $insert_stmt1->bind_param('ss', $i, $category);
                if($insert_stmt1->execute()){
                     echo "success";
                }
                else echo "error2";
            }
            else echo "error3";
    }
    else echo $error_msg;
}
else echo "please try again";