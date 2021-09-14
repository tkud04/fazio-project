<?php
 $name = $data['name'];
 $email = $data['email'];
 $phone = isset($data['phone']) ? $data['phone'] : "";
 $msg = $data['msg'];
 ?>
<center><img src="http://www.aceluxurystore.com/images/logo.png" width="150" height="150"/></center>
<h3 style="background: #ff9bbc; color: #fff; padding: 10px 15px;">New message from: <?php echo e($name); ?></h3>
<p>Contact details: <?php echo e($email); ?> | <?php echo e($phone); ?></p><br>
<p>Message: <em><?php echo e($msg); ?></em></p><br><br>
<?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/emails/contact.blade.php ENDPATH**/ ?>