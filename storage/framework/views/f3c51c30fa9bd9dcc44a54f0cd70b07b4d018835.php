<?php
$title = "My Postings";
$subtitle = "Manage everything about your apartments here";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- ============================ My Apartments Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						<?php echo $__env->make('host-dashboard-sidebar',['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								<div class="dashboard-gravity-list mt-0">
									<h4>My Listings <a href="<?php echo e(url('add-apartment')); ?>" class="btn btn-success btn-sm">Post New Listing</a></h4>
									<ul>
                                       <?php
									    if(count($apartments) > 0)
										{
										  foreach($apartments as $a)
										   {
											   $name = $a['name'];
											   $address = $a['address'];
											   $county = strlen($address['county']) > 0 ? ", ".$address['county'] : "";
											   $fa = $address['address'].$county.", ".$address['city'];
											   $reviews = $a['reviews'];
											   $uu = url('my-apartment')."?xf=".$a['apartment_id'];
											   $du = url('delete-apartment')."?xf=".$a['apartment_id'];
											   $statusClass = "danger";
											    $sss = $a['status'];
												
											   if($sss == "approved")
												{
													$statusClass = "success";
												}
											   $imgs = $a['cmedia']['images'];
											   
									   ?>
										<li>
											<div class="list-box-listing">
												<div class="list-box-listing-img"><a href="<?php echo e($uu); ?>"><img src="<?php echo e($imgs[0]); ?>" alt="<?php echo e($name); ?>" style="width: 150px; height: 150px;"></a></div>
												<div class="list-box-listing-content">
													<div class="inner">
														<h3><a href="<?php echo e($uu); ?>"><?php echo e($name); ?></a><span class="ml-2 label label-<?php echo e($statusClass); ?>"><?php echo e(strtoupper($sss)); ?></span></h3>
														<span><?php echo e($fa); ?></span>
														<div class="star-rating">
															<div class="rating-counter">(<?php echo e(count($reviews)); ?> reviews)</div>
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
													</div>
												</div>
											</div>
											<div class="buttons-to-right">
												<a href="<?php echo e($uu); ?>" class="button gray"><i class="ti-pencil"></i> Edit</a>
												<a href="<?php echo e($du); ?>" class="button gray"><i class="ti-trash"></i> Delete</a>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\fazio-project\resources\views/my-apartments.blade.php ENDPATH**/ ?>