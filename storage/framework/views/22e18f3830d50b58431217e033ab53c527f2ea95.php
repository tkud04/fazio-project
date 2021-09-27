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
							<img src="img/big-ben.jpg" class="img-fluid" alt="About Us" />
						</div>

						<div class="col-lg-6 col-md-6">
							<div class="story-wrap explore-content">
								
								<span class="ipn-subtitle">Who We Are & What We Do</span>
								<h2>About Us</h2>
								<p>My Project provides a robust platform to serve as a meeting place for two categories of people, the <b>Host</b> and the <b>International Student</b>. The platform allows for hosts to list their apartments and students to make decisions based on the apartment listings.</p>
								<br>
								<h2>How it works</h2>
								<h3>Students</h3>
								<ol>
								 <li>Use our built-in customizable search tool to find postings of your choice.</li>
								 <li>Pick apartments based on previous reviews and your particular taste.</li>
								 <li>Chat up the host via secure messaging to agree whether to deal or not to deal.</li>
								 <li>Make payment via card.</li>
								</ol>
								<h3>Hosts</h3>
								<ol>
								 <li>Use our built-in customizable search tool to find apartments of your choice.</li>
								 <li>Post apartments you want to put up for rent to foreign students</li>
								 <li>Students chat you up via secure messaging to agree whether to deal or not to deal.</li>
								 <li>Receive payment via bank.</li>
								</ol>
								<br>
								<span class="ipn-subtitle">What We Aim For</span>
								<h2>Our Mission</h2>
								<p>The core mission of My Project is to develop an apartment rental platform for international students to rent an apartment for their stay in the UK. .</p>
								<p>It also allows hosts to put up apartments or hostels for rent to students. The platform will focus solely on international students and will be designed with ease of use and hassle free transactions in mind.</p>
								
							</div>
						</div>
						
					</div>
					<!-- /row -->					
					
				</div>
						
			</section>
			<!-- ============================ Our Story End ================================== -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\fazio-project\resources\views/about.blade.php ENDPATH**/ ?>