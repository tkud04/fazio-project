<?php
$title = "Plans";
$subtitle = "Our subscription plans";
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle,'banner' => $banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="gray">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<p>Need more postings?</p>
								<h2>Choose a Plan</h2>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="owl-carousel owl-theme owl-loaded owl-drag" id="lists-slide">								
							
							<div class="owl-stage-outer">
							<div class="owl-stage" style="transition: all 0.25s ease 0s; width: 4364px; transform: translate3d(-2380px, 0px, 0px);">
							<?php
							 if(count($plans) > 0)
							 {
							  for($i = 0; $i < count($plans); $i++)
							  {
                                $p = $plans[$i];								  
								$img = asset("img/randoms/sub-".$i.".jpg");
							?>
							<div class="owl-item cloned" style="width: 376.667px; margin-right: 20px;">
							   <div class="single-item">
									<div class="destination-discount">
										<div class="destination-discount-thumb">
											<a href="javascript:void(0)"><img src="<?php echo e($img); ?>" class="img-responsive" alt=""></a>
										</div>
										<div class="destination-discount-caption">
											<div class="discount-box">
												<h4 class="discount-title"><?php echo e(ucwords($p['name'])); ?></h4>
											</div>
											<h4 class="destination-title">
											  	<?php echo $p['description']; ?>

											</h4>
											
											<h5 class="destination-price theme-cl"><span>From</span>&#8358;<?php echo e(number_format($p['amount'],2)); ?></h5>
											<a href="<?php echo e(url('add-apartment')); ?>" class="check-btn">Subscribe<i class="ti-arrow-right"></i></a>
										</div>
									</div>
								</div>
						     </div>
							 <?php
							 }
							 }
							 ?>
								
								</div>
								</div>
								<div class="owl-nav disabled">
								  <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button>
								  <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
								</div>
								<div class="owl-dots">
								
								</div>
								
								</div>
						</div>
					</div>
					
				</div>
			</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/plans.blade.php ENDPATH**/ ?>