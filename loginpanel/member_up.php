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
$error_msg = "";

if (isset($_POST['iid'],$_POST['username'], $_POST['branch'],$_POST['category'],  $_POST['email'],$_POST['type'], $_POST['phone_number'], $_POST['p'], $_POST['pin'])) {
    // Sanitize and validate the data passed in

    $name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_NUMBER_INT);
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    $user_type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $pin = filter_input(INPUT_POST, 'pin', FILTER_SANITIZE_STRING);
    $branch = filter_input(INPUT_POST, 'branch', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    $iid = filter_input(INPUT_POST, 'iid', FILTER_SANITIZE_NUMBER_INT);
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Not a valid email
            $error_msg .= 'email not valid';

        }
    if (strlen($password) != 128) {
            // The hashed pwd should be 128 characters long.
            // If it's not, something really odd has happened
            $error_msg .= '<p class="error">Invalid password configuration.</p>';
        }
    if($user_type != 'branch_manager'){
    if($user_type == 'sm'){
    $user_type = 'service_manager';}
    elseif($user_type == 'fh'){
    $user_type ='foundation_head';}
    elseif($user_type == 'ad'){
    $user_type ='admin';}
    elseif($user_type == 'ch'){
    $user_type = 'chairman';
    }
    }
    if (empty($error_msg)) {
            // Create a random salt
            //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
            $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

            // Create salted password
            $password = hash('sha512', $password . $random_salt);

            // Insert the new user into the database
            if ($insert_stmt = $mysqli->prepare("UPDATE members SET username=?, email=?, phone_number=?, password=?, salt=?, user_type=? WHERE id=?")) {
                $insert_stmt->bind_param('ssisssi', $name, $email, $phone, $password, $random_salt, $user_type,$iid);
                // Execute the prepared query.
                if (! $insert_stmt->execute()) {
                    echo "error occurred";
                }
                echo "success";
            }

        }
        else echo $error_msg;
}
else echo "please try again";