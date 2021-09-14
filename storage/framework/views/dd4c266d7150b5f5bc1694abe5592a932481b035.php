<?php $__env->startSection('title',"Profile"); ?>

<?php $__env->startSection('content'); ?>
   <!--start of middle sec-->
<div class="middle-sec wow fadeIn" data-wow-offset="10" data-wow-duration="2s">
    <div class="page-header">
      <div class="container text-center">
        <h2 class="text-primary text-uppercase">profile</h2>
        <p>View or edit your account information.</p>
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
                  <h5 class="sub-title text-info text-uppercase">Ads</h5>
                  <p>With an account you can enjoy lots of benefits </p>
                  <dl>
                    <dt>Saving Time</dt>
                    <dd>A description list is perfect for defining terms.</dd>
                    <dt>Save Your Shipping Address</dt>
                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                    <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                    <dt>Home Delivery</dt>
                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
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
                    <li><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
                    <li class="active">Profile</li>
                  </ol>
                </div>
                <!--end of breadcrumb--> 
                
                <!--start of checkout-->
                <div class="col-sm-12">
                  <form role="form" method="post" action="<?php echo e(url('profile')); ?>">
				   <?php echo csrf_field(); ?>

                    <div class="row"> 
                      
                      <!-- START Presonal information -->
                      <fieldset class="col-md-6">
                        <legend>Personal information</legend>
                        <div class="form-group">
                          <label class="control-label" for="first-name">first name <span class="req">*</span></label>
                          <input type="text" id="first-name" name="fname" class="form-control" value="<?php echo e($account['fname']); ?>"  placeholder="" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="last-name">last name <span class="req">*</span></label>
                          <input type="text" id="last-name" name="lname" value="<?php echo e($account['lname']); ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="mail">email address <span class="req">*</span></label>
                          <input type="text" id="mail" name="email" class="form-control" value="<?php echo e($account['email']); ?>" placeholder="We promise not to share your email with anyone." required readonly>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="phone">phone number <span class="req">*</span></label>
                          <input type="text" id="phone" name="phone" value="<?php echo e($account['phone']); ?>" class="form-control" required>
                        </div>
                      </fieldset>
                      <!-- END Personal information--> 
                      
                      <!-- START Payment infromation -->
                      <fieldset class="col-md-6">
                        <legend>shipping address</legend>
                        <div class="form-group">
                          <label class="control-label" for="address-one">address<span class="req">*</span></label>
                          <input type="text" id="address-one" name="address" class="form-control" value="<?php echo e($ss['address']); ?>" placeholder="This will be your shipping address" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="address-two">City<span class="req">*</span></label>
                          <input type="text" id="address-two" name="city" value="<?php echo e($ss['city']); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="year">State<span class="req">*</span></label>
                          <select id="year" name="state" class="selectpicker">
						  <option value="none">Select state</option>
						  <?php 
						  $state = "";
                             foreach($states as $key => $value){
                                   $selectedText = ($key == $ss['state']) ? "selected='selected'" : "";                                           
                          ?>
                            <option value="<?php echo e($key); ?>" <?php echo e($selectedText); ?>><?php echo e($value); ?></option>
						  <?php 
                              }
                          ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="postal-code">postal code<span class="req">*</span></label>
                          <input type="text" id="postal-code" name="zip" value="<?php echo e($ss['zipcode']); ?>" class="form-control" required>
                        </div>
                      </fieldset>
                      <!-- END Payment information--> 
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <button class="btn btn-primary hvr-underline-from-center-primary " type="submit">submit</button>
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/profile.blade.php ENDPATH**/ ?>