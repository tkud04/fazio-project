<?php
$title = "My Bookings";
$subtitle = "List of bookings made by you";
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
							
								<div class="dashboard-gravity-list">

									<h4>{{$title}}</h4>
									<ul>
                                       <?php
									   if(count($orders) > 0)
									   {
									    foreach($orders as $o)
										{
										  $ref = $o['reference'];
										  $ru = url('receipt')."?xf=".$ref;
										  
										  $s = ""; $liClass = ""; $ps = "";
								
										  
										  $items = $o['items'];
										  $ii = $items['data'];
										  
										  foreach($ii as $i)
										  {
											  $is = $i['status'];
											  
										  if($is == "")
										  {
											  $liClass = "approved-booking";
											  $s = "Active";									
										  }
										  else if($is == "booked")
										  {
											  $liClass = "pending-booking";
											  $s = "Booked";
											  $ps = " pending";
										  }
										  else if($is == "completed")
										  {
											  $liClass = "approved-booking";
											  $s = "Completed";
										  }
										  else if($is == "cancelled")
										  {
											  $liClass = "canceled-booking";
											  $s = "Cancelled";
										  }
											 
														 $apartment = $i['apartment'];
														 $au = $apartment['url'];
														 $cmedia = $apartment['cmedia'];
														 $imgs = $cmedia['images'];
														 $adata = $apartment['data'];
														 $terms = $apartment['terms'];
														 $host = $apartment['host'];
														 $hostName = $host['fname']." ".substr($host['lname'],0,1).".";
														 $amount = $adata['amount'];
														 $address = $apartment['address'];
														 $location = $address['city'].", ".$address['state'];
														 $checkin = $i['checkin'];
														 $checkout = $i['checkout'];
														 $bmax = $i['booking-end'];  
														 
														 $ccu = url('checkout-apartment')."?xf=".$i['id'];
														 $cu = url('cancel-booking')."?xf=".$i['id'];
														 
											  
									   ?>
										<li class="{{$liClass}}">
											<div class="list-box-listing bookings">
												<div class="list-box-listing-img"><img src="{{$imgs[0]}}" alt="{{$apartment['name']}}"></div>
												<div class="list-box-listing-content">
													<div class="inner">
														<h3>{{$apartment['name']}} <span class="booking-status{{$ps}}">{{$s}}</span></h3>

														<div class="inner-booking-list">
														 @if($o['status'] == "paid")
															<h5>Booking Date:</h5>
															<ul class="booking-list">
																<li class="highlighted">{{$checkin}} - {{$checkout}}</li>
															</ul>
														  @elseif($o['status'] == "unpaid")
														    <h5>Booked till:</h5>
															<ul class="booking-list">
																<li class="highlighted">{{$bmax->format("jS F, Y")}}</li>
															</ul>
														  @endif
														</div>
																	
														<div class="inner-booking-list">
															<h5>Booking Details:</h5>
															<ul class="booking-list">
																<li class="highlighted">{{$i['guests']}} Guests</li>
															</ul>
														</div>		
																	
														<div class="inner-booking-list">
															<h5>Price per night:</h5>
															<ul class="booking-list">
																<li class="highlighted">&#8358;{{number_format($amount,2)}}</li>
															</ul>
														</div>		

														<div class="inner-booking-list">
															<h5>Host:</h5>
															<ul class="booking-list">
																<li>{{$hostName}}</li>
															</ul>
														</div>

														

													</div>
												</div>
											</div>
											<div class="buttons-to-right">
											@if($is != "cancelled")
											   <center><p class="badge badge-primary mt-3" style="font-size: 1.2em;">Actions</p></center>
											   <div>
												
												<a href="{{$ru}}" target="_blank" class="button gray approve"><i class="ti-printer"></i> Receipt</a>
												@if($is != "completed")
												@if($o['status'] == "paid")
												<a data-toggle="modal" data-target="#booking-send-message" onclick="addXF({xf: '{{$o['id']}}',a: '{{$apartment['name']}}',type:'booking-send-message',gh:'g'})" class="rate-review"><i class="ti-email"></i> Send Message</a>
												<a href="javascript:void(0)" onclick="checkoutApartment({xf: '{{$i['id']}}'})" class="button gray reject"><i class="ti-close"></i> Checkout</a>
												@elseif($o['status'] == "unpaid")
												<a data-toggle="modal" data-target="#booking-pay-now" onclick="addXF({xf: '{{$o['id']}}',type:'booking-pay-now'})" class="button gray reject"><i class="ti-card"></i> Pay now</a>
											   <a href="javascript:void(0)" onclick="cancelBooking({xf: '{{$i['id']}}'})" class="button gray reject"><i class="ti-trash"></i> Cancel</a>
												@endif
												@endif
												</div>
											  @endif
											</div>
										</li>
                                        <?php
										  }
										}
										}
										?>
									
										
									</ul>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Dashboard End ================================== -->
@stop