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
if($_SESSION['user_type']!='admin'){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>XELENT Admin Page</title>

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
    <script type="text/javascript" src="js/tableExport.js"></script>
    <script type="text/javascript" src="js/jquery.base64.js"></script>
    <script type="text/javascript" src="js/jspdf/libs/sprintf.js"></script>
    <script type="text/javascript" src="js/html2canvas.js"></script>
<script type="text/javascript" src="js/jspdf/jspdf.js"></script>
<script type="text/javascript" src="js/jspdf/libs/base64.js"></script>
<script>
    $(document).ready(function(){
    $('.uploading').hide();
    // $('#images').on('change',function(){
    $('#submit').on('click',function(e){
        e.preventDefault();
        var name = $("#name").val();
        var id = $("#nid").val();
        var date = $("#daten").val();
        var snote = $("#snote").val();
        var lnote = $("#lnote").val();
        var lim = $("#limages").val();
              var im = $("#images").val();

        if (name == '' || date=='' || lim == '' || im == ''|| snote=='' || lnote=='' || id=='') {
        alert('You must provide all the requested details. Please try again');
        return false;
        }
        $('#multiple_upload_form').ajaxForm({
            //display the uploaded images
            // target:'#images_preview',
            beforeSubmit:function(e){
                $('.uploading').show();
            },
            success:function(e){
                $('.uploading').hide();
                                $(this).closest('form').find("input[type=text],input[type=text],textarea").val("");

                $("#name").val('');
                $("#daten").val('');
                $("#snote").val('');
                $("#lnote").val('');
                                $("#limages").val('');

                $("#images").val('');
                $("#nid").val('');
                $('#myModal').modal('hide');
                window.location.reload();

            },
            error:function(e){
                alert("error");
            }
        }).submit();

    });

    $('#clrout').click(function(){
       $.ajax({
                        type: 'POST',
                        url: 'clearout.php',
                        success: function () {
alert("Cleared Everything !!");                   }
                });

    });

});

</script>

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
            <a href="index.php" class="logo">XELENT <span class="lite">DASHBOARD</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
               
                <!--  search form end -->
            </div>

            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">

                  
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
                   <li class="">
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Manage Admins</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="" href="gallery.php">
                          <i class="icon_house_alt"></i>
                          <span>Products</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="" href="news.php">
                          <i class="icon_house_alt"></i>
                          <span>News</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="" href="testimonials.php">
                          <i class="icon_house_alt"></i>
                          <span>Testimonials</span>
                      </a>
                  </li>
                  <li class="">
                  <a class="" href="slider.php">
                      <i class="icon_house_alt"></i>
                      <span>Slider</span>
                  </a>
              </li>
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i>View Products</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="gallery.php">Back To Product List</a></li>
                    </ol>
                </div>
            </div>
              <div class="row">
                  <div class="col-lg-12">
                    <ul class="list-group">
                    <?php
                                if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,lpic,pic,sales,rental,brand,hot,featured  FROM products WHERE id = ?")) {
                                    $stmt->bind_param('i',$_GET['id']);
                                    $stmt->execute();
                                    $stmt->bind_result($id,$title, $date, $snote,$lnote,$lpic,$pic,$sales,$rental,$brand,$hot,$featured);

                                           while ($stmt->fetch()) {
                                            
                                             // Because $name and $countryCode are passed by reference, their value
                                             // changes on every iteration to reflect the current row
                                             echo '<li class="list-group-item">Title : '.$title.'</li>
                                                   <li class="list-group-item">Date : '.$date.'</li>
                                                   <li class="list-group-item">Short Note : '.$snote.'</li>
                                                   <li class="list-group-item">Long Note : '.$lnote.'</li>
                                                   <li class="list-group-item">sales : '.$sales.'</li>
                                                   <li class="list-group-item">rental : '.$rental.'</li>
                                                   <li class="list-group-item">brand : '.$brand.'</li>
                                                   <li class="list-group-item">hot : '.$hot.'</li>
                                                   <li class="list-group-item">featured : '.$featured.'</li>';

 $limages = unserialize($lpic); 
                                            if(!empty($limages)){
                foreach($limages as $limage_src) ?>
                <li class="list-group-item">LQImage :
                <img class="img-thumbnail" width="304" height="236" src="./<?php echo $limage_src; ?>" alt="">
                </li><?php
                                           $images = unserialize($pic); 
                                            if(!empty($images)){
                foreach($images as $image_src) ?>
                <li class="list-group-item"> HQImage :
                <img class="img-thumbnail" width="304" height="236" src="./<?php echo $image_src; ?>" alt="">
                </li>
                <?php
                  echo  '<a class="btn btn-success" data-toggle="modal" href="#myModal1" style="margin:10px;">Edit</a>';
                  echo  '<a class="btn btn-success" href="delete_pro.php?id='.$id.'" style="margin:10px;">Delete</a>';
                   echo '<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header">
                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                                            <h4 class="modal-title">Edit</h4>
                                                                                                        </di                                                                                                        <div class="modal-body">

                   <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="edit_pro.php">
                  <input type="hidden" name="nid" id="nid" value="'.$_GET['id'].'"
                    <div class="col-sm-12"> 
                                    <br>

                                        <div class="form-group">
                                            <label for="name">News title</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter title"  title="Please enter  title (at least 2 characters)" value="'.$title.'"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" class="form-control" name="date" id="daten" placeholder="Enter Date" title="Please enter  date " value="'.$date.'"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Short story</label>
                                            <textarea name="snote" class="form-control" id="snote" cols="3" rows="5" placeholder="Enter  short story (Minimum 10 characters maximum 200 characters)" minlength="10" maxlength="200" title="Please enter Short story (at least 10 characters)">'.$snote.'</textarea>
                                        </div>
                                         <div class="form-group">
                                            <label for="address">Long Story</label>
                                            <textarea name="lnote" class="form-control" id="lnote" cols="3" rows="5" placeholder="Enter  Long story (Minimum 10 characters maximum 1500 characters)" minlength="10" maxlength="1500">'.$lnote.'</textarea>
                                        </div>
                                           <div class="form-group">
                                            <label for="Brand">Brand</label>
                                            <input type="text" class="form-control" name="brand" id="Brand" placeholder="Enter Brand" title="Please enter  brand" value="'.$brand.' "/>
                                        </div>
                                        <br>
                                       
                                        <div class="form-group" style="display:block" >
                                                                                    <input type="checkbox" name="check_list[]" value="sales">Sales</input>
                                                                                    <input type="checkbox" name="check_list[]" value="rental">Rental</input>
                                                                                    <input type="checkbox" name="check_list[]" value="hot">Hot</input>
                                                                                    <input type="checkbox" name="check_list[]" value="featured">featured</input>
</div>
                                       <input type="hidden" name="image_form_submit" value="1"/>
                        <label>LQ (less than 20 kb) Choose Image</label>
                        <input type="file" name="limages[]" id="limages" multiple >
                    <div class="uploading none">
                        <label>&nbsp;</label>
                        <img src="../uploading.gif"/>
                    </div>
                    <div class="gallery" id="images_preview"></div>                  
                    <input type="hidden" name="image_form_submit" value="1"/>
                        <label>HQ(less than 1mb) Choose Image</label>
                        <input type="file" name="images[]" id="images" multiple >
                    <div class="uploading none">
                        <label>&nbsp;</label>
                        <img src="../uploading.gif"/>
                    </div>
                    <div class="gallery" id="images_preview"></div>
                
                                                                                                            <div class="modal-footer">
                                                                                                            <button name="submit" type="submit" class="btn btn-lg" id="submit"> Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            </div>
                                                                                            </div>';
                 }
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
