<?php
$title = "My Saved Payments";
$subtitle = "List of previously used payment details";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- ============================ Saved Payments Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						<?php echo $__env->make('guest-dashboard-sidebar',['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
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
												<div class="list-box-listing-img"><a href="javascript:void(0)"><img src="<?php echo e(asset('img/card.jpg')); ?>" alt=""></a></div>
												<div class="list-box-listing-content">
													<div class="inner">
														<h3><a href="javascript:void(0)"><?php echo e($dt->bank); ?> - <b><?php echo e(strtoupper($dt->card_type)); ?></b></a></h3>
														<span>Expires: <?php echo e($dt->exp_month); ?>/<?php echo e($dt->exp_year); ?></span><br>
														<span> **** <?php echo e($dt->last4); ?></span>												
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
			<!-- ============================ Saved Payments End ================================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/sps.blade.php ENDPATH**/ ?>