<?php
$title = "Forgot Password";
$subtitle = "Lost your password? Reset it here";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- ============================ Forgot Password Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="dashboard-wraper">
							
								<!-- Basic Information -->
								<div class="form-submit">	
									<h4>Reset your password:</h4>
									<div class="submit-section">
										<div class="form-row">
											
											<div class="form-group col-md-12">
												<label>Email</label>
												<input type="email" class="form-control" id="fp-email" placeholder="Your email address">
												<span class="text-danger text-bold input-error" id="fp-id-error">This field is required</span>
											</div>
											<div class="form-group col-md-12">
											  <button class="btn btn-theme" id="fp-submit">Submit</button>
											  <h4 class="text-primary" id="fp-loading">Processing your request.. <img alt="Loading.." src="<?php echo e(asset('img/loading.gif')); ?>"></h4>
										      <h4 class="text-primary" id="fp-finish"><b>Request received!</b><p class='text-primary'>Please check your email for your password reset link.</p></h4>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Forgot Password End ================================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/forgot-password.blade.php ENDPATH**/ ?>