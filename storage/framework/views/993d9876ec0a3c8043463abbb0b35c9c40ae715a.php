  <?php
  $signal = $signals['okays'];
   $class = "warning";   
   $icon = "info";
   $title = "Success";
   if($val == "error"){
   	$signal = $signals['errors'];
   	$class = "danger";         
       $pop .= "-error";
	 $icon = "error";
   $title = "<strong>Oops...</strong>";
   }

   $bankHTML = "";   
   $amount = "0";
   
   if($pop == "payy-bank-status")
   {
	  $vv = json_decode($val);
      $dt = $vv->dt;	  
      $amount = $dt->amount;	  
   }
  ?>                
  
  <script>
if("<?php echo e($pop); ?>" == "add-to-cart-status"){
	let x1 = "<?php echo e(url('shop')); ?>",x2 = "<?php echo e(url('checkout')); ?>";
	Swal.fire({
  title: "<strong>Added to cart!</strong>",
  icon: 'info',
  html:
    '<em>What would you like to do next?</em>',
	showCloseButton: true,
  showCancelButton: true,
  focusConfirm: false,
  confirmButtonText:
    "<a class='text-white ion-basket-outline' href="+x1+">Continue shopping</a>",
  confirmButtonAriaLabel: 'Continue shopping',
  cancelButtonText:
     "<a class='text-white ion-wallet' href="+x2+">Checkout</a>",
  cancelButtonAriaLabel: 'Checkout'
})
}
else if("<?php echo e($pop); ?>" == "payy-bank-status"){
	let x3 = "<?php echo e(url('/')); ?>";
	//console.log("vv: ",vv);
	
	Swal.fire({
    title: "You've placed your order. Now make payment:",
  icon: 'info',
  showCloseButton: true,
  html:
     "<h4>Payment code<br><em>" + dt.payment_code + "</em></h4><h5 class='text-danger'><b>NOTE: </b>Make sure you include your payment code as reference when making payment.</h5><p class='text-primary'>Bank name: GTBank</p><p class='text-primary'>Account number: 0123456789</p><p class='text-primary'>Amount: &#8358;<?php echo e(number_format($amount,2)); ?></p>"
});

}
else if("<?php echo e($pop); ?>" == "add-to-wishlist-status"){
	let x1 = "<?php echo e(url('shop')); ?>",x2 = "<?php echo e(url('wishlist')); ?>";
	Swal.fire({
  title: "<strong>Added to wishlist!</strong>",
  icon: 'info',
  html:
    '<em>What would you like to do next?</em>',
	showCloseButton: true,
  showCancelButton: true,
  focusConfirm: false,
  confirmButtonText:
    "<a class='text-white ion-basket-outline' href="+x1+">Continue shopping</a>",
  confirmButtonAriaLabel: 'Continue shopping',
  cancelButtonText:
     "<a class='text-white ion-heart' href="+x2+">Go to wishlist</a>",
  cancelButtonAriaLabel: 'Go to wishlist'
})
}
else if("<?php echo e($pop); ?>" == "add-to-compare-status"){
	let x1 = "<?php echo e(url('shop')); ?>",x2 = "<?php echo e(url('compare')); ?>";
	Swal.fire({
  title: "<strong>Added to compare list!</strong>",
  icon: 'info',
  html:
    '<em>What would you like to do next?</em>',
	showCloseButton: true,
  showCancelButton: true,
  focusConfirm: false,
  confirmButtonText:
    "<a class='text-white ion-basket-outline' href="+x1+">Continue shopping</a>",
  confirmButtonAriaLabel: 'Continue shopping',
  cancelButtonText:
     "<a class='text-white ion-ios-search-strong' href="+x2+">Compare</a>",
  cancelButtonAriaLabel: 'Compare'
})
}
else{
Swal.fire({
  icon: '<?php echo e($icon); ?>',
  title: '<?php echo $title; ?>',
  text: '<?php echo e($signal[$pop]); ?>',
});
}
</script>
	<?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/session-status.blade.php ENDPATH**/ ?>