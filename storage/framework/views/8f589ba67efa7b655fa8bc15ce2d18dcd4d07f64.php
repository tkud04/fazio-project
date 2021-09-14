<?php $__env->startSection('title',"Transaction Successful"); ?>

<?php $__env->startSection('content'); ?>
<h3 style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Transaction successful</h3>

<b>Your payment was successful!</b><br>

<p>Fetching your orders.. <a href="<?php echo e(url('orders')); ?>">Click here</a> if you are not redirected within 10 seconds.</p>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<?php
$uu = url('orders');
?>
<script>
setTimeout(() => {
	window.location = "<?php echo e($uu); ?>";
},10000);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/cps.blade.php ENDPATH**/ ?>