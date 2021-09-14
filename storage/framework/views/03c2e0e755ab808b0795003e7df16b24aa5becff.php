<?php
$img = ""; $ii = "images";
$imgs = []; $video = [];

if(count($media) > 0)
{
	$rawImgs = $media['images'];
$imgs = $cmedia['images'];
$video = $cmedia['video'];
  $img = $imgs[0];
  if(count($imgs) == 1) $ii = "image";
}

?>
<div class="checkout-side">
							
								<div class="booking-short">
									<img src="<?php echo e($img); ?>" id="apt-sidebar-cover" class="img-fluid" alt="" />
									<h4>Cover Image</h4>
									<span id="apt-sidebar-img-count"><?php echo e(count($imgs)." ".$ii); ?></span>
								</div>
								
								<div class="booking-short-side">
									<div class="accordion" id="accordionExample">
										
										
										<div class="card">
											<div class="card-header" id="extraFeat">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#extraSer" aria-expanded="false" aria-controls="extraSer">
												 Facilities
												</button>
											  </h2>
											</div>
											<div id="extraSer" class="collapse" aria-labelledby="extraFeat" data-parent="#accordionExample">
												<div class="card-body">
													<ul class="booking-detail-list" id="apt-sidebar-facilities">
														<li>None specified</li>
													</ul>
												</div>
											</div>
										  </div>
										
									</div>
								</div>
								
							</div><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/apt-sidebar.blade.php ENDPATH**/ ?>