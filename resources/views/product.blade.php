<!-- Menghubungkan ke database -->
<?php
    // Buat koneksi ke database
    $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "ALP_HAWK");

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    // Query untuk mengambil data kategori dari tabel category
    $query = "SELECT category_name FROM category";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Tampung hasil query dalam array
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Tutup koneksi database
    mysqli_close($conn);
?>

@extends('layout.master')
@section('title', 'All Products')
@section('content')

	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<!-- Membuat button berdasarkan data kategori -->
					<?php foreach ($categories as $category): ?>
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?= strtolower($category['category_name']) ?>">
							<?= $category['category_name'] ?>
						</button>
					<?php endforeach; ?>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<form method="GET" action="" class="search-form">
							<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search" value="<?php echo $_GET['search'] ?? ''; ?>">
						</form>
					</div>
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27 col-md-4">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="?sort=default" class="filter-link stext-106 trans-04 <?php echo ($_GET['sort'] ?? 'default') === 'default' ? 'filter-link-active' : ''; ?>">
										Default
									</a>
								</li>
								<li class="p-b-6">
									<a href="?sort=newness" class="filter-link stext-106 trans-04 <?php echo ($_GET['sort'] ?? '') === 'newness' ? 'filter-link-active' : ''; ?>">
										Newness
									</a>
								</li>
								<li class="p-b-6">
									<a href="?sort=low-to-high" class="filter-link stext-106 trans-04 <?php echo ($_GET['sort'] ?? '') === 'low-to-high' ? 'filter-link-active' : ''; ?>">
										Price: Low to High
									</a>
								</li>
								<li class="p-b-6">
									<a href="?sort=high-to-low" class="filter-link stext-106 trans-04 <?php echo ($_GET['sort'] ?? '') === 'high-to-low' ? 'filter-link-active' : ''; ?>">
										Price: High to Low
									</a>
								</li>
							</ul>


						</div>

						<div class="filter-col2 p-r-15 p-b-27 col-md-4">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="?sort=default" class="filter-link stext-106 trans-04 <?php echo ($_GET['filter'] ?? 'default') === 'default' ? 'filter-link-active' : ''; ?>">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="?sort=newness" class="filter-link stext-106 trans-04 <?php echo ($_GET['filter'] ?? '') === '0m-to-1m' ? 'filter-link-active' : ''; ?>">
										Rp. 0 - Rp. 1.000.000,00
									</a>
								</li>

								<li class="p-b-6">
									<a href="?sort=low-to-high" class="filter-link stext-106 trans-04 <?php echo ($_GET['filter'] ?? '') === '1m-to-5m' ? 'filter-link-active' : ''; ?>">
										Rp. 1.000.000,00 - Rp. 5.000.000,00
									</a>
								</li>

								<li class="p-b-6">
									<a href="?sort=5m-to-10m" class="filter-link stext-106 trans-04 <?php echo ($_GET['filter'] ?? '') === '5m-to-10m' ? 'filter-link-active' : ''; ?>">
										Rp. 5.000.000,00 - Rp. 10.000.000,00
									</a>
								</li>

								<li class="p-b-6">
									<a href="?sort=10m-to-15m" class="filter-link stext-106 trans-04 <?php echo ($_GET['filter'] ?? '') === '10m-to-15m' ? 'filter-link-active' : ''; ?>">
										Rp. 10.000.000,00 - Rp. 15.000.000,00
									</a>
								</li>

								<li class="p-b-6">
									<a href="?sort=15m+" class="filter-link stext-106 trans-04 <?php echo ($_GET['filter'] ?? '') === '15m+' ? 'filter-link-active' : ''; ?>">
										Rp. 15.000.000,00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27 col-md-4">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<?php
								// Ambil data warna dari tabel product (misalnya menggunakan PDO)
								$dbh = new PDO('mysql:host=139.255.11.84;dbname=ALP_HAWK', 'student', 'isbmantap');
								$stmt = $dbh->prepare('SELECT DISTINCT product_color FROM product');
								$stmt->execute();
								$colors = $stmt->fetchAll(PDO::FETCH_COLUMN);
								
								// Loop melalui setiap warna
								foreach ($colors as $color) {
									echo '<li class="p-b-6">';
									echo '<span class="fs-15 lh-12 m-r-6" style="color: ' . $color . ';">';
									echo '<i class="zmdi zmdi-circle"></i>';
									echo '</span>';
									echo '<a href="#" class="filter-link stext-106 trans-04">';
									echo $color;
									echo '</a>';
									echo '</li>';
								}
								?>
							</ul>
						</div>						
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
				<?php
				// Mengambil data produk dari tabel product (misalnya menggunakan PDO)
				$dbh = new PDO('mysql:host=139.255.11.84;dbname=ALP_HAWK', 'student', 'isbmantap');

				// Mengatur default sorting berdasarkan nama produk
				$sort = $_GET['sort'] ?? 'default';
				switch ($sort) {
					case 'newness':
						$orderBy = 'product_id ASC';
						break;
					case 'low-to-high':
						$orderBy = 'product_price ASC';
						break;
					case 'high-to-low':
						$orderBy = 'product_price DESC';
						break;
					default:
						$orderBy = 'product_name ASC';
						break;
				}

				// Memeriksa apakah ada parameter search yang dikirimkan
				if (isset($_GET['search'])) {
					$searchTerm = $_GET['search'];
			
					// Mengambil data produk berdasarkan pencarian
					$stmt = $dbh->prepare('SELECT * FROM product WHERE product_name LIKE :searchTerm ORDER BY ' . $orderBy);
					$stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
				} else {
					// Mengambil semua data produk
					$stmt = $dbh->prepare('SELECT * FROM product ORDER BY ' . $orderBy);
				}

				$stmt->execute();
				$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$counter = 1;
				foreach ($products as $product) {
					if($counter>$load) break;
					$counter+=1;
					$productPicture = $product['product_picture'] ?? 'default.jpg';
					$productName = $product['product_name'] ?? '';
					$productPrice = $product['product_price'] ?? '';
					$category = $product['category_id'] ?? '';
					$productId = $product['product_id'];
					$productDesc = $product['product_description'];

					// Menentukan class berdasarkan kategori produk
					$class = '';
					if ($category === 'F') {
						$class = 'female';
					} elseif ($category === 'M') {
						$class = 'male';
					} elseif ($category === 'U') {
						$class = 'unisex';
					}
				?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $class; ?>" data-category="<?php echo $class; ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="/{{$product['product_picture']}}" alt="">
							<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="{{'myBtn'.$productId}}">
								Quick View
							</a>
						</div>
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l">
								<a href="{{url('product-detail/'.$productId)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $productName; ?>
								</a>
								<span class="stext-105 cl3">
									Rp. {{number_format($productPrice , 2, ',', '.')}}
								</span>
							</div>
							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal1 -->
				<style>
					.modal-backdrop {
						z-index: 100000 !important;
					}

					.modal {
						z-index: 100001 !important;
					}
				</style>
				<div class="p-t-60 p-b-20 modal fade m-auto" id="{{'myModal'.$productId}}" role="dialog">
					<div class="modal-dialog modal-xl modal-dialog-centered">

						<div class="container modal-content">
							<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">

								<div class="row">
									<div class="col-md-6 col-lg-7 p-b-30">
										<div class="p-l-25 p-r-30 p-lr-0-lg">
											<div class="wrap-slick3 flex-sb flex-w">
												<div class="wrap-slick3-dots"></div>
												<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

												<div class="">
													<div class="item-slick3" data-thumb="images/kacamata/quickview3.jpg">
														<div class="wrap-pic-w pos-relative">
															<img src="<?php echo $productPicture; ?>" alt="IMG-PRODUCT">

															<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="/{{$product['product_picture']}}">
																<i class="fa fa-expand"></i>
															</a>
														</div>
													</div>

													<!-- <div class="item-slick3" data-thumb="images/kacamata/quickview2.jpg">
														<div class="wrap-pic-w pos-relative">
															<img src="images/kacamata/quickview2.jpg" alt="IMG-PRODUCT">

															<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/kacamata/quickview2.jpg">
																<i class="fa fa-expand"></i>
															</a>
														</div>
													</div>

													<div class="item-slick3" data-thumb="images/kacamata/quickview1.jpg">
														<div class="wrap-pic-w pos-relative">
															<img src="images/kacamata/quickview1.jpg" alt="IMG-PRODUCT">

															<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/kacamata/quickview1.jpg">
																<i class="fa fa-expand"></i>
															</a>
														</div>
													</div> -->
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-md-6 col-lg-5 p-b-30">
										<div class="p-r-50 p-t-5 p-lr-0-lg">
											<h4 class="mtext-105 cl2 js-name-detail p-b-14">
												{{$productName}}
											</h4>

											<span class="mtext-106 cl2">
												Rp. {{number_format($productPrice , 2, ',', '.')}}
											</span>

											<p class="stext-102 cl3 p-t-23">
												{{$product['copywriting1']}}
											</p>
											
											<!--  -->
											<div class="">
												<div class="flex-w flex-r-m p-b-10">
													<div class="size-204 flex-w flex-m respon6-next">
														<div class="wrap-num-product flex-w m-r-20 m-tb-10">
															<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
																<i class="fs-16 zmdi zmdi-minus"></i>
															</div>

															<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="0">

															<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
																<i class="fs-16 zmdi zmdi-plus"></i>
															</div>
														</div>
														<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
															Add to cart
														</button>
													</div>
												</div>	
											</div>

											<!--  -->
											<div class="flex-w flex-m p-l-100 p-t-40 respon7">
												<div class="flex-m bor9 p-r-10 m-r-11">
													<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
														<i class="zmdi zmdi-favorite"></i>
													</a>
												</div>

												<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
													<i class="fa fa-facebook"></i>
												</a>

												<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
													<i class="fa fa-twitter"></i>
												</a>

												<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
													<i class="fa fa-google-plus"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<script>
					$(document).ready(function(){
					$("#myBtn{{$productId}}").click(function(e){
   						e.preventDefault();	
						$("#myModal{{$productId}}").modal({backdrop: true});
					});
					});
				</script>
				<?php
				}
				?>
			</div>


			<!-- Load more -->
			@if($load==8)
			<div class="flex-c-m flex-w w-full p-t-45">
				<form method="post" action="{{url('/product')}}">
					@csrf
				<button type="submit" name="submit" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</button>
				</form>
			</div>
			@endif
		</div>
	</div>
		



	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/kacamata/quickview3.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/kacamata/quickview3.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/kacamata/quickview3.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<!-- <div class="item-slick3" data-thumb="images/kacamata/quickview2.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/kacamata/quickview2.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/kacamata/quickview2.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/kacamata/quickview1.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/kacamata/quickview1.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/kacamata/quickview1.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Coach HC5149T 9004 s56
							</h4>

							<span class="mtext-106 cl2">
								Rp. 2.584.000,00
							</span>

							<p class="stext-102 cl3 p-t-23">
								Upgrade your style with confidence with the Coach HC5149T 9004 s56 Eyeglasses.
							</p>
							
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
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
	<script>
		var searchInput = document.getElementById('searchInput');
		searchInput.addEventListener('input', function() {
			var searchTerm = searchInput.value.trim();

			// Membuat URL dengan parameter search
			var url = window.location.href.split('?')[0] + '?search=' + encodeURIComponent(searchTerm);

			// Melakukan redirect ke URL dengan parameter search
			window.location.href = url;
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
@endsection