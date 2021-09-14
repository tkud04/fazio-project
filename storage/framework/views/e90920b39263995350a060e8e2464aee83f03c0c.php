<?php $__env->startSection('title',ucwords($samba)); ?>

<?php $__env->startSection('content'); ?>
   <!--start of middle sec-->
  <div class="middle-sec wow fadeIn" data-wow-offset="10" data-wow-duration="2s">
    <div class="page-header">
      <div class="container text-center">
        <h2 class="text-primary text-uppercase">Shop</h2>
        <p>Browse through our catalog of amazing products! </p>
      </div>
    </div>
    <section class="container">
      <div class="row">
        <?php if($agent->isDesktop()): ?>
        <div class="col-sm-12">
          <div class="inner-ad">
            <figure><img class="img-responsive" src="<?php echo e($ad); ?>" width="1170" height="100" alt=""></figure>
          </div>
        </div>
	   <?php endif; ?>
        <div class="col-sm-12 equal-height-container">
          <div class="row">
		  <?php if($agent->isDesktop()): ?>
            <div class="col-sm-4 col-md-3  sub-data-left sub-equal">
              <section>
                <h5 class="sub-title text-info text-uppercase">Categories</h5>
                <ul class="list-group nudge">
				<?php
				  $i = 0;
				 foreach($c as $cc)
				 {
					 $style = $i == 0 ? 'style="padding-left: 0px;"' : '';
					  $ccu = url('shop')."?category=".$cc['category'];
					  ++$i;
				?>
                  <li class="list-group-item"><a href="<?php echo e($ccu); ?>"<?php echo e($style); ?>><?php echo e(ucwords($cc['category'])); ?></a></li>
				<?php
				 }
				?>
                  
                </ul>
              </section>        
              <section> <img width="820" height="703" alt="" src="images/banner5.png" class="img-responsive"> </section>
              <section class="col-sm-12 tags">
                <h5 class="sub-title text-info text-uppercase">popular tags</h5>
				<?php
				  $e
				?>
                <a href="#">travel</a> <a href="#">blog</a> <a href="#">lifestyle</a></section>
            </div>
			<?php endif; ?>
            <div class="col-sm-8 col-md-9 col-lg-9 main-sec">
              <div class="row"> 
                
                <!--start of breadcrumb-->
                <div class="col-sm-12">
                  <ol class="breadcrumb dashed-border">
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo e(url('shop')); ?>">Shop</a></li>
                    <li class="active"><?php echo e($samba); ?></li>
                  </ol>
                </div>
                <!--end of breadcrumb--> 
                
				 <?php if(count($products) > 0): ?>
                <!--start of display settings-->
                
                <div class="col-sm-12">
                  <div class="dashed-border ">
                    <ul class="list-inline view-style top-menu row">
					<!--
                      <li class="col-sm-3 col-md-2">
                        <select class="selectpicker">
                          <option>Sort By</option>
                          <option>Position</option>
                          <option>Name</option>
                          <option>Price</option>
                        </select>
                      </li>
					 -->
                     
                      <li  class="col-sm-3 col-md-2">  
                        <select class="selectpicker" id="per-page">
                          <option value="none">Show per page</option>
                          <option value="9" selected="selected">9</option>
                          <option value="12">12</option>
                          <option value="15">15</option>
                        </select>
                      </li>
					  <li  class="col-sm-3 col-md-2"></li>
                      <li class="text-right col-sm-6 col-md-8">
                        <div class="btn-group">
                          <button id="grid" class="btn btn-primary hvr-underline-from-center-primary" > <span class="ion-android-apps"></span> </button>
                          <button id="list" class="btn btn-primary hvr-underline-from-center-primary" > <span class="ion-android-menu"></span> </button>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!--end of display settings-->
				<?php endif; ?>
                
                <div class="col-sm-12">
				 <?php if(count($products) > 0): ?>
                  <div class="row" id="pagination-row">
                    <div class="col-sm-12">
                      <div id="products" class="row">
					  <script>
					  let page = 1, perPage = 9;
					   let products = [];
					  </script>
		  <?php
		   foreach($products as $n)
		   {
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
		  <script>
		   ppd = "<?php echo e(json_encode($pd,JSON_HEX_APOS|JSON_HEX_QUOT)); ?>";
		  ppd = ppd.replace(/&quot;/g, '\"');
		  
		  imggs = "<?php echo e(json_encode($imggs,JSON_HEX_APOS|JSON_HEX_QUOT)); ?>";
		  imggs = imggs.replace(/&quot;/g, '\"');
		   temp = {
			   sku: "<?php echo e($sku); ?>",
			   name: "<?php echo e($name); ?>",
			   uu: "<?php echo e($uu); ?>",
			   cu: "<?php echo e($cu); ?>",
			   wu: "<?php echo e($wu); ?>",
			   ccu: "<?php echo e($ccu); ?>",
			   pd: ppd,
			   description: `<?php echo e($description); ?>`,
			   inStock: "<?php echo e($in_stock); ?>",
			   amount: "<?php echo e($amount); ?>",
			   imggs: imggs,
		   };
		   products.push(temp);
		  </script>
		  <?php
			}
			?>

			
		              </div>
                    </div>
                    <!--start of pagination-->
                    <div class="col-sm-12">
                      <nav role="navigation">
					  
                        <ul class="cd-pagination">
						 <li class="button"><a href="javascript:void(0)" onclick="showPreviousPage();">Prev</a> </li>
						<?php
						 $pages = (count($products) < 9) ? 1 : ceil(count($products) / 9);
					     for($i = 0; $i < $pages; $i++)
						 {
					    ?>
                          <li><a href="javascript:void(0)" onclick="showPage(<?php echo e($i+1); ?>);"><?php echo e($i+1); ?></a> </li>
                         <?php
						 }
						 ?>
                          <li class="button"><a href="javascript:void(0)" onclick="showNextPage();">Next</a></li>
                        </ul>
                      </nav>
                    </div>
                    <!--end of pagination--> 
                  </div>
				  <?php else: ?>
					  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
					    <div class="col-sm-12">
						  <h2 class="text-primary">Nothing found in that category</h2><br>
						  <h4 class="text-primary">Check out our new arrivals instead:</h4>
						</div><br><br>
		  <?php
		   foreach($na as $n)
		   {
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
                              <figure class="double-img"><a href="<?php echo e($uu); ?>"><img class="btm-img" src="<?php echo e($imggs[1]); ?>" width="215" height="240"  alt=""/> <img class="top-img" src="<?php echo e($imggs[0]); ?>" width="215" height="240"  alt=""/></a></figure>
                            </div>
                            <div class="product-btns  effect-content-inner">
		   <p class="effect-icon"> <a href="javascript:void(0)" onclick="addToCart({sku:'<?php echo e($sku); ?>',qty:'1'})" class="hint-top" data-hint="Add To Cart"><span class="cart ion-bag"></span></a></p>
                              <p class="effect-icon"> <a href="javascript:void(0)" onclick="addToWishlist({sku:'<?php echo e($sku); ?>'})" class="hint-top" data-hint="Wishlist"><span class="fav ion-ios-star"></span></a></p>
                              <p class="effect-icon"> <a href="javascript:void(0)" onclick="addToCompare({sku:'<?php echo e($sku); ?>'})" class="hint-top" data-hint="Compare"> <span class="compare ion-android-funnel"></span> </a></p>
                               <p class="effect-icon">
		   <a data-toggle="modal" data-target="#quick-view-box" onclick="populateQV({sku:'<?php echo e($sku); ?>',description:`<?php echo e($description); ?>`,amount:'<?php echo e($amount); ?>',oldAmount:'<?php echo e($amount + 1000); ?>',inStock:'<?php echo e(ucwords($in_stock)); ?>',imgg:'<?php echo e($imggs[0]); ?>'})" class="hint-top" data-hint="Quick View"><span class="ion-ios-eye view"></span> </a>
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
				  <?php endif; ?>
                </div>
              </div>
            </div>
			<?php if($agent->isMobile()): ?>
            <div class="col-sm-4 col-md-3  sub-data-left sub-equal">
              <section>
                <h5 class="sub-title text-info text-uppercase">Categories</h5>
                <ul class="list-group nudge">
				<?php
				  $i = 0;
				 foreach($c as $cc)
				 {
					 $style = $i == 0 ? 'style="padding-left: 0px;"' : '';
					  $ccu = url('shop')."?category=".$cc['category'];
					  ++$i;
				?>
                  <li class="list-group-item"><a href="<?php echo e($ccu); ?>"<?php echo e($style); ?>><?php echo e(ucwords($cc['category'])); ?></a></li>
				<?php
				 }
				?>
                  
                </ul>
              </section>        
              <section> <img width="820" height="703" alt="" src="images/banner5.png" class="img-responsive"> </section>
              <section class="col-sm-12 tags">
                <h5 class="sub-title text-info text-uppercase">popular tags</h5>
				<?php
				  $e
				?>
                <a href="#">travel</a> <a href="#">blog</a> <a href="#">lifestyle</a></section>
            </div>
			<?php endif; ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--end of middle sec--> 
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
console.log("products: ",products);
let productsLength = products.length;
showPage(1);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/shop.blade.php ENDPATH**/ ?>