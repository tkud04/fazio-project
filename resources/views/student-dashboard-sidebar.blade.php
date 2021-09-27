<?php
$void = "javascript:void(0)";
?>
<div class="col-lg-3 col-md-4 col-sm-12">
							<div class="dashboard-navbar">
								
								<div class="d-user-avater">
									<img src="{{asset('img/user-2.jpg')}}" class="img-fluid avater" alt="">
									<h4>{{$user->fname." ".$user->lname}}</h4>
									<span>{{strtoupper($user->role)}}</span>
								</div>
								
								<div class="d-navigation">
									<ul>
										<li class="active"><a href="{{url('dashboard')}}"><i class="ti-dashboard"></i>Dashboard</a></li>
										<li><a href="{{url('profile')}}"><i class="ti-user"></i>My Profile</a></li>
										<li><a href="{{url('bookings')}}"><i class="ti-credit-card"></i>My Bookings</a></li>
										<li><a href="{{url('transactions')}}"><i class="ti-credit-card"></i>My Transactions</a></li>
										<li><a href="{{$void}}"><i class="ti-home"></i>Messages</a></li>
										<li><a href="{{url('saved-apartments')}}"><i class="ti-heart"></i>Saved Apartments</a></li>
										<li><a href="{{url('apartment-preferences')}}"><i class="ti-home"></i>Apartment Preferences</a></li>
										<li><a href="{{url('change-password')}}"><i class="ti-unlock"></i>Change Password</a></li>
										<li><a href="{{url('bye')}}"><i class="ti-power-off"></i>Log Out</a></li>
									</ul>
								</div>
								
							</div>
						</div>