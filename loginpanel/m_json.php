<?php
include_once 'db-connect.php';
include_once 'session.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
    header('Location: login.php');
}
if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}
// include database constants
$error_msg = "";
if (isset($_GET['type'],$_GET['iid'])){

$myArray = array();
$type = $_GET['type'];
$iid = $_GET['iid'];
if($type=='branch_manager'){
    $q = "SELECT members.id,members.username,user_type,branch_name,pin,email,phone_number,pin FROM members,branch_managers WHERE members.id= '".$iid."' AND branch_managers.member_id = members.id";
}
elseif($type=='service_manager'){
    $q = "SELECT members.id,members.username,user_type,category,email,phone_number FROM members,service_managers WHERE members.id= '".$iid."' AND service_managers.member_id = members.id";  
}
else{
    $q = "SELECT members.id,members.username,user_type,email,phone_number FROM members WHERE members.id= '".$iid."'";
}
    if ($result = $mysqli->query($q)) {
        $tempArray = array();
        while($row = $result->fetch_object()) {
                $tempArray = $row;
                array_push($myArray, $tempArray);
            }
        echo json_encode($myArray);
    }

    $result->close();
    $mysqli->close();
}
else echo "error";
?>