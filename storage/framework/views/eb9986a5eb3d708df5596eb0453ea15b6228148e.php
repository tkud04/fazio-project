<?php
$title = "Guest Dashboard";
$subtitle = "Manage your guest account here";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- ============================ Dashboard Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						<?php echo $__env->make('guest-dashboard-sidebar',['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								
								<!-- Row -->
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list with-icons">
											<h4>Saved Payments</h4>
											<?php
											 if(count($sps) > 0)
											 {
												  $spsLength = count($sps) > 5 ? 5 : count($sps);
											?>
											 <ul>
											<?php
											   for($i = 0; $i < $spsLength; $i++)
											   {
												   $s = $sps[$i];
                                                  $dt = $s['data'];	
                                                  $bname = $dt->bank;
                                                  $ctype = $dt->brand;
												  $last4 = $dt->last4;
												  $exp = new DateTime("01/".$dt->exp_month."/".$dt->exp_year); 
												  
											?>
												<li>
													<i class="dash-icon-box ti-credit-card"></i><?php echo e(strtoupper($ctype)); ?> | <strong><a href="javascript:void(0)"><?php echo e($bname); ?></a></strong> | **** <?php echo e($last4); ?><br>
													<?php echo e($exp->format("F, Y")); ?>

													<a href="javascript:void(0)" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>

											<?php
											 }
                                            ?>											 
											</ul>
											<h4><center><a href="<?php echo e(url('saved-payments')); ?>" class="btn btn-theme">View more</a></center></h4>
											<?php
											 }
											 else
											 {
											?>
											<ul>
											<li>No payment methods added yet. Book an apartment to add one now.</li>
											</ul>
											
											<?php
											 }
											?>
										</div>
									</div>
									
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list with-icons">
											<h4>Saved Apartments</h4>
											<?php
											 if(count($sapts) > 0)
											 {
												 $saptsLength = count($sapts) > 5 ? 5 : count($sapts);
											?>
											 <ul>
											<?php
											   for($i = 0; $i < $saptsLength; $i++)
											   { 
											   $sa = $sapts[$i];
											   $a = $sa['apartment'];
											   $au = url('apartment')."?xf=".$a['url'];
											   $title = $a['name'];
											   $cmedia = $a['cmedia'];
											   $imgs = $cmedia['images'];
											   $adata = $a['data'];
											   $address = $a['address'];
											   $location = $address['city'].", ".$address['state'];
											   $stars = $a['rating'];
											   $ratingClass = $stars > 3.5 ? "high" : "low";
											?>
												<li>
											        <i class="dash-icon-box ti-home"></i>  
													<div class="row">
													<div class="col-md-6">
											        <strong>
													 <a href="<?php echo e($au); ?>" target="_blank">
													   <img src="<?php echo e($imgs[0]); ?>" style="width: 80px; height: 80px;"><br>
													    <?php echo e($title); ?><br> 
														<?php echo e(ucwords($location)); ?>

													  
													 </a>
													 </strong>
													</div>
													<div class="col-md-6">
													 <h3>
													 Rating: <div class="numerical-rating <?php echo e($ratingClass); ?>" data-rating="<?php echo e($stars); ?>"></div>
													 <div class="mt-2">
													 <?php
													  for($i = 0; $i < $stars; $i++)
													  {
													 ?>
													 <i class="ti-star"></i>
                                                     <?php
											          }
													 ?>
													 </div>
													 </h3>
													</div>
													</div>
													<a href="javascript:void(0)" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>

											<?php
											 }
                                            ?>											 
											</ul>
											<h4><center><a href="<?php echo e(url('saved-apartments')); ?>" class="btn btn-theme">View more</a></center></h4>
											<?php
											 }
											 else
											 {
											?>
											<ul>
											<li>No apartments have been saved yet.</li>
											</ul>
											<?php
											 }
											?>
										</div>
									</div>	
								</div>
								
								<!-- Row -->
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list with-icons">
											<h4>Recent Activities</h4>
											<ul>
											<?php
											 if(count($activities) > 0)
											 {
												 $activitiesLength = count($activities) > 9 ? 9 : count($activities);
												 
											   for($i = 0; $i < $activitiesLength; $i++)
											   {
                                                  $a = $activities[$i];	
                                                  $m = $a['msg'];												  
										     ?>
												<li>
													<i class="dash-icon-box <?php echo e($m['icon']); ?>"></i> <?php echo $m['msg']; ?>

													<a href="javascript:void(0)" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>
											<?php
											   }
											 }
											 else
											 {
											?>
											<li>
											  <i class="dash-icon-box ti-na"></i>
											  <p>No recent activities.</p>
											</li>
											<?php
											 }
											?>
											</ul>
										</div>
									</div>
									
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list invoices with-icons">
											<h4>Recent Bookings</h4>
											<ul>
												<?php
												if(count($orders) > 0)
												{
												  $ordersLength = count($orders) > 5 ? 5 : count($orders);
												 for($i = 0; $i < $ordersLength; $i++)
												 {
													 $o = $orders[$i];
													 $ref = $o['reference'];
													 
													 $s = ""; $liClass = ""; $ps = "";
										  
										  if($o['status'] == "paid")
										  {
											  $liClass = "paid";
											  $s = "Active";									
										  }
										  else if($o['status'] == "expired")
										  {
											  $liClass = "paid";
											  $s = "Expired";
										  }
										  else if($o['status'] == "cancelled")
										  {
											  $liClass = "unpaid";
											  $s = "Cancelled";
										  }
										  
										  $items = $o['items'];
										  $ii = $items['data'];
										  $ru = url('receipt')."?xf=".$ref;
										  $cu = "javascript:void(0)";
												?>
												<li><i class="dash-icon-box ti-files"></i>
													<strong>Order #</strong>
													<ul>
														<li class="<?php echo e($liClass); ?>"><?php echo e($s); ?></li>
														<li>Reference #: <?php echo e($ref); ?></li>
														<li>Date: <?php echo e($o['date']); ?></li>
													</ul>
													<div class="buttons-to-right">
														<a href="<?php echo e($ru); ?>" class="button gray">View Receipt</a>
													</div>
												</li>
												<?php
												 }
												 ?>
												 <h4><center><a href="<?php echo e(url('bookings')); ?>" class="btn btn-theme">View more</a></center></h4>
												 <?php
												}
												 else
												 {
												?>
										
												<li><i class="dash-icon-box ti-files"></i>
													<strong>No orders yet</strong>
													
												</li>
                                                <?php
												 }
												?>
											</ul>
										</div>
									</div>	
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Dashboard End ================================== -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/guest-dashboard.blade.php ENDPATH**/ ?>