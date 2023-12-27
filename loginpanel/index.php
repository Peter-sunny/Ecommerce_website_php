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
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#phone_number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                 // Allow: Ctrl+A
                 (e.keyCode == 65 && e.ctrlKey === true) ||
                 // Allow: Ctrl+C
                 (e.keyCode == 67 && e.ctrlKey === true) ||
                 // Allow: Ctrl+X
                 (e.keyCode == 88 && e.ctrlKey === true) ||
                 // Allow: home, end, left, right
                 (e.keyCode >= 35 && e.keyCode <= 39)) {
                     // let it happen, don't do anything
                 return;
             }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/tableExport.js"></script>
    <script type="text/javascript" src="js/jquery.base64.js"></script>
    <script type="text/javascript" src="js/jspdf/libs/sprintf.js"></script>
    <script type="text/javascript" src="js/html2canvas.js">
        <script type="text/javascript" src="js/jspdf/jspdf.js"></script>
        <script type="text/javascript" src="js/jspdf/libs/base64.js"></script>
        <style>
            label {
                width:117px;
            }
        </style>
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
            <a href="index.php" class="logo">XELENT <span class="lite">Dashboard</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                
                <!--  search form end -->
            </div>

            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">

                   
                   
                   
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
               <h3 class="page-header"><i class="fa fa-table"></i>Members List</h3>
               <ol class="breadcrumb">
                  <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              </ol>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12">

          <a class="btn btn-success" data-toggle="modal" href="#myModal">Add User</a>
          <a class="btn btn-success" data-toggle="modal" href="#myModal1">Edit User</a> 
          
      </div><br>
  </div>
  <div class="row">
      <div class="col-lg-12">
          <section class="panel">
              <table class="table table-striped table-advance table-hover">
                 <tbody>
                  <tr>
                   <th>Username</th>
                   <th>Email</th>
                   <th>Phone</th>
                   <th>User Type</th>
               </tr>
               <?php
               if($stmt = $mysqli->prepare("SELECT username, email, phone_number, user_type FROM members order by user_type ASC")) {
                $stmt->execute();
                $stmt->bind_result($username,$email,$phone_number,$user_type);

                while ($stmt->fetch()) {
                                             // Because $name and $countryCode are passed by reference, their value
                                             // changes on every iteration to reflect the current row
                   echo '<tr>
                   <td>'.$username.'</td>
                   <td>'.$email.'</td>
                   <td>'.$phone_number.'</td>
                   <td>'.$user_type.'</td></tr>';
               }

               $stmt->close();
           }
       ?></tbody>
   </table>

   <div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                      <label for="type">Select User Type:</label>
                      <select class="form-control" id="type" onchange="addForm(this)">
                        <option value="">Select</option>
                        <option value="ad">Admin</option>
                    </select>
                </div>
                <div id="formSpace">
                </div>

                <div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit User</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                  <label for="type">Select User Type:</label>
                  <select class="form-control" id="typeEdit" onchange="editForm(this)">
                    <option value="">Select</option>
                    <option value="ad">Admin</option>
                </select>
            </div>
            <div id="editSpace">
            </div>

            <div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- modal -->


</div>
</section>
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
    var html1 = "<form action='#' method='post' name='registration_form' id='reg_form1'>"+
    "<div class='form-group'>"+
    "<label for='username'>Username:</label> <input type='text' name='username' id='username' /></div>"+
    "<div class='form-group'>"+
    "<label for='email'>Email:</label><input type='text' name='email' id='email' /></div>"+
    "<div class='form-group'>"+
    "<label for='phone_number'>Phone:</label><input type='text' name='phone_number' id='phone_number' /></div>"+
    "<input type='hidden' name='pin' id='pin' value='0'/>"+
    "<input type='hidden' name='branch_name' id='branch_name' value='0'/>"+
    "<input type='hidden' name='category' id='category' value='0'/>"+
    "<div class='form-group'> <label for='password'>Password:</label> <input type='password' name='password' id='password'/></div>"+
    "<div class='form-group'> <label for='confirmpwd'>Confirm password:</label> <input type='password' name='confirmpwd' id='confirmpwd' /></div>"+
    "</div>"+
    "<div class='modal-footer'>"+
    "<div id='type_app'></div>"+
    "<button data-dismiss='modal' class='btn btn-default' type='button'>Close</button>"+
    "<button class='btn btn-success' type='button' onclick='return regformhash(this.form,this.form.branch_name,this.form.category,this.form.username,this.form.email,this.form.type,this.form.pin,this.form.phone_number,this.form.password,this.form.confirmpwd);'>Register</button>"+
    "</div>"+
    "</form>";


    var html2 = "<form action='#' method='post' name='registration_form' id='reg_form2'>"+
    "<div class='form-group'>"+
    "<label for='username'>Username:</label> <input type='text' name='username' id='username' /></div>"+
    "<div class='form-group'>"+
    "<label for='branch_name'>Branch:</label> <input type='text' name='branch_name' id='branch_name' /></div>"+
    "<div class='form-group'>"+
    "<label for='pin'>Pin:</label> <input type='text' name='pin' id='pin' /></div>"+
    "<div class='form-group'>"+
    "<input type='hidden' name='type' id='type' value='branch_manager'/>"+
    "<input type='hidden' name='category' id='category' value='0'/>"+
    "<label for='email'>Email:</label><input type='text' name='email' id='email' /></div>"+
    "<div class='form-group'>"+
    "<label for='phone_number'>Phone:</label><input type='text' name='phone_number' id='phone_number' /></div>"+
    "<div class='form-group'> <label for='password'>Password:</label> <input type='password' name='password' id='password'/></div>"+
    "<div class='form-group'> <label for='confirmpwd'>Confirm password:</label> <input type='password' name='confirmpwd' id='confirmpwd' /></div>"+
    "</div>"+
    "<div class='modal-footer'>"+
    "<button data-dismiss='modal' class='btn btn-default' type='button'>Close</button>"+
    "<button class='btn btn-success' type='button' onclick='return regformhash(this.form,this.form.branch_name,this.form.category,this.form.username,this.form.email,this.form.type,this.form.pin,this.form.phone_number,this.form.password,this.form.confirmpwd);'>Register</button>"+
    "</div>"+
    "</form>";
    var html3 = "<form action='#' method='post' name='registration_form' id='reg_form3'>"+
    "<div class='form-group'>"+
    "<label for='username'>Username:</label> <input type='text' name='username' id='username' /></div>"+
    "<div class='form-group'>"+
    "<label for='category'>Category:</label> <input type='text' name='category' id='category' /></div>"+
    "<div class='form-group'>"+
    "<input type='hidden' name='type' id='type' value='service_manager'/>"+
    "<input type='hidden' name='branch_name' id='branch_name' value='0'/>"+
    "<input type='hidden' name='pin' id='pin' value='0'/>"+
    "<label for='email'>Email:</label><input type='text' name='email' id='email' /></div>"+
    "<div class='form-group'>"+
    "<label for='phone_number'>Phone:</label><input type='text' name='phone_number' id='phone_number' /></div>"+
    "<div class='form-group'> <label for='password'>Password:</label> <input type='password' name='password' id='password'/></div>"+
    "<div class='form-group'> <label for='confirmpwd'>Confirm password:</label> <input type='password' name='confirmpwd' id='confirmpwd' /></div>"+
    "</div>"+
    "<div class='modal-footer'>"+
    "<button data-dismiss='modal' class='btn btn-default' type='button'>Close</button>"+
    "<button class='btn btn-success' type='button' onclick='return regformhash(this.form,this.form.branch_name,this.form.category,this.form.username,this.form.email,this.form.type,this.form.pin,this.form.phone_number,this.form.password,this.form.confirmpwd);'>Register</button>"+
    "</div>"+
    "</form>";
    function addForm(t){
        if($('#type').val()=="bm"){
            $('#reg_form1').remove();
            $('#reg_form2').remove();
            $('#reg_form3').remove();
            $('#formSpace').append(html2);
        }
        else if($('#type').val()=="sm"){
            $('#reg_form1').remove();
            $('#reg_form2').remove();
            $('#reg_form3').remove();

            $('#formSpace').append(html3);
        }
        else {
            var type = $('#type').val();
            $('#reg_form1').remove();
            $('#reg_form2').remove();
            $('#reg_form3').remove();
            $('#formSpace').append(html1);
            $('#type_app').append('<input type="hidden" name="type" value="'+ type +'">');
        }
    }


    function editForm(t){
        $('#up_form1').remove();
        $('#up_form2').remove();
        $('#up_form3').remove();
        var type = $('#typeEdit').val();
        if(type=="bm"){
            type = "branch_manager";
        }
        else if(type=="sm"){
            type="service_manager";
        }
        else if(type=="fh"){
            type="foundation_head";
        }
        else if(type=="ch"){
            type="chairman";
        }
        else if(type=="ad"){
            type="admin";
        }
        else if(type=="op"){
            type="operator";
        }
        var dataString = 'type='+ type;
        $('#memberEdit').remove();
        $('#memberForm').remove();
    //alert(dataString);
    $.ajax({
        type: "GET",
        dataType:"json",
        url: "member_json.php",
        data: dataString,
        cache: false,
        success: function (data) {
          var html = "<select class='form-control' id='memberEdit' onchange='editMember(this)' style='margin-bottom:15px;'><option value=''>Select</option>";
          $.each(data, function(index, element) {
            html += "<option value='"+element.id+"'>"+element.username+"</option>";
        });
          html += "</select><div id='memberForm'></div>";
          $('#editSpace').append(html);


      }
  });
}
function editMember(t){
    var iid = $('#memberEdit').val();
    var type = $('#typeEdit').val();
    var utype = $('#typeEdit').val();
    if(utype=="bm"){
        utype = "branch_manager";
    }
    else if(utype=="sm"){
        utype="service_manager";
    }
    else if(utype=="fh"){
        utype="foundation_head";
    }
    else if(utype=="ch"){
        utype="chairman";
    }
    else if(utype=="ad"){
        utype="admin";
    }
    else if(utype=="op"){
        utype="operator";
    }
    var dataString = 'type='+ utype +'&iid='+iid;
// alert(dataString);
$.ajax({
    type: "GET",
    dataType:"json",
    url: "m_json.php",
    data: dataString,
    cache: false,
    success: function (data) {
      $.each(data, function(index, element) {
                                                    // alert(element);
                                                    if(element.user_type=="branch_manager"){
                                                      $('#up_form1').remove();
                                                      $('#up_form2').remove();
                                                      $('#up_form3').remove();
                                                      var html2 = "<form action='#' method='post' name='registration_form' id='up_form2'>"+
                                                      "<div class='form-group'>"+
                                                      "<input type='hidden' name='username' id='username' value='"+element.username+"' disabled='true'/></div>"+
                                                      "<div class='form-group'>"+
                                                      "<label for='branch_name'>Branch:</label> <input type='text' name='branch_name' id='branch_name' value='"+element.branch_name+"' disabled='true'/></div>"+
                                                      "<div class='form-group'>"+
                                                      "<label for='pin'>Pin:</label> <input type='text' name='pin' id='pin' value='"+element.pin+"' disabled='true'/></div>"+
                                                      "<div class='form-group'>"+
                                                      "<input type='hidden' name='type' id='type' value='branch_manager'/>"+
                                                      "<input type='hidden' name='category' id='category' value='0'/>"+
                                                      "<label for='email'>Email:</label><input type='text' name='email' id='email' value='"+element.email+"'/></div>"+
                                                      "<div class='form-group'>"+
                                                      "<label for='phone_number'>Phone:</label><input type='text' name='phone_number' id='phone_number' value='"+element.phone_number+"'/></div>"+
                                                      "<div class='form-group'> <label for='password'>Password:</label> <input type='password' name='password' id='password'/></div>"+
                                                      "<div class='form-group'> <label for='confirmpwd'>Confirm password:</label> <input type='password' name='confirmpwd' id='confirmpwd' /></div>"+
                                                      "</div>";
                                                      html2 += "<input type='hidden' name='iid' id='iid' value='"+element.id+"'><div class='modal-footer'>"+
                                                      "<button data-dismiss='modal' class='btn btn-default' type='button'>Close</button>"+
                                                      "<button class='btn btn-success' type='button' onclick='return upformhash(this.form,this.form.branch_name,this.form.category,this.form.iid,this.form.username,this.form.email,this.form.type,this.form.pin,this.form.phone_number,this.form.password,this.form.confirmpwd);'>Register</button>"+
                                                      "</div>"+
                                                      "</form>";
                                                      $('#memberForm').append(html2); 
                                                  }
                                                  else if(element.user_type=="service_manager"){
                                                      // alert("sm");  
                                                      $('#up_form1').remove();
                                                      $('#up_form2').remove();
                                                      $('#up_form3').remove();
                                                      var html3 = "<form action='#' method='post' name='registration_form' id='up_form3'>"+
                                                      "<div class='form-group'>"+
                                                      "<input type='hidden' name='username' id='username' value='"+element.username+"' disabled='true'/></div>"+
                                                      "<div class='form-group'>"+
                                                      "<label for='category'>Category:</label> <input type='text' name='category' id='category' value='"+element.category+"' disabled='true'/></div>"+
                                                      "<div class='form-group'>"+
                                                      "<input type='hidden' name='type' id='type' value='service_manager'/>"+
                                                      "<input type='hidden' name='branch_name' id='branch_name' value='0'/>"+
                                                      "<input type='hidden' name='pin' id='pin' value='0'/>"+
                                                      "<label for='email'>Email:</label><input type='text' name='email' id='email' value='"+element.email+"'/></div>"+
                                                      "<div class='form-group'>"+
                                                      "<label for='phone_number'>Phone:</label><input type='text' name='phone_number' id='phone_number' value='"+element.phone_number+"'/></div>"+
                                                      "<div class='form-group'> <label for='password'>Password:</label> <input type='password' name='password' id='password'/></div>"+
                                                      "<div class='form-group'> <label for='confirmpwd'>Confirm password:</label> <input type='password' name='confirmpwd' id='confirmpwd' /></div>"+
                                                      "</div>";
                                                      html3 += "<input type='hidden' name='iid' id='iid' value='"+element.id+"'><div class='modal-footer'>"+
                                                      "<button data-dismiss='modal' class='btn btn-default' type='button'>Close</button>"+
                                                      "<button class='btn btn-success' type='button' onclick='return upformhash(this.form,this.form.branch_name,this.form.category,this.form.iid,this.form.username,this.form.email,this.form.type,this.form.pin,this.form.phone_number,this.form.password,this.form.confirmpwd);'>Register</button>"+
                                                      "</div>"+
                                                      "</form>";
                                                      $('#memberForm').append(html3);
                                                  }
                                                  else{
                                                      // alert("ot"); 
                                                      $('#up_form1').remove();
                                                      $('#up_form2').remove();
                                                      $('#up_form3').remove();
                                                      var html1 = "<form action='#' method='post' name='registration_form' id='reg_form1'>"+
                                                      "<div class='form-group'>"+
                                                      "<input type='hidden' name='username' id='username' value='"+element.username+"' disabled='true'/></div>"+
                                                      "<div class='form-group'>"+
                                                      "<label for='email'>Email:</label><input type='text' name='email' id='email' value='"+element.email+"'/></div>"+
                                                      "<div class='form-group'>"+
                                                      "<label for='phone_number'>Phone:</label><input type='text' name='phone_number' id='phone_number' value='"+element.phone_number+"'/></div>"+
                                                      "<input type='hidden' name='pin' id='pin' value='0'/>"+
                                                      "<input type='hidden' name='branch_name' id='branch_name' value='0'/>"+
                                                      "<input type='hidden' name='category' id='category' value='0'/>"+
                                                      "<input type='hidden' name='type' id='type' value='"+element.user_type+"'/>"+
                                                      "<div class='form-group'> <label for='password'>Password:</label> <input type='password' name='password' id='password'/></div>"+
                                                      "<div class='form-group'> <label for='confirmpwd'>Confirm password:</label> <input type='password' name='confirmpwd' id='confirmpwd' /></div>"+
                                                      "</div>"+
                                                      "<div class='modal-footer'>"+
                                                      "<div id='type_app'></div>";

                                                      html1 += "<input type='hidden' name='iid' id='iid' value='"+element.id+"'><div class='modal-footer'>"+
                                                      "<button data-dismiss='modal' class='btn btn-default' type='button'>Close</button>"+
                                                      "<button class='btn btn-success' type='button' onclick='return upformhash(this.form,this.form.branch_name,this.form.category,this.form.iid,this.form.username,this.form.email,this.form.type,this.form.pin,this.form.phone_number,this.form.password,this.form.confirmpwd);'>Register</button>"+
                                                      "</div>"+
                                                      "</form>";
                                                      $('#memberForm').append(html1); 
                                                  }
                                              });

}
});


}
</script>



</body>
</html>