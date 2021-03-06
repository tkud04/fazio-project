

<?php $__env->startSection('title',"Welcome"); ?>

<?php $__env->startSection('scripts'); ?>

<script>
let landingSearchDT = {
				avb: "<?php echo e($def['avb']); ?>",
				city: "<?php echo e($def['city']); ?>",
				county: "<?php echo e($def['county']); ?>",
				category: "<?php echo e($def['category']); ?>",
				property_type: "<?php echo e($def['property_type']); ?>",
				rooms: "<?php echo e($def['rooms']); ?>",
				bedrooms: "<?php echo e($def['bedrooms']); ?>",
				bathrooms: "<?php echo e($def['bathrooms']); ?>",
				max_adults: "<?php echo e($def['max_adults']); ?>",
				max_children: "<?php echo e($def['max_children']); ?>",
				amount: "<?php echo e($def['amount']); ?>",
				children: "<?php echo e($def['children']); ?>",
				pets: "<?php echo e($def['pets']); ?>",
				facilities: [
				<?php
				  if(count($def['facilities']) > 0)
				  {
					 for($i = 0; $i < count($def['facilities']); $i++)
					 {
						 $f = $def['facilities'][$i];
						 $ss = $i != count($def['facilities']) - 1 ? "," : ""
				?>
				   "<?php echo e($f['facility']); ?>"<?php echo e($ss); ?>

				<?php
					 }
				  }
				?>
				],
				rating: "0"
			};

$(document).ready(() => {
 $('#landing-search-location').flexselect();
});

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('banner',['def' => $def,'banner' => $banner,'cities' => $cities], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<!-- ================= true Facts start ========================= -->
			<section class="facts">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-4 col-md-4">
							<div class="facts-wrap">
								<div class="facts-icon">
									<i class="theme-cl ti-location-pin"></i>
								</div>
								<div class="facts-detail">
									<h4>1,000+ Choice Apartments</h4>
									<p>With 5-star hospitality</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4">
							<div class="facts-wrap">
								<div class="facts-icon">
									<i class="theme-cl ti-shine"></i>
								</div>
								<div class="facts-detail">
									<h4>Home Away</h4>
									<p>A home away from home</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4">
							<div class="facts-wrap">
								<div class="facts-icon">
									<i class="theme-cl ti-face-smile"></i>
								</div>
								<div class="facts-detail">
									<h4>98% Happy Guests</h4>
									<p>We strive to serve you better</p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ================= End true Facts ========================= -->
			
			<?php echo $__env->make('special-search-filter',[], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
						<!-- ================= Apartments start ========================= -->
			<section class="min">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>Latest Postings</h2>
							</div>
						</div>
					</div>
					
					<div class="row">
						<?php
						 $popularApartmentss = [
						   
						 ];
						 
						 foreach($popularApartments as $pa)
						 {
							 $pt = [];
$adata = $pa['data'];
$terms = $pa['terms'];
$address = $pa['address'];
$cmedia = $pa['cmedia'];
$imgs = $cmedia['images'];

$pt['img'] = $imgs[0];
$pt['href'] = url('apartment')."?xf=".$pa['url'];
$pt['tc'] = $terms['max_adults'];
$county = strlen($address['county']) > 0 ? ", ".$address['county'] : "";
$pt['location'] = $address['address'].$county.", ".$address['city'];
$pt['stars'] = $pa['rating'];
$pt['amount'] = $adata['amount'];
$pt['name'] = $pa['name'];
						?>
						<!-- Single Tour Place -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="tour-simple-wrap">
								<div class="tour-simple-thumb">
									<a href="<?php echo e($pt['href']); ?>"><img src="<?php echo e($pt['img']); ?>" class="img-fluid img-responsive" alt="<?php echo e($pt['name']); ?>" style="width: 348px; height: 237px;"/></a>
								</div>
								<div class="tour-simple-caption">
									<div class="ts-caption-left">
										<h4 class="ts-title">
										 <a href="<?php echo e($pt['href']); ?>"><?php echo e($pt['name']); ?></a><br>
										 <a href="javascript:void(0)"><?php echo e($pt['location']); ?></a>
										</h4>
										<span><?php echo e($pt['tc']); ?> adults max.</span>
									</div>
									<div class="ts-caption-right">
										<div class="ts-caption-rating">
										   <?php for($i = 0; $i < $pt['stars']; $i++): ?>
											<i class="ti-star filled"></i>
										   <?php endfor; ?>
										   <?php for($i = 0; $i < 5 - $pt['stars']; $i++): ?>
											<i class="ti-star"></i>
										   <?php endfor; ?>
										</div>
										<h5 class="ts-price">&#0163;<?php echo e(number_format($pt['amount'],2)); ?></h5>
									</div>
								</div>
							</div>
						</div>
						<?php
						 }
						?>
						
						
					</div>
				
				</div>
			</section>
			<!-- ========================= End Apartment Section ============================ -->
			
			
			<!-- ================= Featured Apartments start ========================= -->
			<section class="gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>Featured</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="owl-carousel owl-theme" id="lists-slide">
								
								<?php
								$fa = [
								  
								];
								
								 foreach($fa as $f)
								 {
									$description = $f['likes']." users like this apartment and think it's amazing. If you happen to be around ".$f['location']." anytime you should visit this apartment!";
								?>
								<div class="single-item">
									<div class="destination-item">
										<span class="discount-off">
										  <i class="fa fa-star"></i><?php echo e($f['rating']); ?>

										</span>
										<figure class="destination-list-wrap">
											<a class="destination-listlink" href="javascript:void(0)">
												<img class="cover" src="<?php echo e($f['img']); ?>" alt="<?php echo e($f['name']); ?>">
											</a>
										</figure>
										<div class="destination-listdetails">
											<span class="destination-list-cat theme-bg"><?php echo e($f['name']); ?></span>
											<h4 class="title"><a class="title-ln" href="javascript:void(0)"><?php echo e($f['location']); ?></a></h4>
											<p><?php echo e($description); ?></p>
										</div>
									</div>
								</div>
								<?php
								 }
								?>
								
							
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ========================= End Featured Apartments Section ============================ -->
			

      <?php echo $__env->make('recent-blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('newsletter-cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\fazio-project\resources\views/index.blade.php ENDPATH**/ ?>