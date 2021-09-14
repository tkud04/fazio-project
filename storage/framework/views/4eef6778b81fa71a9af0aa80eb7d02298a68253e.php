<?php
$title = "Contact Us";
$subtitle = "We'd like to hear from you";
?>


<?php $__env->startSection('title',"Contact Us"); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Who We Are Start ================================== -->
			<section>
				<div class="container">
				
					<div class="row mb-4">
						
						<div class="col-lg-12 col-md-12">
							<div class="contact-box">
								<i class="ti-map-alt"></i>
								<h4>Head Office</h4>
								Abuja,<br>
								Nigeria
							</div>
						</div>
						
						<?php
								$contacts = [
								  ['tag' => "admin",'name' => "Olajide Tayo",'designation' => "Administrative/IT",'phone' => "08057318627", 'email' => "tayo.olajide@etuk.ng"],
								  ['tag' => "marketing",'name' => "Paul Adejoh",'designation' => "Sales & Marketing",'phone' => "07019982345", 'email' => "adejoh.paul@etuk.ng"],
								  ['tag' => "pro",'name' => "Oje Adesola",'designation' => "Customer & Communications Officer",'phone' => "08168923876", 'email' => "adesola.oje@etuk.ng"],
								];
								
								foreach($contacts as $ct)
								{
								?>
						    <div class="col-lg-4 col-md-4">
							<div class="contact-box">
								
								
								<h4><?php echo e($ct['designation']); ?></h4>
								<?php echo e($ct['name']); ?><br>
								<i class="ti-email"></i> <a style="margin-bottom: 10px;" href="mailto:<?php echo e($ct['email']); ?>"><?php echo e($ct['email']); ?></a><br>
								<i class="ti-headphone"></i> <a style="margin-bottom: 10px;" href="tel:<?php echo e($ct['phone']); ?>"><?php echo e($ct['phone']); ?></a>
							</div>
						</div>
						  <?php
								}
						  ?>
						
						
					</div>
					
					<div class="row mt-5 row align-items-center">
						
						<div class="col-lg-5 col-md-5">
							<img src="assets/img/about.png" class="img-fluid" alt="" />
						</div>
						<div class="col-lg-7 col-md-7">
							<div class="contact-form">
								<form method="post" id="contact-form">
									<div class="row">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
											  <label>Name</label>
											  <input type="text" id="contact-name" name="name" class="form-control" placeholder="Your name">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
											  <label>Email</label>
											  <input type="email" id="contact-em" name="email" class="form-control" placeholder="Email">
											</div>
										</div>
									</div>
									
									<div class="row">
									    <div class="col-lg-6 col-md-6">
											<div class="form-group">
											  <label>Department</label>
											  <select id="contact-dept" name="dept" class="form-control">
											    <option value="none">Select department</option>
												<?php
												 foreach($contacts as $c)
												 {
												?>
												 <option value="<?php echo e($c['tag']); ?>"><?php echo e($c['designation']); ?></option>
												<?php
												 }
												?>
											  </select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Subject</label>
												<input type="text" id="contact-subject" name="subject" class="form-control" placeholder="Subject">
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<label>Message</label>
												<textarea id="contact-msg" name="msg" class="form-control" placeholder="Type Here..."></textarea>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-12 col-md-12">
											<button type="submit" id="contact-btn" class="btn btn-primary">Send Request</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						
					</div>
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ Who We Are End ================================== -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/contact.blade.php ENDPATH**/ ?>