<?php $__env->startSection('title',"Confirm Bank Payment"); ?>

<?php $__env->startSection('content'); ?>
   <!--start of middle sec-->
<div class="middle-sec wow fadeIn" data-wow-offset="10" data-wow-duration="2s">
    <div class="page-header">
      <div class="container text-center">
        <h2 class="text-primary text-uppercase">confirm payment</h2>
        <p>Confirm your bank payment for your order.</p>
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
                  <h5 class="sub-title text-info text-uppercase">confirm your payment</h5>
                  <p class="text-danger"><b>NOTE: </b>Make sure you include your payment code as reference when making payment. </p>
                  <p class="text-danger"><b>NOTE: </b>Your order would only be processed AFTER your payment has been cleared from our end. </p>
                  <br>
				  <dl>
                    <dt>Steps to take</dt>
                    <dd style="color:#777;">Make your payment to our bank account as displayed on this page.</dd>
                    <dd style="color:#777;">Add your payment code <b><?php echo e($order['payment_code']); ?></b> as reference when making a deposit or a transfer.</dd>
                    <dd style="color:#777;">After making payment, fill the form on the right and click Submit.</dd>
                    <dd style="color:#777;">Once your payment has been cleared your order will be processed.</dd>
                    <dd style="color:#777;">You have a maximum of 24 hours to confirm your payment or your order will be cancelled.</dd>
                   
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
                    <li><a href="#">Orders</a></li>
                    <li class="active">Confirm Payment</li>
                  </ol>
                </div>
                <!--end of breadcrumb--> 
                
                <!--start of checkout-->
                <div class="col-sm-12" style="color: #000;">
                  <form role="form" method="post" action="<?php echo e(url('confirm-payment')); ?>">
				   <?php echo csrf_field(); ?>

				   <input type="hidden" name="o" value="<?php echo e($order['reference']); ?>"/>
                    <div class="row"> 
                      
                      <!-- START Order information -->
                      <fieldset class="col-md-6">
                        <legend>Order information</legend>
                        <div class="form-group">
                          <label class="control-label" for="first-name">Order date</label>
                           <h4 class="form-control-plaintext"><?php echo e($order['date']); ?></h4>
                        </div><br>
                        <div class="form-group">
                          <label class="control-label" for="last-name">details</label>
						  <?php
						  $totals = $order['totals'];
						   $items = $totals['items'];
						  ?>
                          <h4 class="form-control-plaintext"><?php echo e($items); ?> items<br><br>Total: <b>&#8358;<?php echo e(number_format($order['amount'],2)); ?></b></h4>
                        </div><br>
                        <div class="form-group">
                          <label class="control-label" for="mail">payment code <span class="req">*</span></label>
                          <h4 class="form-control-plaintext"><?php echo e($order['payment_code']); ?></h4>
                        </div><br>
						<div class="form-group">
                          <label class="control-label" for="mail">please make payment to:</label>
                          <h4 class="form-control-plaintext" style="color: #000;">Bank: <?php echo e(ucwords($bank['bname'])); ?><br><br>Account name: <?php echo e(ucwords($bank['acname'])); ?><br><br>Account number: <?php echo e($bank['acnum']); ?></h4>
                        </div>
                      </fieldset>
                      <!-- END Order information-->
					  <?php
					  $email = is_null($user) ? $anon['email'] : $user['email'];
					  $phone = is_null($user) ? $anon['phone'] : $user['phone'];
					  ?>
					  <!-- START Bank information -->
                      <fieldset class="col-md-6">
                        <legend>Bank information</legend>
                        <div class="form-group">
                          <label class="control-label" for="bname">bank <span class="req">*</span></label>
                          <select id="bname" name="bname" class="form-control" onchange="selectBank();" required>
						    <option value="none">Select bank</option>
							<?php
							 foreach($banks as $key => $value)
							 {
							?>
							 <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
							<?php
							 }
							?>
							<option value="other">Other</option>
						  </select>
                          <input type="text" id="bname-other" name="bname-other" class="form-control" value="" placeholder="Enter bank name">
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="acname">account name <span class="req">*</span></label>
                          <input type="text" class="form-control" name="acname" placeholder="Enter account name" required>
                        </div>
						<div class="form-group">
                          <label class="control-label" for="acnum">account number <span class="req">*</span></label>
                          <input type="number" class="form-control" name="acnum" placeholder="Enter account number" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="mail">email address <span class="req">*</span></label>
                          <input type="text" id="mail" name="email" class="form-control" value="<?php echo e($email); ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="phone">phone number <span class="req">*</span></label>
                          <input type="text" id="phone" name="phone" class="form-control" value="<?php echo e($phone); ?>" readonly>
                        </div>
                      </fieldset>
                      <!-- END Personal information--> 
					  <div class="col-sm-12">
					    <center>
                        <button class="btn btn-primary hvr-underline-from-center-primary " type="submit">submit</button>
                        </center>
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/confirm-payment.blade.php ENDPATH**/ ?>