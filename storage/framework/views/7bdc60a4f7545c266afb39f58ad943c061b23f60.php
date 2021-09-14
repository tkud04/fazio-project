<?php
$title = "View Cart";
$subtitle = "View apartments you added to your shopping cart";

$cartt = $cart['data'];
$subtotal = $cart['subtotal'];
$ii = count($cartt) ? "item" : "items";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- ============================ Cart Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								<div class="dashboard-gravity-list mt-0">
									<h4><?php echo e(count($cartt)); ?> <?php echo e($ii); ?></h4>
									<ul>
                                      <?php
												  	 
										if(count($cartt) > 0)
										 {
											foreach($cartt as $c)
											{
												$xf = $user->id;
														 $axf = $c['apartment_id'];
														 $apartment = $c['apartment'];
														 $au = $apartment['url'];
														 $cmedia = $apartment['cmedia'];
														 $imgs = $cmedia['images'];
														 $adata = $apartment['data'];
														 $amount = $adata['amount'];
														 $address = $apartment['address'];
														 $location = $address['city'].", ".$address['state'];
														 
														 $ru = "remove-from-cart?xf=".$xf."&id=".rand(99,99999)."&axf=".$axf;
									 ?>
										<li>
											<div class="list-box-listing">
												<div class="list-box-listing-img"><a href="#"><img src="assets/img/destination/des-2.jpg" alt=""></a></div>
												<div class="list-box-listing-content">
													<div class="inner">
														<h3><a href="javascript:void(0)" onclick="goToApartment('<?php echo e($au); ?>')"><?php echo e(ucwords($apartment['name'])); ?></a></h3>
														<span><?php echo e(ucwords($location)); ?></span>
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
						
						<div class="col-lg-3 col-md-4 col-sm-12">
							<div class="dashboard-navbar">
								
								<div class="d-user-avater">
									<img src="assets/img/user-2.jpg" class="img-fluid avater" alt="">
									<h4>Adam Harshvardhan</h4>
									<span>Canada USA</span>
								</div>
								
								<div class="d-navigation">
									<ul>
										<li><a href="dashboard.html"><i class="ti-dashboard"></i>Dashboard</a></li>
										<li><a href="my-profile.html"><i class="ti-user"></i>My Profile</a></li>
										<li><a href="my-booking.html"><i class="ti-layers"></i>My Booking</a></li>
										<li class="active"><a href="bookmark-list.html"><i class="ti-heart"></i>Saved Items</a></li>
										<li><a href="change-password.html"><i class="ti-unlock"></i>Change Password</a></li>
										<li><a href="#"><i class="ti-power-off"></i>Log Out</a></li>
									</ul>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Cart End ================================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/cart.blade.php ENDPATH**/ ?>