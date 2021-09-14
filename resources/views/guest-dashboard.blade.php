<?php
$title = "Guest Dashboard";
$subtitle = "Manage your guest account here";
?>
@extends('layout')

@section('title',$title)

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle])

	<!-- ============================ Dashboard Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						@include('guest-dashboard-sidebar',['user' => $user])
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								
								<!-- Row -->
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list with-icons">
											<h4>Saved Payments</h4>
											<?php
											 if(count($sps) > 0)
											 {
												  $spsLength = count($sps) > 5 ? 5 : count($sps);
											?>
											 <ul>
											<?php
											   for($i = 0; $i < $spsLength; $i++)
											   {
												   $s = $sps[$i];
                                                  $dt = $s['data'];	
                                                  $bname = $dt->bank;
                                                  $ctype = $dt->brand;
												  $last4 = $dt->last4;
												  $exp = new DateTime("01/".$dt->exp_month."/".$dt->exp_year); 
												  
											?>
												<li>
													<i class="dash-icon-box ti-credit-card"></i>{{strtoupper($ctype)}} | <strong><a href="javascript:void(0)">{{$bname}}</a></strong> | **** {{$last4}}<br>
													{{$exp->format("F, Y")}}
													<a href="javascript:void(0)" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>

											<?php
											 }
                                            ?>											 
											</ul>
											<h4><center><a href="{{url('saved-payments')}}" class="btn btn-theme">View more</a></center></h4>
											<?php
											 }
											 else
											 {
											?>
											<ul>
											<li>No payment methods added yet. Book an apartment to add one now.</li>
											</ul>
											
											<?php
											 }
											?>
										</div>
									</div>
									
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list with-icons">
											<h4>Saved Apartments</h4>
											<?php                                                                                       
                                                                                          $deletedApt = [
                                                                                          'name' => "Apartment removed",
                                                                                          'url' => "javascript:void(0)"
                                                                                          ];
											 if(count($sapts) > 0)
											 {
												 $saptsLength = count($sapts) > 5 ? 5 : count($sapts);
											?>
											 <ul>
											<?php
											   for($i = 0; $i < $saptsLength; $i++)
											   { 
											   $sa = $sapts[$i];
											   $a = $sa['apartment'];
                                              	   	   	   	   	   	   if(count($a) > 0){
											   $au = url('apartment')."?xf=".$a['url'];
											   $title = $a['name'];
											   $cmedia = $a['cmedia'];
											   $imgs = $cmedia['images'];
			                					           $adata = $a['data'];
						                          		   $address = $a['address'];
											   $location = $address['city'].", ".$address['state'];
											   $stars = $a['rating'];
											   $ratingClass = $stars > 3.5 ? "high" : "low";
											   }
											   else{
											   $au = $deletedApt['url'];
											   $title = $deletedApt['name'];
											   
											   $imgs = [asset('img/no-image.png')];
			                					           
											   $location = "";
											   $stars = 0;
											   $ratingClass = "low";
											   }
                                                                                          ?>
												<li>
											        <i class="dash-icon-box ti-home"></i>  
													<div class="row">
													<div class="col-md-6">
											        <strong>
													 <a href="{{$au}}" target="_blank">
													   <img src="{{$imgs[0]}}" style="width: 80px; height: 80px;"><br>
													    {{$title}}<br> 
														{{ucwords($location)}}
													  
													 </a>
													 </strong>
													</div>
													<div class="col-md-6">
													 <h3>
													 Rating: <div class="numerical-rating {{$ratingClass}}" data-rating="{{$stars}}"></div>
													 <div class="mt-2">
													 <?php
													  for($i = 0; $i < $stars; $i++)
													  {
													 ?>
													 <i class="ti-star"></i>
                                                                                                         <?php
											                  }
													 ?>
													 </div>
													 </h3>
													</div>
													</div>
													<a href="javascript:void(0)" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>

											<?php
											 }
                                                                                        ?>											 
											</ul>
											<h4><center><a href="{{url('saved-apartments')}}" class="btn btn-theme">View more</a></center></h4>
											<?php
											 }
											 else
											 {
											?>
											<ul>
											<li>No apartments have been saved yet.</li>
											</ul>
											<?php
											 }
											?>
										</div>
									</div>	
								</div>
								
								<!-- Row -->
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list with-icons">
											<h4>Recent Activities</h4>
											<ul>
											<?php
											 if(count($activities) > 0)
											 {
												 $activitiesLength = count($activities) > 9 ? 9 : count($activities);
												 
											   for($i = 0; $i < $activitiesLength; $i++)
											   {
                                                  $a = $activities[$i];	
                                                  $m = $a['msg'];												  
										     ?>
												<li>
													<i class="dash-icon-box {{$m['icon']}}"></i> {!! $m['msg'] !!}
													<a href="javascript:void(0)" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>
											<?php
											   }
											 }
											 else
											 {
											?>
											<li>
											  <i class="dash-icon-box ti-na"></i>
											  <p>No recent activities.</p>
											</li>
											<?php
											 }
											?>
											</ul>
										</div>
									</div>
									
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list invoices with-icons">
											<h4>Recent Bookings</h4>
											<ul>
												<?php
												if(count($orders) > 0)
												{
												  $ordersLength = count($orders) > 5 ? 5 : count($orders);
												 for($i = 0; $i < $ordersLength; $i++)
												 {
													 $o = $orders[$i];
													 $ref = $o['reference'];
													 
													 $s = ""; $liClass = ""; $ps = "";
										  
										  if($o['status'] == "paid")
										  {
											  $liClass = "paid";
											  $s = "Active";									
										  }
										  else if($o['status'] == "expired")
										  {
											  $liClass = "paid";
											  $s = "Expired";
										  }
										  else if($o['status'] == "cancelled")
										  {
											  $liClass = "unpaid";
											  $s = "Cancelled";
										  }
										  
										  $items = $o['items'];
										  $ii = $items['data'];
										  $ru = url('receipt')."?xf=".$ref;
										  $cu = "javascript:void(0)";
												?>
												<li><i class="dash-icon-box ti-files"></i>
													<strong>Order #</strong>
													<ul>
														<li class="{{$liClass}}">{{$s}}</li>
														<li>Reference #: {{$ref}}</li>
														<li>Date: {{$o['date']}}</li>
													</ul>
													<div class="buttons-to-right">
														<a href="{{$ru}}" class="button gray">View Receipt</a>
													</div>
												</li>
												<?php
												 }
												 ?>
												 <h4><center><a href="{{url('bookings')}}" class="btn btn-theme">View more</a></center></h4>
												 <?php
												}
												 else
												 {
												?>
										
												<li><i class="dash-icon-box ti-files"></i>
													<strong>No orders yet</strong>
													
												</li>
                                                <?php
												 }
												?>
											</ul>
										</div>
									</div>	
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Dashboard End ================================== -->

@stop
