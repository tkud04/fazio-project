<?php $__env->startSection('title',"Cart"); ?>

<?php $__env->startSection('content'); ?>
   <!--start of middle sec-->
<div class="middle-sec wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
    <div class="page-header">
      <div class="container text-center">
        <h2 class="text-primary text-uppercase">My shopping cart</h2>
        <p>Why stop here? <a href="<?php echo e(url('shop')); ?>">Continue shopping</a></p>
      </div>
    </div>
    <section class="container equal-height-container">
      <div class="row">
        <div class="col-sm-12 ">
          <div class="inner-ad">
            <figure><img class="img-responsive" src="<?php echo e($ad); ?>" width="1170" height="100" alt=""></figure>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="row"> 
            
            <!--main sec start-->
            
            <div class="col-sm-8 col-md-9 main-sec shopping-cart">
              <div class="row">
                <div class="col-sm-12">
                  <ol class="breadcrumb  dashed-border">
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="active">Shopping cart</li>
                  </ol>
                </div>
                <div class="col-sm-12">
                  <ul class="item-list list-group">
				    <?php
					
					
				    for($a = 0; $a < count($cart); $a++)
				    {
					  $item = $cart[$a]['product'];
					  $sku = $item['sku'];
					  $name = $item['name'];
					  $uu = url('product')."?sku=".$sku;
					  $qty = $cart[$a]['qty'];
					  $itemText = $qty == 1 ? "Item" : "Items";
					  $itemAmount = $item['pd']['amount'];
					  #$newAmount =  $totals['newAmount'];
					  $itemDescription = $item['pd']['description'];
					  $imggs = $item['imggs'];
					  $ru = url('remove-from-cart').'?sku='.$sku;
				    ?>
                    <li class="item list-group-item  clearfix">
                      <div class="item-information">
                        <div class="row">
                          <div class="item-image col-sm-2"> <img class="img-responsive" src="<?php echo e($imggs[0]); ?>" width="126" height="144" alt=""> </div>
                          <div class="item-body col-sm-8">
                            <h5 class="item-title text-primary text-uppercase text-primary text-uppercase"><a href="<?php echo e($uu); ?>"><?php echo e($name); ?></a></h5>
                            <p class="item-description"><?php echo e($itemDescription); ?></p>
							
							<div class="text-info">
						    <div class="product-quantity">
                        <h5 class="text-primary text-uppercase">select quantity</h5>
                        <div class="qty-btngroup clearfix pull-left">
                          <button type="button" class="minus">-</button>
                          <input type="text" id="qty-<?php echo e($sku); ?>" value="<?php echo e($qty); ?>">
                          <button type="button" class="plus">+</button>
                        </div>
                        <a href="javascript:void(0)" onclick="updateCart({sku:'<?php echo e($sku); ?>'})" class="btn btn-primary pull-left hvr-underline-from-center-primary">Update Cart</a> </div>
                    </div>
                          </div>
                          <div class="item-price js-item-price col-sm-2 text-info text-center" data-price="11.99"> <strong>&#8358;<?php echo e(number_format($itemAmount * $qty, 2)); ?></strong> </div>
                        </div>
                      </div>
                      <div class="item-interactions">
                        <div class="row">
                          <div class="col-sm-10 text-info"><span data-quantity="<?php echo e($qty); ?>"> <strong><?php echo e($qty); ?></strong> <?php echo e($itemText); ?> </span></div>
                          <div class="col-sm-2 item-remove"><a href="javascript:void(0)" onclick="removeFromCart({sku:'<?php echo e($sku); ?>'})" class=" js-item-remove hint-top btn btn-primary " data-hint="Remove"></a> </div>
                        </div>
                      </div>
                    </li>
				   <?php
			       }
			      ?>
                  </ul>
                </div>
              </div>
            </div>
            
            <!--main sec end--> 
            
            <!--sub data start-->
            <div class="col-sm-4 col-md-3 sub-data-right sub-equal">
              <div class="row">
                <div id="sticky">
                  <section class="col-sm-12">
				  <?php
				  $dsc = 0;
				  
				  if( isset($totals['discounts']) && count($totals['discounts']) > 0)
				  {
					  foreach($totals['discounts'] as $d)
					  {
						$dsc += $d;  
					  }
					   $dsc *= $qty;
				  }
				  
				  ?>
                    <h5 class="sub-title text-info text-uppercase">order summary</h5>
                    <ul class="list-group summary">
                      <li class="list-group-item text-uppercase"><strong>items:<span class="pull-right"> <?php echo e($totals['items']); ?></span></strong></li>
                      <li class="list-group-item text-uppercase"><strong>discount:<span class="pull-right"> &#8358;<?php echo e(number_format($dsc,2)); ?></span></strong></li>
                      </ul>
                  </section>
                  <section class="col-sm-12">
                    <h5 class="sub-title text-info text-uppercase">subtotal</h5>
                    <div class=" summary sum js-total text-center"> <strong> &#8358;<?php echo e(number_format($totals['subtotal'],2)); ?></strong> </div>
                    <a href="<?php echo e(url('checkout')); ?>" class="btn btn-block btn-default hvr-underline-from-center-default">Checkout</a>
                  </section>
                </div>
              </div>
              <!--sub data end--> 
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--end of middle sec--> 
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/cart.blade.php ENDPATH**/ ?>