<?php
$void = "javascript:void(0)";
?>
<div class="col-lg-3 col-md-4 col-sm-12">
							<div class="dashboard-navbar">
								
								<div class="d-user-avater">
									<img src="<?php echo e(asset('img/user-2.jpg')); ?>" class="img-fluid avater" alt="">
									<h4><?php echo e($user->fname." ".$user->lname); ?></h4>
									<span><?php echo e(strtoupper($user->role)); ?></span>
								</div>
								
								<div class="d-navigation">
									<ul>
										<li class="active"><a href="<?php echo e(url('dashboard')); ?>"><i class="ti-dashboard"></i>Dashboard</a></li>
										<li><a href="<?php echo e(url('add-apartment')); ?>"><i class="ti-home"></i>Post a Property</a></li>
										<li><a href="<?php echo e(url('my-apartments')); ?>"><i class="ti-home"></i>My Listings</a></li>
										<li><a href="<?php echo e($void); ?>"><i class="ti-home"></i>Callback Requests</a></li>
										<li><a href="<?php echo e($void); ?>"><i class="ti-home"></i>Client Requests</a></li>
										<li><a href="<?php echo e(url('my-subscriptions')); ?>"><i class="ti-home"></i>Subscriptions</a></li>
										<li><a href="<?php echo e(url('profile')); ?>"><i class="ti-user"></i>Profile</a></li>
										<li><a href="<?php echo e(url('logout')); ?>"><i class="ti-power-off"></i>Sign Out</a></li>
									</ul>
								</div>
								
							</div>
						</div><?php /**PATH C:\bkupp\lokl\repo\fazio-project\resources\views/host-dashboard-sidebar.blade.php ENDPATH**/ ?>