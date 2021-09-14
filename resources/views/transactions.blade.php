<?php
$title = "My Transactions";
$subtitle = "List of all your transactions here";
?>
@extends('layout')

@section('title',$title)

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle])

	<!-- ============================ My Transactions Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						@include('host-dashboard-sidebar',['user' => $user])
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								<div class="dashboard-gravity-list mt-0">
									<h4>My Transactions</h4>
									<ul>
                                       <?php
									    if(count($transactions) > 0)
										{
										   foreach($transactions as $t)
											   { 
											      $item = $t['item'];
												  $a = $item['apartment'];
												  $cmedia = $a['cmedia'];
												  $imgs = $cmedia['images'];
											   $iu = "receipt?xf=".$item['order_id'];
									   ?>
										<li><img src="{{$imgs[0]}}" style="width: 80px; height: 80px;">
													<strong>{{ucwords($a['name'])}}</strong>
													<div>
														<p>Order: #{{$item['order_id']}}</p>
														<p>Checkin: <em>{{$item['checkin']}}</em> | Checkout: <em>{{$item['checkout']}}</em></p>
														<p>Guests: <b>{{$item['guests']}}</b></p>
														<p>Transaction date: {{$t['date']}}</p>
													</div>
													<div class="buttons-to-right">
														<a href="{{$iu}}" target="_blank" class="button gray">View Receipt</a>
													</div>
												</li>
										<?php
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
			<!-- ============================ My Transactions End ================================== -->

@stop