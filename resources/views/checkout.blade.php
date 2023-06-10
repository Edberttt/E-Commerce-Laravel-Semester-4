<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout</title>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->

	<link rel="icon" class="favIcon" href="{{ asset('../images/favicon (3).ico') }}">
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
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a>
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
					<div class="wrap-icon-header flex-w flex-r-m m-r-15">
						<form>
							<input type="text" placeholder="Search">
						</form>
						@if(session()->has('status'))
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="3">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
						@endif
						<a href="{{ url('/') }}/wishlist-detail" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="2">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
		
						<a href="{{ url('/') }}/account_detail" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-account">
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

				<a href="{{ route('wishlist') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="2">
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
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="{{ url('/')}}/">Home</a>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="{{ url('/')}}product">Shop</a>
				</li>

				<li>
					<a href="{{ url('/')}}features_filter" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="{{ url('/')}}contact">Contact</a>
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
						<a href="{{ route('cart') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="{{ route('cart') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1" style="text-align: left;">Product</th>
									<th class="column-2">Name</th>
									<th class="column-3">Price</th>
									<th class="column-4" style="padding-left: 20px;">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
								@foreach($cart as $item)
								<form>
									@csrf

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">

											<img src="{{ $item->product_picture }}" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{ $item->product_name }}</td> 
									<td class="column-3">{{ $item->product_price  }}</td>

									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{ $item->quantity }}">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>

									<td class="column-5">{{ $item->product_price }}</td>

								</tr>
								</form>
								@endforeach
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<!-- <div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" id="couponTextBox" type="text" name="coupon" data-notify="No Coupon Today" placeholder="Coupon Code" oninvalid="this.setCustomValidity('Text must be at least 5 characters long.')">
									

                                <input type="text" id="myTextbox" placeholder="Enter text here" required minlength="5" oninvalid="this.setCustomValidity('Text must be at least 5 characters long.')">
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div> -->

							{{-- <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div> --}}
						</div>
					</div>
				</div>

                <!-- <script>
                    const textbox = document.getElementById("couponTextbox");
                    const notification = document.getElementById("notification");

                    textbox.addEventListener("input", function() {
                    if(textbox.value.length < 5) {
                        // notification.innerText = "Text must be at least 5 characters long.";
                        notification.innerText = "No Coupon for Today";
                    } else {
                        notification.innerText = "";
                    }
                    });

                </script> -->

				<!-- div Cart kolom kanan checkout -->
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									{{ isset($subtotal) ? $subtotal[0]->subtotal : 'Subtotal not available' }}
								</span>
							</div>
						</div>

						<!-- cart shipping -->
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								{{-- <p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p> --}}
								<p class="stext-111 cl6 p-t-2">
									Please, fill your city & address first.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<!-- <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option disabled selected>Select Province...</option>
											<option>Nanggroe Aceh Darussalam</option>
											<option>Sumatera Utara</option>
											<option>Sumatera Selatan</option>
											<option>Sumatera Barat</option>
											<option>Bengkulu</option>
											<option>Riau</option>
											<option>Kepulauan Riau</option>
											<option>Jambi</option>
											<option>Lampung</option>
											<option>Bangka Belitung</option>
											<option>Kalimantan Barat</option>
											<option>Kalimantan Timur</option>
											<option>Kalimantan Selatan</option>
											<option>Kalimantan Tengah</option>
											<option>Kalimantan Utara</option>
											<option>Banten</option>
											<option>DKI Jakarta</option>
											<option>Jawa Timur</option>
											<option>Jawa Tengah</option>
                                            <option>Jawa Barat</option>
                                            <option>Jakarta</option>
                                            <option>Daerah Istimewa Yogyakarta</option>
											<option>Bali</option>
											<option>Nusa Tenggara Barat</option>
											<option>Nusa Tenggara Timur</option>
											<option>Gorontalo</option>
                                            <option>Sulawesi Utara</option>
											<option>Sulawesi Barat</option>
											<option>Sulawesi Tengah</option>
											<option>Sulawesi Tenggara</option>
                                            <option>Sulawesi Selatan</option>
											<option>Maluku Utara</option>
											<option>Maluku</option>
											<option>Papua Barat</option>
											<option>Papua</option>
											<option>Papua Tengah</option>
											<option>Papua Pegunungan</option>
											<option>Papua Selatan</option>
											<option>Papua Barat Daya</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div> -->

									{{-- <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="City" id="City">
											<option disabled selected>Select City...</option>
											<option>Surabaya Barat</option>
											<option>Surabaya Timur</option>
											<option>Surabaya Utara</option>
											<option>Surabaya Selatan</option>
											<option>Surabaya Tengah</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div> --}}

									<!-- <div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Kota">
									</div> -->

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="City" id="City" onchange="updateShippingCost()">
										  <option disabled selected>Select City...</option>
										  <option>Surabaya Barat</option>
										  <option>Surabaya Timur</option>
										  <option>Surabaya Utara</option>
										  <option>Surabaya Selatan</option>
										  <option>Surabaya Tengah</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
									
									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="alamat" placeholder="Alamat" value="{{ $customerAddress }}">
									</div>
									
									
                                    {{-- <div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="date" name="date" placeholder="Select Date">
									</div> --}}
									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="date" name="date" id="dateInput" placeholder="Select Date" min="0001-01-01" max="" required>
									</div>
									  
									
									  
									<script>
										function updateShippingCost() {
										  var citySelect = document.getElementById("City");
										  var selectedCity = citySelect.value;
										  var shippingCostText = document.getElementById("shippingCostText");
									  
										  switch (selectedCity) {
											case "Surabaya Utara":
											case "Surabaya Selatan":
											  shippingCostText.textContent = "Rp 40.000";
											  break;
											case "Surabaya Tengah":
											  shippingCostText.textContent = "Rp 30.000";
											  break;
											case "Surabaya Timur":
											  shippingCostText.textContent = "Rp 50.000";
											  break;
											default:
											  shippingCostText.textContent = "Rp 20.000";
											  break;
										  }

										  	
										}
									</script>
									  
									  
									<script>
										// Mendapatkan elemen input tanggal
										var dateInput = document.getElementById("dateInput");
									  
										// Mendapatkan tanggal saat ini
										var currentDate = new Date().toISOString().split("T")[0];
									  
										// Mengatur tanggal minimum
										dateInput.setAttribute("min", currentDate);
									  
										// Menambahkan event listener untuk validasi tanggal
										dateInput.addEventListener("input", function() {
										  var selectedDate = this.value;
										  if (selectedDate < currentDate) {
											// Jika tanggal yang dipilih lebih kecil dari tanggal saat ini, hapus nilainya
											this.value = "";
										  }
										});
									  </script>
									  

                                    <!-- <div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="time" name="time" placeholder="Select Time">
                                        <option>08:00 - 10:00</option>
                                        <input type="time" id="meeting-time" name="meeting-time" min="08:00" max="17:00" step="1800">
									</div> -->
									
                                    {{-- <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time" placeholder="Select Shipping Time">
											<option disabled selected>Select Shipping Time</option>
                                            <option>10.00 WIB</option>
											<option>12.00 WIB</option>
											<option>15.00 WIB</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div> --}}

									{{-- <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time" id="timeSelect" placeholder="Select Shipping Time" onchange="validateShippingTime()">
										  <option disabled selected>Select Shipping Time</option>
										  <option>00.00 WIB</option>
										  <option>01.00 WIB</option>
										  <option>10.00 WIB</option>
										  <option>12.00 WIB</option>
										  <option>15.00 WIB</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
									  
									<script>
										function validateShippingTime() {
										  var timeSelect = document.getElementById("timeSelect");
										  var selectedTime = timeSelect.value;
									  
										  var currentTime = new Date();
										  var currentHour = currentTime.getHours();
										  var currentMinute = currentTime.getMinutes();
									  
										  var selectedHour = parseInt(selectedTime.split(".")[0]);
										  var selectedMinute = parseInt(selectedTime.split(".")[1]);
									  
										  if (selectedHour < currentHour || (selectedHour === currentHour && selectedMinute <= currentMinute)) {
											alert("Shipping time cannot be in the past. Please select a valid shipping time.");
											timeSelect.value = "Select Shipping Time"; // Reset the selected time
										  }
										}
									</script> --}}
									  
									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time" id="timeSelect" placeholder="Select Shipping Time" onchange="validateShippingTime()">
										  <option disabled selected>Select Shipping Time</option>
										  <option>00.00 WIB</option>
										  <option>01.00 WIB</option>
										  <option>10.00 WIB</option>
										  <option>12.00 WIB</option>
										  <option>15.00 WIB</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
									  
									{{-- <script>
										function validateShippingTime() {
										  var timeSelect = document.getElementById("timeSelect");
										  var selectedTime = timeSelect.value;
									  
										  var currentTime = new Date();
										  var currentHour = currentTime.getHours();
										  var currentMinute = currentTime.getMinutes();
									  
										  var selectedHour = parseInt(selectedTime.split(".")[0]);
										  var selectedMinute = parseInt(selectedTime.split(".")[1]);
									  
										  if (selectedHour < currentHour || (selectedHour === currentHour && selectedMinute <= currentMinute)) {
											alert("Shipping time cannot be in the past. Please select a valid shipping time.");
											timeSelect.selectedIndex = 0; // Reset the selected time to the first option
										  }
										}
									</script> --}}

									<script>
										function updateShippingCost() {
										  var citySelect = document.getElementById("City");
										  var selectedCity = citySelect.value;
										  var shippingCostText = document.getElementById("shippingCostText");
										  var totalText = document.getElementById("totalText");
									  
										  switch (selectedCity) {
											case "Surabaya Utara":
											case "Surabaya Selatan":
											  shippingCostText.textContent = "Rp 40.000";
											  break;
											case "Surabaya Tengah":
											  shippingCostText.textContent = "Rp 30.000";
											  break;
											case "Surabaya Timur":
											  shippingCostText.textContent = "Rp 50.000";
											  break;
											default:
											  shippingCostText.textContent = "Rp 20.000";
											  break;
										  }
									  
										//   var subtotal = parseFloat("{{ isset($subtotal) ? $subtotal[0]->subtotal : '0' }}");
										//   var shippingCost = parseFloat(shippingCostText.textContent.replace("Rp ", ""));
										//   var total = subtotal + shippingCost;
										//   totalText.textContent = "Rp " + total.toFixed(2);
										}
									  
										// Call the function initially to set the initial total
										updateShippingCost();
									  </script>
									  
									  

									{{-- <div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div> --}}
										
								</div>
							</div>
						</div>

                        <div style="width: 500px;" class="flex-w flex-t p-b-13">
							<div style="width: 24%;" class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									{{ isset($subtotal) ? $subtotal[0]->subtotal : 'Subtotal not available' }}
								</span>
							</div>
						</div>

                        <div class="flex-w flex-t borCheckout p-b-13">
							<div>
								<span style="width: 400px;" class="stext-110 cl2">
									Shipping Cost:
								</span>
							</div>

							{{-- <div>
								<span style="width: 400px; padding-left: 12px;" class="mtext-110 cl2">
									Rp 20.000
								</span>
							</div> --}}
							<div>
								<span style="width: 400px; padding-left: 12px; text-decoration: line-through;" class="mtext-110 cl2" id="shippingCostText">
								  Rp 00.000
								</span>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									{{ isset($subtotal) ? $subtotal[0]->subtotal : 'Subtotal not available' }}
								</span>
							</div>
						</div>

						<!-- <div>
							<label for="payment">Select payment option:</label>
							<select id="payment" name="payment">
							<option value="bca">BCA</option>
							<option value="gopay">Gopay</option>
							<option value="ovo">OVO</option>
							</select>
						</div> -->

						<!-- <div>
							<label for="payment">Select payment option:</label>
							<select id="payment" name="payment">
								<option value="bca">
									<div>
									<img src="bca.png" alt="BCA">
									</div>
								</option>
								<option value="gopay">
									<div>
									<img src="gopay.png" alt="Gopay">
									</div>
								</option>
								<option value="ovo">
									<div>
									<img src="ovo.png" alt="OVO">
									</div>
								</option>
							</select>
						</div> -->

						<!-- <div class="col-50">
							<h3>Payment</h3>
							<label for="fname">Accepted Cards</label>
							<div class="icon-container">
							  <i class="fa fa-cc-visa" style="color:navy;"></i>
							  <i class="fa fa-cc-amex" style="color:blue;"></i>
							  <i class="fa fa-cc-mastercard" style="color:red;"></i>
							  <i class="fa fa-cc-discover" style="color:orange;"></i>
							</div>
							<label for="cname">Name on Card</label>
							<input type="text" id="cname" name="cardname" placeholder="John More Doe">
							<label for="ccnum">Credit card number</label>
							<input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
							<label for="expmonth">Exp Month</label>
							<input type="text" id="expmonth" name="expmonth" placeholder="September">
				
							<div class="row">
							  <div class="col-50">
								<label for="expyear">Exp Year</label>
								<input type="text" id="expyear" name="expyear" placeholder="2018">
							  </div>
							  <div class="col-50">
								<label for="cvv">CVV</label>
								<input type="text" id="cvv" name="cvv" placeholder="352">
							  </div>
							</div>
						  </div> -->

						  <div>
							<img src="images/kacamata/qris.jpg_large" style="width: 200px; padding-left: 80px; height: 200px; margin-bottom: 25px; padding-bottom: 10px; justify-content: center; padding-top: 0;">
						  </div>

						  <form action="{{ route('checkout') }}" method="POST">
							@csrf
							<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								Checkout
							</button>
						  </form>

					</div>
				</div>
			</div>
		</div>
	</form>
		
	
		

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
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
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
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
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
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

</body>
</html>