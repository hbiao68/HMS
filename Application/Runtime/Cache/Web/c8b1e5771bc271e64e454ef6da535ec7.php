<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<title>Businex Website Template | Home :: W3layouts</title>
		<link href="/Public/Static/new_template/css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href="/Public/Static/new_template/css/jquery.bxslider.css" rel="stylesheet" type="text/css"  media="all" />
		<link href="/Public/Static/new_template/css/hb_pc.css" rel="stylesheet" type="text/css"  media="all" />
		  <script src="/Public/Static/new_template/js/jquery-1.10.2.min.js"></script>
		  <script src="/Public/Static/new_template/js/jquery.bxslider.min.js"></script>
	</head>
	<body>
	
	
		
		<!----start-wrap---->
		<div class="wrap">
			<!---start-header---->
			<div class="top-links" id="top">
					<div class="contact-info">
						Contact us: <span class="contact-info1">0123 456 789</span>
					</div>
					<div class="social-icons">
		                <ul>
		                    <li><a class="facebook" href="#" target="_blank"> </a></li>
		                    <li><a class="twitter" href="#" target="_blank"></a></li>
		                    <li><a class="googleplus" href="#" target="_blank"></a></li>
		                    <li><a class="pinterest" href="#" target="_blank"></a></li>
		                    <li><a class="dribbble" href="#" target="_blank"></a></li>
		                    <li><a class="vimeo" href="#" target="_blank"></a></li>
		                </ul>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
			<div class="header">
				<div class="wrap">
				<div class="logo">
					<a href="index.html"><img src="/Public/Static/new_template/images/logo.png" title="logo" /></a>
				</div>
				<div class="top-nav">
					<ul>
						<li class="active"><a href="index.html">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="services.html">Services</a></li>
						<li><a href="portfolio.html">Portfolio</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="contact.html">Contact</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
			<!---End-header---->
		</div>

		 
		 
		 
		 <script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
				
				$('.bxslider').bxSlider({
					auto: true,
					pager:false
                });
			});
		</script>
		 <!--start-image-slider---->
			<div class="width_90 margin_center">					     
				<ul class="bxslider">
				<!-- 
				<li><img src="/Public/Static/new_template/images/slider3.jpg" class=" margin_center"/></li>
				 -->
				<?php if(is_array($ad)): $i = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					    <a href="<?php echo ($vo["url"]); ?>">
					    	<img src="<?php echo ($vo["img"]); ?>" class=" margin_center"/>
					    </a>
				    </li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>					
		 <!--End-image-slider---->
		 <!---start-content---->
		 <div class="content">
		 	<div class="top-grids">
		 		<div class="wrap">
			 		<div class="top-grid">
			 			<a href="#"><img src="/Public/Static/new_template/images/icon1.png" title="icon-name" /></a>
			 			<h3>Bussiness</h3>
			 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
			 			<a class="button" href="#">Read More</a>
			 		</div>
			 		<div class="top-grid">
			 			<a href="#"><img src="/Public/Static/new_template/images/icon2.png" title="icon-name" /></a>
			 			<h3>Statistics</h3>
			 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
			 			<a class="button" href="#">Read More</a>
			 		</div>
			 		<div class="top-grid last-topgrid">
			 			<a href="#"><img src="/Public/Static/new_template/images/icon4.png" title="icon-name" /></a>
			 			<h3>24x7</h3>
			 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
			 			<a class="button" href="#">Read More</a>
			 		</div>
			 		<div class="clear"> </div>
		 		</div>
		 	</div>
		 	<!---start-mid-grids---->
		 	<div class="mid-grids">
		 		<div class="wrap">
			 		<div class="mid-grid">
			 			<a href="#"><img src="/Public/Static/new_template/images/slider1.jpg" title="image-name" /></a>
			 			<h3>Lorem ipsum</h3>
			 			<p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut .</p>
			 			<a class="mid-button" href="#">More</a>
			 		</div>
			 		<div class="mid-grid">
			 			<a href="#"><img src="/Public/Static/new_template/images/slider2.jpg" title="image-name" /></a>
			 			<h3>Lorem ipsum</h3>
			 			<p>consectetur adipisicing elit, sed do eiuntre magna aliqua.</p>
			 			<a class="mid-button" href="#">More</a>
			 		</div>
			 		<div class="mid-grid">
			 			<a href="#"><img src="/Public/Static/new_template/images/slider3.jpg" title="image-name" /></a>
			 			<h3>Lorem ipsum</h3>
			 			<p>consectetur adipisicing elit, sed do eiusmode magna aliqua.</p>
			 			<a class="mid-button" href="#">More</a>
			 		</div>
			 		<div class="mid-grid" id="last">
			 			<a href="#"><img src="/Public/Static/new_template/images/slider4.jpg" title="image-name" /></a>
			 			<h3>Lorem ipsum</h3>
			 			<p>consectetur adipi incididunt ut labore et dolore magna aliqua.</p>
			 			<a class="mid-button" href="#">More</a>
			 		</div>
			 		<div class="mid-grid">
			 			<a href="#"><img src="/Public/Static/new_template/images/slider1.jpg" title="image-name" /></a>
			 			<h3>Lorem ipsum</h3>
			 			<p>consectetur adipisicing elit, sed dolore magna aliqua.</p>
			 			<a class="mid-button" href="#">More</a>
			 		</div>
			 		<div class="mid-grid">
			 			<a href="#"><img src="/Public/Static/new_template/images/slider2.jpg" title="image-name" /></a>
			 			<h3>Lorem ipsum</h3>
			 			<p>consectetur adipisicing elit, sed labore et dolore magna aliqua.</p>
			 			<a class="mid-button" href="#">More</a>
			 		</div>
			 		<div class="mid-grid">
			 			<a href="#"><img src="/Public/Static/new_template/images/slider3.jpg" title="image-name" /></a>
			 			<h3>Lorem ipsum</h3>
			 			<p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			 			<a class="mid-button" href="#">More</a>
			 		</div>
			 		<div class="mid-grid" id="last">
			 			<a href="#"><img src="/Public/Static/new_template/images/slider4.jpg" title="image-name" /></a>
			 			<h3>Lorem ipsum</h3>
			 			<p>consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
			 			<a class="mid-button" href="#">More</a>
			 		</div>
		 		<div class="clear"> </div>
		 		</div>
		 	</div>
		 	<!---End-mid-grids---->
		 	
		 	<!---start-box----->
		 	<div class="box">
		 		<div class="wrap">
					<div class="gallery">
						<h3>Gallery</h3>
						<ul>
							<li><a href="/Public/Static/new_template/images/slider1.jpg"><img src="/Public/Static/new_template/images/slider1.jpg" alt=""></a><a href="#"></a></li>
							<li><a href="/Public/Static/new_template/images/slider2.jpg"><img src="/Public/Static/new_template/images/slider2.jpg" alt=""></a><a href="#"></a></li>
							<li><a href="/Public/Static/new_template/images/slider3.jpg"><img src="/Public/Static/new_template/images/slider3.jpg" alt=""></a><a href="#"></a></li>
							<li><a href="/Public/Static/new_template/images/slider4.jpg"><img src="/Public/Static/new_template/images/slider4.jpg" alt=""></a><a href="#"></a></li>
							<li><a href="/Public/Static/new_template/images/slider1.jpg"><img src="/Public/Static/new_template/images/slider1.jpg" alt=""></a><a href="#"></a></li>
							<li><a href="/Public/Static/new_template/images/slider2.jpg"><img src="/Public/Static/new_template/images/slider2.jpg" alt=""></a><a href="#"></a></li>
							<li><a href="/Public/Static/new_template/images/slider3.jpg"><img src="/Public/Static/new_template/images/slider3.jpg" alt=""></a><a href="#"></a></li>
							<li><a href="/Public/Static/new_template/images/slider4.jpg"><img src="/Public/Static/new_template/images/slider4.jpg" alt=""></a><a href="#"></a></li>
						</ul>
					</div>
					<script type="text/javascript" src="/Public/Static/new_template/js/jquery.lightbox.js"></script>
				    <link rel="stylesheet" type="text/css" href="/Public/Static/new_template/css/lightbox.css" media="screen">
				  	<script type="text/javascript">
				    $(function() {
				        $('.gallery a').lightBox();
				    });
				    </script>
					<div class="terminals">
						<h3>Testimonials</h3>
						<p>sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<span><a href="#">- Lorem ipsum</a> USA.</span>
					</div>
					<div class="clear"> </div>
				</div>
				</div>
		 	<!---end-box---->
		 	


<!---start-articals------>
		 	<div class="p-sections">
		 		<div class="wrap">
			 		<h3>Popular Sections</h3>
			 		<ul>
			 			<li><a href="#">consectetur</a></li>
			 			<li><a href="#">adipisicing</a></li>
			 			<li><a href="#">elit, sed do </a></li>
			 			<li><a href="#">eiusmod tempor</a></li>
			 			<li><a href="#">consectetur</a></li>
			 		</ul>
			 		<ul>
			 			<li><a href="#">consectetur</a></li>
			 			<li><a href="#">adipisicing</a></li>
			 			<li><a href="#">elit, sed do </a></li>
			 			<li><a href="#">eiusmod tempor</a></li>
			 			<li><a href="#">consectetur</a></li>
			 		</ul>
			 		<ul>
			 			<li><a href="#">consectetur</a></li>
			 			<li><a href="#">adipisicing</a></li>
			 			<li><a href="#">elit, sed do </a></li>
			 			<li><a href="#">eiusmod tempor</a></li>
			 			<li><a href="#">consectetur</a></li>
			 		</ul>
			 		<ul>
			 			<li><a href="#">consectetur</a></li>
			 			<li><a href="#">adipisicing</a></li>
			 			<li><a href="#">elit, sed do </a></li>
			 			<li><a href="#">eiusmod tempor</a></li>
			 			<li><a href="#">consectetur</a></li>
			 		</ul>
			 		<ul>
			 			<li><a href="#">consectetur</a></li>
			 			<li><a href="#">adipisicing</a></li>
			 			<li><a href="#">elit, sed do </a></li>
			 			<li><a href="#">eiusmod tempor</a></li>
			 			<li><a href="#">consectetur</a></li>
			 		</ul>
			 	<div class="clear"> </div>
		 		</div>
		 	</div>
		 	<!---start-articals------>
		 </div>
		 <!---End-content---->
		 <!---start-footer---->
		 <div class="footer">
		 	<div class="wrap">
		 		<div class="footer-grid">
		 			<h3>COMPANY</h3>
		 			<ul>
			 			<li><a href="#">ABOUT US</a></li>
			 			<li><a href="#">CLIENTS</a></li>
			 			<li><a href="#">PRESENTATION</a></li>
			 			<li><a href="#">SUPPORT</a></li>
			 			<li><a href="#">SCHEDULE</a></li>
			 		</ul>
		 		</div>
		 		<div class="footer-grid">
		 			<h3>OVERVIEW</h3>
		 			<ul>
			 			<li><a href="#">WHAT WE DO</a></li>
			 			<li><a href="#">NEWS</a></li>
			 			<li><a href="#">IT SOLUTIONS</a></li>
			 			<li><a href="#">SUPPORT</a></li>
			 		</ul>
		 		</div>
		 		<div class="footer-grid">
		 			<h3>FOR CLIENTS</h3>
		 			<ul>
			 			<li><a href="#">FORUMS</a></li>
			 			<li><a href="#">CLIENTS</a></li>
			 			<li><a href="#">PROMOTIONS</a></li>
			 			<li><a href="#">SIGN IN</a></li>
			 			<li><a href="#">SCHEDULE</a></li>
			 		</ul>
		 		</div>
		 		<div class="footer-grid">
		 			<h3>ARCHIVE</h3>
		 			<ul>
			 			<li><a href="#">JAN 2013</a></li>
			 			<li><a href="#">FEB 2013</a></li>
			 			<li><a href="#">MAR 2013</a></li>
			 			<li><a href="#">APR 2013</a></li>
			 			<li><a href="#">MAY 2013</a></li>
			 		</ul>
		 		</div>
		 		<div class="clear"> </div>
		 	</div>
		 </div>
		 <!---End-footer---->
		 <!---start-copy-right----->
		 <div class="copy-right">
				<div class="top-to-page">
						<a href="#top" class="scroll"> </a>
						<div class="clear"> </div>
					</div>
					<p>Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		 <!---End-copy-right---->
		<!----End-wrap---->
	</div>
	</body>
</html>