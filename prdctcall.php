
<?php
include_once 'loginpanel/db-connect.php';
include_once 'loginpanel/session.php';

$prdct_value=$_POST['prdct_value'];


switch ($prdct_value) {
  case '2':
    
                               if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,lpic,pic,hot ,brand FROM products WHERE rental = '1'")) {
                                    $stmt->execute();
                                    $stmt->bind_result($id,$title,$date,$snote,$lnote,$lpic,$pic,$hot,$brand);

                                           while ($stmt->fetch()) {
                                           $images = unserialize($pic); 
                                                                                      $limages = unserialize($lpic); 


 echo '<!--product item-->
                <div class="product_item hit w_xs_full">
                  <figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">
                    <!--product preview-->
                    <a href="#" data-toggle="modal" data-target="#myMod-'.$id.'" class="d_block relative wrapper pp_wrap m_bottom_15">';
                    if($hot == '1'){

                    echo'<span class="hot_stripe">
                    <img src="images/hot_product.png" alt="">
                    </span>';
                  }

                    echo'
                      <img src="loginpanel/'.$limages[0].'" class="tr_all_hover" alt="">
                      <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none "> View Details</span>
                    </a>
                    <!--description and price of product-->
                    <figcaption>
                      <h5 class="m_bottom_10"><a href="#" class="color_dark">'.$title.'</a></h5>
                      <!--rating-->
                      <h6>' .$brand.'</h6>
                      
                    </figcaption>
                  </figure>
                </div>';


                echo '<div id="myMod-'.$id.'" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">'.$title.'</h4>
      </div>
      <div class="modal-body">
      <img src="loginpanel/'.$images[0].'" width="100%" alt="" />
      <br> <br> <b>Brand :'.$brand.' </b> 
        <br><p>'.$lnote.'</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>';
}
               }                                     $stmt->close();
    break;
  
  case '1':
    
                                if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,lpic,pic,hot,brand  FROM products WHERE sales = '1'")) {
                                    $stmt->execute();
                                    $stmt->bind_result($id,$title,$date,$snote,$lnote,$lpic,$pic,$hot,$brand);

                                           while ($stmt->fetch()) {
                                           $images = unserialize($pic); 
                                                                                      $limages = unserialize($lpic); 


 echo '<!--product item-->
                <div class="product_item hit w_xs_full">
                  <figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">
                    <!--product preview-->
                    <a href="#" data-toggle="modal" data-target="#myMod-'.$id.'" class="d_block relative wrapper pp_wrap m_bottom_15">';
                    if($hot == '1'){

                    echo'<span class="hot_stripe">
                    <img src="images/hot_product.png" alt="">
                    </span>';
                  }

                    echo'
                      <img src="loginpanel/'.$limages[0].'" class="tr_all_hover" alt="">
                      <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none "> View Details</span>
                    </a>
                    <!--description and price of product-->
                    <figcaption>
                      <h5 class="m_bottom_10"><a href="#" class="color_dark">'.$title.'</a></h5>
                      <!--rating-->
                      <h6>' .$brand.'</h6>
                      
                    </figcaption>
                  </figure>
                </div>';


                echo '<div id="myMod-'.$id.'" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">'.$title.'</h4>
      </div>
      <div class="modal-body">
      <img src="loginpanel/'.$images[0].'" width="100%" alt="" />
      <br> <br> <b>Brand :'.$brand.' </b> 
        <br><p>'.$lnote.'</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>';
}

               $stmt->close();

               }                                     

    break;
  
  default:
    
                                if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,lpic,pic,sales,rental,brand,hot,featured  FROM products ORDER BY id DESC")) {
                                    $stmt->execute();
                                    $stmt->bind_result($id,$title,$date,$snote,$lnote,$lpic,$pic,$sales,$rental,$brand,$hot,$featured);

                                           while ($stmt->fetch()) {
                                           $images = unserialize($pic); 
                                                                                      $limages = unserialize($lpic); 


 echo '<!--product item-->
                <div class="product_item hit w_xs_full">
                  <figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">
                    <!--product preview-->
                    <a href="#" data-toggle="modal" data-target="#myMod-'.$id.'" class="d_block relative wrapper pp_wrap m_bottom_15">';
                    if($hot == '1'){

                    echo'<span class="hot_stripe">
                    <img src="images/hot_product.png" alt="">
                    </span>';
                  }

                    echo'
                      <img src="loginpanel/'.$limages[0].'" class="tr_all_hover" alt="">
                      <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none "> View Details</span>
                    </a>
                    <!--description and price of product-->
                    <figcaption>
                      <h5 class="m_bottom_10"><a href="#" class="color_dark">'.$title.'</a></h5>
                      <!--rating-->
                      <h6>' .$brand.'</h6>
                      
                    </figcaption>
                  </figure>
                </div>';


                echo '<div id="myMod-'.$id.'" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">'.$title.'</h4>
      </div>
      <div class="modal-body">
      <img src="loginpanel/'.$images[0].'" width="100%" alt="" />
      <br> <br> <b>Brand :'.$brand.' </b> 
        <br><p>'.$lnote.'</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>';
}
               }                                     $stmt->close();
    break;
  
}


               ?>