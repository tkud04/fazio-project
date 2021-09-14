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
										<li><a href="<?php echo e(url('profile')); ?>"><i class="ti-user"></i>My Profile</a></li>
										<li><a href="<?php echo e(url('bookings')); ?>"><i class="ti-credit-card"></i>My Bookings</a></li>
										<li><a href="<?php echo e(url('saved-apartments')); ?>"><i class="ti-heart"></i>Saved Apartments</a></li>
										<li><a href="<?php echo e(url('apartment-preferences')); ?>"><i class="ti-home"></i>Apartment Preferences</a></li>
										<li><a href="<?php echo e(url('change-password')); ?>"><i class="ti-unlock"></i>Change Password</a></li>
										<li><a href="<?php echo e(url('logout')); ?>"><i class="ti-power-off"></i>Log Out</a></li>
									</ul>
								</div>
								
							</div>
						</div><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/guest-dashboard-sidebar.blade.php ENDPATH**/ ?>