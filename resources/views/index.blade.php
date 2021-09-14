@extends('layout')

@section('title',"Welcome")

@section('scripts')

<script>
let landingSearchDT = {
				avb: "{{$def['avb']}}",
				city: "{{$def['city']}}",
				lga: "{{$def['lga']}}",
				state: "{{$def['state']}}",
				category: "{{$def['category']}}",
				property_type: "{{$def['property_type']}}",
				rooms: "{{$def['rooms']}}",
				units: "{{$def['units']}}",
				bedrooms: "{{$def['bedrooms']}}",
				bathrooms: "{{$def['bathrooms']}}",
				max_adults: "{{$def['max_adults']}}",
				max_children: "{{$def['max_children']}}",
				amount: "{{$def['amount']}}",
				children: "{{$def['children']}}",
				pets: "{{$def['pets']}}",
				facilities: [
				<?php
				  if(count($def['facilities']) > 0)
				  {
					 for($i = 0; $i < count($def['facilities']); $i++)
					 {
						 $f = $def['facilities'][$i];
						 $ss = $i != count($def['facilities']) - 1 ? "," : ""
				?>
				   "{{$f['facility']}}"{{$ss}}
				<?php
					 }
				  }
				?>
				],
				rating: "0"
			};
</script>
@stop

@section('content')

@include('banner',['def' => $def,'banner' => $banner])



<!-- ================= true Facts start ========================= -->
			<section class="facts">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-4 col-md-4">
							<div class="facts-wrap">
								<div class="facts-icon">
									<i class="theme-cl ti-location-pin"></i>
								</div>
								<div class="facts-detail">
									<h4>1,000+ Choice Apartments</h4>
									<p>With 5-star hospitality</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4">
							<div class="facts-wrap">
								<div class="facts-icon">
									<i class="theme-cl ti-shine"></i>
								</div>
								<div class="facts-detail">
									<h4>Home Away</h4>
									<p>A home away from home</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4">
							<div class="facts-wrap">
								<div class="facts-icon">
									<i class="theme-cl ti-face-smile"></i>
								</div>
								<div class="facts-detail">
									<h4>98% Happy Guests</h4>
									<p>We strive to serve you better</p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ================= End true Facts ========================= -->
			
			@include('special-search-filter',[])
			
						<!-- ================= Apartments start ========================= -->
			<section class="min">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>Latest Apartments</h2>
							</div>
						</div>
					</div>
					
					<div class="row">
						<?php
						 $popularApartmentss = [
						   ['img' => asset('img/des-2.jpg'),'href' => "javascript-void(0)", 'tc' => "5",'location' => "Ikeja, Lagos",'stars' => "5", 'amount' => "20000"],
						   ['img' => asset('img/des-3.jpg'),'href' => "javascript-void(0)", 'tc' => "6",'location' => "Ikorodu, Lagos",'stars' => "3", 'amount' => "10000"],
						   ['img' => asset('img/des-4.jpg'),'href' => "javascript-void(0)", 'tc' => "5",'location' => "Victoria Island, Lagos",'stars' => "5", 'amount' => "20000"],
						   ['img' => asset('img/des-5.jpg'),'href' => "javascript-void(0)", 'tc' => "5",'location' => "Bodija, Oyo",'stars' => "3", 'amount' => "7000"],
						   ['img' => asset('img/des-6.jpg'),'href' => "javascript-void(0)", 'tc' => "7",'location' => "Mokola, Ibadan",'stars' => "4", 'amount' => "10000"],
						   ['img' => asset('img/des-7.jpg'),'href' => "javascript-void(0)", 'tc' => "7",'location' => "Yaba, Lagos",'stars' => "4", 'amount' => "10000"],
						 ];
						 
						 foreach($popularApartments as $pa)
						 {
							 $pt = [];
$adata = $pa['data'];
$terms = $pa['terms'];
$address = $pa['address'];
$cmedia = $pa['cmedia'];
$imgs = $cmedia['images'];

$pt['img'] = $imgs[0];
$pt['href'] = url('apartment')."?xf=".$pa['url'];
$pt['tc'] = $terms['max_adults'];
$pt['location'] = $address['city'].", ".$address['state'];
$pt['stars'] = $pa['rating'];
$pt['amount'] = $adata['amount'];
$pt['name'] = $pa['name'];
						?>
						<!-- Single Tour Place -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="tour-simple-wrap">
								<div class="tour-simple-thumb">
									<a href="{{$pt['href']}}"><img src="{{$pt['img']}}" class="img-fluid img-responsive" alt="{{$pt['name']}}" style="width: 348px; height: 237px;"/></a>
								</div>
								<div class="tour-simple-caption">
									<div class="ts-caption-left">
										<h4 class="ts-title">
										 <a href="{{$pt['href']}}">{{$pt['name']}}</a><br>
										 <a href="javascript:void(0)">{{$pt['location']}}</a>
										</h4>
										<span>{{$pt['tc']}} adults max.</span>
									</div>
									<div class="ts-caption-right">
										<div class="ts-caption-rating">
										   @for($i = 0; $i < $pt['stars']; $i++)
											<i class="ti-star filled"></i>
										   @endfor
										   @for($i = 0; $i < 5 - $pt['stars']; $i++)
											<i class="ti-star"></i>
										   @endfor
										</div>
										<h5 class="ts-price">&#8358;{{number_format($pt['amount'],2)}}</h5>
									</div>
								</div>
							</div>
						</div>
						<?php
						 }
						?>
						
						
					</div>
				
				</div>
			</section>
			<!-- ========================= End Apartment Section ============================ -->
			
			
			<!-- ================= Featured Apartments start ========================= -->
			<section class="gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>Featured</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="owl-carousel owl-theme" id="lists-slide">
								
								<?php
								$fa = [
								  ['name' => "Fravio Apartment",'rating' => "4",'location' => "Abuja, FCT",'likes' => "50",'img' => asset('img/featured/fravio-apartment.jpg')],
								  ['name' => "A20 Apartment",'rating' => "5",'location' => "Lekki, Lagos",'likes' => "88",'img' => asset('img/featured/a20-apartment.png')],
								  ['name' => "Williams Courtyard",'rating' => "4",'location' => "Ikeja, Lagos",'likes' => "31",'img' => asset('img/featured/williams-courtyard.jpg')],
								  ['name' => "Lovitoz Place",'rating' => "5",'location' => "Sapele, Delta",'likes' => "26",'img' => asset('img/featured/lovitoz-place.jpg')],
								  ['name' => "Topmost Apartment",'rating' => "4",'location' => "Abuja, FCT",'likes' => "43",'img' => asset('img/featured/topmost-apartment.jpg')]
								];
								
								 foreach($fa as $f)
								 {
									$description = $f['likes']." users like this apartment and think it's amazing. If you happen to be around ".$f['location']." anytime you should visit this apartment!";
								?>
								<div class="single-item">
									<div class="destination-item">
										<span class="discount-off">
										  <i class="fa fa-star"></i>{{$f['rating']}}
										</span>
										<figure class="destination-list-wrap">
											<a class="destination-listlink" href="javascript:void(0)">
												<img class="cover" src="{{$f['img']}}" alt="{{$f['name']}}">
											</a>
										</figure>
										<div class="destination-listdetails">
											<span class="destination-list-cat theme-bg">{{$f['name']}}</span>
											<h4 class="title"><a class="title-ln" href="javascript:void(0)">{{$f['location']}}</a></h4>
											<p>{{$description}}</p>
										</div>
									</div>
								</div>
								<?php
								 }
								?>
								
							
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ========================= End Featured Apartments Section ============================ -->
			
			
										<!-- ================= Apartments start ========================= -->
			<section class="min">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>Law School Apartments</h2>
							</div>
						</div>
					</div>
					
					<div class="row">
						<?php
						 $popularApartmentss = [
						   ['img' => asset('img/des-2.jpg'),'href' => "javascript-void(0)", 'tc' => "5",'location' => "Ikeja, Lagos",'stars' => "5", 'amount' => "20000"],
						   ['img' => asset('img/des-3.jpg'),'href' => "javascript-void(0)", 'tc' => "6",'location' => "Ikorodu, Lagos",'stars' => "3", 'amount' => "10000"],
						   ['img' => asset('img/des-4.jpg'),'href' => "javascript-void(0)", 'tc' => "5",'location' => "Victoria Island, Lagos",'stars' => "5", 'amount' => "20000"],
						   ['img' => asset('img/des-5.jpg'),'href' => "javascript-void(0)", 'tc' => "5",'location' => "Bodija, Oyo",'stars' => "3", 'amount' => "7000"],
						   ['img' => asset('img/des-6.jpg'),'href' => "javascript-void(0)", 'tc' => "7",'location' => "Mokola, Ibadan",'stars' => "4", 'amount' => "10000"],
						   ['img' => asset('img/des-7.jpg'),'href' => "javascript-void(0)", 'tc' => "7",'location' => "Yaba, Lagos",'stars' => "4", 'amount' => "10000"],
						 ];
						 
						 foreach($popularApartments as $pa)
						 {
							 $pt = [];
$adata = $pa['data'];
$terms = $pa['terms'];
$address = $pa['address'];
$cmedia = $pa['cmedia'];
$imgs = $cmedia['images'];

$pt['img'] = $imgs[0];
$pt['href'] = url('apartment')."?xf=".$pa['url'];
$pt['tc'] = $terms['max_adults'];
$pt['location'] = $address['city'].", ".$address['state'];
$pt['stars'] = $pa['rating'];
$pt['amount'] = $adata['amount'];
$pt['name'] = $pa['name'];
						?>
						<!-- Single Tour Place -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="tour-simple-wrap">
								<div class="tour-simple-thumb">
									<a href="{{$pt['href']}}"><img src="{{$pt['img']}}" class="img-fluid img-responsive" alt="{{$pt['name']}}" style="width: 348px; height: 237px;"/></a>
								</div>
								<div class="tour-simple-caption">
									<div class="ts-caption-left">
										<h4 class="ts-title">
										 <a href="{{$pt['href']}}">{{$pt['name']}}</a><br>
										 <a href="javascript:void(0)">{{$pt['location']}}</a>
										</h4>
										<span>{{$pt['tc']}} adults max.</span>
									</div>
									<div class="ts-caption-right">
										<div class="ts-caption-rating">
										   @for($i = 0; $i < $pt['stars']; $i++)
											<i class="ti-star filled"></i>
										   @endfor
										   @for($i = 0; $i < 5 - $pt['stars']; $i++)
											<i class="ti-star"></i>
										   @endfor
										</div>
										<h5 class="ts-price">&#8358;{{number_format($pt['amount'],2)}}</h5>
									</div>
								</div>
							</div>
						</div>
						<?php
						 }
						?>
						
						
					</div>
				
				</div>
			</section>
			<!-- ========================= End Apartment Section ============================ -->

      @include('recent-blog')
      @include('newsletter-cta')
			
@stop
