<?php $__env->startSection('title',"Track Your Order"); ?>

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
        <h2 class="text-primary text-uppercase">Tracking order #<?php echo e($r); ?></h2>
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
                <li class="active">track your order</li>
              </ol>
            </div>
            <!--start of columns-->
            <div class="col-sm-12">
              <div class="row extra-btm-padding">
                <div class="table-responsive m-t-40 wow fadeInUp">
                	   <table class="table ace-table">
				   <thead>
                        <tr>
                                    <th>Date</th>
                                    <th>Status</th>                                                                       
                                    <th>Description</th>                                                                       
                                </tr>
                       </thead>
					<tbody>
					<?php
					  if(count($trackings) > 0)
					  {
						 foreach($trackings as $t)
						 {
				    ?>
					 <tr>
					   <td><?php echo e($t['date']); ?></td>
					   <td><?php echo e($t['status']); ?></td>
					   <td><?php echo e(strtoupper($t['description'])); ?></td>
					 </tr>
					<?php
						 }  
					  }
					  else
					  {
						  $descc = "Your order is being processed and will be dispatched soon.";
						  if($paidStatus == "unpaid") $descc = "We are yet to receive payment for your order. Please ensure to add your reference number <b>$r</b> if you are paying via bank transfer.<br><br>If you have made payment please be patient your order will be processed as soon as your payment is cleared.";
				    ?>
					<tr>
					   <td><?php echo e(date("jS F Y h:i A")); ?></td>
					   <td><span style="color: red;">Pending</span></td>
					   <td><?php echo $descc; ?></td>
					 </tr>
					<?php
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/track-results.blade.php ENDPATH**/ ?>