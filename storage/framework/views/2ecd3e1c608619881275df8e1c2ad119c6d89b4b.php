
<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
        <title>Reveal - Business Directory & Listings HTML Template</title>
		
        <!-- All Plugins Css -->
        <link rel="stylesheet" href="<?php echo e(asset('css/plugins.css')); ?>">
		 
		
        <!-- Custom CSS -->
        <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
		
		<!-- Custom Color Option -->
		<link href="<?php echo e(asset('css/colors.css')); ?>" rel="stylesheet">
		
		<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/helpers.js')); ?>"></script>
		<script src="<?php echo e(asset('js/mmm.js')); ?>"></script>
		
    </head>
	
    <body class="orange-skin">
	
		 <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
			<!-- End Navigation -->
			<div class="header header-light">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="#">
								<img src="<?php echo e(asset('img/logo.png')); ?>" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							
								<li class="active"><a href="JavaScript:Void(0);">Home<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="index.html">Home Style 1</a></li>                                    
										<li><a href="home-2.html">Home Style 2</a></li>                                    
										<li><a href="home-3.html">Home Style 3</a></li> 
										<li><a href="home-4.html">Home Style 4</a></li> 
										<li><a href="home-5.html">Home Style 5</a></li> 
										<li><a href="home-6.html">Home Style 6</a></li> 
										<li><a href="home-7.html">Home Style 7</a></li>
										<li><a href="video.html">Video Home</a></li> 										
									</ul>
								</li>
								
								<li><a href="JavaScript:Void(0);">Browse<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="#">Tour Listing<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="tour-list-sidebar.html">List Layout Sidebar</a></li>
												<li><a href="tour-grid-sidebar.html">Grid Layout Sidebar</a></li>										
												<li><a href="tour-detail.html">Tour Detail</a></li> 
											</ul>
										</li>
										<li><a href="JavaScript:Void(0);">Hotel Listing<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="hotel-list-sidebar.html">List Layout Sidebar</a></li>                                    
												<li><a href="hotel-list-sidebar-2.html.html">List Layout 2 Sidebar</a></li>                                    
												<li><a href="hotel-grid-sidebar.html">Grid Layout Sidebar</a></li> 
												<li><a href="hotel-detail.html">Hotel Detail</a></li> 
											</ul>
										</li>
										<li>
											<a href="map-search.html">Half Map Screen</a>                                 
										</li>
										<li><a href="JavaScript:Void(0);">Dashboard<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="dashboard.html">Dashboard Home</a></li> 
												<li><a href="my-booking.html">My Booking</a></li>
												<li><a href="my-profile.html">My Profile</a></li>										
												<li><a href="bookmark-list.html">Bookmark List</a></li>                                    
												<li><a href="checkout.html">Checkout Page</a></li>
												<li><a href="dashboard-invoice.html">Dashboard Invoice</a></li>
											</ul>
										</li>
									</ul>
								</li>
								
								<li><a href="JavaScript:Void(0);">Pages<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="about-us.html">About Us</a></li>                                    
										<li><a href="blog.html">Blog Page</a></li>                                    
										<li><a href="faq.html">FAQ Page</a></li> 
										<li><a href="contact.html">Get in Touch</a></li> 
										<li><a href="404.html">Error Page</a></li> 
										<li><a href="elements.html">Elements</a></li>  
									</ul>
								</li>
								
								<li>
									<a href="contact.html">Contact</a>                                 
								</li>
								
							</ul>
							
							<ul class="nav-menu nav-menu-social align-to-right">
								
								<li class="add-listing theme-bg"><a href="#">Become A Host</a></li>
								
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			
			<!-- ======================= Start Banner ===================== -->
			<div class="main-banner full" style="background-image:url(<?php echo e(asset('img/banner.jpg')); ?>);" data-overlay="7">
				<div class="container">
					<div class="col-md-12 col-sm-12">
					
						<div class="caption text-center cl-white mb-5">
							<span class="stylish">Travel is only glamorous in retrospect</span>
							<h1>Explore and Travel</h1>
						</div>
						
						<form class="st-search-form-tour icon-frm withlbl">
							<div class="g-field-search">
								<div class="row">
									<div class="col-lg-4 col-md-4 border-right mxnbr">
										<div class="form-group">
											<i class="ti-location-pin field-icon"></i>
											<label>Location</label>
											<input type="text" class="form-control" placeholder="Where are you going?">
										</div>
									</div>
									
									<div class="col-lg-3 col-md-4 border-right mxnbr">
										<div class="form-group">
											<i class="ti-calendar field-icon"></i>
											<label>From - To</label>
											<input type="text" class="form-control check-in-out" name="dates" value="01/01/2018 - 01/15/2018" />
										</div>
									</div>
									
									<div class="col-lg-3 col-md-4 border-right dropdown form-select-guests mnbr">
										<div class="form-group">
											<i class="ti-user field-icon"></i>
											<div class="form-content dropdown-toggle" data-toggle="dropdown">
												<div class="wrapper-more">
													<label>Guests</label>
													<div class="render">
														<span class="adults"><span class="one ">1 Adult</span> <span class=" d-none  multi" data-html=":count Adults">1 Adults</span></span>-
														<span class="children">
															<span class="one " data-html=":count Child">0 Child</span>
															<span class="multi  d-none" data-html=":count Children">0 Children</span>
														</span>
													</div>
												</div>
											</div>
											<div class="dropdown-menu select-guests-dropdown">
												<input type="hidden" name="adults" value="1" min="1" max="20">
												<input type="hidden" name="children" value="0" min="0" max="20">
												<div class="dropdown-item-row">
													<div class="label">Adults</div>
													<div class="val">
														<span class="btn-minus" data-input="adults"><i class="ti-minus"></i></span>
														<span class="count-display">1</span>
														<span class="btn-add" data-input="adults"><i class="ti-plus"></i></span>
													</div>
												</div>
												<div class="dropdown-item-row">
													<div class="label">Children</div>
													<div class="val">
														<span class="btn-minus" data-input="children"><i class="ti-minus"></i></span>
														<span class="count-display">0</span>
														<span class="btn-add" data-input="children"><i class="ti-plus"></i></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								
									<div class="col-lg-2 p-0 mp-15">
										<div class="form-group  search">
											<button class="btn btn-theme btn-search" type="submit">Book Now</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						
					</div>
				</div>
			</div>
			<!-- ======================= End Banner ===================== -->
			
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
									<h4>1,000+ Local Tours</h4>
									<p>Morbi semper fames lobortis ac hac</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4">
							<div class="facts-wrap">
								<div class="facts-icon">
									<i class="theme-cl ti-shine"></i>
								</div>
								<div class="facts-detail">
									<h4>Winter Destinations</h4>
									<p>Morbi semper fames lobortis ac hac</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4">
							<div class="facts-wrap">
								<div class="facts-icon">
									<i class="theme-cl ti-face-smile"></i>
								</div>
								<div class="facts-detail">
									<h4>98% Happy Travelers</h4>
									<p>Morbi semper fames lobortis ac hac</p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ================= End true Facts ========================= -->
			
			<!-- ================= Travel start ========================= -->
			<section class="min">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<p>Popular Travel Packages</p>
								<h2>Featured Travel Packages</h2>
							</div>
						</div>
					</div>
					
					<div class="row">
						
						<!-- Single Tour Place -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="tour-simple-wrap">
								<div class="tour-simple-thumb">
									<a href="tour-detail.html"><img src="<?php echo e(asset('img/des-2.jpg')); ?>" class="img-fluid img-responsive" alt="" /></a>
								</div>
								<div class="tour-simple-caption">
									<div class="ts-caption-left">
										<h4 class="ts-title"><a href="tour-detail.html">Cologne, Germany</a></h4>
										<span>5 Tour Package</span>
									</div>
									<div class="ts-caption-right">
										<div class="ts-caption-rating">
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star"></i>
										</div>
										<h5 class="ts-price">$299.00</h5>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Single Tour Place -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="tour-simple-wrap">
								<div class="tour-simple-thumb">
									<a href="tour-detail.html"><img src="<?php echo e(asset('img/des-3.jpg')); ?>" class="img-fluid img-responsive" alt="" /></a>
								</div>
								<div class="tour-simple-caption">
									<div class="ts-caption-left">
										<h4 class="ts-title"><a href="tour-detail.html">Monte Carlo, Monaco</a></h4>
										<span>7 Tour Package</span>
									</div>
									<div class="ts-caption-right">
										<div class="ts-caption-rating">
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
										</div>
										<h5 class="ts-price">$259.00</h5>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Single Tour Place -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="tour-simple-wrap">
								<div class="tour-simple-thumb">
									<a href="tour-detail.html"><img src="<?php echo e(asset('img/des-4.jpg')); ?>" class="img-fluid img-responsive" alt="" /></a>
								</div>
								<div class="tour-simple-caption">
									<div class="ts-caption-left">
										<h4 class="ts-title"><a href="tour-detail.html">Puebla, Mexico</a></h4>
										<span>7 Tour Package</span>
									</div>
									<div class="ts-caption-right">
										<div class="ts-caption-rating">
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star"></i>
										</div>
										<h5 class="ts-price">$350.00</h5>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Single Tour Place -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="tour-simple-wrap">
								<div class="tour-simple-thumb">
									<a href="tour-detail.html"><img src="<?php echo e(asset('img/des-5.jpg')); ?>" class="img-fluid img-responsive" alt="" /></a>
								</div>
								<div class="tour-simple-caption">
									<div class="ts-caption-left">
										<h4 class="ts-title"><a href="tour-detail.html">Florence, Italy</a></h4>
										<span>4 Tour Package</span>
									</div>
									<div class="ts-caption-right">
										<div class="ts-caption-rating">
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star"></i>
										</div>
										<h5 class="ts-price">$799.00</h5>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Single Tour Place -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="tour-simple-wrap">
								<div class="tour-simple-thumb">
									<a href="tour-detail.html"><img src="<?php echo e(asset('img/des-6.jpg')); ?>" class="img-fluid img-responsive" alt="" /></a>
								</div>
								<div class="tour-simple-caption">
									<div class="ts-caption-left">
										<h4 class="ts-title"><a href="tour-detail.html">Bergen, Norway</a></h4>
										<span>3 Tour Package</span>
									</div>
									<div class="ts-caption-right">
										<div class="ts-caption-rating">
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star"></i>
										</div>
										<h5 class="ts-price">$910.00</h5>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Single Tour Place -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="tour-simple-wrap">
								<div class="tour-simple-thumb">
									<a href="tour-detail.html"><img src="<?php echo e(asset('img/des-7.jpg')); ?>" class="img-fluid img-responsive" alt="" /></a>
								</div>
								<div class="tour-simple-caption">
									<div class="ts-caption-left">
										<h4 class="ts-title"><a href="tour-detail.html">Puerto Vallarta, Mexico</a></h4>
										<span>5 Tour Package</span>
									</div>
									<div class="ts-caption-right">
										<div class="ts-caption-rating">
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star"></i>
										</div>
										<h5 class="ts-price">$670.00</h5>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				
				</div>
			</section>
			<!-- ========================= End Travel Section ============================ -->
		
			<!-- ================= Activities start ========================= -->
			<section class="gray">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<p>Top Travel Activities</p>
								<h2>New & featured Travel Activities</h2>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="owl-carousel owl-theme" id="lists-slide">
								
								<div class="single-item">
									<div class="destination-item">
										<span class="discount-off">-35%</span>
										<figure class="destination-list-wrap">
											<a class="destination-listlink" href="search.html">
												<img class="cover" src="<?php echo e(asset('img/cat-1.jpg')); ?>" alt="room">
											</a>
										</figure>
										<div class="destination-listdetails">
											<span class="destination-list-cat theme-bg">Eat & Drinks</span>
											<h4 class="title"><a class="title-ln" href="search.html">Machu Picchu, Peru</a></h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
										</div>
									</div>
								</div>
								
								<div class="single-item">
									<div class="destination-item">
										<span class="discount-off">-50%</span>
										<figure class="destination-list-wrap">
											<a class="destination-listlink" href="search.html">
												<img class="cover" src="<?php echo e(asset('img/cat-7.jpg')); ?>" alt="room">
											</a>
										</figure>
										<div class="destination-listdetails">
											<span class="destination-list-cat theme-bg">Adventures</span>
											<h4 class="title"><a class="title-ln" href="search.html">Great Barrier Reef</a></h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
										</div>
									</div>
								</div>
								
								<div class="single-item">
									<div class="destination-item">
										<span class="discount-off">-10%</span>
										<figure class="destination-list-wrap">
											<a class="destination-listlink" href="search.html">
												<img class="cover" src="<?php echo e(asset('img/cat-3.jpg')); ?>" alt="room">
											</a>
										</figure>
										<div class="destination-listdetails">
											<span class="destination-list-cat theme-bg">Restaurants</span>
											<h4 class="title"><a class="title-ln" href="search.html">Pyramids of Giza</a></h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
										</div>
									</div>
								</div>
								
								<div class="single-item">
									<div class="destination-item">
										<span class="discount-off">-20%</span>
										<figure class="destination-list-wrap">
											<a class="destination-listlink" href="search.html">
												<img class="cover" src="<?php echo e(asset('img/cat-4.jpg')); ?>" alt="room">
											</a>
										</figure>
										<div class="destination-listdetails">
											<span class="destination-list-cat theme-bg">Hotel & Rooms</span>
											<h4 class="title"><a class="title-ln" href="search.html">Heritage of England</a></h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
										</div>
									</div>
								</div>
								
								<div class="single-item">
									<div class="destination-item">
										<span class="discount-off">-30%</span>
										<figure class="destination-list-wrap">
											<a class="destination-listlink" href="search.html">
												<img class="cover" src="<?php echo e(asset('img/cat-5.jpg')); ?>" alt="room">
											</a>
										</figure>
										<div class="destination-listdetails">
											<span class="destination-list-cat theme-bg">Hike & Ride</span>
											<h4 class="title"><a class="title-ln" href="search.html">The City of Lights </a></h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
										</div>
									</div>
								</div>
							
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ========================= End Activities Section ============================ -->
			
			
			<!-- ================= Recent Blog start ========================= -->
			<section class="min">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<p>Recent Blogs</p>
								<h2>Recent Blog & Articles</h2>
							</div>
						</div>
					</div>
					
					<div class="row align-items-center">
					
						<div class="col-lg-7 col-md-12">
							<div class="featured-hm-post">
								<figure class="featured-hm-post-wrap">
									<a href="blog-detail.html">
										<img class="cover" src="<?php echo e(asset('img/c-1.jpg')); ?>" alt="room">
									</a>
								</figure>
								<div class="hm-post-caption">
									<span class="cat theme-bg bg-1">Nature</span>
									<h2 class="title"><a class="title-ln" href="room_details.html">Most Visit Places in Manali</a></h2>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
									<a class="fmp-readmore theme-cl" href="">Read More<i class="ti-arrow-right"></i></a>
								</div>
							</div>
						</div>
						
						<div class="col-lg-5 col-md-12">
							<article class="small-hm-post">
								<div class="small-hm-post-outer">
									<div class="small-hm-inner">
										<div class="small-hm-post-thumb">
											<a href="#"><img src="<?php echo e(asset('img/c-2.jpg')); ?>" class="img-responsive" alt="" /></a>
										</div>
									</div>
									
									<div class="small-hm-inner">
										<div class="small-hm-post-caption">
											<ul class="post-categories">
												<li><a href="#" class="theme-cl">Lifestyle</a>
												</li>
											</ul>
											<h2 class="entry-title"><a href="blog-detail.html">The Best Travel Accessories for Designers</a></h2>
											<ul class="post-meta">
												<li class="meta-author"><span class="author"><a class="url fn n" href="#">Joanna Wellick</a></span></li>
												<li class="meta-date"><a href="#" rel="bookmark">May 24, 2019</a></li>
											</ul>
										</div>
									</div>
									
								</div>
							</article>
							<article class="small-hm-post">
								<div class="small-hm-post-outer">
									<div class="small-hm-inner">
										<div class="small-hm-post-thumb">
											<a href="#"><img src="<?php echo e(asset('img/c-3.jpg')); ?>" class="img-responsive" alt="" /></a>
										</div>
									</div>
									
									<div class="small-hm-inner">
										<div class="small-hm-post-caption">
											<ul class="post-categories">
												<li><a href="#" class="theme-cl">Lifestyle</a>
												</li>
											</ul>
											<h2 class="entry-title"><a href="blog-detail.html">The Best Travel Accessories for Designers</a></h2>
											<ul class="post-meta">
												<li class="meta-author"><span class="author"><a class="url fn n" href="#">Joanna Wellick</a></span></li>
												<li class="meta-date"><a href="#" rel="bookmark">May 24, 2019</a></li>
											</ul>
										</div>
									</div>
									
								</div>
							</article>
							<article class="small-hm-post">
								<div class="small-hm-post-outer">
									<div class="small-hm-inner">
										<div class="small-hm-post-thumb">
											<a href="#"><img src="<?php echo e(asset('img/c-4.jpg')); ?>" class="img-responsive" alt="" /></a>
										</div>
									</div>
									
									<div class="small-hm-inner">
										<div class="small-hm-post-caption">
											<ul class="post-categories">
												<li><a href="#" class="theme-cl">Lifestyle</a>
												</li>
											</ul>
											<h2 class="entry-title"><a href="blog-detail.html">The Best Travel Accessories for Designers</a></h2>
											<ul class="post-meta">
												<li class="meta-author"><span class="author"><a class="url fn n" href="#">Joanna Wellick</a></span></li>
												<li class="meta-date"><a href="#" rel="bookmark">May 24, 2019</a></li>
											</ul>
										</div>
									</div>
									
								</div>
							</article>
						</div>
					
					</div>
					
				</div>
			</section>
			<!-- ========================= End Recent Blog Section ============================ -->
			
			<!-- ============================ Newsletter Start ================================== -->
			<section class="alert-wrap pt-5 pb-5" style="background:#ff5722 url(<?php echo e(asset('img/bg-new.png')); ?>);">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="jobalert-sec">
								<h3 class="mb-1 text-light">Get New Jobs Notification!</h3>
								<p class="text-light">Subscribe & get all related jobs notification.</p>
							</div>
						</div>
						
						<div class="col-lg-6 col-md-6">
							<div class="input-group">
							  <input type="text" class="form-control" placeholder="Enter Your Email">
							  <div class="input-group-append">
								<button type="button" class="btn btn-black black">Subscribe</button>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Newsletter Start ================================== -->			
			
			<!-- ============================ Footer Start ================================== -->
			<footer class="dark-footer skin-dark-footer">
				<div>
					<div class="container">
						<div class="row">
							
							<div class="col-lg-3 col-md-3">
								<div class="footer-widget">
									<img src="<?php echo e(asset('img/logo-light.png')); ?>" class="img-footer" alt="" />
									<div class="footer-add">
										<p><strong>Email:</strong></br><a href="#">hello@workstock.com</a></p>
										<p><strong>Call:</strong></br>91 855 742 62548</p>
										<ul class="footer-bottom-social mt-2">
											<li><a href="#"><i class="ti-facebook"></i></a></li>
											<li><a href="#"><i class="ti-twitter"></i></a></li>
											<li><a href="#"><i class="ti-instagram"></i></a></li>
											<li><a href="#"><i class="ti-linkedin"></i></a></li>
										</ul>
									</div>
									
								</div>
							</div>		
							<div class="col-lg-2 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">Navigations</h4>
									<ul class="footer-menu">
										<li><a href="video.html">Video Home Page</a></li>
										<li><a href="#">Browse Candidates</a></li>
										<li><a href="#">Browse Employers</a></li>
										<li><a href="#">Advance Search</a></li>
										<li><a href="#">Job With Map</a></li>
									</ul>
								</div>
							</div>
									
							<div class="col-lg-2 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">The Highlights</h4>
									<ul class="footer-menu">
										<li><a href="#">Home Page 2</a></li>
										<li><a href="#">Home Page 3</a></li>
										<li><a href="#">Home Page 4</a></li>
										<li><a href="#">Home Page 5</a></li>
										<li><a href="#">LogIn</a></li>
									</ul>
								</div>
							</div>
							
							<div class="col-lg-2 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">My Account</h4>
									<ul class="footer-menu">
										<li><a href="#">Dashboard</a></li>
										<li><a href="#">Applications</a></li>
										<li><a href="#">Packages</a></li>
										<li><a href="#">resume.html</a></li>
										<li><a href="#">SignUp Page</a></li>
									</ul>
								</div>
							</div>
							
							<div class="col-lg-3 col-md-12">
								<div class="footer-widget">
									<h4 class="widget-title">Download Apps</h4>
									<a href="#" class="other-store-link">
										<div class="other-store-app">
											<div class="os-app-icon">
												<i class="ti-android theme-cl"></i>
											</div>
											<div class="os-app-caps">
												Google Play
												<span>Get It Now</span>
											</div>
										</div>
									</a>
									<a href="#" class="other-store-link">
										<div class="other-store-app">
											<div class="os-app-icon">
												<i class="ti-apple theme-cl"></i>
											</div>
											<div class="os-app-caps">
												App Store
												<span>Now it Available</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="footer-bottom">
					<div class="container">
						<div class="row align-items-center">
							
							<div class="col-lg-6 col-md-6">
								<p class="mb-0">© 2020 Travlio. Designd By Pixel Experts. All Rights Reserved</p>
							</div>
							
							<div class="col-lg-6 col-md-6 text-right">
								<img src="<?php echo e(asset('img/payment.svg')); ?>" class="img-fluid" alt="" />
							</div>
							
						</div>
					</div>
				</div>
			</footer>
			<!-- ============================ Footer End ================================== -->
			
			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="registermodal">
						<span class="mod-close" data-dismiss="modal"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Log <span class="theme-cl">In</span></h4>
							<div class="login-form">
								<form>
								
									<div class="form-group">
										<label>User Name</label>
										<div class="input-with-icon">
											<input type="text" class="form-control" placeholder="Username">
											<i class="ti-user"></i>
										</div>
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<div class="input-with-icon">
											<input type="password" class="form-control" placeholder="*******">
											<i class="ti-unlock"></i>
										</div>
									</div>
									
									<div class="form-group">
										<button type="submit" class="btn btn-md full-width pop-login">Login</button>
									</div>
								
								</form>
							</div>
							<div class="modal-divider"><span>Or login via</span></div>
							<div class="social-login mb-3">
								<ul>
									<li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="#" class="btn connect-twitter"><i class="ti-twitter"></i>Twitter</a></li>
								</ul>
							</div>
							<div class="text-center">
								<p class="mt-5"><a href="#" class="link">Forgot password?</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<!-- Sign Up Modal -->
			<div class="modal fade signup" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="sign-up">
						<span class="mod-close" data-dismiss="modal"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Sign <span class="theme-cl">Up</span></h4>
							<div class="login-form">
								<form>
									
									<div class="row">
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" class="form-control" placeholder="First name">
													<i class="ti-user"></i>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" class="form-control" placeholder="Last name">
													<i class="ti-user"></i>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" class="form-control" placeholder="Username">
													<i class="ti-user"></i>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="email" class="form-control" placeholder="Email">
													<i class="ti-email"></i>
												</div>
											</div>
										</div>
	
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="password" class="form-control" placeholder="Password">
													<i class="ti-unlock"></i>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="password" class="form-control" placeholder="Confirm Password">
													<i class="ti-unlock"></i>
												</div>
											</div>
										</div>
										
									</div>
									
									<div class="form-group">
										<button type="submit" class="btn btn-md full-width pop-login">Sign Up</button>
									</div>
								
								</form>
							</div>
							<div class="modal-divider"><span>Or login via</span></div>
							<div class="social-login mb-3">
								<ul>
									<li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="#" class="btn connect-twitter"><i class="ti-twitter"></i>Twitter</a></li>
								</ul>
							</div>
							<div class="text-center">
								<p class="mt-5"><i class="ti-user mr-1"></i>Already Have An Account? <a href="#" class="link">Go For LogIn</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->

		
		<script src="<?php echo e(asset('js/circleMagic.min.js')); ?>"></script>
		
		<script src="<?php echo e(asset('js/rangeslider.js')); ?>"></script>
		<script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/aos.js')); ?>"></script>
		<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/slick.js')); ?>"></script>
		<script src="<?php echo e(asset('js/slider-bg.js')); ?>"></script>
		<script src="<?php echo e(asset('js/lightbox.js')); ?>"></script> 
		<script src="<?php echo e(asset('js/imagesloaded.js')); ?>"></script>
		<script src="<?php echo e(asset('js/isotope.min.js')); ?>"></script>
		
		<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->
		
		<!-- Date Booking Script -->
		<script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/daterangepicker.js')); ?>"></script>


	</body>
</html><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/temp.blade.php ENDPATH**/ ?>