<?php
 $totals = $order['totals'];
 $items = $order['items'];
 $itemCount = $totals['items'];
 $uu = "http://admin.aceluxurystore.com/confirm-payment?o=".$order['reference'];
?>
<center><img src="http://www.aceluxurystore.com/images/logo.png" width="150" height="150"/></center>
<h3 style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Confirm payment for order {{$order['payment_code']}}</h3>
Hello admin,<br> kindly confirm that payment for the below referenced order has been cleared:<br><br>
Reference #: <b>{{$order['reference']}}</b><br>
Customer: <b>{{$user}}</b><br>
Bank name: <b>{{$bname}}</b><br>
Account name: <b>{{$acname}}</b><br>
Account number: <b>{{$acnum}}</b><br>
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

<a href="{{$pu}}" target="_blank">
  <img style="vertical-align: middle;border:0;line-height: 20px;" src="{{$img}}" alt="{{$sku}}" height="80" width="80" style="margin-bottom: 5px;"/>
	  {{$name}}
</a> (x{{$qty}})<br>
<?php
}
?>
Total: <b>&#8358;{{number_format($order['amount'],2)}}</b><br><br>
<h5 style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Next steps</h5>

<p>If the payment has been cleared, please click the button below to confirm the order. Alternatively you can log in to the Admin Dashboard to confirm the order (go to Orders and click the Confirm button beside the order).</p><br>
<p style="color:red;"><b>NOTE:</b> If the payment has not been cleared, do not confirm the order.</p><br><br>

<a href="{{$uu}}" target="_blank" style="background: #ff9bbc; color: #fff; padding: 10px 15px;">Confirm this order</a><br><br>

