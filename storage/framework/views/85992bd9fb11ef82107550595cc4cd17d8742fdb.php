<?php $__env->startSection('title',"Create Account"); ?>

<?php $__env->startSection('content'); ?>
   <!--start of middle sec-->
<div class="middle-sec wow fadeIn" data-wow-offset="10" data-wow-duration="2s">
    <div class="page-header">
      <div class="container text-center">
        <h2 class="text-primary text-uppercase">register</h2>
        <p>Create an account to enjoy shopping on our website.</p>
      </div>
    </div>
    <section class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="inner-ad">
            <figure><img class="img-responsive" src="<?php echo e($ad); ?>" width="1170" height="100" alt=""/></figure>
          </div>
        </div>
        <div class="col-sm-12 equal-height-container">
          <div class="row">
            <div class="col-sm-4 col-md-3 col-lg-3 sub-data-left sub-equal">
              <div id="sticky">
                <section>
                  <h5 class="sub-title text-info text-uppercase">why register?</h5>
                  <p>With an account you can enjoy lots of benefits </p>
                  <dl>
                    <dt>N500 signup bonus</dt>
                    <dd>Get up to N500 bonus on your first order with a new account</dd>
                    <dt>Save Your Shipping Address</dt>
                    <dd>Save time when placing orders</dd>
                    <dt>Win Amazing Discounts</dt>
                    <dd>Stand a chance to win great discounts</dd>
                  </dl>
                </section>
              </div>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-9 main-sec">
              <div class="row"> 
                
                <!--start of breadcrumb-->
                <div class="col-sm-12">
                  <ol class="breadcrumb dashed-border row">
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li><a href="#">Account</a></li>
                    <li class="active">Register</li>
                  </ol>
                </div>
                <!--end of breadcrumb--> 
                
                <!--start of checkout-->
                <div class="col-sm-12">
                  <form role="form" method="post" action="<?php echo e(url('register')); ?>">
				   <?php echo csrf_field(); ?>

                    <div class="row"> 
                      
                      <!-- START Presonal information -->
                      <fieldset class="col-md-6">
                        <legend>Personal information</legend>
                        <div class="form-group">
                          <label class="control-label" for="first-name">first name <span class="req">*</span></label>
                          <input type="text" id="first-name" name="fname" class="form-control"  placeholder="" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="last-name">last name <span class="req">*</span></label>
                          <input type="text" id="last-name" name="lname" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="mail">email address <span class="req">*</span></label>
                          <input type="text" id="mail" name="email" class="form-control" placeholder="We promise not to share your email with anyone." required>
                        </div>
                        
                      </fieldset>
                      <!-- END Personal information--> 
                      
                      <!-- START Payment infromation -->
                      <fieldset class="col-md-6">
                        <legend>address</legend>
                        <div class="form-group">
                          <label class="control-label" for="address-one">address<span class="req">*</span></label>
                          <input type="text" id="address-one" name="address" class="form-control" placeholder="This will be your shipping address" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="address-two">City<span class="req">*</span></label>
                          <input type="text" id="address-two" name="city" class="form-control">
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="phone">phone number <span class="req">*</span></label>
                          <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                      </fieldset>
					   <fieldset class="col-md-12">
					    <div class="form-group">
                          <label class="control-label" for="year">State<span class="req">*</span></label>
                          <select id="year" name="state" class="selectpicker">
						  <option value="none">Select state</option>
						  <?php 
						  $state = "";
                             foreach($states as $key => $value){
                                   $selectedText = ($key == $state) ? "selected='selected'" : "";                                           
                          ?>
                            <option value="<?php echo e($key); ?>" <?php echo e($selectedText); ?>><?php echo e($value); ?></option>
						  <?php 
                              }
                          ?>
                          </select>
                        </div>
					   </fieldset>
                      <!-- END Payment information--> 
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <fieldset>
                          <legend>choose password</legend>
                          <div class="form-group">
                            <label class="control-label" for="card-number">password <span class="req">*</span></label>
                            <input type="password" id="card-number" name="pass" class="form-control"  placeholder="Use at least one lowercase letter, one numeral, and seven characters" required>
                          </div>
                          <div class="form-group">
                            <label class="control-label" for="password-confirm">confirm password <span class="req">*</span></label>
                            <input type="password" id="password-confirm" name="pass_confirmation" class="form-control">
                          </div>
                        </fieldset>
                      </div>
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-sm-6">
                            <fieldset>
                              <legend>NEWSLETTER</legend>
                              <p class="switch-label">Subscribe to our weekly newsletter</p>
                              <div id="switch-subscribe" class="switch-h1 switch-subscribe">
                                <div class="circle-h1"></div>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-sm-6">
                            <fieldset>
                              <legend>terms & conditions</legend>
                              <p class="switch-label">By clicking REGISTER you accept our <a href="<?php echo e(url('terms')); ?>">terms & conditions</a></p>
                              <div id="switch-accept" class="switch-h1 switch-accept">
                                <div class="circle-h1"></div>
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <hr>
                      </div>
                      <div class="col-sm-12">
                        <button class="btn btn-primary hvr-underline-from-center-primary " type="submit">register</button>
                        <br>
                        <br>
                      </div>
                    </div>
                  </form>
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/register.blade.php ENDPATH**/ ?>