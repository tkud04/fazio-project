<div class="col-lg-3 col-md-4 col-sm-12">
							<div class="dashboard-navbar">
								
								<div class="d-user-avater">
									<img src="<?php echo e(asset('img/user-2.jpg')); ?>" class="img-fluid avater" alt="">
									<h4><?php echo e($user->fname." ".$user->lname); ?></h4>
									<span><?php echo e(strtoupper($user->role)); ?></span>
								</div>
								
								<div class="d-navigation">
									<ul>
										<li class="active"><a href="dashboard.html"><i class="ti-dashboard"></i>Dashboard</a></li>
										<li><a href="<?php echo e(url('profile')); ?>"><i class="ti-user"></i>My Profile</a></li>
										<li><a href="<?php echo e(url('history')); ?>"><i class="ti-layers"></i>Transaction History</a></li>
										<li><a href="<?php echo e(url('saved-items')); ?>"><i class="ti-heart"></i>Saved Items</a></li>
										<li><a href="<?php echo e(url('change-password')); ?>"><i class="ti-unlock"></i>Change Password</a></li>
										<li><a href="<?php echo e(url('logout')); ?>"><i class="ti-power-off"></i>Log Out</a></li>
									</ul>
								</div>
								
							</div>
						</div><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/dashboard-sidebar.blade.php ENDPATH**/ ?>