<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>BEARPATH</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link href="<?php echo base_url();?>aset/user/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url();?>aset/user/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url();?>aset/user/css/font-awesome.css" rel="stylesheet"> 
<link href="<?php echo base_url();?>aset/user/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="<?php echo base_url();?>aset/user/css/flexslider.css" type="text/css" media="screen" />
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
		<?php 
		$session = $this->session->userdata('user_login');
		if($session){ ?>
			<li> <a href="<?php echo base_url();?>index.php/user/welcome/logout"><i class="fa fa-power-off" aria-hidden="true"></i> Logout </a></li>
		
		<?php }else{ ?>
		    <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> login </a></li>
			<li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Registrasi </a></li>
		<?php } ?>
			<li><i class="fa fa-phone" aria-hidden="true"></i> Call : +62813-2112-3403</li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:bearpath@gmail.com">bearpath.sandal@gmail.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1><a href="index.php"><span>B</span>EARPATH </a></h1>
			</div>
        <!-- header-bot -->
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="menu__item"><a class="menu__link" href="<?php echo base_url().'index.php/user/welcome/index'?>">Home <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="<?php echo base_url().'index.php/user/welcome/produk'?>">Produk</a></li>
					<li class=" menu__item"><a class="menu__link" href="<?php echo base_url().'index.php/user/welcome/customize'?>">Customize</a></li>
					<li class=" menu__item"><a class="menu__link" href="<?php echo base_url().'index.php/user/welcome/about'?>">About</a></li>
					<li class=" menu__item"><a class="menu__link" href="<?php echo base_url().'index.php/user/welcome/contact'?>">Contact</a></li>
					<?php  
					if($session){ ?>
					<li class=" menu__item"><a style="color:red" class="menu__link" href="<?php echo base_url().'index.php/user/order/listOrder'?>">Order</a></li>
					<?php } ?>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
			<a href="<?php echo base_url();?>index.php/user/order/cart"><button class="w3view-cart" type="button" name="cart" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button></a>
					<!--form action="#" method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					</form-->  
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-12 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Login <span>Sekarang</span></h3>
						<div class="info_login" id="info_login"></div>
						<form id="form_login" action="javascript:void(0)">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="username" required="">
								<label>Username</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="password" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<input onclick="login();" type="submit" value="Login">
						</form>
						<div class="clearfix"></div>
							<p><a href="#" data-toggle="modal" data-target="#myModal2" > Buat akun</a></p> 
							<p><a href="#" data-toggle="modal" data-target="#ForgetPassword" > Lupa Password</a></p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
		
		
		 <div class="modal fade" id="ForgetPassword" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-12 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Forget Password </h3>
						<div class="info_login" id="LupaPassword"></div>
						<form id="confirmEmail" action="javascript:void(0)">
							<div class="styled-input agile-styled-input-top">
								<input type="email" name="e-mail" id="e-mail" required="">
								<label>E-mail</label>
								<span></span>
							</div>
						
							<input onclick="aa();" type="button" value="Submit">
						</form>
						<div class="clearfix"></div>
							
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->
<script>
function login(){
	$('#info_login').html('<div class="alert alert-warning">Loading...</div>'); 
	formData = $('#form_login').serialize();
	console.log(formData);
	$.ajax({
	  method: "POST",
	  url: "<?php echo base_url();?>index.php/user/welcome/login",
	  data: formData,
	  dataType:"json",
	  success: function(msg){
		  if(msg=="1"){
				$('#info_login').html('<div class="alert alert-success">Login berhasil</div>');
				setTimeout(function(){ location.reload();},1500);
			}else if(msg=="2"){
				$('#info_login').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+'Username atau Password salah'+'</div>');
			}else{
				$('#info_login').html("");
			}
	  }
	});
}



function submit_register(){
	formData = $('#form_register').serialize();
	// conQsole.log($('#rusername').val());
	if($('#rusername').val() == ''){
		return false;
	}if($('#rpassword').val() == ''){
		return false;
	}if($('#rulangi_password').val() == ''){
		return false;
	}if($('#rnama_customer').val() == ''){
		return false;
	}if($('#remail').val() == ''){
		return false;
	}if($('#remail').val() != ''){
		console.log('dor');
		 var email=document.getElementById('remail').value;
		 if ((email.indexOf('@',0)==-1) || (email.indexOf('.',0)==-1)){
			return false;
		}
	}
	if($('#ralamat').val() == ''){
		return false;
	}
	console.log(formData);
	$('#info_register').html('<div class="alert alert-warning">Loading...</div>'); 
	$.ajax({
	  method: "POST",
	  url: "<?php echo base_url();?>index.php/user/welcome/register",
	  data: formData,
	  dataType:"html",
	  success: function(msg){
		  if(msg=="1"){ 
				$('#info_register').html('<div class="alert alert-success">Registrasi berhasil. silahkan login</div>');
				setTimeout(function(){ location.reload();},1500);
			}else{
				$('#info_register').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+msg+'</div>');
			}
	  }
	});
}

function aa(){
	var dataVal = $('#e-mail').val();
	console.log(dataVal);
	// if(dataVal == ''){
		// return false;
	// }if(dataVal != ''){
		console.log('dor');
		 // var email=document.getElementById('e-mail').value;
		 // if ((email.indexOf('@',0)==-1) || (email.indexOf('.',0)==-1)){
			// return false;
		// }
	// }
	$.ajax({
		url :'<?php echo base_url();?>index.php/user/welcome/aa', 
		type: "post", //form method
		data: {
			data : dataVal
		},
		dataType:"json", //misal kita ingin format datanya brupa json
		beforeSend:function(){
		},
		success:function(result){
			console.log(result);
			if(result.code==1){
				$('#e-mail').val('');
				// bootbox.alert(result.massage);
				window.location = "<?php echo base_url();?>index.php/user/welcome/formResetPassword/"+result.id;
			}else{
			   bootbox.alert(result.massage);
			}
		}
	});
}
</script>
<!-- Modal2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-12 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Registrasi</h3>
						<div class="info_register" id="info_register"></div>
						 <form action="javascript:void(0)" id="form_register">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="username" id="rusername" required="">
								<label>Username</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="password" id="rpassword" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="ulangi_password" id="rulangi_password" required=""> 
								<label>Confirm Password</label>
								<span></span>
							</div> 
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="nama_customer" id="rnama_customer" required="">
								<label>Nama Lengkap</label>
								<span></span>
							</div> 
							<div class="styled-input agile-styled-input-top">
								<input type="email" name="email" id="remail" required="">
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="alamat" id="ralamat" required="">
								<label>Alamat</label> 
							</div> 
							<input type="submit" value="Submit" onclick="submit_register()">
						</form> 
						<div class="clearfix"></div> 

						</div> 
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->

<!-- banner -->
	<?php echo $this->load->view($content);?>
	
<!-- footer -->
	<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE SHIPPING</h3>
						<p>Gratis ongkos kirim kedaerah manapun.</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>24/7 SUPPORT</h3>
						<p>Layanan customer service yang siap melayani customer.</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>MONEY BACK GUARANTEE</h3>
						<p>Jaminan uang kembali apabila produk cacat</p>
					</div>
				</div>
					
				<div class="clearfix"> </div>
			</div>

		</div>
	</div>

<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left">
			<h2><a href="index.html"><span>B</span>EARPATH </a></h2>
			<p>Produk sandal yang diperuntukan untuk berpetualang.</p>
			<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Our <span>Information</span> </h4>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="product.html">Product</a></li>
						<li><a href="customize.html">Costumize</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				
				<div class="col-md-5 sign-gd-two">
					<h4>Store <span>Information</span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Phone Number</h6>
								<p>+62813-2112-3403</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p>Email :<a href="mailto:example@email.com"> bearpath.sandal@gmail.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Location</h6>
								<p>Jl. H. Mesri No. 28c, Pasir Kaliki, Cicendo, Bandung, Jawa Barat, Indonesia. 
								
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-3 sign-gd flickr-post">
					<h4>Flickr <span>Posts</span></h4>
					<ul>
						<li><a href="single.html"><img src="<?php echo base_url();?>aset/user/images/t1.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="<?php echo base_url();?>aset/user/images/t2.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="<?php echo base_url();?>aset/user/images/t3.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="<?php echo base_url();?>aset/user/images/t4.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="<?php echo base_url();?>aset/user/images/t1.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="<?php echo base_url();?>aset/user/images/t2.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="<?php echo base_url();?>aset/user/images/t3.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="<?php echo base_url();?>aset/user/images/t2.jpg" alt=" " class="img-responsive" /></a></li>
						<li><a href="single.html"><img src="<?php echo base_url();?>aset/user/images/t4.jpg" alt=" " class="img-responsive" /></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
			<div class="agile_newsletter_footer">
					<div class="col-sm-6 newsleft">
				<h3>SIGN UP FOR NEWSLETTER !</h3>
			</div>
			<div class="col-sm-6 newsright">
				<form action="#" method="post">
					<input type="email" placeholder="Enter your email..." name="email" required="">
					<input type="submit" value="Submit">
				</form>
			</div>

		<div class="clearfix"></div>
	</div>
		<p class="copy-right">&copy 2017 BEARPATH. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
	</div>
</div>
<!-- //footer -->

<!-- login -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>
										<form>
											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<h4>Re-type Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>
											
										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form>
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												<a href="#">Forgot password?</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGNIN" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<!-- js -->
<script type="text/javascript" src="<?php echo base_url();?>aset/user/js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="<?php echo base_url();?>aset/user/js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->
	<script src="<?php echo base_url();?>aset/user/js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

	<!-- //cart-js --> 
<!-- script for responsive tabs -->						
<script src="<?php echo base_url();?>aset/user/js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //script for responsive tabs -->		
<!-- FlexSlider -->
<script src="<?php echo base_url();?>aset/user/js/jquery.flexslider.js"></script>
	<script>
	// Can also be used with $(document).ready()
		$(window).load(function() {
			$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
			});
		});
	</script>
<!-- //FlexSlider-->
<!-- stats -->
	<script src="<?php echo base_url();?>aset/user/js/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url();?>aset/user/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url();?>aset/user/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>aset/user/js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
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
<!-- //here ends scrolling icon -->


<!-- for bootstrap working -->
<script type="text/javascript" src="<?php echo base_url();?>aset/user/js/bootstrap.js"></script>
<!-----box alert------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

</body>
</html>
