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

foreach($plans as $p)
{
   if($p['ps_id'] == "free") $fp = $p['id'];
}			 

 

?>
@extends('layout')

@section('title',$title)

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle])
<script>
let selectedSide = "1", facilities = [], aptImages = [], aptImgCount = 1, aptCover = "none", aptPlan = "", fpp = "{{$fp}}";
  
let mc = {
      "type":"posting",
	  "email":"{{$user->email}}",
	  "notes":""
};
                    
  
$(document).ready(() => {
$('#add-apartment-loading').hide();
let addApartmentDescriptionEditor = new Simditor({
		textarea: $('#add-apartment-description'),
		toolbar: toolbar,
		placeholder: `This is the description`
	});	
});

</script>
<input type="hidden" id="card-action" value="{{$pay}}">

<!-- =================== Add Apartment Search ==================== -->
			<section class="gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-md-8">
							<input type="hidden" id="tk-apt" value="{{csrf_token()}}">
							<input type="hidden" id="tk-axf" value="{{url('apartments')}}">
							<!-- Add Apartment Step 1 -->
							<div class="checkout-wrap" id="add-apartment-side-0">
								
								<div class="checkout-body">
									
									<div class="row">
									<?php
									 if(count($subs) > 0)
									 {
									 $sub = $subs[0];
									 $p = $sub['plan'];
									 $stats = $sub['stats'];
									 
									 $exp = new DateTime($sub['date']);
									 $e1 = new DateTime($exp->format("jS F, Y"));
									 $e1->add(new DateInterval('P1M'));
									 
									$ac = $stats['aptCount'] == $p['pc'] ? "lluf" : "sey";
									?>
									   <div class="col-lg-12 col-md-12 col-sm-12">
										  <h4 class="text-success">{{$stats['aptCount']}} out of {{$p['pc']}} postings used</h4>
									   </div>
                                     <div class="col-lg-12 col-md-12 col-sm-12 mt-1">
									   <h4>Current Plan: <a href="javascript:void(0)" class="btn btn-success">{{$p['name']}}</a></h4>
									   <input type="hidden" id="ac" value="{{$ac}}">
									   <div class="row">
									     <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Postings<i class="req">*</i></label>
												<input type="text" class="form-control" value="{{$stats['aptCount']}} out of {{$p['pc']}} used" readonly>
											</div>
										  </div>
										  <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Expires on:<i class="req">*</i></label>
												<input type="text" class="form-control" value="{{$e1->format('jS F, Y')}}" readonly>
											</div>
										  </div>
									   </div>
									 </div>
									<?php
									 }
									 else
									 {
										 $ac = $stats['aptCount'] == $p['pc'] ? "lluf" : "sey";
									?>
									   <div class="col-lg-12 col-md-12 col-sm-12">
										  <h4 class="text-success">{{$stats['aptCount']}} out of {{$p['pc']}} postings used</h4>
									   </div>
									  <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
											  <h4>Choose a Plan <a href="{{url('plans')}}" target="_blank" class="btn btn-success">See Plans</a></h4>
											  <input type="hidden" id="ac" value="{{$ac}}">
											  <div class="form-group">
												<label>Subscription Plan<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-plan" name="pid">
												  <option value="none">Select plan</option>
												  <?php
												  foreach($plans as $p)
												  {
													  $v = $p['ps_id'] == "free" && $user->host_upgraded == "yes";
													  
													  if($v)
													  {
														  
													  }
													  else
													  {
													  $ss = $p['ps_id'] == "free" ? " selected='selected'" : "";
												  ?>
												  <option value="{{$p['id']}}"{{$ss}}>{{$p['name']}} - &#8358;{{number_format($p['amount'],2)}}/{{$p['frequency']}}</option>
												  <?php
												      }
												  }
												  ?>
												</select>
											 </div><br>
											 <div class="row" id="sps-row">
										<div class="col-lg-6 col-md-6">
										<?php
										 if(count($sps) > 0)
										 {
										?>
											<div class="form-group">
												<label>Select saved payment</label>
												<select class="form-control" id="posting-payment-type">
												  <option value="none">Select a card to pay with</option>
												  <?php
												   foreach($sps as $s)
												   {
													   $dt = $s['data'];
													   $n = $dt->bank." | **** ".$dt->last4." | Expires: ".$dt->exp_month."/".$dt->exp_year;
												  ?>
												    <option value="{{$s['id']}}">{{$n}}</option>
												  <?php
												   }
												  ?>
												  <option value="card">Use a different card</option>
												</select>
											</div>
											
										<?php
										 }
										 else
										 {
										?>
										<div class="form-group">
												<label>Payment type</label>
												<select class="form-control" id="posting-payment-type">
												  <option value="none">Select payment type</option>
												  <option value="card" selected="selected">Card</option>
												</select>
											</div>
										<?php
										 }
										?>
                                        </div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Save payment info?</label>
												<select class="form-control" name="sps" id="posting-sps">
												  <option value="yes" selected="selected">Yes</option>
												  <option value="no">No</option>
												</select>
											</div>
										</div>
									</div>
										   </div>
										   
										   <div class="col-lg-12 col-md-12 col-sm-12">
										    <!-- payment form -->
										   <form id="posting-form" method="post">
								            {!! csrf_field() !!}
											
                            	            <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                            	            <input type="hidden" name="quantity" value="1"> {{-- required --}}
                            	            <input type="hidden" name="amount" value="100"> {{-- required in kobo --}}
                            	            <input type="hidden" name="metadata" id="posting-md" value="" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                            	            
										   </form>
										    <!-- payment form -->
											<?php
											}
											?>
											<div class="form-group text-center">
											  <a href="javascript:void(0)" id="add-apartment-side-0-next" class="btn btn-theme">Next</a>
											</div>
										</div>
									</div>
								</div>
							</div>
								<!-- Add Apartment Step 1 -->
							<div class="checkout-wrap" id="add-apartment-side-1">
								
								{!! $checkoutHead !!}
								
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
												<label>Price per day(&#8358;)<i class="req">*</i></label>
												<input type="number" class="form-control" id="add-apartment-amount" placeholder="Enter amount in NGN">
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
												  <option value="{{$key}}">{{$value}}</option>
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
												  <option value="{{$key}}">{{$value}}</option>
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
												  <option value="{{$key}}">{{$value}}</option>
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
												  <option value="{{$i + 1}}">{{$i + 1}} {{$rr}}</option>
												  <?php
												   }
												  ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>No. of units<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-units">
												  <option value="none">Select number of units</option>
												  <?php
												   for($i = 0; $i < 5; $i++)
												   {
                                                     $rr = $i == 0 ? "unit" : "units";													   
												  ?>
												  <option value="{{$i + 1}}">{{$i + 1}} {{$rr}}</option>
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
												  <option value="{{$i + 1}}">{{$i + 1}} {{$rr}}</option>
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
												  <option value="{{$i + 1}}">{{$i + 1}} {{$rr}}</option>
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
												   
 												    <a class="btn btn-primary btn-sm text-white apt-service" id="apt-service-{{$key}}" onclick="toggleFacility('{{$key}}')" data-check="unchecked">
													  <center><i id="apt-service-icon-{{$key}}" class="ti-control-stop"></i></center>
													</a>
													 <label>{{$value}}</label>
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
								
								{!! $checkoutHead !!}
								
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
												<label>City<i class="req">*</i></label>
												<input type="text" class="form-control" id="add-apartment-city" placeholder="City">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>LGA<i class="req">*</i></label>
												<input type="text" class="form-control" id="add-apartment-lga" placeholder="LGA">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>State<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-state">
												  <option value="none">Select state</option>
												  <?php
												   foreach($states as $key => $value)
												   {
												  ?>
												    <option value="{{$key}}">{{$value}}</option>
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
												  ?>
												    <option value="{{$key}}">{{$value}}</option>
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
												<label for="a-2" class="checkbox-custom-label">By continuing, you agree to our <a href="{{url('terms')}}">terms & conditions</a></label>
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
								
								{!! $checkoutHead !!}
								
								<div class="checkout-body">
									
									
									<div class="row">
										
										<div class="col-md-12 col-lg-12">
										
											<ul class="booking-detail-list" id="add-apartment-final-preview">
												
											</ul>
											<hr>
											
											<h4>Final Notes</h4>
											<p>Take a moment to preview the information about your apartment to ensure there are no errors or mistypes as your request will be reviewed by an admin. If you are sure all your information is correct click on <b>Submit</b> below. To make changes click on <b>Back</b>.</p>
										</div>
										
										
										<div class="col-md-12 col-lg-12">
										  <div class="form-group">
												<label>Select Bank Account<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-bank">
												  <option value="none">Select bank account</option>
												  <?php
												   foreach($bankAccounts as $b)
												   {
												  ?>
												    <option value="{{$b['id']}}">{{strtoupper($b['bname'])}} - {{$b['acname']}} - {{$b['acnum']}}</option>
												  <?php
												   }
												  ?>
												  <option value="new">Add a new bank account</option>
												</select>
											</div>
										</div>
										<div class="col-md-12 col-lg-12" id="add-apartment-bank-new">
										  <div class="form-group">
												<label>Select Bank<i class="req">*</i></label>
												<select class="form-control" id="add-apartment-bname">
												  <option value="none">Select bank</option>
												  <?php
												   foreach($banks as $b)
												   {
												  ?>
												    <option value="{{$b['slug']}}">{{$b['name']}}</option>
												  <?php
												   }
												  ?>
												</select>
											</div>
											<div class="form-group">
												<label>Account name<i class="req">*</i></label>
												<input type="text" class="form-control" id="add-apartment-acname" placeholder="Account name">
											</div>
											<div class="form-group">
												<label>Account number<i class="req">*</i></label>
												<input type="text" class="form-control" id="add-apartment-acnum" placeholder="Account number">
											</div>
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group text-center" id="add-apartment-submit">
												<a href="javascript:void(0)" id="add-apartment-side-3-prev" class="btn btn-theme">Back</a>
												<a href="javascript:void(0)" id="add-apartment-side-3-next" class="btn btn-theme">Proceed</a>
											</div>
											<div class="form-group text-center" id="add-apartment-loading">
												 <h4>Processing.. <img src="{{asset('img/loading.gif')}}" class="img img-fluid" alt="Proceeding to payment.."></h4><br>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<!-- End of Add Apartment Step 3 -->
							
							
						</div>
						<!-- Sidebar End -->
							
						<div class="col-lg-3 col-md-4">
							@include('apt-sidebar',['cmedia' => [],'media' => []])
						</div>
					</div>
				</div>
			</section>
			<!-- =================== Add Apartment Search ==================== -->
@stop