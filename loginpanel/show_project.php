<?php
include_once 'db-connect.php';
include_once 'session.php';

sec_session_start();

if (login_check($mysqli) == true && isset($_GET['id'])) {
    $logged = 'in';
} else {
    $logged = 'out';
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Alhind Admin Page</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="../js-plugin/neko-contact-ajax-plugin/js/jquery.form.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/tableExport.js"></script>
    <script type="text/javascript" src="../js/jquery.base64.js"></script>
    <script type="text/javascript" src="../js/jspdf/libs/sprintf.js"></script>
    <script type="text/javascript" src="../js/html2canvas.js">
<script type="text/javascript" src="../js/jspdf/jspdf.js"></script>
<script type="text/javascript" src="../js/jspdf/libs/base64.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">ALHIND <span class="lite">FOUNDATION</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
               
                <!--  search form end -->
            </div>

            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">

                    <!-- task notificatoin start -->
                    <!-- <li id="task_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="icon-task-l"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have 5 pending tasks</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Design PSD </div>
                                        <div class="percent">90%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                            <span class="sr-only">90% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">
                                            Project 1
                                        </div>
                                        <div class="percent">30%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                            <span class="sr-only">30% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Digital Marketing</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Logo Designing</div>
                                        <div class="percent">78%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%">
                                            <span class="sr-only">78% Complete (danger)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Mobile App</div>
                                        <div class="percent">50%</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar"  role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                            <span class="sr-only">50% Complete</span>
                                        </div>
                                    </div>

                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- task notificatoin end -->
                    <!-- inbox notificatoin start-->
                     <!--<li id="mail_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Greg  Martin</span>
                                    <span class="time">1 min</span>
                                    </span>
                                    <span class="message">
                                        I really like this admin panel.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Bob   Mckenzie</span>
                                    <span class="time">5 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, What is next project plan?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Phillip   Park</span>
                                    <span class="time">2 hrs</span>
                                    </span>
                                    <span class="message">
                                        I am like to buy this Admin Template.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Ray   Munoz</span>
                                    <span class="time">1 day</span>
                                    </span>
                                    <span class="message">
                                        Icon fonts are great.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">See all messages</a>
                            </li>
                        </ul>
                    </li>-->
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                     
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username"><?php echo $_SESSION['username'] ?></span>
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
      </header>
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <?php
                  if($_SESSION['user_type']!='operator' && $_SESSION['user_type']!='admin'){
                    echo '<li class="">
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Notifications</span>
                      </a>
                  </li>';
                  }

                  ?>
                  <li class="">
                      <a class="" href="projects.php">
                          <i class="icon_house_alt"></i>
                          <span>Projects</span>
                      </a>
                  </li>
                
                  <?php
                  if($_SESSION['user_type']!='operator'){
                    echo '<li class="">
                      <a class="" href="logs.php">
                          <i class="icon_house_alt"></i>
                          <span>Logs</span>
                      </a>
                  </li>';
                  }
                  ?>
                  <?php
                  if($_SESSION['user_type']=='admin'){
                    echo '<li class="">
                      <a class="" href="members.php">
                          <i class="icon_house_alt"></i>
                          <span>Members</span>
                      </a>
                  </li>';
                  }
                  ?>
                                         <?php
                  if($_SESSION['user_type']=='admin'){
                    echo '<li class="">
                      <a class="" href="donate.php">
                          <i class="icon_house_alt"></i>
                          <span>Donation</span>
                      </a>
                  </li>';
                  }
                  ?>
                   <?php
                  if($_SESSION['user_type']=='admin'){
                    echo '<li class="">
                      <a class="" href="newsmaker.php">
                          <i class="icon_house_alt"></i>
                          <span>Newsmaker</span>
                      </a>
                  </li>';
                  }
                  ?>
                 <!--  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forms</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="form_component.html">Form Elements</a></li>
                          <li><a class="" href="form_validation.html">Form Validation</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>UI Fitures</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">Components</a></li>
                          <li><a class="" href="buttons.html">Buttons</a></li>
                          <li><a class="" href="grids.html">Grids</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>Widgets</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Charts</span>

                      </a>

                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Tables</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="active" href="basic_table.html">Basic Table</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="login.html"><span>Login Page</span></a></li>
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                      </ul>
                  </li> -->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i>Projects List</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="projects.php">Back To Projects</a></li>
                    </ol>
                </div>
            </div>
              <div class="row">
                  <div class="col-lg-12">
                    <ul class="list-group">
                    <?php
                                if($stmt = $mysqli->prepare("SELECT name,title,address,comments,status,phase,images,branch_name,category FROM projects WHERE id = ?")) {
                                    $stmt->bind_param('i',$_GET['id']);
                                    $stmt->execute();
                                    $stmt->bind_result($name,$title,$address,$comments,$status,$phase,$images,$branch_name,$category);

                                           while ($stmt->fetch()) {
                                            if($status=='Approval'){
                                                if($phase==0){
                                                    $stat = 'BM Approval Pending';
                                                }
                                                elseif($phase==0){
                                                    $stat = 'SM Approval Pending';
                                                }
                                                elseif($phase==0){
                                                    $stat = 'FH Approval Pending';
                                                }
                                                elseif($phase==0){
                                                    $stat = 'CH Approval Pending';
                                                }
                                            }
                                            elseif($status=='Rejected'){
                                                if($phase==0){
                                                    $stat = 'Rejected By BM';
                                                }
                                                elseif($phase==1){
                                                    $stat = 'Rejected By SM';
                                                }
                                                elseif($phase==2){
                                                    $stat = 'Rejected by FH';
                                                }
                                                elseif($phase==3){
                                                    $stat = 'Rejected by CH';
                                                }
                                            }
                                            elseif($status=='ongoing'){
                                                if($phase==1){
                                                    $stat = 'Ongoing (Stage 1)';
                                                }
                                                elseif($phase==2){
                                                    $stat = 'Ongoing (Stage 2)';
                                                }
                                                elseif($phase==3){
                                                    $stat = 'Ongoing (Stage 3)';
                                                }
                                                elseif($phase==4){
                                                    $stat = 'Ongoing (Stage 4)';
                                                }
                                            }
                                            elseif($status=='completed'){
                                                $stat = 'Project Completed';
                                            }
                                             // Because $name and $countryCode are passed by reference, their value
                                             // changes on every iteration to reflect the current row
                                             echo '<li class="list-group-item">Name : '.$name.'</li>
                                                   <li class="list-group-item">Title : '.$title.'</li>
                                                   <li class="list-group-item">Address : '.$address.'</li>
                                                   <li class="list-group-item">Comments : '.$comments.'</li>
                                                   <li class="list-group-item">Status : '.$stat.'</li>
                                                   <li class="list-group-item">Branch : '.$branch_name.'</li>
                                                   <li class="list-group-item">Category : '.$category.'</li>
                                                   <h3>Images</h3>';
                                           $images = unserialize($images); 
                                            if(!empty($images)){
                foreach($images as $image_src){ 
                  
                  ?>
                <li class="list-group-item"><?php
                    if(substr($image_src,11,5) == 'Phase'){
                    echo "Phase ".substr($image_src,17,1)." Image";
                  }
                 ?>
                <img class="img-thumbnail" width="304" height="236" src="<?php echo $image_src; ?>" alt="">
                </li>
                <?php }
                    }
                                              
                                           }

                                           $stmt->close();
                                        }
                     ?>
                     </ul>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <script type="text/javascript">
function linkchange(){
        var val = $('#event').val().split(",");
        var ev_id = val[0];
        var num = val[1];
        if(ev_id != 0){
        $("#ev_btn").attr("href", "index.php?ev_id="+ev_id);
    }
    else {
        $("#ev_btn").attr("href", "index.php");
    }
}
    </script>


  </body>
</html>
