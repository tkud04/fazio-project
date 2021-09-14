<?php
$title = "About Us";
$subtitle = "Who we are & What we strive for";
?>


<?php $__env->startSection('title',"About Us"); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle,'banner' => $banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- ============================ Our Story Start ================================== -->
			<section>
			
				<div class="container">
				
					<!-- row Start -->
					<div class="row align-items-center">

						<div class="col-lg-6 col-md-6">
							<img src="https://res.cloudinary.com/etuk-ng/image/upload/v1585236664/uploads/phpJo05FC_cddvc6" class="img-fluid" alt="About Us" />
						</div>

						<div class="col-lg-6 col-md-6">
							<div class="story-wrap explore-content">
								
								<span class="ipn-subtitle">Who We Are & What We Do</span>
								<h2>About Us</h2>
								<p>Etuk NG provides a robust platform to serve as a meeting place for two categories of people, the <b>Host</b> and the <b>Guest</b>. The platform allows for hosts to list their apartments and guests to make decisions based on the apartment listings.</p>
								<br>
								<h2>How it works</h2>
								<h3>Guests</h3>
								<ol>
								 <li>Use our built-in customizable search tool to find apartments of your choice.</li>
								 <li>Pick apartments based on previous reviews and your particular taste.</li>
								 <li>Chat up the host via secure messaging to agree whether to deal or not to deal.</li>
								 <li>Make payment via card.</li>
								</ol>
								<h3>Hosts</h3>
								<ol>
								 <li>Use our built-in customizable search tool to find apartments of your choice.</li>
								 <li>Pick apartments based on previous reviews and your particular taste.</li>
								 <li>Chat up the host via secure messaging to agree whether to deal or not to deal.</li>
								 <li>Make payment via card.</li>
								</ol>
								<br>
								<span class="ipn-subtitle">What We Aim For</span>
								<h2>Our Mission</h2>
								<p>The core mission of Etuk NG is to transform Africa’s travel and influence tourism sector using digital technology to connect millions of guests with private and semi-public apartments.</p>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
								
							</div>
						</div>
						
					</div>
					<!-- /row -->					
					
				</div>
						
			</section>
			<!-- ============================ Our Story End ================================== -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/about.blade.php ENDPATH**/ ?>