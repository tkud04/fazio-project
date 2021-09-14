<?php
$title = "My Transactions";
$subtitle = "List of all your transactions here";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- ============================ My Transactions Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						<?php echo $__env->make('host-dashboard-sidebar',['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								<div class="dashboard-gravity-list mt-0">
									<h4>My Transactions</h4>
									<ul>
                                       <?php
									    if(count($transactions) > 0)
										{
										   foreach($transactions as $t)
											   { 
											      $item = $t['item'];
												  $a = $item['apartment'];
												  $cmedia = $a['cmedia'];
												  $imgs = $cmedia['images'];
											   $iu = "receipt?xf=".$item['order_id'];
									   ?>
										<li><img src="<?php echo e($imgs[0]); ?>" style="width: 80px; height: 80px;">
													<strong><?php echo e(ucwords($a['name'])); ?></strong>
													<div>
														<p>Order: #<?php echo e($item['order_id']); ?></p>
														<p>Checkin: <em><?php echo e($item['checkin']); ?></em> | Checkout: <em><?php echo e($item['checkout']); ?></em></p>
														<p>Guests: <b><?php echo e($item['guests']); ?></b></p>
														<p>Transaction date: <?php echo e($t['date']); ?></p>
													</div>
													<div class="buttons-to-right">
														<a href="<?php echo e($iu); ?>" target="_blank" class="button gray">View Receipt</a>
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
			<!-- ============================ My Transactions End ================================== -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/transactions.blade.php ENDPATH**/ ?>