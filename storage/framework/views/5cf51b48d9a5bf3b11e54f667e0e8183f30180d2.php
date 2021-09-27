<?php
$title = "Add Apartment";
$subtitle = "Post a new apartment to your listings";

$checkoutHead = <<<EOD
                                <div class="checkout-head">
									<ul>
										<li class="add-apartment-active-1"><span class="add-apartment-ticker-1">1</span>Apartment Information</li>
										<li class="add-apartment-active-2"><span class="add-apartment-ticker-2">2</span>Location & Media</li>
										<li class="add-apartment-active-3"><span class="add-apartment-ticker-3">3</span>Preview</li>
									</ul>
								</div>
EOD;

 //for tests
			  $securePay = "http://etukng.tobi-demos.tk/pay";
			  $unsecurePay = url('pay');
			  
			  $isSecure = (isset($secure) && $secure);
			  $pay = $isSecure ? $securePay : $unsecurePay;
	
$fp = "";
 

?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
let selectedSide = "1", facilities = [], aptImages = [], aptImgCount = 1, aptCover = "none", aptPlan = "", fpp = "<?php echo e($fp); ?>";
  
let mc = {
      "type":"posting",
	  "email":"<?php echo e($user->email); ?>",
	  "notes":""
};
                    
  
$(document).ready(() => {
$('#add-apartment-loading').hide();
let addApartmentDescriptionEditor = new Simditor({
		textarea: $('#add-apartment-description'),
		toolbar: toolbar,
		placeholder: `This is the description`
	});	

$('#add-apartment-city').flexselect();
});


</script>
<input type="hidden" id="card-action" value="<?php echo e($pay); ?>">

<!-- =================== Add Apartment Search ==================== -->
			<section class="gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-md-8">
							<input type="hidden" id="tk-apt" value="<?php echo e(csrf_token()); ?>">
							<input type="hidden" id="tk-axf" value="<?php echo e(url('apartments')); ?>">
							
							
								<!-- Add Apartment Step 1 -->
							<div class="checkout-wrap" id="add-apartment-side-1">
								
								<?php echo $checkoutHead; ?>

								
								<div class="checkout-body">
									<div class="row">
								
										<div class="col-lg-12 col-md-12 col-sm-12">
											<h4 class="mb-3">Basic Information</h4>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Apartment ID<i class="req">*</i></label>
												<input type="text" class="form-control" value="Will be generated" readonly>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Friendly URL<i class="req">*</i></label>
												<input type="text" class="form-control" id="add-apartment-url" placeholder="URL e.g my-apartment">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Friendly Name<i class="req">*</i></label>
												<input type="text" class="form-control" id="add-apartment-name" placeholder="Give your apartment a name e.g Royal Hibiscus">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Price per week(&#0163;)<i class="req">*</i></label>
												<input type="number" class="form-control" id="add-apartment-amount" placeholder="Enter amount in GBP">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Max no. of guests<i class="req">*</i></label>
												<input type="number" class="form-control" id="add-apartment-max-adults" placeholder="The max number of adults allowed to check-in">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Pets<i class="req">*</i></label>
												<?php
												 $opts3 = [
												    'no' => "No",
													'yes' => "Yes"
												 ];
												?>
												<select class="form-control" id="add-apartment-pets">
												 <option value="none">Are pets allowed?</option>
												<?php
												  foreach($opts3 as $key => $value)
												  {
												?>
												  <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
												<?php
												  }
												?>
												</select>
											</div>
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label>Description</label>
												<textarea id="add-apartment-description" class="form-control"></textarea>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Category<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-category">
												  <option value="none">Select category</option>
												  <?php
												  $aptCategories = [
												    'studio' => "Studio",
												    '1bed' => "1 bedroom",
												    '2bed' => "2 bedrooms",
												    '3bed' => "3 bedrooms",
												    'penthouse' => "Penthouse apartment",
												    'duplex' => "Duplex"
												  ];
												  foreach($aptCategories as $key => $value)
												  {
												  ?>
												  <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
												  <?php
												  }
												  ?>
												</select>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Property type<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-ptype">
												  <option value="none">Select type</option>
												  <?php
												  $aptTypes = [
												    'unfurnished' => "Unfurnished apartment",
												    'Furnished' => "Furnished apartment",
												    'serviced' => "Serviced apartment",
												  ];
												  foreach($aptTypes as $key => $value)
												  {
												  ?>
												  <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
												  <?php
												  }
												  ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>No. of rooms<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-rooms">
												  <option value="none">Select number of rooms</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "room" : "rooms";													   
												  ?>
												  <option value="<?php echo e($i + 1); ?>"><?php echo e($i + 1); ?> <?php echo e($rr); ?></option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>No. of bathrooms<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-bathrooms">
												  <option value="none">Select number of bathrooms</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "bathroom" : "bathrooms";													   
												  ?>
												  <option value="<?php echo e($i + 1); ?>"><?php echo e($i + 1); ?> <?php echo e($rr); ?></option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>No. of bedrooms<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-bedrooms">
												  <option value="none">Select number of bedrooms</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "bedroom" : "bedrooms";													   
												  ?>
												  <option value="<?php echo e($i + 1); ?>"><?php echo e($i + 1); ?> <?php echo e($rr); ?></option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
										
										
										
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px;">
											<h4 class="mb-3">Amenities (check all that apply)</h4>
										</div>										
										
										<div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 20px;">
											<div class="form-group">
											   
												<div class="row">
												 <?php
											        foreach($services as $s)
													{
														$key = $s['tag'];
														$value = $s['name'];
											      ?>
												  <div class="col-lg-3 col-md-6 col-sm-12">
												   
 												    <a class="btn btn-primary btn-sm text-white apt-service" id="apt-service-<?php echo e($key); ?>" onclick="toggleFacility('<?php echo e($key); ?>')" data-check="unchecked">
													  <center><i id="apt-service-icon-<?php echo e($key); ?>" class="ti-control-stop"></i></center>
													</a>
													 <label><?php echo e($value); ?></label>
												  </div>
												  <?php
													}
												  ?>
												</div>
												
											</div>
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group text-center">
											    <a href="javascript:void(0)" id="add-apartment-side-1-prev" class="btn btn-theme">Back</a>
												<a href="javascript:void(0)" id="add-apartment-side-1-next" class="btn btn-theme">Next</a>
											</div>
										</div>
										
									</div>
								</div>
								
							</div>
							<!-- End of Add Apartment Step 1 -->
							
							<!-- Add Apartment Step 2 -->
							<div class="checkout-wrap" id="add-apartment-side-2">
								
								<?php echo $checkoutHead; ?>

								
								<div class="checkout-body">
									<div class="row mb-5">
								
										<div class="col-lg-12 col-md-12 col-sm-12">
											<h4 class="mb-3">Location & Media</h4>
										</div>
																			
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label>Address<i class="req">*</i></label>
												<input type="text" class="form-control" id="add-apartment-address" placeholder="House address">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>County (if applicable)</label>
												<input type="text" class="form-control" id="add-apartment-county" placeholder="County">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>City<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-city">
												  <option value="none">Select city</option>
												  <?php
												   foreach($cities as $c)
												   {
												  ?>
												    <option value="<?php echo e($c); ?>"><?php echo e($c); ?></option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
										
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Country<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-country">
												  <option value="none">Select country</option>
												  <?php
												   foreach($countries as $key => $value)
												   {
													$ss = $key == "uk" ? " selected='selected'" : "";
												  ?>
												    <option value="<?php echo e($key); ?>"<?php echo e($ss); ?>><?php echo e($value); ?></option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
									</div>
									
									<div class="row">
									  <!--
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Video<i class="req">*</i></label>
												<input type="file" class="form-control" id="add-apartment-video">
											</div>
											<div class="form-group">
											    <ol class="form-control-plaintext">
												  <li>Requirements and recommendations will be displayed here</li>
												  <li>Requirements and recommendations will be displayed here</li>
												</ol>
											</div>
										</div>
										-->
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label>Images<i class="req">*</i></label>
												<div id="add-apartment-images">
												<div id="add-apartment-image-div-0" class="row">
												  <div class="col-md-7">
												    <input type="file" class="form-control" onchange="readURL(this,{id: 'add-apartment',ctr: '0'})" id="add-apartment-image-0" name="add-apartment-images[]">												    
												  </div>
												  <div class="col-md-5">
												    <img id="add-apartment-preview-0" src="#" alt="preview" style="width: 50px; height: 50px;"/>
													<a href="javascript:void(0)" onclick="aptSetCoverImage(0)" class="btn btn-theme btn-sm">Set as cover image</a>
												    <a href="javascript:void(0)" onclick="aptRemoveImage({id: 'add-apartment',ctr: '0'})" class="btn btn-warning btn-sm">Remove</a>
												  </div>
												</div>
												</div>
											</div>
											<div class="form-group">
											    <a href="javascript:void(0)" onclick="aptAddImage({id: 'add-apartment'})" class="btn btn-warning btn-sm">Add image</a>
											    <ol class="form-control-plaintext">
												  <li>Recommended dimensions: Your images should not exceed <b>1280x880</b></li>
												  <li>Maximum file size: Your images must not be more than <b>1.5MB</b></li>
												</ol>
											</div>
										</div>									
												
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<input id="a-2" class="checkbox-custom" name="a-2" type="checkbox" checked>
												<label for="a-2" class="checkbox-custom-label">By continuing, you agree to our <a href="<?php echo e(url('terms')); ?>">terms & conditions</a></label>
											</div>
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group text-center">
												<a href="javascript:void(0)" id="add-apartment-side-2-prev" class="btn btn-theme">Back</a>
												<a href="javascript:void(0)" id="add-apartment-side-2-next" class="btn btn-theme">Next</a>
											</div>
										</div>
										
									</div>
								</div>
								
							</div>							
							<!-- End of Add Apartment Step 2 -->
							
							<!-- Add Apartment Step 3 -->
							<div class="checkout-wrap" id="add-apartment-side-3">
								
								<?php echo $checkoutHead; ?>

								
								<div class="checkout-body">
									
									
									<div class="row">
										
										<div class="col-md-12 col-lg-12">
										
											<ul class="booking-detail-list" id="add-apartment-final-preview">
												
											</ul>
											<hr>
											
											<h4>Final Notes</h4>
											<p>Take a moment to preview the information about your apartment to ensure there are no errors or mistypes as your request will be reviewed by an admin. If you are sure all your information is correct click on <b>Submit</b> below. To make changes click on <b>Back</b>.</p>
										</div>
										
										
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group text-center" id="add-apartment-submit">
												<a href="javascript:void(0)" id="add-apartment-side-3-prev" class="btn btn-theme">Back</a>
												<a href="javascript:void(0)" id="add-apartment-side-3-next" class="btn btn-theme">Proceed</a>
											</div>
											<div class="form-group text-center" id="add-apartment-loading">
												 <h4>Processing.. <img src="<?php echo e(asset('img/loading.gif')); ?>" class="img img-fluid" alt="Proceeding to payment.."></h4><br>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<!-- End of Add Apartment Step 3 -->
							
							
						</div>
						<!-- Sidebar End -->
							
						<div class="col-lg-3 col-md-4">
							<?php echo $__env->make('apt-sidebar',['cmedia' => [],'media' => []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						</div>
					</div>
				</div>
			</section>
			<!-- =================== Add Apartment Search ==================== -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\fazio-project\resources\views/add-apartment.blade.php ENDPATH**/ ?>