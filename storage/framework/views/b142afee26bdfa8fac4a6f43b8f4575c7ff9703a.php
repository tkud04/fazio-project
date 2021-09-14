<?php
$title = "Profile";
$subtitle = "Edit your account information";
 $img = $u['avatar'];
 if(is_array($img)) $img = $img[0];
 if($img == "") $img = asset("img/avatar.png");
 
 $sb = $user->mode."-dashboard-sidebar";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- ============================ Profile Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
					<?php echo $__env->make($sb,['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wraper">
							<form method="post" id="profile-form" action="<?php echo e(url('profile')); ?>" enctype="multipart/form-data">
							    <?php echo csrf_field(); ?>

								<!-- Basic Information -->
								<div class="form-submit">	
									<h4>Account Information</h4>
									<div class="submit-section">
										<div class="form-row">
										    
											<div class="form-group col-md-6">
											         <label>First Name</label>
												      <input type="text" name="fname" class="form-control" value="<?php echo e($u['fname']); ?>">
											</div>
											<div class="form-group col-md-6">
											         <label>Last Name</label>
												      <input type="text" name="lname" class="form-control" value="<?php echo e($u['lname']); ?>">
											</div>
											
											<div class="form-group col-md-6">
												<label>Email</label>
												<input type="email" name="email" class="form-control" value="<?php echo e($u['email']); ?>" readonly>
											</div>
											
											
											<div class="form-group col-md-6">
												<label>Phone</label>
												<input type="text" name="phone" class="form-control" value="<?php echo e($u['phone']); ?>">
											</div>
											
											<div class="form-group col-md-12">
												<label>Avatar</label>
												<div class="row">
												 <div class="col-lg-4 col-md-4 col-sm-12" id="profile-avatar-current-img">
												    <div>
												      <img src="<?php echo e($img); ?>" alt="preview" style="width: 100px; height: 100px;"/>	
                                                      </div>
												    <div style="margin-top: 10px;" id="profile-avatar-submit">
													  
													   <a href="<?php echo e(url('delete-avatar')); ?>" class="btn btn-warning btn-sm">Remove</a>
												    </div>
													
												  </div>
												  
												</div>
											</div><br>
											<div class="form-group col-md-12">
												<label>Upload new avatar</label>
												<div id="profile-avatar-image-div-0" class="row">
												  <div class="col-md-7">
												    <input type="file" class="form-control" onchange="readURL(this,{id: 'profile-avatar',ctr: '0'})" id="profile-avatar-image-0" name="profile-avatar">												    
												  </div>
												  <div class="col-md-5">
												    <img id="profile-avatar-preview-0" src="#" alt="preview" style="width: 50px; height: 50px;"/>
												   </div>
												</div>
											</div>
											<div class="form-group">
											    <ol class="form-control-plaintext">
												  <li>Recommended dimensions: Your images should not exceed <b>300x300</b></li>
												  <li>Maximum file size: Your images must not be more than <b>500kB</b></li>
												</ol>
											</div>
											
										
											
										</div>
									</div>
								</div>
								
								<div class="form-submit">	
									
											
											<div class="form-group col-lg-12 col-md-12">
												<button class="btn btn-theme" type="submit">Save Changes</button>
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
			<!-- ============================ Profile End ================================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/profile.blade.php ENDPATH**/ ?>