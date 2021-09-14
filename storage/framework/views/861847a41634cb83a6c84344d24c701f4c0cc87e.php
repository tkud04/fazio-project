<?php
$title = "Payment Successful";
$subtitle = "Your payment was sucessful!";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
$(document).ready(() => {
	setTimeout(() => {
		window.location = "<?php echo e(url('bookings')); ?>";
	},4000);
});
</script>
<!-- ============================ CPS Start ================================== -->
			<section>
				<div class="container">
				
					
					<div class="row align-items-center">

						<div class="col-lg-12 col-md-12">
							<div class="row">
							  <div class="col-lg-12 col-md-12">
							   <h3>Your Payment was Successful. Have a lovely stay in your apartment!</h3><br>
							   <h4>Redirecting in a few seconds..</h4><br>
							  </div><br>
                              
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ Checkout End ================================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/cps.blade.php ENDPATH**/ ?>