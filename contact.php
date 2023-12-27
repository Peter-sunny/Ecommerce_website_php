<?php
include("./includes/headerc.php");
?>
<!--breadcrumbs-->
			<section class="breadcrumbs">
				<div class="container">
					<ul class="horizontal_list clearfix bc_list f_size_medium">
						<li class="m_right_10 current"><a href="#" class="default_t_color">Home<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
						<li><a href="#" class="default_t_color">Contacts</a></li>
					</ul>
				</div>
			</section>
			<!--content-->
			<div class="page_content_offset">
				<div class="container">
					<div class="row clearfix">
						<!--left content column-->
						<section class="col-lg-12 col-md-12 col-sm-12">
							<h2 class="tt_uppercase color_dark m_bottom_25">Contacts</h2>
							<div class="r_corners photoframe map_container shadow m_bottom_45">
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d125193.83538323037!2d75.88441084148046!3d11.31223066569226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1520811261014" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
							<div class="row clearfix">
								<div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30">
									<h2 class="tt_uppercase color_dark m_bottom_25">Contact Info</h2>
									<ul class="c_info_list">
										<li class="m_bottom_10">
											<div class="clearfix m_bottom_15">
												<i class="fa fa-map-marker f_left color_dark"></i>
												<p class="contact_e">XCTLLP Office  LLC,<br> xxx, xxx xx-9<br> dubai </p>
											</div>
										</li>
										<li class="m_bottom_10">
											<div class="clearfix m_bottom_10">
												<i class="fa fa-phone f_left color_dark"></i>
												<p class="contact_e">xx xxxx</p>
											</div>
										</li>
										<li class="m_bottom_10">
											<div class="clearfix m_bottom_10">
												<i class="fa fa-envelope f_left color_dark"></i>
												<a class="contact_e default_t_color" href="mailto:#">XCTLLPxxx@gmail.com</a>
											</div>
										</li>
										<li>
											<div class="clearfix">
												<i class="fa fa-clock-o f_left color_dark"></i>
												<p class="contact_e">Monday - Friday: 08.00-20.00 <br>Saturday: 09.00-15.00<br> Sunday: closed</p>
											</div>
										</li>
									</ul>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 m_xs_bottom_30">
									<h2 class="tt_uppercase color_dark m_bottom_25">Contact Form</h2>
									<!-- <p class="m_bottom_10">Send an email. All fields with an <span class="scheme_color">*</span> are required.</p> -->
									<form id="contactform" method="post" action="connect.php">
										<ul>
											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Your Name</label>
													<input type="text" id="cf_name" name="cf_name" class="full_width r_corners">
												</div>
												<div class="f_left half_column">
													<label for="cf_email" class="required d_inline_b m_bottom_5">Email</label>
													<input type="email" id="cf_email" name="cf_email" class="full_width r_corners">
												</div>
											</li>
											<li class="m_bottom_15">
												<label for="cf_subject" class="d_inline_b m_bottom_5">Subject</label>
												<input type="text" id="cf_subject" name="cf_subject" class="full_width r_corners">
											</li>
											<li class="m_bottom_15">
												<label for="cf_message" class="d_inline_b m_bottom_5 required">Message</label>
												<textarea id="cf_message" name="cf_message" class="full_width r_corners"></textarea>
											</li>
											<li>
												<button class="button_type_4 bg_light_color_2 r_corners mw_0 tr_all_hover color_dark">Send</button>
											</li>
										</ul>
									</form>
								</div>
							</div>
						</section>
						<!--right column-->
						
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