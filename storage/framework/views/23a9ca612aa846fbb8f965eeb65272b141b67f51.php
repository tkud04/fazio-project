<?php $__env->startSection('title',"No Results Found"); ?>

<?php $__env->startSection('content'); ?>
   <!--start of middle sec-->
<div class="middle-sec wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
    <div id="particles"><canvas class="pg-canvas" width="1349" height="450" style="display: block;"></canvas>
      <div id="not-found" class="wow fadeInDown  container animated animated" style="visibility: visible;">
        <div class="container">
          <h3 class="text-primary text-uppercase text-left">Sorry, we didn't find any result matching your search</h3>
          <br>
          <div class="row">
            <div class="col-sm-12  text-left">
              <h4 class="text-info text-uppercase sub-title">Please try to</h4>
              <ul class="arw-list list-unstyled">
                <li><i class="ion-android-checkmark-circle"></i> Check your spelling.</li>
                <li><i class="ion-android-checkmark-circle"></i> Try more general words.</li>
                <li><i class="ion-android-checkmark-circle"></i> Try different words that mean the same thing.</li>
                <li><i class="ion-android-checkmark-circle"></i> <a href="<?php echo e(url('shop')); ?>">Check our shop</a> instead.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end of middle sec--> 
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/search-not-found.blade.php ENDPATH**/ ?>