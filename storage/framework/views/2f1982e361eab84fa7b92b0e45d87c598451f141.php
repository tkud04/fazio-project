<?php $__env->startSection('title',"Welcome"); ?>

<?php $__env->startSection('content'); ?>
 
 <?php echo $__env->make('banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  


  <?php if(!is_null($hasUnpaidOrders) && $hasUnpaidOrders): ?>
	<script>
      Swal.fire({
      title: `You have unpaid orders!`,
	  icon: 'warning',
      showCloseButton: true,
      html:
        `<h4 class="text-danger">Please make payment for your pending orders. If you have made payment, click <a href="orders">here</a> to confirm your payment`
})
    </script>
  <?php endif; ?>
  <!--start of middle sec-->
  <div class="middle-se"> 
    <?php
	//inner ad former dimension: 1920 x 725
	?>
    <!--start of wide ad-->
    <section class="container">
      <div class="row" style="margin-top: 20px;">
        <div class="col-sm-12">
          <div class="inner-ad">
         <figure><img class="img-responsive hidden-xs" src="<?php echo e($ad); ?>" width="1170" height="100" alt=""/></figure>
          <img class="img-responsive visible-xs" src="<?php echo e($ad); ?>" alt=""/>
        </div>
        </div>
      </div>
    </section>
    <!--end of wide ad--> 
	
	    <!--start of ad-boxes-->
		
    <section class="container">
      <div class="row" style="margin-top: 20px;">
	  <?php
	  $cc = [];
	  foreach($c as $ccc)
	  {
		  $temp = ['name' => "<span>".ucwords($ccc['category'])."</span>",'copy' => "",'url' => url('shop')."?category=".$ccc['category']];
		  array_push($cc,$temp);
	  }
	  // $cc = [
	         
	         // ['name' => "<span>ear</span>rings",'copy' => "",'url' => "shop/earrings"],
	         // ['name' => "<span>brace</span>lets",'copy' => "",'url' => "shop/bracelets"],
	         // ['name' => "<span>anklets</span>",'copy' => "",'url' => "anklets"],
	         // ['name' => "<span>brooches</span>",'copy' => "",'url' => "brooches"],
	         // ['name' => "<span>neck</span>laces",'copy' => "",'url' => "necklaces"],
	         // ['name' => "<span>rings</span>",'copy' => "",'url' => "rings"],
			// ];
	$cc = [
	    ['name' => "<span>".ucwords("earrings")."</span>",'copy' => "",'url' => url('shop')."?category=earrings"],
	    ['name' => "<span>".ucwords("brooches")."</span>",'copy' => "",'url' => url('shop')."?category=brooches"],
	    ['name' => "<span>".ucwords("rings")."</span>",'copy' => "",'url' => url('shop')."?category=rings"],
	];
	  $rings = ["images/sn-8.jpg"];
	  $brooches = ["images/sn-10.jpg"];
	  $earrings = ["images/ns-2.jpg"];
	  
	  shuffle($rings);
	  shuffle($brooches);
	  shuffle($earrings);
		
		$ccBackgrounds = [$earrings[0],$brooches[0],$rings[0]];
		
		for($i = 0; $i < 3; $i++)
		{
			$ccc = $cc[$i];
			$cu = url($ccc['url']);
	  ?>
       
        <div class="col-sm-12 col-md-4 ad-box-outer">
          <div class="small-ad">
            <figure class="effect-layla"><img class="img-responsive" src="<?php echo e($ccBackgrounds[$i]); ?>" width="370" height="200" alt=""/>
              <figcaption>
                <h3><?php echo $ccc['name']; ?></h3>
                <p><?php echo e($ccc['copy']); ?></p>
                <span class="start-price hvr-underline-from-center-primary"><a class="text-white" href="<?php echo e($cu); ?>">shop now</a> </span></figcaption>
            </figure>
          </div>
        </div>
		<?php
		}
		?>
      </div>
    </section>
    <!--end of ad-boxes--> 
    <!--start of new arrivals-->
    <section class="container">
      <div class="row"> 
        <!--start of big title-->
        
        <div class="col-sm-12 big-title text-uppercase text-center">
          <h3 class="text-primary">new arrivals</h3>
          <small>be the first to get them</small>
          <p><span class="ion-android-star-outline"></span></p>
        </div>
        <!--end of big title-->
        <div class="col-sm-12">
          <div id="products" class="row">
		  <?php
		   $naCount = count($na) < 12 ? count($na) : 12;
		   for($i = 0; $i < $naCount; $i++)
		   {
			   $n = $na[$i];
			   $sku = $n['sku'];
			   $name = $n['name'];
			   $displayName = $name == "" ? $sku : $name;
			   $uu = url('product')."?sku=".$sku;
			   $cu = url('add-to-cart')."?sku=".$sku."&qty=1";
			   $wu = url('add-to-wishlist')."?sku=".$sku;
			   $ccu = url('add-to-compare')."?sku=".$sku;
			   $pd = $n['pd'];
			   $description = $pd['description'];
			   $in_stock = $pd['in_stock'];
			   $amount = $pd['amount'];
			   $imggs = $n['imggs'];
			   if(count($imggs) < 2){
				   $oll = $imggs[0];
				   array_push($imggs,$oll);
			   }
			    
		  ?>
		    <!--start of product item container-->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 product-item-container effect-wrap effect-animate">
                          <div class="product-main">
                            <div class="product-view">
                              <figure class="double-img"><a href="<?php echo e($uu); ?>"><img class="btm-img " src="<?php echo e($imggs[1]); ?>" data-src="<?php echo e($imggs[1]); ?>" width="215" height="240"  alt=""/> <img class="top-img " src="<?php echo e($imggs[0]); ?>" data-src="<?php echo e($imggs[0]); ?>" width="215" height="240"  alt=""/></a></figure>
                            </div>
                            <div class="product-btns  effect-content-inner">
		   <p class="effect-icon"> <a href="javascript:void(0)" onclick="addToCart({sku:'<?php echo e($sku); ?>',qty:'1'})" class="hint-top" data-hint="Add To Cart"><span class="cart ion-bag"></span></a></p>
                              <p class="effect-icon"> <a href="javascript:void(0)" onclick="addToWishlist({sku:'<?php echo e($sku); ?>'})" class="hint-top" data-hint="Wishlist"><span class="fav ion-ios-star"></span></a></p>
                              <p class="effect-icon"> <a href="javascript:void(0)" onclick="addToCompare({sku:'<?php echo e($sku); ?>'})" class="hint-top" data-hint="Compare"> <span class="compare ion-android-funnel"></span> </a></p>
                               <p class="effect-icon">
		   <a data-toggle="modal" data-target="#quick-view-box" onclick="populateQV({sku:'<?php echo e($sku); ?>',name:'<?php echo e($name); ?>',description:`<?php echo e($description); ?>`,amount:'<?php echo e($amount); ?>',oldAmount:'<?php echo e($amount + 1000); ?>',inStock:'<?php echo e(ucwords($in_stock)); ?>',imgg:'<?php echo e($imggs[0]); ?>'})" class="hint-top" data-hint="Quick View"><span class="ion-ios-eye view"></span> </a>
		  				  </p>
                            </div>
                          </div>
                          <div class="product-info">
                            <h3 class="product-name"><a href="<?php echo e($uu); ?>"><?php echo e($displayName); ?></a></h3>
                            <p class="group inner list-group-item-text"><?php echo e($description); ?></p>
                            <div class="product-price"><span class="real-price text-info"><strong>&#8358;<?php echo e(number_format($amount,2)); ?></strong></span> <!--  <span class="old-price">&#8358;<?php echo e(number_format($amount + 1000,2)); ?></span> --></div> 
                          <div class="product-evaluate text-info"> <i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star-half"></i> </div>
                          </div>
                        </div>
                        <!--end of product item container-->
			<?php
			}
			?>
		  </div>
        </div>
      </div>
    </section>
    <!--end of new arrivals--> 

    
    <!--start of parallax subscribtion-->
    <div id="parallax" class="" data-speed="4">
      <section class="container">
        <div class="row">
          <div class="subscribe col-sm-12">
            <h3><span>luxury accessories</span> <small>. Ear rings and braceletes for women</small> </h3>
            <div class="subscribe-icn"> <a class="btn btn-primary hvr-underline-from-center-primary" href="<?php echo e(url('shop')); ?>">Discover Now</a> </div>
          </div>
        </div>
      </section>
    </div>
    
    <!--end of parallax subscribtion--> 
    
    <!--start of best selling-->
    <section class="container" data-speed="2">
      <div class="row"> 
        <!--start of big title-->
        <div class="col-sm-12 big-title text-uppercase text-center">
          <h3 class="text-primary">best selling</h3>
          <small></small>
          <p><span class="ion-android-star-outline"></span></p>
        </div>
        <!--end of big title-->
        <div class="col-sm-12">
          <ul class="row list-inline best-selling wow fadeIn" data-wow-offset="10" data-wow-duration="2s">
		   <?php
		   $bsCount = count($bs) < 12 ? count($bs) : 12;
		   for($i = 0; $i < $bsCount; $i++)
		   {
			   $b = $bs[$i];

			   $sku = $b['sku'];
			   $name = $b['name'];
			   $uu = url('product')."?sku=".$sku;
			   $cu = url('add-to-cart')."?sku=".$sku."&qty=1";
			   $wu = url('add-to-wishlist')."?sku=".$sku;
			   $ccu = url('add-to-compare')."?sku=".$sku;
			   $pd = $b['pd'];
			   $description = $pd['description'];
			   $in_stock = $pd['in_stock'];
			   $amount = $pd['amount'];
			   $imggs = $b['imggs'];
			   
			    if(count($imggs) < 2){
				   $oll = $imggs[0];
				   array_push($imggs,$oll);
			   }
			    
			   $dsc = 0;
				  
				  if( isset($discounts) && count($discounts) > 0)
				  {
					  foreach($discounts as $d)
					  {
						$dsc += $d['discount'];  
					  }
				  }
				
		  ?>
            <li class="col-sm-6 col-md-4">
              <div>
                <div class="row">
                  <div class="col-sm-6 col-md-4">
                    <figure><img class="img-responsive " src="<?php echo e($imggs[0]); ?>" data-src="<?php echo e($imggs[0]); ?>" width="200" height="230" alt=""/></figure>
                  </div>
                  <div class="col-sm-6 col-md-8">
                    <h3 class="product-name"><a href="<?php echo e($uu); ?>"><?php echo e($name); ?></a></h3>
                    <div class="product-price"> <span class="real-price text-info"><strong>&#8358;<?php echo e(number_format($amount -$dsc,2)); ?></strong></span> <?php if($dsc > 0): ?><span class="old-price"><del>&#8358;<?php echo e(number_format($amount + 1000,2)); ?></del></span><?php endif; ?> </div>
                    <div class="product-evaluate text-info"><span><i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star-half"></i></span></div>
                  </div>
                </div>
              </div>
            </li>
			<?php
		   }
			?>
           
          </ul>
        </div>
      </div>
    </section>
    <!--end of best selling--> 
	
	
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/index-2.blade.php ENDPATH**/ ?>