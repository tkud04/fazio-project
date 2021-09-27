		    <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
			<div class="topbar-head">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="topbar-wrap">
								
								<div class="topbar-left">
									<ul class="tp-list">
										<li><a href="javascript:void(0)"><i class="ti-facebook"></i></a></li>
										<li><a href="javascript:void(0)"><i class="ti-twitter"></i></a></li>
										<li><a href="javascript:void(0)"><i class="ti-instagram"></i></a></li>
									</ul>
									<ul class="tp-list ml-2 nbr">
										<li><a href="javascript:void(0)">support@myproject.co.uk</a></li>
									</ul>
								</div>
								
								<div class="topbar-right">
									<ul class="tp-list">
										<li><a href="javascript:void(0)">07911 123456</a></li>
									</ul class="tp-list">
									<ul class="tp-list ml-2">
									   <?php if(isset($user) && $user != null): ?>
										   <li><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
									   <?php else: ?>
										<li><a href="javascript:void(0)" data-toggle="modal" data-target="#login">Login</a></li>
										<li><a href="javascript:void(0)" data-toggle="modal" data-target="#signup">Sign Up</a></li>
									   <?php endif; ?>
									</ul>
									<ul class="tp-list nbr ml-2">
										<li class="dropdown dropdown-currency hidden-xs hidden-sm">
											<a href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">GBP<i class="ml-1 fa fa-angle-down"></i></a>
											<?php
											 $currencies = ['usd' => "USD",'gbp' => "GBP",'eur' => "EUR",'ngn' => "NGN"];
											?>
											<ul class="dropdown-menu mlix-wrap">
											    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												  <li><a href="javascript:void(0)" onclick="setCurrency('<?php echo e($key); ?>')"><?php echo e($value); ?></a>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</ul>
										</li>
									</ul>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div><?php /**PATH C:\bkupp\lokl\repo\fazio-project\resources\views/top-header.blade.php ENDPATH**/ ?>