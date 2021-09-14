<?php
$title = "Apartment Preferences";
$subtitle = "tell us more about your ideal apartment";

$checkoutHead = <<<EOD
                                <div class="checkout-head">
									<ul>
										<li class="apartment-preference-active-1 active"><span class="apartment-preference-ticker-1">1</span>Preferences</li>
										<li></li>
										<li class="apartment-preference-active-2"><span class="apartment-preference-ticker-2">2</span>Preview</li>
									</ul>
								</div>
EOD;

?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
let selectedSide = "1", facilities = [];

$(document).ready(() => {
$('#apartment-preference-loading').hide();

 <?php
	foreach($def['facilities'] as $ff)
	  {
  ?>
    toggleFacility("<?php echo e($ff['facility']); ?>");
  <?php
	  }
  ?>

});
</script>
<!-- =================== Apartment Preference Search ==================== -->
			<section class="gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<input type="hidden" id="tk-apf" value="<?php echo e(csrf_token()); ?>">
							<input type="hidden" id="tk-axf" value="<?php echo e(url('apartment-preferences')); ?>">
							<!-- Apartment Preference Step 1 -->
							<div class="checkout-wrap" id="apartment-preference-side-1">
								
								<?php echo $checkoutHead; ?>

								
								<div class="checkout-body">
									<div class="row">
								
										<div class="col-lg-12 col-md-12 col-sm-12">
											<h4 class="mb-3">Basic Information</h4>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label>Availability<i class="req">*</i></label>
												<select class="form-control" id="apartment-preference-avb">
												<option value="none">Select availability</option>
												<?php
												$avbs = ['available' => "Available",'occupied' => "Occupied",'booked' => "Booked"];
												foreach($avbs as $k => $v)
												{
												  $ss = $def['avb'] == $k ? " selected='selected'" : "";
												?>
												<option value="<?php echo e($k); ?>"<?php echo e($ss); ?>><?php echo e(ucwords($v)); ?></option>
												<?php
												}
												?>
												</select>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Price per day(&#8358;)<i class="req">*</i></label>
												<input type="number" class="form-control" value="<?php echo e($def['amount']); ?>" id="apartment-preference-amount" placeholder="Enter amount in NGN">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Rating of at least:<i class="req">*</i></label>
												<input type="number" class="form-control" value="<?php echo e($def['rating']); ?>" id="apartment-preference-rating" max=5 placeholder="Rating">
											</div>
										</div>
										
									<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Category<i class="req">*</i></label>
												<select class="form-control" id="apartment-preference-category">
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
													  $ss = $def['category'] == $key ? " selected='selected'" : "";
												  ?>
												  <option value="<?php echo e($key); ?>"<?php echo e($ss); ?>><?php echo e($value); ?></option>
												  <?php
												  }
												  ?>
												</select>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Property type<i class="req">*</i></label>
												<select class="form-control" id="apartment-preference-ptype">
												  <option value="none">Select type</option>
												  <?php
												  $aptTypes = [
												    'unfurnished' => "Unfurnished apartment",
												    'Furnished' => "Furnished apartment",
												    'serviced' => "Serviced apartment",
												  ];
												  foreach($aptTypes as $key => $value)
												  {
													   $ss = $def['property_type'] == $key ? " selected='selected'" : "";
												  ?>
												  <option value="<?php echo e($key); ?>"<?php echo e($ss); ?>><?php echo e($value); ?></option>
												  <?php
												  }
												  ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>No. of rooms<i class="req">*</i></label>
												<select class="form-control" id="apartment-preference-rooms">
												  <option value="none">Select number of rooms</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "room" : "rooms";
                                                      $ss = $def['rooms'] == ($i + 1) ? " selected='selected'" : "";													 
												  ?>
												  <option value="<?php echo e($i + 1); ?>"<?php echo e($ss); ?>><?php echo e($i + 1); ?> <?php echo e($rr); ?></option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>No. of units<i class="req">*</i></label>
												<select class="form-control" id="apartment-preference-units">
												  <option value="none">Select number of units</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "unit" : "units";
                                                      $ss = $def['units'] == ($i + 1) ? " selected='selected'" : "";													 
												  ?>
												  <option value="<?php echo e($i + 1); ?>"<?php echo e($ss); ?>><?php echo e($i + 1); ?> <?php echo e($rr); ?></option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>No. of bathrooms<i class="req">*</i></label>
												<select class="form-control" id="apartment-preference-bathrooms">
												  <option value="none">Select number of bathrooms</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "bathroom" : "bathrooms";
                                                      $ss = $def['bathrooms'] == ($i + 1) ? " selected='selected'" : "";													 
												  ?>
												  <option value="<?php echo e($i + 1); ?>"<?php echo e($ss); ?>><?php echo e($i + 1); ?> <?php echo e($rr); ?></option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>No. of bedrooms<i class="req">*</i></label>
												<select class="form-control" id="apartment-preference-bedrooms">
												  <option value="none">Select number of bedrooms</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "bedroom" : "bedrooms";
                                                     $ss = $def['bedrooms'] == ($i + 1) ? " selected='selected'" : "";													 
												  ?>
												  <option value="<?php echo e($i + 1); ?>"<?php echo e($ss); ?>><?php echo e($i + 1); ?> <?php echo e($rr); ?></option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px;">
											<h4 class="mb-3 mt-3">Location</h4>
										</div>
										
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label>City<i class="req">*</i></label>
												<input type="text" class="form-control" value="<?php echo e($def['city']); ?>" id="apartment-preference-city" placeholder="City">
											</div>
										</div>
										
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label>LGA<i class="req">*</i></label>
												<input type="text" class="form-control" value="<?php echo e($def['lga']); ?>" id="apartment-preference-lga" placeholder="LGA">
											</div>
										</div>
										
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label>State<i class="req">*</i></label>
												<select class="form-control" id="apartment-preference-state">
												  <option value="none">Select state</option>
												  <?php
												   foreach($states as $key => $value)
												   {
													   $ss = $def['state'] == $key ? " selected='selected'" : "";
												  ?>
												    <option value="<?php echo e($key); ?>"<?php echo e($ss); ?>><?php echo e($value); ?></option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px;">
											<h4 class="mb-3 mt-3">Terms & Conditions</h4>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Children<i class="req">*</i></label>
												<select class="form-control" id="apartment-preference-children">
												  <option value="none"></option>
												   <?php
												   $ic = ['none' => "No children allowed",
												          '1-5yrs' => "1-5yrs",
														  '6-10yrs' => "6-10yrs",
														  '11-20yrs' => "11-20yrs",
														  '>20yrs' => ">20yrs",
														  'all' => "All children allowed",
														 ];
												   foreach($ic as $key => $value)
												   {
													   $ss = $def['children'] == $key ? " selected='selected'" : "";
												  ?>
												    <option value="<?php echo e($key); ?>"<?php echo e($ss); ?>><?php echo e($value); ?></option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Pets<i class="req">*</i></label>
												<select class="form-control" id="apartment-preference-pets">
												<option value="none"></option>
												<?php
												   $ipt = ['yes' => "Pets allowed",
														  'no' => "No pets allowed",
														 ];
												   foreach($ipt as $key => $value)
												   {
													   $ss = $def['pets'] == $key ? " selected='selected'" : "";
												  ?>
												    <option value="<?php echo e($key); ?>"<?php echo e($ss); ?>><?php echo e($value); ?></option>
												  <?php
												   }
												  ?>
												  </select>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Max. adults<i class="req">*</i></label>
												<input type="number" class="form-control" value="<?php echo e($def['max_adults']); ?>" id="apartment-preference-max-adults" placeholder="The max number of adults allowed to check-in" value="4">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Max. children<i class="req">*</i></label>
												<input type="number" class="form-control" value="<?php echo e($def['max_children']); ?>" id="apartment-preference-max-children" placeholder="The max number of children allowed to check-in" value="0">
											</div>
										</div>
										
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px;">
											<h4 class="mb-3">Facilities & Services</h4>
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
												<a href="javascript:void(0)" id="apartment-preference-side-1-next" class="btn btn-theme">Next</a>
											</div>
										</div>
										
									</div>
								</div>
								
							</div>
							<!-- End of Apartment Preference Step 1 -->
							
							
							<!-- Apartment Preference Step 2 -->
							<div class="checkout-wrap" id="apartment-preference-side-2">
								
								<?php echo $checkoutHead; ?>

								
								<div class="checkout-body">
									
									
									<div class="row">
										<div class="col-md-12 col-lg-12">
										
											<ul class="booking-detail-list" id="apartment-preference-final-preview">
												
											</ul>
											<hr>
											
											<h4>Final Notes</h4>
											<p>Take a moment to preview the information about your apartment to ensure there are no errors or mistypes as your request will be reviewed by an admin. If you are sure all your information is correct click on <b>Submit</b> below. To make changes click on <b>Back</b>.</p>
											
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group text-center" id="apartment-preference-submit">
												<a href="javascript:void(0)" id="apartment-preference-side-2-prev" class="btn btn-theme">Back</a>
												<a href="javascript:void(0)" id="apartment-preference-side-2-next" class="btn btn-theme">Submit</a>
											</div>
											<div class="form-group text-center" id="apartment-preference-loading">
												 <h4>Saving your preference.. <img src="<?php echo e(asset('img/loading.gif')); ?>" class="img img-fluid" alt="Adding apartment.."></h4><br>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<!-- End of Apartment Preference Step 2 -->
							
							
						</div>
						<!-- Sidebar End -->
		
					</div>
				</div>
			</section>
			<!-- =================== Apartment Preference Search ==================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/apartment-preferences.blade.php ENDPATH**/ ?>