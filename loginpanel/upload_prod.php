<?php

include_once 'db-connect.php';
include_once 'session.php';
$error_msg = "";
sec_session_start();

if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}

  $sales = "0";
    $rental = "0";
    $hot = "0";
    $featured = "0";



if (isset($_POST['name'], $_POST['date'], $_POST['snote'],$_POST['lnote'], $_POST['brand'],$_POST['check_list'])) {
    // Sanitize and validate the data passed in

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $snote = filter_input(INPUT_POST, 'snote', FILTER_SANITIZE_STRING);
    $lnote = filter_input(INPUT_POST, 'lnote', FILTER_SANITIZE_STRING);
    $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);


  
  //  print_r($hot);

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

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //


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
                    $target_dir = "uploads/products/";
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
             /*  
              $insert_stmt = $mysqli->prepare("INSERT INTO products (title,date, snote,lnote,pic,sales,rental,brand,hot,featured ) VALUES (?,?,?,?,?,?,?,?,?,?)"); 
              $i = serialize($images_arr);
            $insert_stmt->bind_param('ssssssssss',$title, $date, $snote,$lnote,$i,$sales,$rental,$brand,$hot,$featured );
*/

            $insert_stmt1 = $mysqli->prepare("INSERT INTO products (title, date , lpic , pic , snote ,lnote,sales,rental,brand,hot,featured) VALUES (?, ?,?, ?,?,?,?, ?, ?,?,?)"); 
              $li = serialize($limages_arr);

              $i = serialize($images_arr);
            $insert_stmt1->bind_param('sssssssssss', $name, $date, $li,$i, $snote,$lnote,$sales, $rental, $brand, $hot,$featured);

        
                  $insert_stmt1->execute();

                 echo 'success';

        
    }
    else echo "error";
}
else echo "please try again";
?>