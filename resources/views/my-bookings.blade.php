<?php
$title = "Active Bookings";
$subtitle = "List of all apartments that are currently occupied or booked for later";
?>
@extends('layout')

@section('title',$title)

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle])

	<!-- ============================ Active Bookings Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						@include('host-dashboard-sidebar',['user' => $user])
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								<div class="dashboard-gravity-list mt-0">
									<h4>Active Bookings</h4>
											<?php
											 if(count($bookings) > 0)
											 {
											?>
											 <ul>
											<?php
											   $bookingsLength = count($bookings) > 4 ? 4 : count($bookings);
												 
											   for($i = 0; $i < $bookingsLength; $i++)
											   {
												   $t = $bookings[$i];
											      $item = $t['item'];
												  $iu = url('receipt')."?xf=".$item['order_id'];
												  $a = $item['apartment'];
												  $avbh = "";
												  
												  if($a['avb'] == "booked" || $a['avb'] == "occupied" )
												  {
												    if($a['avb'] == "booked" )
												    {
													  $avbhClass = "info";
												    }
												    else if($a['avb'] == "occupied" )
												    {
													  $avbhClass = "success";
												    }
													
													$avbh = "<span class='badge badge-".$avbhClass."'>".strtoupper($a['avb'])."</span>";
												 
												  $cmedia = $a['cmedia'];
												  $imgs = $cmedia['images'];
											?>
												<li>
												 <div class="row ml-3">
												   <div class="col-md-7">
												   <img src="{{$imgs[0]}}" style="width: 80px; height: 80px;">
													<strong>{{ucwords($a['name'])}}</strong>
														{!! $avbh !!}
													<ul class="mt-1">
														<li>Order: #{{$item['order_id']}}</li>
														<li>Date: {{$t['date']}}</li>
													</ul>
												   </div>
												   <div class="col-md-5" style="border-left: 1px solid #ddd;">
												   <p class="badge badge-primary mt-3" style="font-size: 1.2em;">Actions</p>
												   <div>
												     <p>Receipt: <a href="{{$iu}}" target="_blank" class="button gray">View Receipt</a></p>
												     <p>
													   Message guest: 
													   <a data-toggle="modal" data-target="#booking-send-message" onclick="addXF({xf: '{{$item['id']}}',a: '{{$a['name']}}',type:'booking-send-message',gh:'h'})" class="button gray"><i class="ti-email"></i></a>
													 </p>
												     <p>Checkout guest: <a href="javascript:void(0)" onclick="ccu({dh:'{{$item['id']}}'})" class="button gray">Checkout</a></p>
												   </div>
												   </div>
												 </div>
												
												</li>

											<?php
											      }
											 }
                                            ?>											 
											</ul>
											<?php
											 }
											 else
											 {
											?>
											<ul>
											<li>No bookings yet.</li>
											</ul>
											<?php
											 }
											?>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Active Bookings End ================================== -->

@stop
