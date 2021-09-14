<!--start of banner-->
  <div id="banner">
  <?php
    /**
    $bbanners = [
	  ['img' => "images/sn-8.jpg", "title" => "This is a Orifajo Title 7", "subtitle" => "This is a Dabgana Orijinal Subtitle","copy" => ""],
	  ['img' => "images/ns-2.jpg", "title" => "This is a Orifajo Title 2", "subtitle" => "This is a Dabgana Orijinal Subtitle","copy" => ""]
	];
	**/

    foreach($banners as $b)
	{
	  $img = $b['img'];
	  $subtitle = $b['subtitle'];
	  $title = $b['title'];
	  $copy = $b['copy'];
  ?>
    <div class="item">
	 <div class="row">
	<div class="col-md-3 col-sm-12">
	  <section style="margin-left: 10px;">
                <h5 class="sub-title text-info text-uppercase text-center">Categories</h5>
                <ul class="list-group nudge" style="text-align: center;">
				<?php
				  $i = 0;
				 for($i = 0; $i < 4; $i++)
				 {
					 $k = $c[$i];
					 $style = $i == 0 ? 'style="padding-left: 0px;"' : '';
					 $uu = url('shop')."?category=".$k['category'];
				?>
                  <li class="list-group-item"><a href="<?php echo e($uu); ?>"<?php echo e($style); ?>><?php echo e($k['name']); ?></a></li>
				<?php
				 }
				?>
                  <li class="list-group-item"><a href="<?php echo e(url('shop')); ?>">View more</a></li>
                  <li class="list-group-item"><br></li>
                </ul>
              </section> 
	</div>
	<div class="col-md-6 col-sm-12" style="background: #000;">
	<img class="img-responsive hidden-xs" src="<?php echo e($img); ?>" style="height: 400px; width: 1500px; object-fit: contain;" alt=""/>
    <img class="img-responsive visible-xs" src="<?php echo e($img); ?>" style="height: 400px; width: 1500px; object-fit: contain;" alt=""/>
      <div class="slider-caption">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-8 col-lg-6 caption-body">
              <h2 class="title fadeInDownBig wow" ><?php echo e(strtoupper($subtitle)); ?></h2>
              <h1 class="title fadeInDownBig wow"> <?php echo e(strtoupper($title)); ?></h1>
              <p class="subtitle col-sm-9 fadeInUp wow hidden-xs"><?php echo e(strtoupper($copy)); ?></p>
              <div class="clearfix"></div>
              <a class="btn btn-primary fadeInUp wow hvr-underline-from-center-primary hidden-xs" href="<?php echo e(url('shop')); ?>"> <i class="rm-icon ion-android-checkmark-circle"></i> <span>Shop Now</span> </a> 
			  </div>
          </div>
        </div>
      </div>
    </div>
	<div class="col-md-3 col-sm-12"></div>
    </div>
	</div>
	<?php
	}
	?>
  </div>
  <!--end of banner--> <?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/banner.blade.php ENDPATH**/ ?>