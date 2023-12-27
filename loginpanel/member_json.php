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
if (isset($_GET['type'])){

$myArray = array();
$type = $_GET['type'];
    if ($result = $mysqli->query("SELECT id,username FROM members WHERE user_type= '".$type."'")) {
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