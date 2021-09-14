<?php
$a = $data['a'];
$name = $data['name'];
$message = $data['message'];
$debug = isset($data['debug']) ? $data['debug'] : false;
$imgs = $a['cmedia']['images'];
$n = ucwords($a['host']['fname']);


$uu = "http://etukng.tobi-demos.tk/my-bookings";

if(isset($debug) && $debug)
{
	$uu = "http://localhost:8000/my-bookings";
}

?>
 
<center><img src="http://etukng.tobi-demos.tk/img/etukng.png" width="150" height="100"/></center>
<h3 style="background: #be831d; color: #fff; padding: 10px 15px;"><?php echo e($subject); ?></h3>
<p><b>Hello <?php echo e($n); ?>,</b></p>
<p><?php echo e($name); ?> sent you a message:</p><br>
<blockquote><?php echo e($message); ?></blockquote>
<center>
<img src="<?php echo e($imgs[0]); ?>" alt="<?php echo e($a['name']); ?>" style="width: 150px; height: 150px; border-radius: 50%;"/><br>
<a style="padding: 30px 20px; margin-right: 5px;color: #fff!important; display: inline-block; text-decoration: none; background: green;" href="<?php echo e($uu); ?>">REPLY</a>
</center><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/emails/message.blade.php ENDPATH**/ ?>