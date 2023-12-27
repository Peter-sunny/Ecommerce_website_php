<?php
include_once 'loginpanel/db-connect.php';
include_once 'loginpanel/session.php';
include("./includes/header.php");

?>

<?php

if(empty($_GET)) 
{ 
 echo'<script>window.location.replace("products.php?prdct_value=0&page=1")</script>';

}
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--Place page ontent here-->
<script type="text/javascript">


$(document).ready(function(){
 //window.location.replace("products.php?prdct_value=0&page=1");


//}


});

</script>

<?php

$per_page=6;

if(!empty($_GET)){
if (!empty($_GET['page'])) {

$page = $_GET['page'];

}}

else {

$page=1;

}



	if($stmtd = $mysqli->prepare("SELECT * FROM products ")) {

   $stmtd->execute();
                           
$stmtd->store_result();
$start_from = ($page - 1) * $per_page;

$total_records = $stmtd->num_rows;
$total_pages = ceil($total_records / $per_page);
	}

/*
	if($stmt = $mysqli->prepare("SELECT * FROM products LIMIT ? , ? ")) {
		 $stmt->bind_param('ss', $start_from, $per_page);

                                    $stmt->execute();
                           

//$total_records = $stmt->num_rows;
//$total_pages = ceil($total_records / $per_page);


                                    //$stmt->bind_result($brand);
                                }*/


//echo '<script>alert("'.$total_records.'");</script>';

?>

			<section class="breadcrumbs">
				<div class="container">
					<ul class="horizontal_list clearfix bc_list f_size_medium">
						<li class="m_right_10 current"><a href="index.php" class="default_t_color">Home<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
						<li><a href="products.php?prdct_value=0" class="default_t_color">Products</a></li>
					</ul>
				</div>
			</section>
			<!--content-->
			<div class="page_content_offset">
				<div class="container">
					
					
						

					<div class="row clearfix">
						<aside class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
							<!--widgets-->
							<figure class="widget animate_ftr shadow r_corners wrapper m_bottom_30">
								<figcaption>
									<h3 class="color_light">Products</h3>
								</figcaption>
								<div class="widget_content">
									<!--Categories list-->
									<ul class="categories_list">
									<li >
											<a href="products.php?prdct_value=0&page=1" class=" d_block relative"  id="allp">
												<b>All Products</b>
												<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
											</a>
											<!--second level-->
											
										</li>
										<li>
											<a href="products.php?prdct_value=1&page=1" class=" d_block relative" id="salep">
												<b>Sales</b>
												<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
											</a>
											<!--second level-->
											
										</li>
										<li>
											<a href="products.php?prdct_value=2&page=1" class=" d_block relative" id="rentalp">
												<b>Rental</b>
												<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
											</a>
											<!--second level-->
											
										</li>
										<li>
											<a href="#" class="f_size_large color_dark d_block relative">
												<b>Brands</b>
												<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
											</a>

											<ul class="d_none">
												<li>
												<?php
												if($stmt = $mysqli->prepare("SELECT DISTINCT brand FROM products ")) {
                                    $stmt->execute();
                                    $stmt->bind_result($brand);

                                           while ($stmt->fetch()) {
                                           
													echo'<a href="products.php?brnd='.$brand.'&page=1" class="d_block f_size_large color_dark relative">
														'.$brand.'<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
													</a>';
													}}
													?>
													<!--third level-->
													
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</figure>
							
							
							<!--banner-->
							
							
							<!--tags-->
							<figure class="widget animate_ftr shadow r_corners wrapper">
								<figcaption>
									<h3 class="color_light">Tags</h3>
								</figcaption>
								<div class="widget_content">
									<div class="tags_list">
										<a href="products.php?strg=canon&page=1" class="color_dark d_inline_b v_align_b">canon,</a>
										<a href="products.php?strg=hp&page=1" class="color_dark d_inline_b f_size_ex_large v_align_b">hp,</a>
										<a href="products.php?strg=printers&page=1" class="color_dark d_inline_b v_align_b">printers,</a>
										<a href="products.php?strg=laserjet&page=1" class="color_dark d_inline_b f_size_big v_align_b">laserjet,</a>
										<a href="products.php?strg=copy&page=1" class="color_dark d_inline_b v_align_b">copy,</a>
										<a href="products.php?strg=digital&page=1" class="color_dark d_inline_b f_size_large v_align_b">digital,</a>
										<a href="products.php?strg=hp" class="color_dark d_inline_b v_align_b">hp,</a>
										<a href="products.php?strg=photocopy&page=1" class="color_dark d_inline_b v_align_b">photocopy,</a>
										<a href="products.php?strg=sharp&page=1" class="color_dark d_inline_b v_align_b">sharp,</a>
										<a href="products.php?strg=canon&page=1" class="color_dark d_inline_b f_size_ex_large v_align_b">canon,</a>
										<a href="products.php?strg=hp&page=1" class="color_dark d_inline_b v_align_b">hp,</a>
										<a href="products.php?strg=xctllp&page=1" class="color_dark d_inline_b f_size_big v_align_b">xctllp</a>
									</div>
								</div>
							</figure>
						</aside>
						<section class="col-lg-9 col-md-9 col-sm-9">


						<!--sort-->
							<div class="row clearfix m_bottom_10">
								
							</div>
							<!-- <hr class="m_bottom_10 divider_type_3"> -->
							<div class="row clearfix m_bottom_15">
								<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12 m_xs_bottom_10">
									
								</div>













								<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 t_align_r t_xs_align_l">
									<!--pagination-->
									<?php
									echo'<a role="button" href="products.php?prdct_value=0&page=1" class="button_type_10 color_dark d_inline_middle bg_cs_hover bg_light_color_1 t_align_c tr_delay_hover r_corners box_s_none"><i class="fa fa-angle-left"></i></a>
									<ul class="horizontal_list clearfix d_inline_middle f_size_medium m_left_10">';
                                 for ($i=1; $i<=$total_pages; $i++) {
                                 	if(empty($_GET)){

									echo'	<li class="m_right_10"><a class="color_dark" href="products.php?prdct_value=0&page='.$i.'">'.$i.'</a></li>';
								} elseif (empty($_GET['prdct_value']) && !empty($_GET['brnd'])) {

echo'	<li class="m_right_10"><a class="color_dark" href="products.php?brnd='.$_GET['brnd'].'&page='.$i.'">'.$i.'</a></li>';

								} elseif (!empty($_GET['prdct_value']) && empty($_GET['brnd'])) {

echo'	<li class="m_right_10"><a class="color_dark" href="products.php?prdct_value='.$_GET['prdct_value'].'&page='.$i.'">'.$i.'</a></li>';

								} elseif (empty($_GET['prdct_value']) && !empty($_GET['strg'])) {

echo'	<li class="m_right_10"><a class="color_dark" href="products.php?strg='.$_GET['strg'].'&page='.$i.'">'.$i.'</a></li>';

								} elseif (!empty($_GET['prdct_value']) && !empty($_GET['strg'])) {

echo'	<li class="m_right_10"><a class="color_dark" href="products.php?prdct_value='.$_GET['prdct_value'].'&page='.$i.'">'.$i.'</a></li>';

								} elseif (empty($_GET['brnd']) && !empty($_GET['strg'])) {

echo'	<li class="m_right_10"><a class="color_dark" href="products.php?strg='.$_GET['strg'].'&page='.$i.'">'.$i.'</a></li>';

								}elseif (!empty($_GET['brnd']) && empty($_GET['strg'])) {

echo'	<li class="m_right_10"><a class="color_dark" href="products.php?brnd='.$_GET['brnd'].'&page='.$i.'">'.$i.'</a></li>';

								}

								else{
echo'	<li class="m_right_10"><a class="color_dark" href="products.php?prdct_value='.$_GET['prdct_value'].'&page='.$i.'">'.$i.'</a></li>';


								}

								}
										
								echo'	</ul>
									<a role="button" href="products.php?prdct_value=0&page='.$total_pages.'" class="button_type_10 color_dark d_inline_middle bg_cs_hover bg_light_color_1 t_align_c tr_delay_hover r_corners box_s_none"><i class="fa fa-angle-right"></i></a>';
									?>
								</div>
							</div>
							<!--products-->
							<section class="products_container category_grid clearfix m_bottom_15" id="prdct">
								
<?php
if(empty($_GET)){
    header('Location: products.php?prdct_value=0&page=1');

}else{
if(!empty($_GET['brnd'])){
$brnd=$_GET['brnd'];
if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,lpic,pic,hot ,brand FROM products WHERE brand = ?  LIMIT ?,?")) {
                                			 $stmt->bind_param('sss',$brnd, $start_from, $per_page);


                                    $stmt->execute();
                                    $stmt->bind_result($id,$title,$date,$snote,$lnote,$lpic,$pic,$hot,$brand);

                                           while ($stmt->fetch()) {
                                           $images = unserialize($pic); 
                                                                                      $limages = unserialize($lpic); 


 echo '<!--product item-->
                <div class="product_item hit w_xs_full">
                  <figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">
                    <!--product preview-->
                    <a href="#" data-toggle="modal" data-target="#myMod-'.$id.'" class="d_block relative wrapper pp_wrap m_bottom_15">
                   

                    
                      <img src="loginpanel/'.$limages[0].'" class="tr_all_hover" alt="">
                      <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none "> View Details</span>
                    </a>';

                     if($hot == '1'){

                    echo'<span class="hot_stripe">
                    <img src="images/hot_product.png" alt="">
                    </span>';
                  }
echo'
                    <!--description and price of product-->
                    <figcaption>
                      <h5 class="m_bottom_10"><a href="#" class="color_dark">'.$title.'</a></h5>
                      <!--rating-->
                                             <h6>' .$snote.'</h6>
                      
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

}elseif (!empty($_GET['strg'])){
$string=$_GET['strg']; 
$string='%'.$string.'%';
if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,lpic,pic,hot ,brand FROM products WHERE LOWER(CONCAT(title,'', snote, '', lnote,'',brand)) LIKE LOWER(?) LIMIT ?,?")) {
                                			 $stmt->bind_param('sss',$string, $start_from, $per_page);

                                                
                                    $stmt->execute();
                                    $stmt->bind_result($id,$title,$date,$snote,$lnote,$lpic,$pic,$hot,$brand);

                                           while ($stmt->fetch()) {

                                           $images = unserialize($pic); 
                                                                                      $limages = unserialize($lpic); 


 echo '<!--product item-->
                <div class="product_item hit w_xs_full">
                  <figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">
                    <!--product preview-->
                    <a href="#" data-toggle="modal" data-target="#myMod-'.$id.'" class="d_block relative wrapper pp_wrap m_bottom_15">
                   

                    
                      <img src="loginpanel/'.$limages[0].'" class="tr_all_hover" alt="">
                      <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none "> View Details</span>
                    </a>';

                     if($hot == '1'){

                    echo'<span class="hot_stripe">
                    <img src="images/hot_product.png" alt="">
                    </span>';
                  }
                  echo'
                    <!--description and price of product-->
                    <figcaption>
                      <h5 class="m_bottom_10"><a href="#" class="color_dark">'.$title.'</a></h5>
                      <!--rating-->
                                             <h6>' .$snote.'</h6>
                      
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
            }  
             $stmt->close(); }



else{
			$prdct_value=$_GET['prdct_value'];


	switch ($prdct_value) {
  case '2':
    
                               if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,lpic,pic,hot ,brand FROM products WHERE rental = '1'LIMIT ?,?")) {
                                			 $stmt->bind_param('ss', $start_from, $per_page);

                                    $stmt->execute();
                                    $stmt->bind_result($id,$title,$date,$snote,$lnote,$lpic,$pic,$hot,$brand);

                                           while ($stmt->fetch()) {
                                           $images = unserialize($pic); 
                                                                                      $limages = unserialize($lpic); 


 echo '<!--product item-->
                <div class="product_item hit w_xs_full">
                  <figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">
                    <!--product preview-->
                    <a href="#" data-toggle="modal" data-target="#myMod-'.$id.'" class="d_block relative wrapper pp_wrap m_bottom_15">
                    

                   
                      <img src="loginpanel/'.$limages[0].'" class="tr_all_hover" alt="">
                      <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none "> View Details</span>
                    </a>';
                    if($hot == '1'){

                    echo'<span class="hot_stripe">
                    <img src="images/hot_product.png" alt="">
                    </span>';
                  }
                  echo'
                    <!--description and price of product-->
                    <figcaption>
                      <h5 class="m_bottom_10"><a href="#" class="color_dark">'.$title.'</a></h5>
                      <!--rating-->
                                             <h6>' .$snote.'</h6>
                      
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
    
                                if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,lpic,pic,hot,brand  FROM products WHERE sales = '1' LIMIT ?,?")) {
                                			 $stmt->bind_param('ss', $start_from, $per_page);

                                    $stmt->execute();
                                    $stmt->bind_result($id,$title,$date,$snote,$lnote,$lpic,$pic,$hot,$brand);

                                           while ($stmt->fetch()) {
                                           $images = unserialize($pic); 
                                                                                      $limages = unserialize($lpic); 


                  echo '<!--product item-->
                <div class="product_item hit w_xs_full">
                  <figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">
                    <!--product preview-->
                    <a href="#" data-toggle="modal" data-target="#myMod-'.$id.'" class="d_block relative wrapper pp_wrap m_bottom_15">
                    

                    
                      <img src="loginpanel/'.$limages[0].'" class="tr_all_hover" alt="">
                      <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none "> View Details</span>
                    </a>';if($hot == '1'){

                    echo'<span class="hot_stripe">
                    <img src="images/hot_product.png" alt="">
                    </span>';
                  }

                  echo'
                    <!--description and price of product-->
                    <figcaption>
                      <h5 class="m_bottom_10"><a href="#" class="color_dark">'.$title.'</a></h5>
                      <!--rating-->
                                             <h6>' .$snote.'</h6>
                      
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


               }                    $stmt->close();
                                

    break;
  
  case '0':
    
                                if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,lpic,pic,sales,rental,brand,hot,featured  FROM products ORDER BY id DESC LIMIT ?,?")) {
                                			 $stmt->bind_param('ss', $start_from, $per_page);


                                    $stmt->execute();
                                    $stmt->bind_result($id,$title,$date,$snote,$lnote,$lpic,$pic,$sales,$rental,$brand,$hot,$featured);

                                           while ($stmt->fetch()) {
                                           $images = unserialize($pic); 
                                                                                      $limages = unserialize($lpic); 


                  echo '<!--product item-->
                <div class="product_item hit w_xs_full">
                  <figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">
                    <!--product preview-->
                    <a href="#" data-toggle="modal" data-target="#myMod-'.$id.'" class="d_block relative wrapper pp_wrap m_bottom_15">
                    

                    
                      <img src="loginpanel/'.$limages[0].'" class="tr_all_hover" alt="">
                      <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none "> View Details</span>
                    </a>';if($hot == '1'){

                    echo'<span class="hot_stripe">
                    <img src="images/hot_product.png" alt="">
                    </span>';
                  }
                  echo'
                    <!--description and price of product-->
                    <figcaption>
                      <h5 class="m_bottom_10"><a href="#" class="color_dark">'.$title.'</a></h5>
                      <!--rating-->
                                             <h6>' .$snote.'</h6>
                      
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
						
}
 
 }


               ?>

							<!--product item-->

						
							</section>
							<!-- <hr class="m_bottom_10 divider_type_3"> -->
							<div class="row clearfix m_bottom_15 m_xs_bottom_30">
								<div class="col-lg-7 col-md-7 col-sm-8 m_xs_bottom_10">
									<!-- <p class="d_inline_middle f_size_medium d_xs_block m_xs_bottom_5">Results 1 - 5 of 45</p>
									<p class="d_inline_middle f_size_medium m_left_20 m_xs_left_0">Show:</p>
									<!--show items per page select--
									<div class="custom_select f_size_medium relative d_inline_middle m_left_5">
										<div class="select_title r_corners relative color_dark">9</div>
										<ul class="select_list d_none"></ul>
										<select name="show_second">
											<option value="Manufacture 1">6</option>
											<option value="Manufacture 2">3</option>
											<option value="Manufacture 3">1</option>
										</select>
									</div>
									<p class="d_inline_middle f_size_medium m_left_5">items per page</p> -->
								</div>
								<div class="col-lg-5 col-md-5 col-sm-4 t_align_r t_xs_align_l">
									<!--pagination-->
									<a role="button" href="#" class="button_type_10 color_dark d_inline_middle bg_cs_hover bg_light_color_1 t_align_c tr_delay_hover r_corners box_s_none"><i class="fa fa-angle-left"></i></a>
									<ul class="horizontal_list clearfix d_inline_middle f_size_medium m_left_10">
										<li class="m_right_10"><a class="color_dark" href="#">1</a></li>
										<li class="m_right_10"><a class="scheme_color" href="#">2</a></li>
										<li class="m_right_10"><a class="color_dark" href="#">3</a></li>
									</ul>
									<a role="button" href="#" class="button_type_10 color_dark d_inline_middle bg_cs_hover bg_light_color_1 t_align_c tr_delay_hover r_corners box_s_none"><i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						

					
						</section>
					</div>






				</div>
			</div>
<!--Place page ontent here ends-->


<?php
include("./includes/footertop.php");
?>




<?php
include("./includes/footerbottom.php");
?>