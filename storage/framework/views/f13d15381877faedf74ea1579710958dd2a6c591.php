	<!-- ============================ Newsletter Start ================================== -->
			<section class="alert-wrap pt-5 pb-5" style="background:#be831d url(<?php echo e(asset('img/bg-new.png')); ?>);">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="jobalert-sec">
								<h3 class="mb-1 text-light">Subscribe Now</h3>
								<p class="text-light">Subscribe to our newsletter and other promotional materials.</p>
							</div>
						</div>
						
						<div class="col-lg-6 col-md-6">
						<form method="post" action="<?php echo e(url('subscribe')); ?>" id="newsletter-form">
							<?php echo csrf_field(); ?>

							<div class="input-group">
							  <input type="text" id="newsletter-em" name="em" class="form-control" placeholder="Enter Your Email">
							  <div class="input-group-append">
								<button type="button" id="newsletter-btn" class="btn btn-black black">Subscribe</button>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Newsletter End ================================== -->			
<?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/newsletter-cta.blade.php ENDPATH**/ ?>