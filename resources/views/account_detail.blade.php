@extends('layout.master')
@section('title', 'Account')
@section('content')
	<!-- detail-account-page -->
	<section class="py-5 my-5">
		  

		<div class="containerPage">
			<div class="hamburger-nav">
				<div class="hamburger-icon" onclick="toggleProfileNav()">
				  <i class="fa fa-bars"></i>
				</div>
			</div>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div id="profileTabNavContainer" class="profile-tab-nav border-right">
					<span class="close" onclick="closeProfileTabNav()">&times;</span>
					<a class="account-icon" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
						<i class="fa fa-user-circle text-black mr-1 rounded-circle"></i>
					</a>
					<span class="d-block mt-1 m-auto p-b-20 text-center">Hello {{$info['customer_firstName']}}</span>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="zmdi zmdi-account"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#order" role="tab" aria-controls="password" aria-selected="false">
							<i class="zmdi zmdi-receipt"></i> 
							Orders
						</a>
						<a class="nav-link" id="password-tab" href="{{url('logout')}}" aria-controls="password" aria-selected="true">
							<i class="zmdi zmdi-close-circle"></i> 
							Logout
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Account Settings</h3><br>
						<form method='post' action='{{url("account_update")}}'>
							@csrf
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label>First Name</label>
								<input name='customer_firstName' type="text" class="form-control" value="{{$info['customer_firstName']}}">
							</div>
							<div class="col-md-6 mb-3">
								<label>Last Name</label>
								<input name='customer_lastName' type="text" class="form-control" value="{{$info['customer_lastName']}}">
							</div>
							<div class="col-md-6 mb-3">
								<label>Email</label>
								<input name='customer_email' type="text" class="form-control" value="{{$info['customer_email']}}">
							</div>
							<div class="col-md-6 mb-3">
								<label>Phone number</label>
								<input name='customer_phone' type="text" class="form-control" value="{{$info['customer_phone']}}">
							</div>
							<div class="col-md-6 mb-3">
								<label>Main Address</label>
								<input name='customer_address' type="text" class="form-control" value="{{$info['customer_address']}}">
							</div>
							<div class="col-md-6 mb-3">
								<label>Second Address</label>
								<input name='customer_address2' type="text" class="form-control" value="{{$info['customer_address2']}}">
							</div>
							<div class="col-md-6 mb-3">
								<label>Third Address</label>
								<input name='customer_address3' type="text" class="form-control" value="{{$info['customer_address3']}}">
							</div>
							<div class="col-md-6 mb-3">
								<label>Password</label>
								<input name='customer_password' type="password" class="form-control">
							</div>
							<div class="gender col-md-12 mt-3">
								@if($info['customer_gender']=='M')
								<label><input class="m-auto" type="radio" name="customer_gender" value="M" checked>&nbsp;Male</label>
								<label><input class="m-auto" type="radio" name="customer_gender" value="F">&nbsp;Female</label>
								@else
								<label><input class="m-auto" type="radio" name="customer_gender" value="M">&nbsp;Male</label>
								<label><input class="m-auto" type="radio" name="customer_gender" value="F" checked>&nbsp;Female</label>
								@endif
							</div>
						</div>
						<br>
						<div>
							<button name='submit' class="btn btn-primary" type="submit" value="{{$info['customer_id']}}">Update</button>
						</div>
</form>
					</div>
					  
					<div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
						<h3 class="mb-4">Orders</h3>
						<div class="list-group">
						@forelse($orders as $o)
							<a href="#" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#{{'order'.$o['order_id']}}" aria-expanded="false" aria-controls="{{'order'.$o['order_id']}}">
								<div class="d-flex w-100 justify-content-between">
									<p class="mb-1">Order #{{$o['order_id']}}
										@if($o['order_status'])
										<span class="badge badge-success">Completed</span>
										@else
										<span class="badge badge-warning">In progress</span>
										@endif
									</p>
									<small>Total: Rp. {{number_format($o['order_grandtotal']  , 2, ',', '.')}}</small>
								</div>
							</a>
							<div id="{{'order'.$o['order_id']}}" class="collapse">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Product</th>
												<th>Price</th>
												<th>Quantity</th>
												<th>Subtotal</th>
											</tr>
										</thead>
										<tbody>
											<tr class="table_row">
												<td class="column-1">
													<div class="how-itemcart1">
														<img src="images/kacamata/product2.jpg" alt="IMG">
													</div>
												</td>
												<td class="column-2">Coach HC5149T 9004 s56</td>
												<td class="column-3">1</td>
												<td class="column-4">Rp. 2.580.000,00</td>
											</tr>
			
											<tr class="table_row">
												<td class="column-1">
													<div class="how-itemcart1">
														<img src="images/kacamata/product1.jpg" alt="IMG">
													</div>
												</td>
												<td class="column-2">Ray-Ban RB6503D 2509 s55</td>
												<td class="column-3">2</td>
												<td class="column-4">Rp. 3.400.000,00</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- <div class="text-right">
									<button class="btn btn-primary">Confirm Order</button>
								</div> -->
							</div>
						@empty
						<div class="col-12 text-center m-auto p-t-10"><h6>You haven't made any order yet.</h6></div>
						@endforelse
							<!-- <a href="#" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#order2" aria-expanded="false" aria-controls="order2">
								<div class="d-flex w-100 justify-content-between">
									<p class="mb-1">Order #202305050002<span class="badge badge-warning">In progress</span></p>
									<small>Total: Rp. 6.800.000,00</small>
								</div>
							</a>
							<div id="order2" class="collapse">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Product</th>
												<th>Price</th>
												<th>Quantity</th>
												<th>Subtotal</th>
											</tr>
										</thead>
										<tbody>
											<tr class="table_row">
												<td class="column-1">
													<div class="how-itemcart1">
														<img src="images/kacamata/product4.jpg" alt="IMG">
													</div>
												</td>
												<td class="column-2">Oliver Peoples OV5448T 1005 s46</td>
												<td class="column-3">1</td>
												<td class="column-4">Rp. 6.800.000,00</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Confirm Order</button>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- </div> -->
						</div>
					</div>
		<script>


		function toggleProfileNav() {
			var profileNav = document.getElementById("profileTabNavContainer");
			var containerPage = document.getElementsByClassName("containerPage")[0];
			var tabContent = document.getElementById("v-pills-tabContent");

			if (containerPage.classList.contains("show-profile")) {
				containerPage.classList.remove("show-profile");
				tabContent.classList.remove("blur");
			} else {
				containerPage.classList.add("show-profile");
				tabContent.classList.add("blur");
			}
		}

		
		function closeProfileTabNav() {
			var profileNav = document.getElementById("profileTabNavContainer");
			var containerPage = document.getElementsByClassName("containerPage")[0];
			var tabContent = document.getElementById("v-pills-tabContent");

			if (containerPage.classList.contains("show-profile")) {
				containerPage.classList.remove("show-profile");
				tabContent.classList.remove("blur");
			} else {
				containerPage.classList.add("show-profile");
				tabContent.classList.add("blur");
			}
		}
		</script>
	</section>
@endsection