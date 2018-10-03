<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 30,
  'size'	=> 20,
  'autofocus',
	
	'autocomplete'=>"off",
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 20,
	
	'autocomplete'=>"off",
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>NNBID Easy - Fast -  Secure Online Bidding</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_landing/css/bootstrap.min.css"><!-- bootstrap-CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_landing/css/bootstrap-select.css"><!-- bootstrap-select-CSS -->
<link href="<?php echo base_url(); ?>assets_landing/css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_landing/css/flexslider.css" type="text/css" media="screen" /><!-- flexslider-CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_landing/css/font-awesome.min.css" /><!-- fontawesome-CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_landing/css/menu_sideslide.css" type="text/css" media="all"><!-- Navigation-CSS -->
<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="NNBID online auction" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta tags -->

<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
</head>
<body>	
		
	<!-- header -->
	<header>
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-left">
				<p><a href="<?php echo base_url(); ?>"><i class="fa fa-download" aria-hidden="true"></i>Pune</a></p>
			</div>
			<div class="w3ls-header-right">
				<ul>
					
					<li class="dropdown head-dpdn">
						<a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Contact Us : 9890408632</a>
					</li>
					
					
				</ul>
			</div>
			
			<div class="clearfix"> </div> 
		</div>
		<div class="container">
			<div class="agile-its-header">
				<div class="logo">
					<h1><a href="<?php echo base_url(); ?>"><span>NN</span>BID</a></h1>
				</div>
				<div class="akshay_login">
          				<?php echo form_open($this->uri->uri_string()); ?>
						Username:
						<?php echo form_input($login); ?>
									<span style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span>
						Password:
						<?php echo form_password($password); ?>
									<span style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></span>
						<?php echo form_checkbox($remember); ?><?php echo form_label('Remember me', $remember['id']); ?>
						<button type="submit" class="akshay_btn" aria-label="Left Align">
							<i class="fa fa-signin" aria-hidden="true">Login</i>
						</button>
					</form>
				
				</div>	
				<div class="clearfix"></div>
			</div>
		</div>
	</header>
	<!-- //header -->
	<!-- Slider -->
		<div class="slider">
			<ul class="rslides" id="slider">
				
				<li>
					<div class="w3ls-slide-text">
						<h3>Find the Best Deals Here</h3>
						
					</div>
				</li>
				<li>
					<div class="w3ls-slide-text">
						<h3>Secure Bidding Online</h3>
						
					</div>
				</li>
				<li>
					<div class="w3ls-slide-text">
						<h3>Fast and Realtime Bidding</h3>
						
					</div>
				</li>
				<li>
					<div class="w3ls-slide-text">
						<h3>The Easiest Way to get an Auction Done</h3>
						
					</div>
				</li>
			</ul>
		</div>
		<!-- //Slider -->
		<!-- content-starts-here -->
		<div class="main-content">
			<div class="w3-categories">
				<h3>Live Auctions</h3>
				<div class="container">
					
        <?php foreach($liveAuctions as $live){ ?>

          <div class="col-md-3">
					<div class="focus-grid w3layouts-boder8">
						<a class="btn-8" href="categories.html#parentVerticalTab8">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-asterisk"></i></div>
									<h4 class="clrchg"><?php echo $live['auction_number']; ?></h4>
                  <p><?php echo $live['auction_description']; ?></p>
								</div>
							</div>
						</a>
					</div>	
					</div>
					<?php } ?>

					<div class="clearfix"></div>
				</div>
			</div>
			
			<!--partners-->
			<div class="trending-ads">

					<div class="container" align="center" id="howitworks">
						<div class="agile-trend-ads">
							<h2> How It Works...?</h2>

						
						<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSJ8PlUzlxMa4uEYyeaNwHR2eLiM9fyTYEPcW5GfXNScXhNR90tjdBT3RmB-o1BkQGMNdQDezs8YflG/embed?start=true&loop=true&delayms=5000" frameborder="0" width="1070" height="600" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
					</div>
					</div>
				</div>	
		<!--//partners-->
			<!--partners-->
			<div class="w3layouts-partners">
				
					<div class="container">
						<h3>Our Partners</h3>
						<ul>
							
							<li><a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>assets_landing/images/whirlpool.png" alt=""></a></li>
							<li><a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>assets_landing/images/lh.png" alt=""></a></li>
							<li><a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>assets_landing/images/studynbuddy.png" alt=""></a></li>
							<li><a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>assets_landing/images/ifb.png" alt=""></a></li>
							<li><a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>assets_landing/images/bosch.png" alt=""></a></li>
						</ul>
					</div>
				</div>	
		<!--//partners-->	


		<!-- most-popular-ads -->									
			<div class="trending-ads">
				<div class="container">
				<!-- slider -->
				<div class="agile-trend-ads">
					<h2>Photo Gallery</h2>
							<ul id="flexiselDemo3">
								<li>
									<div class="col-md-4 biseller-column">
										<a href="#">
											<img src="<?php echo base_url(); ?>assets_landing/images/scrap1.jpeg" alt="" />
										</a> 
									</div>
									<div class="col-md-4 biseller-column">
										<a href="#">
											<img src="<?php echo base_url(); ?>assets_landing/images/scrap2.jpg" alt="" />
										</a> 
									</div>
									<div class="col-md-4 biseller-column">
										<a href="#">
											<img src="<?php echo base_url(); ?>assets_landing/images/scrap3.png" alt="" />
										</a> 
									</div>
								</li>
								<li>
									<div class="col-md-4 biseller-column">
										<a href="#">
											<img src="<?php echo base_url(); ?>assets_landing/images/scrap4.jpg" alt="" />
										</a> 
									</div>
									<div class="col-md-4 biseller-column">
										<a href="#">
											<img src="<?php echo base_url(); ?>assets_landing/images/scrap5.jpg" alt="" />
										</a> 
									</div>
									<div class="col-md-4 biseller-column">
										<a href="#">
											<img src="<?php echo base_url(); ?>assets_landing/images/scrap6.jpg" alt="" />
										</a> 
									</div>
								</li>
								<li>
									<div class="col-md-4 biseller-column">
										<a href="#">
											<img src="<?php echo base_url(); ?>assets_landing/images/scrap7.jpg" alt="" />
										</a> 
									</div>
									<div class="col-md-4 biseller-column">
										<a href="#">
											<img src="<?php echo base_url(); ?>assets_landing/images/scrap8.jpg" alt="" />
										</a> 
									</div>
									<div class="col-md-4 biseller-column">
										<a href="#">
											<img src="<?php echo base_url(); ?>assets_landing/images/scrap9.jpg" alt="" />
										</a> 
									</div>
								</li>
						</ul>
					</div>   
			</div>
			<!-- //slider -->				
			</div>







		<!-- mobile app -->
			<div class="agile-info-mobile-app">
				<div class="container">
					<div class="col-md-5 w3-app-left">
						<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets_landing/images/mb_nnbid1.png" alt=""></a>
					</div>
					<div class="col-md-7 w3-app-right">
						<h3>NNBID is the <span style="color: red;">Easiest</span> way for Online Auctioning</h3>
						<p></p>
						
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //mobile app -->
		</div>
		<!--footer section start-->		
		<footer>
			<div class="w3-agileits-footer-top">
				<div class="container">
					<div class="wthree-foo-grids">
						<div class="col-md-3 wthree-footer-grid">
							<h4 class="footer-head">Who We Are</h4>
							<p>We are a team dedicated towards the auctioning of best quality scrap material with perfect value.</p>
							<p>We try to make the bidding as simple as possible with fast, secure and reliable service.</p>
						</div>
						<div class="col-md-3 wthree-footer-grid">
							<h4 class="footer-head">Help</h4>
							<ul>
								<li><a href="#howitworks"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>How it Works</a></li>						
								
								<li><a href="#" data-toggle="modal" data-target="#faq"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Faq</a></li>
								
								<li><a href="#" data-toggle="modal" data-target="#contactUs"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Contact</a></li>
								
							</ul>
						</div>
						<div class="col-md-3 wthree-footer-grid">
							<h4 class="footer-head">Information</h4>
							<ul>
							<li><a href="#" data-toggle="modal" data-target="#locationMap"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Locations Map</a></li>
								<li><a href="#" data-toggle="modal" data-target="#termsOfUse"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Terms Of Use</a></li>	
									
								<li><a href="#" data-toggle="modal" data-target="#privacyPolicy"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Privacy Policy</a></li>	
							</ul>
						</div>
						<div class="col-md-3 wthree-footer-grid">
							<h4 class="footer-head">Contact Us</h4>
							<span class="hq">Our headquarters</span>
							<address>
								<ul class="location">
									<li><span class="glyphicon glyphicon-map-marker"></span></li>
									<li><?php echo $contact_profile['org_name']; ?><br><?php echo $contact_profile['org_address']; ?></li>
								</ul>	
								<div class="clearfix"> </div>
								<ul class="location">
									<li><span class="glyphicon glyphicon-earphone"></span></li>
									<li><?php if(isset($contact_profile['phone1'])){ echo $contact_profile['phone1']; } ?><?php if(isset($contact_profile['phone2'])){ echo ", <br>".$contact_profile['phone2']; } ?></li>
								</ul>	
								<div class="clearfix"> </div>
								<ul class="location">
									<li><span class="glyphicon glyphicon-envelope"></span></li>
									<li><a href="mailto:admin@nnbid.com"><?php if (isset($contact_profile['email1'])){ echo $contact_profile['email1']; } ?><?php if(isset($contact_profile['email2'])){ echo ", <br>".$contact_profile['email2']; } ?></a></li>
								</ul>						
							</address>
						</div>
						<div class="clearfix"></div>
					</div>						
				</div>	
			</div>	
			<div class="agileits-footer-bottom text-center">
			<div class="container">
				<div class="w3-footer-logo">
					<h1><a href="<?php echo base_url(); ?>"><span>NN</span>BID</a></h1>
				</div>
				<div class="w3-footer-social-icons">
					<ul>
						<li><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a></li>
						<li><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a></li>
						<li><a class="flickr" href="#"><i class="fa fa-flickr" aria-hidden="true"></i><span>Flickr</span></a></li>
						<li><a class="googleplus" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span>Google+</span></a></li>
						<li><a class="dribbble" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a></li>
					</ul>
				</div>
				<div class="copyrights">
					<p> © 2018 NNBID. All Rights Reserved | Design by  <a href="#">CodeELectra</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>
        <!--footer section end-->
		<!-- Navigation-Js-->
			<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets_landing/js/main.js"></script> -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets_landing/js/classie.js"></script>
		<!-- //Navigation-Js-->
		<!-- js -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets_landing/js/jquery.min.js"></script>
		<!-- js -->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url(); ?>assets_landing/js/bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets_landing/js/bootstrap-select.js"></script>
		<script>
		  $(document).ready(function () {
			var mySelect = $('#first-disabled2');

			$('#special').on('click', function () {
			  mySelect.find('option:selected').prop('disabled', true);
			  mySelect.selectpicker('refresh');
			});

			$('#special2').on('click', function () {
			  mySelect.find('option:disabled').prop('disabled', false);
			  mySelect.selectpicker('refresh');
			});

			$('#basic2').selectpicker({
			  liveSearch: true,
			  maxOptions: 1
			});
		  });
		</script>
		<!-- language-select -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets_landing/js/jquery.leanModal.min.js"></script>
		<link href="<?php echo base_url(); ?>assets_landing/css/jquery.uls.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>assets_landing/css/jquery.uls.grid.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>assets_landing/css/jquery.uls.lcd.css" rel="stylesheet"/>
		<!-- Source -->
		<script src="<?php echo base_url(); ?>assets_landing/js/jquery.uls.data.js"></script>
		<script src="<?php echo base_url(); ?>assets_landing/js/jquery.uls.data.utils.js"></script>
		<script src="<?php echo base_url(); ?>assets_landing/js/jquery.uls.lcd.js"></script>
		<script src="<?php echo base_url(); ?>assets_landing/js/jquery.uls.languagefilter.js"></script>
		<script src="<?php echo base_url(); ?>assets_landing/js/jquery.uls.regionfilter.js"></script>
		<script src="<?php echo base_url(); ?>assets_landing/js/jquery.uls.core.js"></script>
		<script>
					$( document ).ready( function() {
						$( '.uls-trigger' ).uls( {
							onSelect : function( language ) {
								var languageName = $.uls.data.getAutonym( language );
								$( '.uls-trigger' ).text( languageName );
							},
							quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
						} );
					} );
				</script>
		<!-- //language-select -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets_landing/js/jquery.flexisel.js"></script><!-- flexisel-js -->	
					<script type="text/javascript">
						 $(window).load(function() {
							$("#flexiselDemo3").flexisel({
								visibleItems:1,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 5000,    		
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: { 
									portrait: { 
										changePoint:480,
										visibleItems:1
									}, 
									landscape: { 
										changePoint:640,
										visibleItems:1
									},
									tablet: { 
										changePoint:768,
										visibleItems:1
									}
								}
							});
							
						});
					   </script>
		<!-- Slider-JavaScript -->
			<script src="<?php echo base_url(); ?>assets_landing/js/responsiveslides.min.js"></script>	
			 <script>
			$(function () {	
			  $("#slider").responsiveSlides({
				auto: true,
				pager: false,
				nav: true,
				speed: 500,
				maxwidth: 800,
				namespace: "large-btns"
			  });

			});
		  </script>
		<!-- //Slider-JavaScript -->
		<!-- here stars scrolling icon -->
			<script type="text/javascript">
				$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear' 
						};
					*/
										
					$().UItoTop({ easingType: 'easeOutQuart' });
										
					});
			</script>
			<!-- start-smoth-scrolling -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets_landing/js/move-top.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets_landing/js/easing.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
						event.preventDefault();
						$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
					});
				});
			</script>
			<!-- start-smoth-scrolling -->

			<!-- script for map -->
			<script>
function myMap() {
  var myCenter = new google.maps.LatLng(18.5692365,73.9135057);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
</script>
			<!-- script for map ends -->
			<!-- Modal starts here -->
			<div class="modal fade" id="termsOfUse" tabindex="-1" role="dialog"  
										aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
															&times;</button>
														<h4 class="modal-title" id="myModalLabel">
															Terms Of Use are</h4>
													</div>
													<div class="modal-body">
														  
													</div>
												</div>
											</div>
										</div>
							</div>


			<div class="modal fade" id="privacyPolicy" tabindex="-1" role="dialog"  
										aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
															&times;</button>
														<h4 class="modal-title" id="myModalLabel">
															Privacy Policy is</h4>
													</div>
													<div class="modal-body">
														  
													</div>
												</div>
											</div>
										</div>
							</div>
			<div class="modal fade" id="faq" tabindex="-1" role="dialog"  
										aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
															&times;</button>
														<h4 class="modal-title" id="myModalLabel">
															Frequently Asked Questions</h4>
													</div>
													<div class="modal-body">
														  
													</div>
												</div>
											</div>
										</div>
							</div>

			<div class="modal fade" id="contactUs" tabindex="-1" role="dialog"  
										aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
															&times;</button>
														<h4 class="modal-title" id="myModalLabel">
															Contact Us</h4>
													</div>
													<div class="modal-body">
														<b>Company Name:</b> <?php echo $contact_profile['org_name']; ?>
														<br>
														<b>Company Address:</b> <?php echo $contact_profile['org_address']; ?>
														<br>

														<b>Company Email:</b> <?php if (isset($contact_profile['email1'])){ echo $contact_profile['email1']; } ?><?php if(isset($contact_profile['email2'])){ echo ", <br>".$contact_profile['email2']; } ?>
														
														<br><br>
														<b>Phone No.:</b> <?php if(isset($contact_profile['phone1'])){ echo $contact_profile['phone1']; } ?><?php if(isset($contact_profile['phone2'])){ echo ", <br>".$contact_profile['phone2']; } ?>
														 
													</div>
												</div>
											</div>
										</div>
							</div>

			<div class="modal fade" id="locationMap" tabindex="-1" role="dialog"  
										aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
															&times;</button>
														<h4 class="modal-title" id="myModalLabel">
															Location of NNBID
															</h4>
															
													</div>
													<div class="modal-body">
														  <div id="map" style="width:100%;height:500px"></div>
													</div>
												</div>
											</div>
										</div>
							</div>
			<!-- Modal ends here -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9PXg0SVmcKHGDB0TuI6iRPoGGKJfCKI0&callback=myMap"></script>


		<!-- //here ends scrolling icon -->
</body>		
</html>