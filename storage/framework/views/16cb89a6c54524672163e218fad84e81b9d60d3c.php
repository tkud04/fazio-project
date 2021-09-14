<?php
$title = "Set Password";
$subtitle = "Set your account password here";
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
							 <form method="post" action="oauth-sp" id="osp-form">
							 <?php echo csrf_field(); ?>

							 <input type="hidden" name="acsrf" value="<?php echo e($xf); ?>"/>
								<!-- Basic Information -->
								<div class="form-submit">	
									<h4>Set your account password</h4>
									<div class="submit-section">
										<div class="form-row">
											
											<div class="form-group col-md-12">
												<label>New password</label>
												<input type="password" class="form-control" id="osp-pass" name="pass" placeholder="Your new password">
												<span class="text-danger text-bold input-error" id="osp-pass-error">This field is required</span>
											</div>
											<div class="form-group col-md-12">
												<label>Confirm password</label>
												<input type="password" class="form-control" id="osp-pass2" name="pass_confirmation" placeholder="Confirm your new password">
												<span class="text-danger text-bold input-error" id="osp-pass2-error">This field is required and passwords must match</span>
											</div>
											<div class="form-group col-md-12">
											  <button class="btn btn-theme" id="osp-submit">Submit</button>											 
											</div>
										</div>
									</div>
								</div>
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Forgot Password End ================================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/oauth-sp.blade.php ENDPATH**/ ?>