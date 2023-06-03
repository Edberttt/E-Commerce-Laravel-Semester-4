<!-- Menghubungkan ke database -->
<?php
    // Buat koneksi ke database
    $conn = mysqli_connect("139.255.11.84", "student", "isbmantap", "webdev");

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
@section('title', 'Product')
@section('content')

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
								$dbh = new PDO('mysql:host=139.255.11.84;dbname=webdev', 'student', 'isbmantap');	
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
				$dbh = new PDO('mysql:host=139.255.11.84;dbname=webdev', 'student', 'isbmantap');	

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
					$stmt = $dbh->prepare('SELECT product_picture, product_name, product_price, category_id FROM product WHERE product_name LIKE :searchTerm ORDER BY ' . $orderBy);
					$stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
				} else {
					// Mengambil semua data produk
					$stmt = $dbh->prepare('SELECT product_id, product_picture, product_name, product_price, category_id FROM product ORDER BY ' . $orderBy);
				}

				$stmt->execute();
				$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

				foreach ($products as $product) {
					$productId = $product['product_id'];
					$productPicture = $product['product_picture'] ?? 'default.jpg';
					$productName = $product['product_name'] ?? '';
					$productPrice = $product['product_price'] ?? '';
					$category = $product['category_id'] ?? '';

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
							<img src="<?php echo $productPicture; ?>" alt="IMG-PRODUCT">
							<button id ="{{'myBtn'.$productId}}" type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" >
								Quick View
				</button>
						</div>
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l">
								<a href="product-detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $productName; ?>
								</a>
								<span class="stext-105 cl3">
									Rp. <?php echo $productPrice; ?>
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
					<div class="modal fade" id="{{'myModal'.$productId}}">
		<div class="modal-content">

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

								<div class="">
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
	</div>
	<script>
$(document).ready(function(){
  $("{{'#myBtn'.$productId}}").click(function(){
    $("{{'#myModal'.$productId}}").modal({backdrop: true});
  });
});
</script>
				<?php
				}
				?>
			</div>


			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>
		

	

@endsection