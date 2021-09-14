<?php
$title = "Active Bookings";
$subtitle = "List of all apartments that are currently occupied or booked for later";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- ============================ Active Bookings Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						
						<?php echo $__env->make('host-dashboard-sidebar',['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								<div class="dashboard-gravity-list mt-0">
									<h4>Active Bookings</h4>
											<?php
											 if(count($bookings) > 0)
											 {
											?>
											 <ul>
											<?php
											   $bookingsLength = count($bookings) > 4 ? 4 : count($bookings);
												 
											   for($i = 0; $i < $bookingsLength; $i++)
											   {
												   $t = $bookings[$i];
											      $item = $t['item'];
												  $iu = url('receipt')."?xf=".$item['order_id'];
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
												<li>
												 <div class="row ml-3">
												   <div class="col-md-7">
												   <img src="<?php echo e($imgs[0]); ?>" style="width: 80px; height: 80px;">
													<strong><?php echo e(ucwords($a['name'])); ?></strong>
														<?php echo $avbh; ?>

													<ul class="mt-1">
														<li>Order: #<?php echo e($item['order_id']); ?></li>
														<li>Date: <?php echo e($t['date']); ?></li>
													</ul>
												   </div>
												   <div class="col-md-5" style="border-left: 1px solid #ddd;">
												   <p class="badge badge-primary mt-3" style="font-size: 1.2em;">Actions</p>
												   <div>
												     <p>Receipt: <a href="<?php echo e($iu); ?>" target="_blank" class="button gray">View Receipt</a></p>
												     <p>
													   Message guest: 
													   <a data-toggle="modal" data-target="#booking-send-message" onclick="addXF({xf: '<?php echo e($item['id']); ?>',a: '<?php echo e($a['name']); ?>',type:'booking-send-message',gh:'h'})" class="button gray"><i class="ti-email"></i></a>
													 </p>
												     <p>Checkout guest: <a href="javascript:void(0)" onclick="ccu({dh:'<?php echo e($item['id']); ?>'})" class="button gray">Checkout</a></p>
												   </div>
												   </div>
												 </div>
												
												</li>

											<?php
											      }
											 }
                                            ?>											 
											</ul>
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
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Active Bookings End ================================== -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/my-bookings.blade.php ENDPATH**/ ?>