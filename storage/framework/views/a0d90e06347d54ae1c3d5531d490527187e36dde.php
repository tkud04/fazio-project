<?php

$name = $a['name'];
$address = $a['address'];
$reviews = $a['reviews'];
$host = $a['host'];
$uu = url('apartment')."?xf=".$a['url'];
$imgs = $a['cmedia']['images'];
$n = $u->fname;
$approveURL = url('respond-to-reservation')."?type=approve&xf=".$l->id."&axf=".$a['apartment_id']."&gxf=".$u->id;
$declineURL = url('respond-to-reservation')."?type=decline&xf=".$l->id."&axf=".$a['apartment_id']."&gxf=".$u->id;

if(isset($admin) && $admin)
{
	$n = "admin";
	$approveURL = "http://etukadmin.tobi-demos.tk/respond-to-reservation?type=approve&xf=".$l->id."&axf=".$a['apartment_id']."&gxf=".$u->id;
    $declineURL = "http://etukadmin.tobi-demos.tk/respond-to-reservation?type=decline&xf=".$l->id."&axf=".$a['apartment_id']."&gxf=".$u->id;
}



?>
 
<center><img src="http://etukng.tobi-demos.tk/img/etukng.png" width="150" height="100"/></center>
<h3 style="background: #be831d; color: #fff; padding: 10px 15px;"><?php echo e($subject); ?></h3>
<p><b>Hello <?php echo e($n); ?>,</b></p>
<p>A Guest is trying to confirm if <em><?php echo e($name); ?></em> by <em><?php echo e($host['fname']." ".$host['lname']); ?></em> is available for booking.</p><br>

<center>
<img src="<?php echo e($imgs[0]); ?>" alt="<?php echo e($name); ?>" style="width: 150px; height: 150px; border-radius: 50%;"/><br>
<a style="padding: 30px 20px; margin-right: 5px;color: #fff!important; display: inline-block; text-decoration: none; background: green;" href="<?php echo e($approveURL); ?>">YES</a>
<a style="padding: 30px 20px; color: #fff!important; display: inline-block; text-decoration: none; background: red;" href="<?php echo e($declineURL); ?>">NO</a>
</center><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/emails/reserve-apartment.blade.php ENDPATH**/ ?>