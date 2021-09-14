<?php
$title = "My Saved Apartments";
$subtitle = "List of previously saved apartments";
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
									<h4>Saved Apartments</h4>
									<ul>
                                      <?php
									   if(count($sapts) > 0)
									   {
										 foreach($sapts as $s)
										 {
									  ?>
										<li>
											<div class="list-box-listing">
												<div class="list-box-listing-img"><a href="#"><img src="assets/img/destination/des-2.jpg" alt=""></a></div>
												<div class="list-box-listing-content">
													<div class="inner">
														<h3><a href="#">Castle Palace</a></h3>
														<span>964 Seek Velly, Canada</span>
														<div class="star-rating">
															<div class="rating-counter">(10 reviews)</div>
														<span class="ti-star"></span><span class="ti-star"></span><span class="ti-star"></span><span class="ti-star"></span><span class="ti-star empty"></span></div>
													</div>
												</div>
											</div>
											<div class="buttons-to-right">
												<a href="#" class="button gray"><i class="ti-pencil"></i> Edit</a>
												<a href="#" class="button gray"><i class="ti-trash"></i> Delete</a>
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