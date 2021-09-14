<?php
  $totals = $order['totals'];
 $items = $order['items'];
 $itemCount = $totals['items'];
  $uu = "http://www.aceluxurystore.com/track?o=".$order['reference'];
?>
<center><img src="http://www.aceluxurystore.com/images/logo.png" width="150" height="150"/></center>
<h3 style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Payment confirmed!</h3>
Hello <?php echo e($name); ?>,<br> your payment for order <b><?php echo e($order['reference']); ?></b> has been cleared and your order is being processed. <br><br>

Reference #: <b><?php echo e($order['reference']); ?></b><br>
Notes: <b><?php echo e($order['notes']); ?></b><br><br>
<?php
foreach($items as $i)
{
	$product = $i['product'];
	$sku = $product['sku'];
	$name = $product['name'];
	$qty = $i['qty'];
	$pu = url('product')."?sku=".$product['sku'];
	$img = $product['imggs'][0];
	
?>

<a href="<?php echo e($pu); ?>" target="_blank">
  <img style="vertical-align: middle;border:0;line-height: 20px;" src="<?php echo e($img); ?>" alt="<?php echo e($sku); ?>" height="80" width="80" style="margin-bottom: 5px;"/>
	  <?php echo e($name); ?>

</a> (x<?php echo e($qty); ?>)<br>
<?php
}
?>
Total: <b>&#8358;<?php echo e(number_format($order['amount'],2)); ?></b><br><br>

<h5 style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Next steps</h5>

<p>Kindly click the button below to track your delivery. Alternatively you can log in to your Dashboard to track your order (go to Orders and click the Track button beside the order).<br> If you don't have an account you can simply click on <b>Orders</b> on our website and enter your order reference number (<b><?php echo e($order['reference']); ?>)</b></p><br>
<p style="color:red;"><b>NOTE:</b> Orders are delivered within 48 hours in Lagos.<br><br>Orders outside Lagos are delivered between 3 – 7 days.</p><br><br>

<a href="<?php echo e($uu); ?>" target="_blank" style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Track your order</a><br><br>

<?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/emails/confirm-payment.blade.php ENDPATH**/ ?>