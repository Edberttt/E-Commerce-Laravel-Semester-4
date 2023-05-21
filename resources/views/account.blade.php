<!DOCTYPE html>
<html lang="en">
<head>
	<title>Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <!-- favicon -->
    <link href="../images/favicon (3).ico" rel="icon" class="favIcon" />

</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over IDR 1.000.000
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="{{ url('/')}}/" class="logo">
						<img src="images/icons/logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="{{ url('/')}}/">Home</a>
							</li>

							<li>
								<a href="{{ url('/') }}/product">Shop</a>
							</li>

							<li class="label1" data-label1="hot">
								<a href="{{ url('/') }}/features_filter">Features</a>
							</li>

							<li>
								<a href="{{ url('/') }}/contact">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<form>
							<input type="text" placeholder="Search">
						</form>
	
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="3">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<a href="{{ url('/') }}/wishlist-detail" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="2">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>

						<a href="{{ url('/') }}/account" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-account">
							<i class="zmdi zmdi-account"></i>
						</a>		  
					</div>
				</nav>
				
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="{{ url('/') }}/"><img src="images/icons/logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<form>
					<input type="text" placeholder="Search">
				</form>
				
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="3">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="{{ url('/') }}/wishlist-detail" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="2">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>

				<a href="{{ url('/') }}/account" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-account">
					<i class="zmdi zmdi-account"></i>
				</a>

			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over IDR 1.000.000
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="{{ url('/') }}/">Home</a>
				</li>

				<li>
					<a href="{{ url('/') }}/product">Shop</a>
				</li>

				<li>
					<a href="{{ url('/') }}/features_filter" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="{{ url('/') }}/contact">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">

							<img src="images/kacamata/Converse_F_CO_MCV5076LB_001_52-removebg-preview.png" alt="IMG">

						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04 js-show-modal1">

								Converse F CO MCV5076LB 001 52
							</a>

							<span class="header-cart-item-info">
								1 x Rp 1.680.000

							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">

							<img src="images/kacamata/Christian Dior F CD MYDIORO1 086 54.jpg" alt="IMG">

						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">

								Christian Dior F CD MYDIORO1 086 54
							</a>

							<span class="header-cart-item-info">
								1 x Rp 5.520.000

							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">

							<img src="images/kacamata/Tommy Hilfiger F TH 0090 J5G 52.png" alt="IMG">

						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">

								Tommy Hilfiger F TH 0090 J5G 52
							</a>

							<span class="header-cart-item-info">
								1 x Rp 2.100.000

							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">

						Total: Rp 9.300.000

					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="{{ url('/') }}/shoping-cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="{{ url('/') }}/shoping-cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- breadcrumb -->
	<!-- <div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Account
			</span>
		</div>
	</div> -->


	<!-- account-page -->
	<div class="account-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-12 last-col mx-auto">
					<div class="form-container">
						<div class="form-btn">
							<button onclick="login()">Login</button>
							<button onclick="register()">Register</button>
							<hr id="Indicator">
						</div>
						<form id="LoginForm" action="account_detail.html">
							<input type="text" placeholder="username" required>
							<input type="password" placeholder="password" required>		
							<div class="form-group">
								<input type="checkbox" name="remember_me" id="remember_me">
								<label for="remember_me">Remember Me</label>
							  </div>					
							<button type="submit" class="btn" id="btnLogin">Login</button>
						</form>
						<form id="RegForm" action="account_detail.html">
							<input type="text" placeholder="name" required>
							<input type="password" placeholder="password" required>
							<input type="email" placeholder="email" required>
							<input type="tel" placeholder="phone number">
							<div class="gender">
								<label><input type="radio" name="gender" value="male">Male</label>
								<label><input type="radio" name="gender" value="female">Female</label>
							</div>
							<button type="submit" class="btn" id="btnRegister">Register</button>
						</form>
						  
						  
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<!-- <img src="images/image-removebg-preview (52).png" class="img-fluid"> -->
				</div>
			</div>
		</div>
	</div>
	




	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Unisex
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at Ciputra University or call us on (+62) 85967833065
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


<!-- js for toggle Form -->

	<script>
	var LoginForm = document.getElementById("LoginForm");
	var RegForm = document.getElementById("RegForm");
	var Indicator = document.getElementById("Indicator");
	
		function register(){

			RegForm.style.transform = "translateX(0px)";
			LoginForm.style.transform = "translateX(0px)";
			Indicator.style.transform = "translateX(73px)";
		}
		function login(){

			RegForm.style.transform = "translateX(300px)";
			LoginForm.style.transform = "translateX(300px)";
			Indicator.style.transform = "translateX(-22px)";
		}

	</script>

	<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>

	$('.btn').on('click', function(e) {
		e.preventDefault();
	});
	$('#btnLogin').each(function(){
		$(this).on('click', function(){
		swal({
		icon: "success",
		title: "Login Successful!",
		buttons: {
			confirm: {
			text: "OK",
			value: true,
			visible: true,
			className: "",
			closeModal: true
			}
		}
		}).then((value) => {
		if (value) {
			window.location.href = "account_detail.html";
		}
		});

		$(this).off('click');
	});
	});

	$('#btnRegister').each(function(){
		$(this).on('click', function(){
		swal({ 
		icon: "success",
		title: "Register Successful!",
		buttons: {
			confirm: {
			text: "OK",
			value: true,
			visible: true,
			className: "",
			closeModal: true
			}
		}
		}).then((value) => {
		if (value) {
			window.location.href = "account_detail.html";
		}
		});

		$(this).off('click');
	});
	});

	</script>


</body>
</html>