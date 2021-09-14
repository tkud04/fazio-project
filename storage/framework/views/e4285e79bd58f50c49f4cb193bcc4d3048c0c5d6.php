<?php
$title = "My Subscriptions";
$subtitle = "List of all your subscriptions here";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- ============================ My Subscriptions Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						<?php echo $__env->make('host-dashboard-sidebar',['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								<div class="dashboard-gravity-list mt-0">
									<h4>My Subscriptions <a href="<?php echo e(url('add-apartment')); ?>" class="btn btn-success btn-sm">Subscribe</a></h4>
									<ul>
                                       <?php
									    if(count($subscriptions) > 0)
										{
										  foreach($subscriptions as $s)
										   {
											   $p = $s['plan'];
											   $stats = $s['stats'];
											   
											   $exp = new DateTime($s['date']);
									           $e1 = new DateTime($exp->format("jS F, Y"));
									           $e1->add(new DateInterval('P1M'));
											   
											   $cu = url('cancel-subscription')."?xf=".$s['id'];
											   
									   ?>
										<li>
											<div class="list-box-listing">
												<div class="list-box-listing-img"><img src="" alt="" style="width: 150px; height: 150px;"></a></div>
												<div class="list-box-listing-content">
													<div class="inner">
														<div class="row">
															<div class="col-lg-12 col-md-12 col-sm-12">
										  <h4 class="text-success"><?php echo e($stats['aptCount']); ?> out of <?php echo e($p['pc']); ?> postings used</h4>
									   </div>
                                     <div class="col-lg-12 col-md-12 col-sm-12 mt-1">
									   <h4>Current Plan: <a href="javascript:void(0)" class="btn btn-success"><?php echo e($p['name']); ?></a></h4>
									   <input type="hidden" id="ac" value="">
									   <div class="row">
									     <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Postings<i class="req">*</i></label>
												<input type="text" class="form-control" value="<?php echo e($stats['aptCount']); ?> out of <?php echo e($p['pc']); ?> used" readonly>
											</div>
										  </div>
										  <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Expires on:<i class="req">*</i></label>
												<input type="text" class="form-control" value="<?php echo e($e1->format('jS F, Y')); ?>" readonly>
											</div>
										  </div>
									   </div>
									 </div>
														</div>
													</div>
												</div>
											</div>
											<div class="buttons-to-right">
												<a href="javascript:void(0) " data-href="<?php echo e($cu); ?>" id="cancel-btn" class="button gray"><i class="ti-trash"></i> Cancel</a>
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
			<!-- ============================ My Subscriptions End ================================== -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/my-subscriptions.blade.php ENDPATH**/ ?>