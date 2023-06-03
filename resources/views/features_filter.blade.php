@extends('layout.master')
@section('title', 'Features')
@section('content')
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
@endsection