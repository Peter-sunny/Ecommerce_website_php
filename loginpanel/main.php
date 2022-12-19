<?php 
 include_once 'db-connect.php';
 include_once 'session.php';

 if ($_SESSION['type'] != 'admin') {
  header("Location: index.php");
 }
 if ($_SESSION["type"] != 'admin') {
     header("Location: main.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>SHOP Admin Page</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>

<body>
    <main>
        <section>
            <header id="loginpanel_header">
                <div class="container">
                    <div id="dashboard">
                        <span><h3>DASHBOARD</h3></span>
                        <div class="top-nav notification-row">
                            <!-- notificatoin dropdown start-->
                            <ul class="nav pull-right top-menu">
                                <!-- alert notification end-->
                                <!-- user login dropdown start-->
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <span class="username">ivinnjose</span>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu extended logout">
                                        <div class="log-arrow-up"></div>
                           <!--  <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
                            </li> -->
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i>Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
        </div>
    </div>
</header>
</section>
<div class="row">
    <div class="col-lg-6 col-md-6" id="sidebar_div">
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="">
                    <li class="dir">
                        <a class="" href="manage_admins.php">
                            <i class="icon_house_alt"></i>
                            <span class="li_color">Manage Admins</span>
                        </a>
                    </li>
                    <li class="dir">
                        <a class="" href="add_product.php">
                            <i class="icon_house_alt"></i>
                            <span class="li_color">Add Product</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>    
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="container"><br>
            <h3>ADMIN PAGE</h3>
        </div>
    </div>
</div>
</main>
</body>