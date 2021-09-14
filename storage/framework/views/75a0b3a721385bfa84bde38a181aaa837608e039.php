<?php
$title = "Reset Password";
$subtitle = "Reset your password here";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- ============================ Reset Password Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="dashboard-wraper">
							
								<!-- Basic Information -->
								<div class="form-submit">	
									<h4>Reset your password:</h4>
									<div class="submit-section">
									    <input type="hidden" id="acsrf" value="<?php echo e($uu->id); ?>"/>
									    <input type="hidden" id="tk-rp" value="<?php echo e(csrf_token()); ?>"/>
										
										<div class="form-row">
		                                     									
											<div class="form-group col-md-12">
												<label>New password</label>
												<input type="password" class="form-control" id="rp-pass" placeholder="New password">
												<span class="text-danger text-bold input-error" id="rp-pass-error">This field is required</span>
											</div>
											<div class="form-group col-md-12">
												<label>Confirm password</label>
												<input type="password" class="form-control" id="rp-pass2" placeholder="Confirm password">
												<span class="text-danger text-bold input-error" id="rp-pass2-error">This field is required and passwords must match</span>
											</div>
											<div class="form-group col-md-12">
											  <button class="btn btn-theme" id="rp-submit">Submit</button>
											  <h4 class="text-primary" id="rp-loading">Processing your request.. <img alt="Loading.." src="<?php echo e(asset('img/loading.gif')); ?>"></h4>
										      <h4 class="text-primary" id="rp-finish"><b>Password reset!</b><p class='text-primary'>You can now <a href="#" data-toggle="modal" data-target="#login">sign in</a>.</p></h4>
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/reset.blade.php ENDPATH**/ ?>