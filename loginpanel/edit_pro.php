<?php

include_once 'db-connect.php';
include_once 'session.php';
sec_session_start();

$error_msg = "";
if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}

$sales = "0";
    $rental = "0";
    $hot = "0";
    $featured = "0";
 
if (isset($_POST['name'],$_POST['nid'],$_POST['date'], $_POST['snote'],$_POST['lnote'])) {
    // Sanitize and validate the data passed in

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'nid', FILTER_SANITIZE_NUMBER_INT);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $snote = filter_input(INPUT_POST, 'snote', FILTER_SANITIZE_STRING);
    $lnote = filter_input(INPUT_POST, 'lnote', FILTER_SANITIZE_STRING);
    $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
for($i = 0; $i < count($_POST['check_list']); $i++) {
    if($_POST['check_list'][$i] == "sales"){
        $sales="1";
    }
if($_POST['check_list'][$i] == "rental"){
        $rental="1";
    }
    if($_POST['check_list'][$i] == "hot"){
        $hot="1";
    }
if($_POST['check_list'][$i] == "featured"){
        $featured="1";
    }
}


            // Execute the prepared query.
            
      
    if ($date !='') {

         $la=array();
                $limages_arr = array();
                foreach($_FILES['limages']['name'] as $lkey=>$lval){
                    //upload and stored images
                    $ltarget_dir = "uploads/products/thumbnail/";
                    $ltarget_file = $ltarget_dir.$_FILES['limages']['name'][$lkey];
                    if(move_uploaded_file($_FILES['limages']['tmp_name'][$lkey],$ltarget_file)){
                    $limages_arr[] = $ltarget_file;
                    }
                    }
                if(!empty($limages_arr)){ 
                foreach($limages_arr as $limage_src){
                array_push($la,$limage_src); 
                 }
                }
    
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
               
              $insert_stmt = $mysqli->prepare("UPDATE products SET title=?, date=? , lpic=?,pic=? , snote=? ,lnote=? ,sales = ?,rental =? ,brand =?,hot=?,featured=? WHERE id = ?"); 
                            $limm = serialize($limages_arr);

              $imm = serialize($images_arr);
            $insert_stmt->bind_param('sssssssssssi', $name, $date,$limm ,$imm, $snote,$lnote,$sales, $rental, $brand, $hot,$featured,$id);

            

                          //   echo $brand;

        
         $insert_stmt->execute();
               //  echo $brand;

        
    }
    else echo "error";
}
else echo "please try again";
?>