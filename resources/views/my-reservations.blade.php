<?php
$title = "My Reservations";
$subtitle = "List of your apartment reservations";
?>
@extends('layout')

@section('title',$title)

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle])

	<!-- ============================ My Reservations Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						<?php
						if($user == null)
						{
							$cx = "col-lg-12 col-md-12 col-sm-12";
						}
						else
						{
						  $cx = "col-lg-9 col-md-8 col-sm-12";
						  $mode = $user->mode;
						  
						  if($mode == "guest") $sb = "guest-dashboard-sidebar"; 
						  else if($mode == "host") $sb = "host-dashboard-sidebar"; 
						?>
						  @include($sb,['user' => $user])
						<?php
						}
						?>
						<div class="{{$cx}}">
							<div class="dashboard-wrapers">
							
								<div class="dashboard-gravity-list mt-0">
									<h4>My Reservations</h4>
									<ul>
                                       <?php
									    if(count($reservations) > 0)
										{
										  foreach($reservations as $r)
										   {
											   $a = $r['apartment'];
											   $name = $a['name'];
											   $address = $a['address'];
											   $reviews = $a['reviews'];
											   $host = $a['host'];
											   $uu = url('apartment')."?xf=".$a['url'];
											   $cu = url('cancel-reservation')."?xf=".$r['id']."&axf=".$a['apartment_id']."&gxf=".$r['user_id'];
											   $du = url('remove-reservation')."?xf=".$r['id']."&axf=".$a['apartment_id']."&gxf=".$r['user_id'];
											   $ss = "info";
											   if($r['status'] == "cancelled") $ss = "danger";
											   if($r['status'] == "approved") $ss = "success";
											   $imgs = $a['cmedia']['images'];
											   
									   ?>
										<li>
											<div class="list-box-listing">
												<div class="list-box-listing-img"><a href="{{$uu}}"><img src="{{$imgs[0]}}" alt="{{$name}}" style="width: 150px; height: 150px;"></a></div>
												<div class="list-box-listing-content">
													<div class="inner">
														<h3><a href="{{$uu}}">{{$name}}</a></h3>
														<span>{{$address['address'].", ".$address['city'].", ".$address['state']}}</span>
														<div class="star-rating">
															<div class="rating-counter">({{count($reviews)}} reviews)</div>
															<?php
															$rating = 8; $stars = $rating / 2;
															
															 for($u = 0; $u < $stars; $u++)
															 {
															?>
															   <span class="ti-star"></span>
															<?php
															 }
															?>
															
															<?php
															 for($v = 0; $v < (5 - $stars); $v++)
															 {
															?>
															   <span class="ti-star empty"></span>
															<?php
															 }
															?>
														</div>
														<span>Host: <em>{{$host['fname']." ".$host['lname']}}</em></span><br>
														<span>Booked: <em>{{$r['date']}}</em></span><br>
														<span>Status: <span class="label label-{{$ss}}">{{strtoupper($r['status'])}}</em></span>
													</div>
												</div>
											</div>
											<div class="buttons-to-right">
											<?php
											if($r['status'] == "pending")
											{
											?>
												<a href="{{$cu}}" class="button gray"><i class="ti-close"></i> Cancel</a>
											<?php
											}
											else
											{
											?>
												<a href="{{$du}}" class="button gray"><i class="ti-trash"></i> Remove</a>
											<?php
											}
											?>
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
			<!-- ============================ My Apartments End ================================== -->

@stop