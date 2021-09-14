<?php
$def = [
  'avb' => "available",
  'city' => "",
  'lga' => "",
  'state' => "none",
  'amount' => "0",
  'rating' => "4",
  'id_required' => "yes",
  'category' => "",
  'property_type' => "none",
  'rooms' => "none",
  'units' => "none",
  'bedrooms' => "none",
  'bathrooms' => "none",
  'children' => "none",
  'pets' => "no",
  'max_adults' => "4",
  'max_children' => "0",
  'facilities' => []
];

if(count($apf) < 1) $apf = $def;
?>
<div class="order-2 col-lg-4 col-md-12 order-lg-1 order-md-2">
						
							<!-- property Sidebar -->
							<div class="exlip-page-sidebar">
								
								<!-- Find New Property -->
								<div class="sidebar-widgets">
									<form method="post" action="<?php echo e(url('search')); ?>" id="search-form">
										<?php echo csrf_field(); ?>

									<div style=" margin-bottom: 5px;">
									<div class="form-group">
									   <label>Availability:</label>
										<div class="input-with-icon">
											<select id="guest-apt-sidebar-avb" name="avb" class="form-control">
												<option value="">Select availability</option>
												<?php
												$avbs = ['available' => "Available",'occupied' => "Occupied",'booked' => "Booked"];
												foreach($avbs as $k => $v)
												{
												  $ss = $apf['avb'] == $k ? " selected='selected'" : "";
												?>
												<option value="<?php echo e($k); ?>"<?php echo e($ss); ?>><?php echo e(ucwords($v)); ?></option>
												<?php
												}
												?>
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>City:</label>
										<div class="input-with-icon">
											<input id="guest-apt-sidebar-city" name="city" value="<?php echo e($apf['city']); ?>" type="text" class="form-control" placeholder="City">
											<i class="ti-location-pin"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>State:</label>
										<div class="input-with-icon">
											<select id="guest-apt-sidebar-state" name="state" class="form-control">
												<option value="">Select state</option>
												<?php
												foreach($states as $k => $v)
												{
												  $ss = $apf['state'] == $k ? " selected='selected'" : "";
												?>
												<option value="<?php echo e($k); ?>"<?php echo e($ss); ?>><?php echo e(ucwords($v)); ?></option>
												<?php
												}
												?>
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>Min. price (&#8358;)</label>
										<div class="input-with-icon">
											<input id="guest-apt-sidebar-amount" name="amount" value="<?php echo e($apf['amount']); ?>" type="number" class="form-control" placeholder="Amount (NGN)">
											<i class="ti-credit-card"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>Category:</label>
										<div class="input-with-icon">
											<select id="guest-apt-sidebar-category" name="category" class="form-control">
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
													  $ss = $apf['category'] == $key ? " selected='selected'" : "";
												  ?>
												  <option value="<?php echo e($key); ?>"<?php echo e($ss); ?>><?php echo e($value); ?></option>
												  <?php
												  }
												  ?>
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>Property type:</label>
										<div class="input-with-icon">
											<select id="guest-apt-sidebar-ptype" name="property_type" class="form-control">
												<option value="none">Select type</option>
												  <?php
												  $aptTypes = [
												    'unfurnished' => "Unfurnished apartment",
												    'Furnished' => "Furnished apartment",
												    'serviced' => "Serviced apartment",
												  ];
												  foreach($aptTypes as $key => $value)
												  {
													   $ss = $apf['property_type'] == $key ? " selected='selected'" : "";
												  ?>
												  <option value="<?php echo e($key); ?>"<?php echo e($ss); ?>><?php echo e($value); ?></option>
												  <?php
												  }
												  ?>
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>No. of rooms:</label>
										<div class="input-with-icon">
											<select id="guest-apt-sidebar-rooms" name="rooms" class="form-control">
												<option value="none">Select number of rooms</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "room" : "rooms";
                                                      $ss = $apf['rooms'] == ($i + 1) ? " selected='selected'" : "";													 
												  ?>
												  <option value="<?php echo e($i + 1); ?>"<?php echo e($ss); ?>><?php echo e($i + 1); ?> <?php echo e($rr); ?></option>
												  <?php
												   }
												  ?>
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>No. of units:</label>
										<div class="input-with-icon">
											<select id="guest-apt-sidebar-units" name="units" class="form-control">
												<option value="none">Select number of units</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "unit" : "units";
                                                      $ss = $apf['units'] == ($i + 1) ? " selected='selected'" : "";													 
												  ?>
												  <option value="<?php echo e($i + 1); ?>"<?php echo e($ss); ?>><?php echo e($i + 1); ?> <?php echo e($rr); ?></option>
												  <?php
												   }
												  ?>
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>No. of bathrooms:</label>
										<div class="input-with-icon">
											<select id="guest-apt-sidebar-bathrooms" name="bathrooms" class="form-control">
												<option value="none">Select number of bathrooms</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "bathroom" : "bathrooms";
                                                      $ss = $apf['bathrooms'] == ($i + 1) ? " selected='selected'" : "";													 
												  ?>
												  <option value="<?php echo e($i + 1); ?>"<?php echo e($ss); ?>><?php echo e($i + 1); ?> <?php echo e($rr); ?></option>
												  <?php
												   }
												  ?>
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>No. of bedrooms:</label>
										<div class="input-with-icon">
											<select id="guest-apt-sidebar-bedrooms" name="bedrooms" class="form-control">
												<option value="none">Select number of bedrooms</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "bedroom" : "bedrooms";
                                                     $ss = $apf['bedrooms'] == ($i + 1) ? " selected='selected'" : "";													 
												  ?>
												  <option value="<?php echo e($i + 1); ?>"<?php echo e($ss); ?>><?php echo e($i + 1); ?> <?php echo e($rr); ?></option>
												  <?php
												   }
												  ?>
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>Children allowed:</label>
										<div class="input-with-icon">
											<select id="guest-apt-sidebar-children" name="children" class="form-control">
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
													   $ss = $apf['children'] == $key ? " selected='selected'" : "";
												  ?>
												    <option value="<?php echo e($key); ?>"<?php echo e($ss); ?>><?php echo e($value); ?></option>
												  <?php
												   }
												  ?>
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>Pets allowed:</label>
										<div class="input-with-icon">
											<select id="guest-apt-sidebar-pets" name="pets" class="form-control">
												<option value="none"></option>
												<?php
												   $ipt = ['yes' => "Pets allowed",
														  'no' => "No pets allowed",
														 ];
												   foreach($ipt as $key => $value)
												   {
													   $ss = $apf['pets'] == $key ? " selected='selected'" : "";
												  ?>
												    <option value="<?php echo e($key); ?>"<?php echo e($ss); ?>><?php echo e($value); ?></option>
												  <?php
												   }
												  ?>
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>Max. adults</label>
										<div class="input-with-icon">
											<input id="guest-apt-sidebar-max-adults" name="max_adults" value="<?php echo e($apf['max_adults']); ?>" type="number" class="form-control" placeholder="Max. adults allowed">
											<i class="ti-user"></i>
										</div>
									</div>
									
									<div class="form-group">
									   <label>Max. children</label>
										<div class="input-with-icon">
											<input id="guest-apt-sidebar-max-children" name="max_children" value="<?php echo e($apf['max_children']); ?>" type="number" class="form-control" placeholder="Max. children allowed">
											<i class="ti-user"></i>
										</div>
									</div>
									
									<div class="ameneties-features mt-5">
										<label>Show apartments with:</label>
										<ul class="no-ul-list">
										   <?php
										    foreach($services as $s)
											{
												$cc = "";
												foreach($apf['facilities'] as $ff)
												{
													if($ff['facility'] == $s['tag']) $cc = " checked"; 
												}
										   ?>
											<li>
												<input id="guest-apt-sidebar-<?php echo e($s['tag']); ?>" class="guest-apt-sidebar-facility" data-tag="<?php echo e($s['tag']); ?>" class="checkbox-custom" name="guest-apt-sidebar-<?php echo e($s['tag']); ?>" type="checkbox"<?php echo e($cc); ?>>
												<label for="guest-apt-sidebar-<?php echo e($s['tag']); ?>" class="checkbox-custom-label"><?php echo e(ucwords($s['name'])); ?></label>
											</li>
											<?php
											}
											?>
										</ul>
									
									</div>
									
									<div class="range-slider mt-5">
										<label>Show apartments with</label>
										<div class="distance-title">a rating of at least <span class="theme-cl"></span> stars</div>
										<input id="guest-apt-sidebar-rating" name="rating" class="distance-radius rangeslider--horizontal" type="range" min="1" max="5" step="1" value="<?php echo e($apf['rating']); ?>" data-title="Rating of at least">
									</div>
									</div>
									<center>
									<input type="hidden" id="guest-apt-sidebar-dt"  name="dt" value="">
									<a class="btn btn-theme" href="javascript:void(0)" id="guest-apt-sidebar-submit">SUBMIT</a>
							        </center>
								</div>
								</form>
							</div>
						</div>
						<!-- Sidebar End --><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/guest-apt-sidebar.blade.php ENDPATH**/ ?>