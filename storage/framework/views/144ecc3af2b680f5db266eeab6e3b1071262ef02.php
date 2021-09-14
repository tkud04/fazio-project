<?php
$title = "Saved Apartments";
$subtitle = "List of your bookmarked apartments";
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
						
						<?php echo $__env->make('guest-dashboard-sidebar',['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								<div class="dashboard-gravity-list mt-0">
									<h4>Saved Apartments</h4>
									<ul>
                                       <?php
									    if(count($sapts) > 0)
										{
										  foreach($sapts as $sapt)
										   {
											   $a = $sapt['apartment'];
											   $name = $a['name'];
											   $address = $a['address'];
											   $reviews = $a['reviews'];
											   $uu = url('apartment')."?xf=".$a['url'];
											   $du = url('remove-saved-apartment')."?xf=".$a['id'];
											   
											   $imgs = $a['cmedia']['images'];
											   
									   ?>
										<li>
											<div class="list-box-listing">
												<div class="list-box-listing-img"><a href="<?php echo e($uu); ?>"><img src="<?php echo e($imgs[0]); ?>" alt="<?php echo e($name); ?>" style="width: 150px; height: 150px;"></a></div>
												<div class="list-box-listing-content">
													<div class="inner">
														<h3><a href="<?php echo e($uu); ?>"><?php echo e($name); ?></a></h3>
														<span><?php echo e($address['address'].", ".$address['city'].", ".$address['state']); ?></span>
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
														<h4>Saved: <em><?php echo e($sapt['date']); ?></em></h4>
													</div>
												</div>
											</div>
											<div class="buttons-to-right">
												<a href="<?php echo e($du); ?>" class="button gray"><i class="ti-trash"></i> Remove</a>
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/saved-apartments.blade.php ENDPATH**/ ?>