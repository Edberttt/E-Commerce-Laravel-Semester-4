<!DOCTYPE html>
<html lang="en">
<head>
    <title>Features</title>
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

    <style>
        #overlay {
            position: absolute;
            top: 0px;
            left: 0px;
            -o-transform : scaleX(-1);
            -webkit-transform : scaleX(-1);
            transform : scaleX(-1);
            -ms-filter : fliph; /*IE*/
            filter : fliph; /*IE*/
            text-align: left;
        }

        #camera {
            -o-transform : scaleX(-1);
            -webkit-transform : scaleX(-1);
            transform : scaleX(-1);
            -ms-filter : fliph; /*IE*/
            filter : fliph; /*IE*/
            border: 3px black;
            text-align: left;
        }

        #tryon {
            position : relative;
            margin : 0px auto;
        }

        #start {
            margin:0 auto;
            width:100px;
            display: block;
        }

        #debug {
            width:640px;
            margin: 0 auto;
            font-family: "Courier New", Courier, monospace;
            font-size: 11px;
            line-height:12px;
        }
		#mulai:hover button {
    color: black;
  }
    </style>
</head>
<body>
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
					<a href="index.html" class="logo">
						<img src="images/icons/logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.html">Home</a>
							</li>

							<li>
								<a href="product.html">Shop</a>
							</li>

							<li class="label1 active-menu" data-label1="hot">
								<a href="features_filter.html">Features</a>
							</li>

							<li>
								<a href="contact.html">Contact</a>
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

						<a href="wishlist-detail.html" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="2">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>

						<a href="account.html" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-account">
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
				<a href="index.html"><img src="images/icons/logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<form>
					<input type="text" placeholder="Search">
				</form>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>

				<a href="account.html" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-account">
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
					<a href="index.html">Home</a>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="features_filter.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
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
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
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
				Features
			</span>
		</div>
	</div> -->

	
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/fitur.jpg');">
		<h2 class="ltext-105 cl0 txt-left " style="margin-left: 100px;">
			Features
		</h2>
	</section>	

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- three.js r54 -->
    <script src="js/three.js"></script>
    <!-- clmtrack -->
    <script src="js/utils.js"></script>
    <script src="js/clmtrackr.js"></script>

	<div id="tryon" class="text-left">
		<video id="camera" loop></video>
		<canvas id="overlay"></canvas>
	</div>
	<div id="mulai">
	<button id="start" class="text-left">Start</button>
	</div>
	<br>
	<div id="debug"></div>
      

    <script>
        /**
         * Requires:
         * three.js (r54) http://threejs.org/
         * clmtrack https://github.com/auduno/clmtrackr
         *
         * @author Yevhen Matasar <matasar.ei@gmail.com>
         *
         * @param {Object} params
         *
         * @version 20190615
         */
        var TryOnFace = function (params) {
            var ref = this;

            this.selector = 'tryon';
            //sizes
            this.object = params.object;
            this.width = params.width;
            this.height = params.height;

            if (params.statusHandler) {
                this.statusHandler = params.statusHandler;
            } else {
                this.statusHandler = function(){};
            }
            this.changeStatus = function(status) {
                this.status = status;
                this.statusHandler(this.status);
            };
            this.changeStatus('STATUS_READY');

            if (params.debug) {
                this.debug = true;
                this.debugMsg = this.status;
            } else {
                this.debug = false;
            }

            /* CAMERA */
            this.video = document.getElementById('camera');
            document.getElementById(this.selector).style.width = this.width + "px";
            this.video.setAttribute('width', this.width);
            this.video.setAttribute('height', this.height);

            /* face tracker */
            this.tracker = new clm.tracker({useWebGL: true});
            this.tracker.init();

            /**
             * Start try-on
             * @returns {undefined}
             */
            this.start = function() {
                var video = ref.video;

                navigator.getUserMedia = (
                    navigator.getUserMedia ||
                    navigator.webkitGetUserMedia ||
                    navigator.mozGetUserMedia ||
                    navigator.msGetUserMedia
                );

                if (navigator.getUserMedia) {
                    navigator.getUserMedia(
                        {
                            video: true
                        },
                        function (localMediaStream) {
                            video.srcObject = localMediaStream;
                            video.play();
                            ref.changeStatus('STATUS_CAMERA_ERROR');
                        },
                        function (err) {
                            ref.changeStatus('STATUS_CAMERA_ERROR');
                        }
                    );
                } else {
                    ref.changeStatus('STATUS_CAMERA_ERROR');
                }

                //start tracking
                ref.tracker.start(video);
                //continue in loop
                ref.loop();
            };

            this.debug = function(msg) {
                if (this.debug) {
                    this.debugMsg += msg + "<br>";
                }
            };

            this.printDebug = function() {
                if (this.debug) {
                    document.getElementById('debug').innerHTML = this.debugMsg;
                    this.debugMsg = '';
                }
            };

            this.loop = function() {
                requestAnimFrame(ref.loop);

                var positions = ref.tracker.getCurrentPosition();

                if (positions) {
                    //current distance
                    var distance = Math.abs(90 / ((positions[0][0].toFixed(0) - positions[14][0].toFixed(0)) / 2));
                    //horizontal angle // горизонтальный угол (поворот лица)
                    var hAngle = 90 - (positions[14][0].toFixed(0) - positions[33][0].toFixed(0)) * distance;
                    //center point
                    var center = {
                        x: positions[33][0],
                        y: (positions[33][1] + positions[41][1]) / 2
                    };
                    center = ref.correct(center.x, center.y);

                    var zAngle = (positions[33][0] - positions[7][0]) * -1;

                    //allowable distance
                    if (distance < 1.5 && distance > 0.5) {
                        ref.changeStatus('STATUS_FOUND');

                        //set positions
                        ref.position.x = center.x - (hAngle / 2);
                        ref.position.y = center.y;
                        ref.rotation.y = hAngle / 100 / 2;
                        ref.rotation.z = zAngle / 100 / 1.5;
                        //size
                        ref.size.x = ((positions[14][0] - positions[0][0]) / 2) + 0.05 * (positions[14][0] - positions[0][0]);
                        ref.size.y = (ref.size.x / ref.images['front'].width) * ref.images['front'].height;
                        ref.size.z = ref.size.x * 3;
                        ref.position.z = (ref.size.z / 2) * -1;
                        //render
                    } else {
                        ref.changeStatus('STATUS_SEARCH');
                        ref.size.x = 0;
                        ref.size.y = 0;
                    }

                    ref.render();
                    ref.debug(ref.status);
                }

                //print debug
                ref.printDebug();
            };

            /* 3D */
            var canvas = document.getElementById("overlay");
            var renderer = new THREE.WebGLRenderer({
                canvas: canvas,
                antialias: true,
                alpha: true
            });
            renderer.setClearColor(0xffffff, 0);
            renderer.setSize(this.width, this.height);

            //add scene
            var scene = new THREE.Scene;

            //define sides
            var outside = {
                0 : 'left',
                1 : 'right',
                4 : 'front'
            };

            this.images = [];
            var materials = [];
            for (i = 0; i < 6; i++) {
                if (this.object.outside[outside[i]] !== undefined) {
                    var image = new Image();
                    image.src = this.object.outside[outside[i]];
                    this.images[outside[i]] = image;
                    materials.push(new THREE.MeshLambertMaterial({
                        map: THREE.ImageUtils.loadTexture(this.object.outside[outside[i]]), transparent: true
                    }));
                } else {
                    materials.push(new THREE.MeshLambertMaterial({
                        color: 0xffffff, transparent: true, opacity: 0
                    }));
                }
            }

            //init position and size
            this.position = {
                x: 0,
                y: 0,
                z: 0
            };
            this.rotation = {
                x: 0,
                y: 0
            };
            this.size = {
                x: 1,
                y: 1,
                z: 1
            };

            //set up object
            var geometry = new THREE.CubeGeometry(1, 1, 1);
            var materials = new THREE.MeshFaceMaterial(materials);
            var cube = new THREE.Mesh( geometry, materials );
            cube.doubleSided = true;
            scene.add(cube);

            //set up camera
            var camera = new THREE.PerspectiveCamera(45, this.width / this.height, 1, 5000);
            camera.lookAt(cube.position);
            camera.position.z = this.width / 2;
            scene.add(camera);

            //set up lights
            var lightFront = new THREE.PointLight(0xffffff);
            lightFront.position.set(0, 0, 1000);
            lightFront.intensity = 0.6;
            scene.add(lightFront);

            var lightLeft = new THREE.PointLight(0xffffff);
            lightLeft.position.set(1000, 0, 0);
            lightLeft.intensity = 0.7;
            scene.add(lightLeft);

            var lightRight = new THREE.PointLight(0xffffff);
            lightRight.position.set(-1000, 0, 0);
            lightRight.intensity = 0.7;
            scene.add(lightRight);

            /**
             * Render object
             */
            this.render = function() {
                //update position
                cube.position.x = this.position.x;
                cube.position.y = this.position.y;
                cube.position.z = this.position.z;

                cube.rotation.y = this.rotation.y;
                cube.rotation.z = this.rotation.z;

                //upate size
                cube.scale.x = this.size.x;
                cube.scale.y = this.size.y;
                cube.scale.z = this.size.z;

                renderer.render(scene, camera);
            };

            /**
             * Transform position for 3D scene
             */
            this.correct = function(x, y) {
                return {
                    x: ((this.width / 2 - x) * -1) / 2,
                    y: (this.height / 2 - y) / 2
                };
            }

            //print debug
            this.printDebug();
        };

        var tryOn = null;
        $(window).load(function () {
            $('#start').hide();

            var object = {
                outside: {
                    left: './glasses/left.png',
                    right: './glasses/right.png',
                    front: './glasses/front.png'
                }
            };

            tryOn = new TryOnFace({
                width: 400,
                height: 400,
                debug: true,
                object: object,
                statusHandler: function(status) {
                    switch(status) {
                        case "STATUS_READY": {
                            /* Ready! Show start button or something... */
                            $('#start').show();
                        }; break;
                        case "STATUS_CAMERA_ERROR": {
                            /* Handle camera error */
                        }; break;
                        case "STATUS_SEARCH": {
                            /* Show some message while searching a face */
                        }; break;
                        case "STATUS_FOUND": {
                            /* OK! */
                        }
                    }
                }
            });

            $('#start').click(function() {
                tryOn.start();
            });
        });
        
    </script>
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

</body>
</html>