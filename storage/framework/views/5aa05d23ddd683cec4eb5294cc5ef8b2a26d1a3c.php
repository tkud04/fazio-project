<?php $__env->startSection('title',"Wishlist"); ?>

<?php $__env->startSection('styles'); ?>
  <!-- DataTables CSS -->
  <link href="lib/datatables/css/buttons.bootstrap.min.css" rel="stylesheet" /> 
  <link href="lib/datatables/css/buttons.dataTables.min.css" rel="stylesheet" /> 
  <link href="lib/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet" /> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <!--start of middle sec-->
<div class="middle-sec wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
    <div class="page-header">
      <div class="container text-center">
        <h2 class="text-primary text-uppercase">wishlist</h2>
      </div>
    </div>
    <section class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-12">
              <div class="inner-ad">
                <figure>
                  <figure><img class="img-responsive" src="<?php echo e($ad); ?>" width="1170" height="100" alt=""></figure>
                </figure>
              </div>
            </div>
            <div class="col-sm-12">
              <ol class="breadcrumb dashed-border row">
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li class="active">wishlist</li>
              </ol>
            </div>
            <!--start of columns-->
            <div class="col-sm-12">
              <div class="row extra-btm-padding">
                <div class="table-responsive m-t-40 wow fadeInUp">
                	   <table class="table ace-table">
				   <thead>
                        <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Stock status</th>
                                    <th>Actions</th>                                                                       
                                </tr>
                       </thead>
					<tbody>
					<?php
					  if(count($wishlist) > 0)
					  {
						 foreach($wishlist as $w)
						 {
							 $product = $w['product'];
							 $pd = $product['pd'];
							 $sku = $product['sku'];
							 $amount = $pd['amount'];
							 $statusClass = $pd['in_stock'] == "new" ? "success" : "info";
							 $uu = url('add-to-cart')."?from_wishlist=yes&qty=1&sku=".$sku;
							 $du = url('remove-from-wishlist')."?sku=".$sku;
							 $pu = url('product')."?sku=".$sku;
							 
							  $imggs = $product['imggs'];
			                  if(count($imggs) < 2){
				                $oll = $imggs[0];
				                array_push($imggs,$oll);
			                  }
				    ?>
					 <tr>
					    <td>
						  <div class="row">
						    <div class="col-md-4 col-xs-12">
							  <img class="img img-responsive" src="<?php echo e($imggs[0]); ?>" width="150" height="150"  alt=""/>
							</div>
						    <div class="col-md-8 col-xs-12">
							  <a href="<?php echo e($pu); ?>" target="_blank"><?php echo e($sku); ?></a>
							</div>
						  </div>
						 
					   </td>
					   <td>&#8358;<?php echo e(number_format($pd['amount'],2)); ?></td>		  
					   <td><span class="label label-<?php echo e($statusClass); ?>"><?php echo e(strtoupper($pd['in_stock'])); ?></span></td>
					   <td>
					     <a class="btn btn-info" href="javascript:void(0)" onclick="addToCart({sku:'<?php echo e($sku); ?>',fromWishlist:'yes',qty:'1'})">Add to cart</span></a>
					     <a class="btn btn-danger" href="javascript:void(0)" onclick="removeFromWishlist({sku:'<?php echo e($sku); ?>'})"><span class="ion-android-delete"></span></a>
					   </td>
					 </tr>
					<?php
						 }  
					  }
                    ?>						  
					</tbody>
				  </table>
				</div>
              </div>
            
            </div>
            <!--start of columns--> 
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--end of middle sec--> 
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- DataTables js -->
       <script src="lib/datatables/js/datatables.min.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="lib/datatables/js/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="lib/datatables/js/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="lib/datatables/js/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="lib/datatables/js/datatables-init.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/wishlist.blade.php ENDPATH**/ ?>