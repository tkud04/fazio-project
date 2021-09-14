<?php
$title = "Dashboard";
$subtitle = "Welcome to your dashboard";
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
						
						<?php echo $__env->make('dashboard-sidebar',['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
							
								<!-- Row -->
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="dashboard-stat widget-1">
											<div class="dashboard-stat-content"><h4>6</h4> <span>Total Booking</span></div>
											<div class="dashboard-stat-icon"><i class="ti-location-pin"></i></div>
										</div>	
									</div>
									
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="dashboard-stat widget-2">
											<div class="dashboard-stat-content"><h4>7201</h4> <span>Upcoming Booking</span></div>
											<div class="dashboard-stat-icon"><i class="ti-pie-chart"></i></div>
										</div>	
									</div>
									
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="dashboard-stat widget-4">
											<div class="dashboard-stat-content"><h4>514</h4> <span>Main Balance</span></div>
											<div class="dashboard-stat-icon"><i class="ti-bookmark"></i></div>
										</div>	
									</div>
								</div>
								
								<!-- Row -->
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list with-icons">
											<h4>Recent Activities</h4>
											<ul>
												<li>
													<i class="dash-icon-box ti-layers"></i> Your booking <strong><a href="#">Shimla to Goa</a></strong> has been done!
													<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>

												<li>
													<i class="dash-icon-box ti-star"></i> Jodie Farrell left a review <div class="numerical-rating high" data-rating="5.0"></div> on <strong><a href="#">Burger Villa</a></strong>
													<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>

												<li>
													<i class="dash-icon-box ti-heart"></i> your payment is pending for <strong><a href="#">Manali Trip</a></strong> tour!
													<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>

												<li>
													<i class="dash-icon-box ti-star"></i> You have calceled <a href="#">Mumbai Trip</a> approved</strong>
													<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>

												<li>
													<i class="dash-icon-box ti-heart"></i> Someone reply on your comment on <strong><a href="#">London Trip</a></strong> Tour!
													<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>

												<li>
													<i class="dash-icon-box ti-star"></i> You have give a review <div class="numerical-rating high" data-rating="4.7"></div> on <strong><a href="#">Preet House</a></strong>
													<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>

												<li>
													<i class="dash-icon-box ti-star"></i>You have give a review <div class="numerical-rating low" data-rating="2.8"></div> on <strong><a href="#">Shimla Trou Trip</a></strong>
													<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
												</li>
											</ul>
										</div>
									</div>
									
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list invoices with-icons">
											<h4>Invoices</h4>
											<ul>
												
												<li><i class="dash-icon-box ti-files"></i>
													<strong>Starter Plan</strong>
													<ul>
														<li class="unpaid">Unpaid</li>
														<li>Order: #20551</li>
														<li>Date: 01/08/2019</li>
													</ul>
													<div class="buttons-to-right">
														<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
													</div>
												</li>
												
												<li><i class="dash-icon-box ti-files"></i>
													<strong>Basic Plan</strong>
													<ul>
														<li class="paid">Paid</li>
														<li>Order: #20550</li>
														<li>Date: 01/07/2019</li>
													</ul>
													<div class="buttons-to-right">
														<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
													</div>
												</li>

												<li><i class="dash-icon-box ti-files"></i>
													<strong>Extended Plan</strong>
													<ul>
														<li class="paid">Paid</li>
														<li>Order: #20549</li>
														<li>Date: 01/06/2019</li>
													</ul>
													<div class="buttons-to-right">
														<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
													</div>
												</li>
												
												<li><i class="dash-icon-box ti-files"></i>
													<strong>Platinum Plan</strong>
													<ul>
														<li class="paid">Paid</li>
														<li>Order: #20548</li>
														<li>Date: 01/05/2019</li>
													</ul>
													<div class="buttons-to-right">
														<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
													</div>
												</li>
												
												<li><i class="dash-icon-box ti-files"></i>
													<strong>Extended Plan</strong>
													<ul>
														<li class="paid">Paid</li>
														<li>Order: #20547</li>
														<li>Date: 01/04/2019</li>
													</ul>
													<div class="buttons-to-right">
														<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
													</div>
												</li>
												
												<li><i class="dash-icon-box ti-files"></i>
													<strong>Platinum Plan</strong>
													<ul>
														<li class="paid">Paid</li>
														<li>Order: #20546</li>
														<li>Date: 01/03/2019</li>
													</ul>
													<div class="buttons-to-right">
														<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
													</div>
												</li>

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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/dashboard.blade.php ENDPATH**/ ?>