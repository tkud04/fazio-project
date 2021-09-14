<?php
$title = "Plans";
$subtitle = "Our subscription plans";
?>
@extends('layout')

@section('title',$title)

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle,'banner' => $banner])

<section class="gray">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<p>Need more postings?</p>
								<h2>Choose a Plan</h2>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="owl-carousel owl-theme owl-loaded owl-drag" id="lists-slide">								
							
							<div class="owl-stage-outer">
							<div class="owl-stage" style="transition: all 0.25s ease 0s; width: 4364px; transform: translate3d(-2380px, 0px, 0px);">
							<?php
							 if(count($plans) > 0)
							 {
							  for($i = 0; $i < count($plans); $i++)
							  {
                                $p = $plans[$i];								  
								$img = asset("img/randoms/sub-".$i.".jpg");
							?>
							<div class="owl-item cloned" style="width: 376.667px; margin-right: 20px;">
							   <div class="single-item">
									<div class="destination-discount">
										<div class="destination-discount-thumb">
											<a href="javascript:void(0)"><img src="{{$img}}" class="img-responsive" alt=""></a>
										</div>
										<div class="destination-discount-caption">
											<div class="discount-box">
												<h4 class="discount-title">{{ucwords($p['name'])}}</h4>
											</div>
											<h4 class="destination-title">
											  	{!! $p['description'] !!}
											</h4>
											
											<h5 class="destination-price theme-cl"><span>From</span>&#8358;{{number_format($p['amount'],2)}}</h5>
											<a href="{{url('add-apartment')}}" class="check-btn">Subscribe<i class="ti-arrow-right"></i></a>
										</div>
									</div>
								</div>
						     </div>
							 <?php
							 }
							 }
							 ?>
								
								</div>
								</div>
								<div class="owl-nav disabled">
								  <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button>
								  <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
								</div>
								<div class="owl-dots">
								
								</div>
								
								</div>
						</div>
					</div>
					
				</div>
			</section>
@stop
