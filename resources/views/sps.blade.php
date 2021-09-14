<?php
$title = "My Saved Payments";
$subtitle = "List of previously used payment details";
?>
@extends('layout')

@section('title',$title)

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle])
<!-- ============================ Saved Payments Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						@include('guest-dashboard-sidebar',['user' => $user])
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								<div class="dashboard-gravity-list mt-0">
									<h4>Saved Payments</h4>
									<ul>
                                      <?php
									   if(count($sps) > 0)
									   {
										 foreach($sps as $s)
										 {
											 $dt = $s['data'];
											 $du = url('remove-saved-payment')."?xf=".$s['id'];
									  ?>
										<li>
											<div class="list-box-listing">
												<div class="list-box-listing-img"><a href="javascript:void(0)"><img src="{{asset('img/card.jpg')}}" alt=""></a></div>
												<div class="list-box-listing-content">
													<div class="inner">
														<h3><a href="javascript:void(0)">{{$dt->bank}} - <b>{{strtoupper($dt->card_type)}}</b></a></h3>
														<span>Expires: {{$dt->exp_month}}/{{$dt->exp_year}}</span><br>
														<span> **** {{$dt->last4}}</span>												
													</div>
												</div>
											</div>
											<div class="buttons-to-right">
												<a href="{{$du}}" class="button gray"><i class="ti-trash"></i> Remove</a>
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
			<!-- ============================ Saved Payments End ================================== -->
@stop