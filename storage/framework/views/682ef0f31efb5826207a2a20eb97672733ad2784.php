<?php
$title = "Search Results";
$subtitle = count($results)." results found";

?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
 let page = 0, perPage = 8, apartments = [], viewType = "grid", apartmentsLength = 0;
 
  <?php
		   foreach($results as $a)
		   {
			   $terms = $a['terms'];
			   $facilities = $a['facilities'];
$adata = $a['data'];
$address = $a['address'];
$cmedia = $a['cmedia'];
$imgs = $cmedia['images'];
$video = $cmedia['video'];

$img = $imgs[0];
$uu = url('apartment')."?xf=".$a['url'];
$lu = url('like')."?xf=".$a['url'];
$bu = url('bookmark')."?xf=".$a['url'];
$tc = $terms['max_adults'];
$location = ucwords($address['city'].", ".$address['state']);
$stars = $a['rating'];
$amount = $adata['amount'];
$description = $adata['description'];
$rr = count($results) == 1 ? "Result" : "Results";
	?>
		  
		  temp = {
			   apartment_id: "<?php echo e($a['apartment_id']); ?>",
			   name: "<?php echo e($a['name']); ?>",
			   uu: "<?php echo e($uu); ?>",
			   lu: "<?php echo e($lu); ?>",
			   bu: "<?php echo e($bu); ?>",
			   location: "<?php echo e($location); ?>",
			   description: `<?php echo $description; ?>`,
			   stars: "<?php echo e($stars); ?>",
			   facilities: "<?php echo e(json_encode($facilities,JSON_HEX_APOS|JSON_HEX_QUOT)); ?>".replace(/&quot;/g, '\"'),
			   reviews: "<?php echo e(count($a['reviews'])); ?>",
			   amount: "<?php echo e(number_format($amount,2)); ?>",
			   img: "<?php echo e($img); ?>",
			   status: "<?php echo e($a['status']); ?>",
		   };
		   apartments.push(temp);
	<?php
		   }	
	?>
 
 
  $(document).ready(() => {
	  $('#apartments-loading').hide();
	  //console.log("apartments: ",apartments);
      apartmentsLength = apartments.length;
      showPage(1);
  });
</script>
<!-- =================== Sidebar Search ==================== -->
			<section class="gray">
				<div class="container">
					<div class="row">
						<?php echo $__env->make('guest-apt-sidebar',['apf' => $def], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							
						<div class="order-1 content-area col-lg-8 col-md-12 order-md-1 order-lg-2">
							<div class="row">
							
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="shorting-wrap">
										<h5 class="shorting-title"><?php echo e(count($results)); ?> <?php echo e($rr); ?></h5>
										<div class="shorting-right">
											<label>Sort By:</label>
											<div class="dropdown show">
												<a class="btn btn-filter dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="selection">Ratings</span>
												</a>
												<div class="drp-select dropdown-menu">
													<a class="dropdown-item" href="javascript:void(0);">Ratings</a>
													<a class="dropdown-item" href="javascript:void(0);">Views</a>
													<a class="dropdown-item" href="javascript:void(0);">Newest</a>
												</div>
											</div>
										</div>
										<div class="shorting-right" style="margin-left: 20px;">
											<label>View:</label>
											<div class="dropdown show">
												<a class="btn btn-filter dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="selection">Grid</span>
												</a>
												<div class="drp-select dropdown-menu">
													<a class="dropdown-item" href="javascript:void(0);" onclick="aptShowGrid()">Grid</a>
													<a class="dropdown-item" href="javascript:void(0);" onclick="aptShowList()">List</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							
							<div class="row m-0" id="apartments">
								
							</div>
							
							<div class="row m-0">

								<div class="col-md-12 col-sm-12 mt-3" id="apartments-submit">
									<div class="text-center">
									  <a class="btn btn-theme" onclick="showPreviousPage();">Previous</a>
									  <?php
						               $pages = (count($results) < 9) ? 1 : ceil(count($results) / 9);
					                   for($i = 0; $i < $pages; $i++)
						                {
					                  ?>
									  <a class="btn btn-info" onclick="showPage(<?php echo e($i+1); ?>);"><?php echo e($i+1); ?></a>
									   <?php
						                }
						               ?>
									  <a class="btn btn-theme" onclick="showNextPage();">Next</a>
									</div>
								</div>	
								<div class="col-md-12 col-sm-12 mt-3" id="apartments-loading">
									<div class="text-center">
										
										<div class="spinner-grow text-danger" role="status">
										  <span class="sr-only">Loading...</span>
										</div>
										<div class="spinner-grow text-warning" role="status">
										  <span class="sr-only">Loading...</span>
										</div>
										<div class="spinner-grow text-success" role="status">
										  <span class="sr-only">Loading...</span>
										</div>
										
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- =================== Sidebar Search ==================== -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/search-results.blade.php ENDPATH**/ ?>