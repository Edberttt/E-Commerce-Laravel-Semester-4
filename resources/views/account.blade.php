
@extends('layout.master')
@section('title', 'Account')
@section('content')
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

							<ul>
								<?php $success = $status ?? null ?>
								@if(session('success_register'))
								<div class="alert alert-success m-auto text-center">{{ session('success_register') }}</div>
								@endif
								@if ($errors->any())
								@foreach ($errors->all() as $error)
								<div class="alert alert-danger m-auto text-center">{{ $error }}</div>
								@endforeach
								@endif
							</ul>
					
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
						<form method="post" id="LoginForm" action="{{url('/submit_login')}}">
							@csrf
							<input name="customer_email" type="text" placeholder="Email" required>
							<input name="customer_password" type="password" placeholder="Password" required>		
							<div class="form-group">
								<input type="checkbox" name="remember_me" id="remember_me" value='1'>
								<label for="remember_me">Remember Me</label>
							  </div>					
							<button type="submit" class="btn">Login</button>
						</form>
						<form method="post" id="RegForm" action="{{url('/submit_register')}}">
							@csrf
							<input name="customer_firstName" type="text" placeholder="First Name" required>
							<input name="customer_lastName" type="text" placeholder="Last Name" required>
							<input name="customer_password" type="password" placeholder="Password" required>
							<input name="customer_email" type="email" placeholder="Email" required>
							<div class="gender">
								<label><input type="radio" name="customer_gender" value="M">Male</label>
								<label><input type="radio" name="customer_gender" value="F">Female</label>
							</div>
							<button type="submit" class="btn" name="submit">Register</button>
						</form>
						  
						  
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<!-- <img src="images/image-removebg-preview (52).png" class="img-fluid"> -->
				</div>

			</div>
		</div>
	</div>
@endsection