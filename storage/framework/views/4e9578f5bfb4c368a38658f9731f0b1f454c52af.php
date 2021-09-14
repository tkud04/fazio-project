<?php
$title = "Host Dashboard";
$subtitle = "Manage your apartments and host account here";

$months = [
  'january','february','march','april','may','june','july','august','september','october','november','december'
];
$month = date("F");
$year = date("Y");

?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('scripts'); ?>
<!-- Morris Charts -->
<link href="<?php echo e(asset('lib/morris-bundle/morris.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('lib/morris-bundle/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/morris-bundle/morris.js')); ?>"></script>
<script src="<?php echo e(asset('lib/morris-bundle/morris-init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
let transactionsData1 = [
<?php
											 if(count($revenueData) > 0)
											 {
											   for($i = 0; $i < count($revenueData); $i++)
											   { 
										       $t = $revenueData[$i];
											   $item = $t['item'];
											   $date = new DateTime($t['date']);
											?>
{x: '<?php echo e($date->format("d M")); ?>',y: <?php echo e($item['amount']); ?>}<?php if($i != count($revenueData) - 1): ?>,<?php endif; ?>
											<?php
											   }
											 }
											?>
],bsaData1 = [
<?php
											 if(count($bsa) > 0)
											 {
											   for($i = 0; $i < count($bsa); $i++)
											   { 
										       $t = $bsa[$i];
											?>
{value: "<?php echo e($t['value']); ?>",label: "<?php echo e($t['label']); ?>"}<?php if($i != count($bsa) - 1): ?>,<?php endif; ?>
											<?php
											   }
											 }
											?>
];
</script>
	<!-- ============================ Dashboard Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						<?php echo $__env->make('host-dashboard-sidebar',['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								<!-- Row -->
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="dashboard-stat widget-1">
											<div class="dashboard-stat-content"><h4><?php echo e($stats['apartments']); ?></h4> <span>Total Apartments</span></div>
											<div class="dashboard-stat-icon"><i class="ti-home"></i></div>
										</div>	
									</div>
									
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="dashboard-stat widget-2">
											<div class="dashboard-stat-content"><h4><?php echo e($stats['active-bookings']); ?></h4> <span>Active Bookings</span></div>
											<div class="dashboard-stat-icon"><i class="ti-location-pin"></i></div>
										</div>	
									</div>
									
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="dashboard-stat widget-4">
											<div class="dashboard-stat-content"><h4>&#8358;<?php echo e(number_format($stats['profit'])); ?></h4> <span>Total Profit</span></div>
											<div class="dashboard-stat-icon"><i class="ti-stats-up"></i></div>
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
												 $activitiesLength = count($activities) > 5 ? 5 : count($activities);
												 
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
										<div class="dashboard-gravity-list with-icons">
											<h4>Active Bookings</h4>
											<ul>
											<?php
											 if(count($transactions) > 0)
											 {
											?>
											 <ul>
											<?php
											   $bookingsLength = count($bookings) > 4 ? 4 : count($bookings);
												 
											   for($i = 0; $i < $bookingsLength; $i++)
											   {
												   $t = $bookings[$i];
											      $item = $t['item'];
												  $iuu = url('receipt')."?xf=".$item['order_id'];
												  $a = $item['apartment'];
												  $avbh = "";
												  
												  if($a['avb'] == "booked" || $a['avb'] == "occupied" )
												  {
												    if($a['avb'] == "booked" )
												    {
													  $avbhClass = "info";
												    }
												    else if($a['avb'] == "occupied" )
												    {
													  $avbhClass = "success";
												    }
													
													$avbh = "<span class='badge badge-".$avbhClass."'>".strtoupper($a['avb'])."</span>";
												 
												  $cmedia = $a['cmedia'];
												  $imgs = $cmedia['images'];
											?>
												<li><img src="<?php echo e($imgs[0]); ?>" style="width: 80px; height: 80px;">
													<strong><?php echo e(ucwords($a['name'])); ?></strong>
														<?php echo $avbh; ?>

													<ul>
														<li>Order: #<?php echo e($item['order_id']); ?></li>
														<li>Date: <?php echo e($t['date']); ?></li>
													</ul>
													<div class="buttons-to-right">
														<a href="<?php echo e($iuu); ?>" target="_blank" class="button gray">View Receipt</a>
													</div>
												</li>

											<?php
											      }
											 }
                                            ?>											 
											</ul>
											<h4><center><a href="<?php echo e(url('my-bookings')); ?>" class="btn btn-theme">View more</a></center></h4>
											<?php
											 }
											 else
											 {
											?>
											<ul>
											<li>No bookings yet.</li>
											</ul>
											<?php
											 }
											?>
										</div>
									</div>
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list with-icons">
											<h4>Transaction History</h4>
											<?php
											 if(count($transactions) > 0)
											 {
											?>
											 <ul>
											<?php
											   $transactionsLength = count($transactions) > 4 ? 4 : count($transactions);
												 
											   for($i = 0; $i < $transactionsLength; $i++)
											   {
												   $t = $transactions[$i];
											      $item = $t['item'];
												  $tiu = url('receipt')."?xf=".$item['order_id'];
												  $a = $item['apartment'];

												  $cmedia = $a['cmedia'];
												  $imgs = $cmedia['images'];
											?>
												<li><img src="<?php echo e($imgs[0]); ?>" style="width: 80px; height: 80px;">
													<strong><?php echo e(ucwords($a['name'])); ?></strong>
													<ul>
														<li>Order: #<?php echo e($item['order_id']); ?></li>
														<li>Date: <?php echo e($t['date']); ?></li>
													</ul>
													<div class="buttons-to-right">
														<a href="<?php echo e($tiu); ?>" target="_blank" class="button gray">View Receipt</a>
													</div>
												</li>

											<?php
											 }
                                            ?>											 
											</ul>
											<h4><center><a href="<?php echo e(url('transactions')); ?>" class="btn btn-theme">View more</a></center></h4>
											<?php
											 }
											 else
											 {
											?>
											<ul>
											<li>No transactions yet.</li>
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
											<h4 style="">Total Revenue</h4>
											<div class="form-group">
											  <select class="form-control form-control-sm" id="host-total-revenue-month">
											    <option value="none">Select month</option>
												<?php
												 foreach($months as $m)
												 {
													 $mdd = new DateTime($m);
													$mm = ucwords($m);
													$ss = $month == $mm ? " selected='selected'" : "";
												?>
												 <option value="<?php echo e($mdd->format('m')); ?>"<?php echo e($ss); ?>><?php echo e($mm); ?></option>
												<?php
												 }
												?>
											  </select>
											  <input class="form-control" type="number" value="<?php echo e($year); ?>" id="host-total-revenue-year"/>
											  <center>
											    <a class="btn btn-theme btn-sm mt-2" id="host-total-revenue-btn">Submit</a>
												<img id="host-total-revenue-loading" alt="Loading.." src="<?php echo e(asset('img/loading.gif')); ?>">
											  </center>
											</div>
											  
											<?php
											 if(count($transactions) > 0)
											 {
											?>
											 <div id="host-transactions-bar"></div>
											<?php
											 }
											 else
											 {
											?>
											<ul>
											<li>No transactions yet.</li>
											</ul>
											<?php
											 }
											?>
										</div>
									</div>
									
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="dashboard-gravity-list with-icons">
											<h4>Best selling Apartments</h4>
											<div class="form-group">
											  <select class="form-control form-control-sm" id="host-best-selling-apartments-month">
											    <option value="none">Select month</option>
												<?php
												 foreach($months as $m)
												 {
													 $mdd = new DateTime($m);
													$mm = ucwords($m);
													$ss = $month == $mm ? " selected='selected'" : "";
												?>
												 <option value="<?php echo e($mdd->format('m')); ?>"<?php echo e($ss); ?>><?php echo e($mm); ?></option>
												<?php
												 }
												?>
											  </select>
											  <input class="form-control" type="number" value="<?php echo e($year); ?>" id="host-best-selling-apartments-year"/>
											  <center>
											    <a class="btn btn-theme btn-sm mt-2" id="host-best-selling-apartments-btn">Submit</a>
												<img id="host-best-selling-apartments-loading" alt="Loading.." src="<?php echo e(asset('img/loading.gif')); ?>">
											  </center>
											</div>
											  
											<?php
											 if(count($transactions) > 0)
											 {
											?>
											 <div id="host-best-selling-apartments-donut"></div>
											<?php
											 }
											 else
											 {
											?>
											<ul>
											<li>No transactions yet.</li>
											</ul>
											<?php
											 }
											?>
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/host-dashboard.blade.php ENDPATH**/ ?>