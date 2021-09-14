<?php $__env->startSection('title',"Checkout"); ?>

<?php $__env->startSection('content'); ?>
   <!--start of middle sec-->
<div class="middle-sec wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
    <div class="page-header">
      <div class="container text-center">
        <h2 class="text-primary text-uppercase">checkout</h2>
      </div>
    </div>
    <section class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="inner-ad">
            <figure><img class="img-responsive" src="<?php echo e($ad); ?>" width="1170" height="100" alt=""></figure>
          </div>
        </div>
        <div class="col-sm-12 equal-height-container">
          <div class="row">
		    <?php if(is_null($user)): ?>
            <div class="col-sm-12">
			  <div class="alert alert-info" role="alert"><i class="ion-information-circled"></i> Returning customer? <a href="javascript:void(0)" data-toggle="modal" data-target="#login-box">Click here to login</a></div>
			</div>
			<?php endif; ?>
            <div class="col-sm-4 col-md-3 sub-data-left sub-equal">
              <div id="sticky">
                <section class="col-sm-12">
                  <h5 class="sub-title text-info text-uppercase">order summary</h5>
                  <ul class="list-group summary">
                    <li class="list-group-item text-uppercase"><strong>items:<span class="pull-right"> <?php echo e($totals['items']); ?></span></strong></li>
                    <li class="list-group-item text-uppercase"><strong>subtotal:<span class="pull-right"> &#8358;<?php echo e(number_format($totals['subtotal'],2)); ?></span></strong></li>
                    <?php if(!is_null($user)): ?>
					<li class="list-group-item text-uppercase"><strong>shipping: <span class="pull-right">&#8358;<?php echo e(number_format($totals['delivery'],2)); ?></span></strong></li>
                    <?php endif; ?>
				  </ul>
                </section>
                <section class="col-sm-12">
				  <?php
				   $totalText = "subtotal"; $total = $totals['subtotal'];
				   
				   if(!is_null($user))
				   {
					   $totalText = "total"; $total = $totals['subtotal'] + $totals['delivery'];
				   }
				  ?>
				  <h5 class="sub-title text-info text-uppercase"><?php echo e($totalText); ?></h5>
                  <div class=" summary sum js-total text-center"> <strong> &#8358;<?php echo e(number_format($total,2)); ?></strong> </div>
                  <a href="<?php echo e(url('cart')); ?>" class="btn btn-block btn-default hvr-underline-from-center-default"><i class="rm-icon ion-arrow-return-left"></i> return to cart</a>
                </section>
				<?php if(!is_null($user)): ?>
				<section class="col-sm-12">
				<br>
				   <div class="accordion">
                  <div aria-multiselectable="true" role="tablist" id="accordion-one" class="panel-group">
                    <div class="panel panel-default">
                      <div id="headingOne" role="tab" class="panel-heading">
                        <h4 class="panel-title"> <a aria-controls="collapseOne" aria-expanded="true" href="#collapseOne" data-parent="#accordion-one" data-toggle="collapse" class=""><span class="badge">1</span> Direct bank transfer </a> </h4>
                      </div>
                      <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse in" id="collapseOne" aria-expanded="true" style="">
                        <div class="panel-body"> 
						   Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account. <br><br>
						  <center> <button onclick="payBank(); return false;" class="btn btn-primary hvr-underline-from-center-primary " type="button">pay to bank</button></center>
						</div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div id="headingTwo" role="tab" class="panel-heading">
                        <h4 class="panel-title"> <a aria-controls="collapseTwo" aria-expanded="false" href="#collapseTwo" data-parent="#accordion-one" data-toggle="collapse" class="collapsed"><span class="badge">2</span> Pay online</a> </h4>
                      </div>
                      <div aria-labelledby="headingTwo" role="tabpanel" class="panel-collapse collapse" id="collapseTwo" aria-expanded="false" style="height: 92px;">
                        <div class="panel-body"> 
						<img class="img img-responsive" src="images/ps.png"> <br><br>
						  <center> <a href="javascript:void(0)" onclick="payCard({ref: '<?php echo e($ref); ?>'}); return false;" class="btn btn-primary hvr-underline-from-center-primary ">pay with card</a></center>
						</div>
                      </div>
                    </div>
                  </div>
                </div>
				</section>
				<?php endif; ?>
              </div>
			  <br>
			 
			
            </div>
            <div class="col-sm-8 col-md-9 sub-data-left main-sec">
			<?php
			  $fname = ""; $lname = "";
			  $email = ""; $phone = "";
			  $address = ""; $country = "";
			  $state = "none"; $city = ""; $zip = ""; $notes = "";
			  $rd = "";
			  
			  if(!is_null($user))
			  {
				 $rd = "readonly";
				$fname = $user->fname; $lname = $user->lname;
			    $email = $user->email; $phone = $user->phone;
			    $address = $ss['address']; $state = $ss['state']; 
				$city = $ss['city']; $zip = $ss['zipcode']; $notes = "";  
			  }
			  
			  //for tests
			  $secureCheckout = "https://www.aceluxurystore.com/checkout";
			  $unsecureCheckout = url('checkout');
			  $securePay = "https://www.aceluxurystore.com/pay";
			  $unsecurePay = url('pay');
			  
			  $isSecure = (isset($secure) && $secure);
			  $pay = $isSecure ? $securePay : $unsecurePay;
			  $checkout = $isSecure ? $secureCheckout : $unsecureCheckout;
			  
		    ?>
				 <input type="hidden" id="bank-action" value="<?php echo e($checkout); ?>">
                            	<input type="hidden" id="card-action" value="<?php echo e($pay); ?>">
                            	
                             
							
              <div class="row"> 
                
                <!--start of breadcrumb-->
                <div class="col-sm-12">
                  <ol class="breadcrumb dashed-border row">
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="active">checkout</li>
                  </ol>
                </div>
                <!--end of breadcrumb--> 
                
                <!--start of checkout-->
                <div class="col-sm-12">
				<?php if(is_null($user)): ?>
                  <form role="form" action="<?php echo e(url('register')); ?>" method="post">
			    <?php else: ?>
                  <form role="form" id="checkout-form" method="post">
			                <!-- payment form -->
                            	<input type="hidden" name="email" value="<?php echo e($email); ?>"> 
                            	<input type="hidden" name="quantity" value="1"> 
                            	<input type="hidden" name="amount" value="<?php echo e(($totals['subtotal'] + $totals['delivery']) * 100); ?>"> 
                            	<input type="hidden" name="metadata" id="nd" value="" > 
                            
                                <input type="hidden" id="meta-comment" value="">  
                            <!-- End payment form -->

			    <?php endif; ?>
				<?php echo csrf_field(); ?>

				<input type="hidden" id="href" name="u" value="">
		   <script>
		     document.querySelector('#href').value = document.location.href;
		   
								 mc = {"ref":"<?php echo e($ref); ?>",
								       "type":"checkout",
								       "email":"<?php echo e($email); ?>",
								       "phone":"<?php echo e($phone); ?>",
								       "address":"<?php echo e($address); ?>",
								       "city":"<?php echo e($city); ?>",
								       "state":"<?php echo e($state); ?>",
									   "notes":""
									  };
                             
           </script>
                    <div class="row"> 
                      
                      <!-- START Presonal information -->
                      <fieldset class="col-md-12">
                        <legend>Billing Details</legend>
                        
                        <!-- Name -->
                         <div class="row">
                          <div class="col-sm-6 form-group">
                            <label class="control-label" for="fname">First Name</label>
                            <input type="text" id="fname" name="fname" value="<?php echo e($fname); ?>" class="form-control" <?php echo e($rd); ?>>
						  </div>
						  <div class="col-sm-6 form-group">
                            <label class="control-label" for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" value="<?php echo e($lname); ?>" class="form-control" <?php echo e($rd); ?>>
						  </div>
                         </div>
						 
						 <!-- Email and phone -->
                         <div class="row">
                          <div class="col-sm-6 form-group">
                            <label class="control-label" for="email">Email address</label>
                            <input type="text" id="email" name="email" value="<?php echo e($email); ?>" class="form-control" <?php echo e($rd); ?>>
						  </div>
						  <div class="col-sm-6 form-group">
                            <label class="control-label" for="lname">Phone number</label>
                            <input type="text" id="phone" name="phone" value="<?php echo e($phone); ?>" class="form-control" <?php echo e($rd); ?>>
						  </div>
                         </div>
                        
                        <!-- Address -->
                        <div class="form-group">
                          <label class="control-label" for="address">Shipping address</label>
                          <input type="text" id="address" name="address" value="<?php echo e($address); ?>" class="form-control" <?php echo e($rd); ?>>
                        </div>
                        
                        <!-- Country and state -->
                        <div class="row">
                          <div class="col-sm-6 form-group">
                            <label class="control-label" for="city">City</label>
                            <input type="text" id="city" name="city" value="<?php echo e($city); ?>" class="form-control" <?php echo e($rd); ?>>
                          </div>
                          <div class="col-sm-6 form-group">
                            <label class="control-label" for="state">State</label>
                            <select class="selectpicker" id="state" name="state" value="<?php echo e($state); ?>" style="display: none;">
							<option value="none">Select state</option>
							<?php
							 if(is_null($user))
							 {
							 foreach($states as $key => $value)
							 {
								 $sss = $key == $state ? "selected='selected'" : "";
						    ?>
                              <option value="<?php echo e($key); ?>"<?php echo e($sss); ?>><?php echo e(ucwords($value)); ?></option>
							<?php
							 }
							 }
							 else
							 {
							?>
							   <option value="<?php echo e($state); ?>" selected><?php echo e($states[$state]); ?></option>
							<?php
							 }
                            ?>							
                            </select>
                          </div>
                        </div>
                        
                        <!-- City and Zip code -->
                        <div class="row">
						  <div class="col-sm-12 form-group">
                            <label class="control-label" for="country">Country</label>
                            <select class="selectpicker" id="country" style="display: none;">
                              <option>Nigeria</option>
                            </select>
                          </div>
                        </div>
                      </fieldset>
                      <!-- END Personal information-->                      
                   
                    </div>
                    
                    <!-- Agree checkbox and Continue button -->
                    <div class="row">
					  <?php if(!is_null($user)): ?>
                      <div class="col-sm-12">
                        <fieldset>
                          <legend>order notes</legend>
                          <textarea class="form-control" rows="5" cols="40" name="notes" id="notes" required=""></textarea>
                          <hr>
                        </fieldset>
                      </div>
					  <?php endif; ?>
                      <div class="col-sm-6">
                        <div class="checkbox small">
						<?php
						$checked = is_null($user) ? "" : " checked";
						?>
                          <input type="checkbox" id="terms" value="on" name="terms"<?php echo e($checked); ?>>
                          <label for="terms">Do you agree to the <a href="<?php echo e(url('returns')); ?>">terms?</a></label>
                        </div>
                      </div>
                      <div class="col-sm-6 text-right">
                        
                      </div>
                    </div>
					
					<?php if(is_null($user)): ?>
					<!-- Email and phone -->
                         <div class="row">
                          <div class="col-sm-12 form-group">
                            <label class="control-label" for="pass">Password</label>
                            <input type="password" id="pass" name="pass" class="form-control">
						  </div>
                         </div>
						 
					<div class="row" style="margin-bottom: 20px;">
					  <div class="col-sm-12">
					    <input type="submit" class="btn btn-primary" value="Submit">
					  </div>
					</div>
                 </form>
			    <?php else: ?>
                  </form>
			    <?php endif; ?>
                  
                </div>
                
                <!--end of checkout--> 
                
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--end of middle sec--> 
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/checkout.blade.php ENDPATH**/ ?>