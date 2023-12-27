<?php

include_once 'db-connect.php';
include_once 'session.php';
$error_msg = "";
sec_session_start();

if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}
if (isset($_POST['name'],$_POST['lnote'],$_POST['subtitle'])) {
    // Sanitize and validate the data passed in

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $lnote = filter_input(INPUT_POST, 'lnote', FILTER_SANITIZE_STRING);
        $subtitle = filter_input(INPUT_POST, 'subtitle', FILTER_SANITIZE_STRING);



    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //

if ($name !='') {
    
    if (empty($_FILES))  {

                               $images_arr=unserialize('a:1:{i:0;s:41:"uploads/testimonial/testimonial_img_1.jpg";}');


            } else{
 $a=array();
                $images_arr = array();
                foreach($_FILES['images']['name'] as $key=>$val){
                    //upload and stored images
                    $target_dir = "uploads/testimonial/";
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

            }
            // Execute the prepared query.

      
    if ($name != '' && $lnote != '' ) {
              $insert_stmt = $mysqli->prepare("INSERT INTO testimonials (customer, testimonial,subtitle,pic) VALUES (?,?,? ,?)"); 
                            $i = serialize($images_arr);

            $insert_stmt->bind_param('ssss', $name, $lnote ,$subtitle,$i);
         $insert_stmt->execute();
                 echo "success";
    }}
    else echo "error";
}
else echo "please try again";
?>