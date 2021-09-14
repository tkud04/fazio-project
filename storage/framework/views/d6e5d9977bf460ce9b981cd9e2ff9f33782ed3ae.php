<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $__env->yieldContent('title'); ?> | Ace Luxury Store - Online Luxury Fashion Accessories Store in Lagos, Nigeria</title>
<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!-- Ionicons font -->
<link href="css/ionicons.min.css" rel="stylesheet">
<!-- Bootstrap styles-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--custom styles-->
<link href="css/custom.css" rel="stylesheet" />
<link href="css/custom-pink.css" rel="stylesheet"/>
<link href="css/custom-turquoise.css" rel="stylesheet" />
<link href="css/custom-purple.css" rel="stylesheet" />
<link href="css/custom-orange.css" rel="stylesheet" />
<link href="css/custom-blue.css" rel="stylesheet" />
<link href="css/custom-green.css" rel="stylesheet" />
<link href="css/custom-red.css" rel="stylesheet" />
<link href="css/custom-gold.css" rel="stylesheet" id="style">
<!--tooltiop-->
<link href="css/hint.css" rel="stylesheet">
<!-- animation -->
<link href="css/animate.css" rel="stylesheet" />
<!--select-->
<link href="css/bootstrap-select.min.css" rel="stylesheet">
<!--color picker-->
<link href="css/jquery.simplecolorpicker.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
<!-- favicon -->

<link rel="icon" type="image/png" href="images/favicon.png" sizes="16x16">

<?php echo $__env->yieldContent('styles'); ?>

<!--jQuery--> 
<script src="js/jquery.min.js"></script> 
<!--SweetAlert--> 
<link href="lib/sweet-alert/sweetalert2.css" rel="stylesheet">
<script src="lib/sweet-alert/sweetalert2.js"></script>
<!--wow animation--> 
<script src="js/wow.min.js"></script> 
<!--Bootstrap js--> 
<script src="js/bootstrap.min.js"></script> 
<!--pagination js--> 
<script src="js/pagination.js"></script>
<!--custom js--> 
<script src="js/custom.js"></script> 
</head>
<body>

<!-- DO NOT EDIT!! start of plugins -->
<?php $__currentLoopData = $plugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php echo $p['value']; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- DO NOT EDIT!! end of plugins -->

  <!--start of header-->
  <header>
    <div class="container">
      <div class="row"> <!--start of logo-->
        
        <!--end of logo--> <!--start of features-->
        <div class="col-sm-12 col-md-5 col-lg-5 feature hidden-xs">
          <div class="row">
            <div class="col-sm-12 feature-box ion-chatbubble-working">
              <dl  class="text-primary text-capitalize">
                <dt>Online Support</dt>
                <dd class="text-muted">24/7 if you need any help</dd>
              </dl>
            </div>
          </div>		  
        </div>
		<div class="col-sm-12 col-md-2 col-lg-2 ">
		   <a href="{{url('/" class="navbar-brand"></a>
		</div>
		<div class="col-sm-12 col-md-5 col-lg-5 feature hidden-xs">
          <div class="row pull-right">
			<div class="col-sm-12 feature-box ion-lock-combination">
              <dl  class="text-primary text-capitalize">
                <dt>Secure Payment</dt>
                <dd class="text-muted">We don't store your details</dd>
              </dl>
            </div>
          </div>
        </div>
        <!--end of features--> 
      </div>
    </div>
  </header>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/blank_layout.blade.php ENDPATH**/ ?>