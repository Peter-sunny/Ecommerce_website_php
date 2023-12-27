<?php
include_once 'loginpanel/db-connect.php';
include_once 'loginpanel/session.php';
include("./includes/header.php");

?>


<section>
	<div>
		<?php

                                if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,pic  FROM newsmaker ORDER BY id DESC")) {
                                    $stmt->execute();
                                    $stmt->bind_result($id,$title,$date,$snote,$lnote,$pic);

                                           while ($stmt->fetch()) {
                                           $images = unserialize($pic); 

 echo '<div id="myModal-'.$id.'" class="modal fade"  role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">'.$title.'</h4>
      </div>
      <div class="modal-body">
      <img src="loginpanel/'.$images[0].'" width="100%" alt="" />
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
       
?>
	</div>
</section>


<!--Place page ontent here-->
			<!--slider-->
			<div class="camera_wrap m_bottom_0">
				<div data-src="images/slide_02.jpg" data-custom-thumb="images/slide_02.jpg">
					<div class="camera_caption_1 fadeFromTop t_align_r d_xs_none">
						<div class="f_size_large color_light tt_uppercase slider_title_3 m_bottom_5"></div>
						
						<!-- <div class="color_light slider_title tt_uppercase m_bottom_45 m_sm_bottom_20" style="color:#000;text-align:right;"><b>Xelent<br>Office Solutions</b></div>
						
						<a href="#" role="button" class="tr_all_hover d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase">About us</a> -->
					</div>
				</div>
    			<div data-src="images/slide_01.jpg" data-custom-thumb="images/slide_01.jpg">
    				<div class="camera_caption_2 fadeIn  d_xs_none">
						<div class="f_size_large tt_uppercase slider_title_3 scheme_color"></div>
						<!-- <hr class="slider_divider type_2 m_bottom_5 d_inline_b"> -->
						<!-- <div class="color_light slider_title tt_uppercase m_bottom_65 m_sm_bottom_20" ><b><span class="scheme_color">Save your printing cost on</span><br><span class="color_dark">LaserJet Printer Catridges</span></b></div>
						<a href="#" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover">Go to Products</a> -->
					</div>
    			</div>
    			<div data-src="images/slide_03.jpg" data-custom-thumb="images/slide_03.jpg">
    				<div class="camera_caption_3 fadeFromTop t_align_c d_xs_none">
						<!-- <img src="images/slider_layer_img.png" alt="" class="m_bottom_5"> -->
						<!-- <div class="color_light slider_title  t_align_c m_bottom_60 m_sm_bottom_20"><b class="color_dark">Want to know more about<br> our products?</b></div>
						<a href="#" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover">Contact us</a> -->
					</div>
    			</div>
			</div>
			<!--content-->
			<div class="page_content_offset">
				<div class="container">
					
					
					



    

					
					<!--blog-->
					<div class="row clearfix m_bottom_45 m_sm_bottom_35">
						<div class="col-lg-6 col-md-6 col-sm-12 m_sm_bottom_35 blog_animate animate_ftr">
							<div class="clearfix m_bottom_25 m_sm_bottom_20">
								<h2 class="tt_uppercase color_dark f_left">News</h2>
								<div class="f_right clearfix nav_buttons_wrap">
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left tr_delay_hover r_corners blog_prev"><i class="fa fa-angle-left"></i></button>
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners blog_next"><i class="fa fa-angle-right"></i></button>
								</div>
							</div>
							<!--blog carousel-->
							<div class="blog_carousel">
							<?php
                                if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,pic  FROM newsmaker ORDER BY id DESC")) {
                                    $stmt->execute();
                                    $stmt->bind_result($id,$title,$date,$snote,$lnote,$pic);

                                           while ($stmt->fetch()) {
                                           $images = unserialize($pic); 
                                             // Because $name and $countryCode are passed by reference, their value
                                             // changes on every iteration to reflect the current row
                                             echo '
<div class="clearfix">
                  <!--image-->
                  <a href="#" class="d_block photoframe relative shadow wrapper r_corners f_left m_right_20 animate_ftt f_mxs_none m_mxs_bottom_10">
                    <img class="tr_all_long_hover" src="loginpanel/'.$images[0].'" alt="">
                  </a>
                  <!--post content-->
                  <div class="mini_post_content">
                    <h4 class="m_bottom_5 animate_ftr"><a href="#" class="color_dark"><b>'.$title.'</b></a></h4>
                    <p class="f_size_medium m_bottom_10 animate_ftr">'.$date.'</p>
                    <p class="m_bottom_10 animate_ftr">'.$snote.' </p>
                    <a class="tt_uppercase f_size_large animate_ftr" data-toggle="modal" data-target="#myModal-'.$id.'" href="#">Read More</a>
                  </div>
                </div>';
                                           
                 }
                    }
                                              
 $stmt->close();
                     ?>
            

							</div>
						</div>




						<!--testimonials-->
						<div class="col-lg-6 col-md-6 col-sm-12 ti_animate animate_ftr">
							<div class="clearfix m_bottom_25 m_sm_bottom_20">
								<h2 class="tt_uppercase color_dark f_left f_mxs_none m_mxs_bottom_15">What Our Customers Say</h2>
								<div class="f_right clearfix nav_buttons_wrap f_mxs_none">
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left tr_delay_hover r_corners ti_prev"><i class="fa fa-angle-left"></i></button>
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners ti_next"><i class="fa fa-angle-right"></i></button>
								</div>
							</div>
							<!--testimonials carousel-->
							<div class="testiomials_carousel">
							<?php
                                if($stmt = $mysqli->prepare("SELECT id,customer,testimonial,subtitle,pic,time_at FROM testimonials ORDER BY id DESC")) {
                                    $stmt->execute();
                                    $stmt->bind_result($id,$customer,$testimonial,$subtitle,$pic,$time_at);

                                           while ($stmt->fetch()) {
                                            $images = unserialize($pic); 

                                             // Because $name and $countryCode are passed by reference, their value
                                             // changes on every iteration to reflect the current row
                                             echo '<div>
									<blockquote class="r_corners shadow f_size_large relative m_bottom_15 ">'.$testimonial.'</blockquote>
									<img class="circle m_left_20 d_inline_middle animate_ftr" style="width:70px;height:70px" src="loginpanel/'.$images[0].'" alt="" />
									<div class="d_inline_middle m_left_15 animate_ftr">
										<h5 class="color_dark"><b> '.$customer.'</b></h5>
										<p>'.$subtitle.'</p>
									</div> </div>';
						
                                            
                 }
                    }
                                              

                                           $stmt->close();
                     ?>
						
								
								
								
						  </div>
						</div>
					</div>
					<!--banners-->
					

					<div class="row clearfix">
						<aside class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
							<!--widgets-->
						
							<!--compare products-->
							
						
							
							<!--tags-->
							
						</aside>
						<section class="col-lg-12 col-md-12 col-sm-12">
							<h2 class="tt_uppercase color_dark m_bottom_10 heading5 animate_ftr">Featured products</h2>
							<!--products-->
							<section class="products_container a_type_2 category_grid clearfix m_bottom_25">
								<!--product item-->

								<?php


                               if($stmt = $mysqli->prepare("SELECT id,title , date, snote,lnote,lpic,pic,hot ,brand FROM products WHERE featured = '1' LIMIT 8")) {
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
                   echo '<!--description and price of product-->
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
    

								?>
								<!--
								<div class="product_item hit w_xs_full">
									<figure class="r_corners photoframe animate_ftb type_2 t_align_c tr_all_hover shadow relative">
										<a href="#" class="d_block relative pp_wrap m_bottom_15">
											<span class="hot_stripe"><img src="images/hot_product.png" alt=""></span>
											<img src="images/pro1.jpg" class="tr_all_hover" alt="">
											<span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
										</a>
										<figcaption>
											<h5 class="m_bottom_10"><a href="#" class="color_dark">Eget elementum vel</a></h5>
											
											<div class="clearfix m_bottom_5">
												<ul class="horizontal_list d_inline_b l_width_divider">
													<li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark"></a></li>
													<li class="f_md_none"><a href="#" class="color_dark">More Info</a></li>
												</ul>
											</div>
										</figcaption>
									</figure>
								</div>
								
								-->
							</section>
							<!--banners-->
							<div class="row clearfix m_bottom_45">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<a href="#" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners red t_align_c tt_uppercase vc_child n_sm_vc_child">
										<span class="d_inline_middle">
											<img class="d_inline_middle m_md_bottom_5" src="images/banner_img_3.png" alt="">
											<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
												<b>100% Satisfaction</b><br><span class="color_dark">Guaranteed</span>
											</span>
										</span>
									</a>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<a href="#" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners green t_align_c tt_uppercase vc_child n_sm_vc_child">
										<span class="d_inline_middle">
											<img class="d_inline_middle m_md_bottom_5" src="images/banner_img_5.png" alt="">
											<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
												<b>Best<br class="d_none d_sm_block"> Brands</b><br><span class="color_dark">are available</span>
											</span>
										</span>
									</a>
								</div>

							</div>
							
							<!--bestsellers carousel-->
							
							<!--product brands-->
							<div class="clearfix m_bottom_25 m_sm_bottom_20">
								<h2 class="tt_uppercase color_dark f_left heading2 animate_fade f_mxs_none m_mxs_bottom_15">Product Brands</h2>
								<div class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none">
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners pb_prev"><i class="fa fa-angle-left"></i></button>
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners pb_next"><i class="fa fa-angle-right"></i></button>
								</div>
							</div>
							<!--product brands carousel-->
							<div class="product_brands with_sidebar m_sm_bottom_35">
								<a href="#" class="d_block t_align_c animate_fade"><img src="images/canlogo.png" alt=""></a>
								<a href="#" class="d_block t_align_c animate_fade"><img src="images/brologo.png" alt=""></a>
								<a href="#" class="d_block t_align_c animate_fade"><img src="images/hplogo.png" alt=""></a>
								<a href="#" class="d_block t_align_c animate_fade"><img src="images/klogo.png" alt=""></a>
								<a href="#" class="d_block t_align_c animate_fade"><img src="images/samlogo.png" alt=""></a>
								<!-- <a href="#" class="d_block t_align_c animate_fade"><img src="images/brand_logo.jpg" alt=""></a>
								<a href="#" class="d_block t_align_c animate_fade"><img src="images/brand_logo.jpg" alt=""></a>
								<a href="#" class="d_block t_align_c animate_fade"><img src="images/brand_logo.jpg" alt=""></a>
								<a href="#" class="d_block t_align_c animate_fade"><img src="images/brand_logo.jpg" alt=""></a>
								<a href="#" class="d_block t_align_c animate_fade"><img src="images/brand_logo.jpg" alt=""></a>
								<a href="#" class="d_block t_align_c animate_fade"><img src="images/brand_logo.jpg" alt=""></a>
								<a href="#" class="d_block t_align_c animate_fade"><img src="images/brand_logo.jpg" alt=""></a> -->
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