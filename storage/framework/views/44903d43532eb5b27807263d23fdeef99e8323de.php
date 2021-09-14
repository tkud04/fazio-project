<?php $__env->startSection('title',"Contact Us"); ?>

<?php $__env->startSection('content'); ?>
   <!--start of middle sec-->
<div class="middle-sec wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
    <div class="page-header">
          <div class="container text-center">
        <h2 class="text-primary text-uppercase">contact us</h2>
        <p>Let us know what you have in mind and we will get back to you in an instant!</p>
      </div>
        </div>
    <section class="container equal-height-container">
          <div class="row">
        <div class="col-sm-12">
              <div class="row">
            <div class="col-sm-8 col-md-9 main-sec">
                  <div class="row">
                <div class="col-sm-12">
                      <ol class="breadcrumb  dashed-border">
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="active">Contact us</li>
                  </ol>
                    </div>
                <div class="col-sm-12">
                      <form method="post" id="contact-form" action="<?php echo e(url('contact')); ?>" accept-charset="UTF-8">
						  <?php echo csrf_field(); ?>

                    <fieldset>
                          <legend>contact us</legend>
                        </fieldset>
						<?php
						$name = ""; $phone = ""; $email = "";
						
						if($user != null)
						{
							$name = $user->fname." ".$user->lname;
							$email = $user->email;
							$phone = $user->phone;
						}
						?>
                    <ul class="row list-unstyled">
                          <li class="col-md-12">
                        <label class="control-label" for="comment-author">Your name <span class="req">*</span></label>
                        <input type="text" class="form-control" name="name"  value="<?php echo e($name); ?>" id="comment-author" required="">
                      </li>
                          <li class="col-md-12">
                        <label class="control-label" for="comment-email">Your email <span class="req">*</span></label>
                        <input type="email" class="form-control" name="email" value="<?php echo e($email); ?>" id="comment-email" required="">
                      </li>
					  <li class="col-md-12">
                        <label class="control-label" for="comment-email">Your phone number <span class="req">*</span></label>
                        <input type="number" class="form-control" name="phone" value="<?php echo e($phone); ?>" id="comment-phone" required="">
                      </li>
                          <li class="col-md-12">
                        <label class="control-label" for="comment-body">Your message <span class="req">*</span></label>
                        <textarea class="form-control" rows="5" cols="40" name="msg" id="comment-body" required=""></textarea><span class="help-block">350 characters maximum</span>
                      </li>
                          
                          <li class="col-md-12">
                        <button class="btn btn-primary  hvr-underline-from-center-primary" id="comment-submit" type="submit">Send Message</button>
                      </li>
                        </ul>
                  </form>
                    </div>
              </div>
                </div>
            <div class="col-sm-4 col-md-3 sub-data-right sub-equal">
                  <div class="row">
                <section class="col-sm-12">
                      <h5 class="sub-title text-info text-uppercase">Customer support</h5>
                      <p>We are here to help any way we can. We continually strive to make your shopping experience as convenient and easy as possible.<br><br> Should you have any questions about our products, your orders or further enquiries; please feel free to contact us by phone or by email.<br><br> 
                    <span class="small"> <span class="text-info text-capitalize"> <strong>Phone number</strong> :</span><br>
                        <a href="tel:2348097039692">+234 809 703 9692</a><br>
                        <span class="text-info text-capitalize"> <strong>Email us</strong> :</span><br>
                        <a href="#">support@aceluxurystore.com</a></span></p>
                    </section>
                
              </div>
                </div>
          </div>
            </div>
      </div>
        </section>
  </div>
  <!--end of middle sec--> 
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/contact.blade.php ENDPATH**/ ?>