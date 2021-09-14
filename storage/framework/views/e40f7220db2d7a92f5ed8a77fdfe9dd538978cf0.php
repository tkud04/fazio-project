
<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
        <title><?php echo $__env->yieldContent('title'); ?> | Etuk NG - Rent Apartments For Short Rest Anywhere In Nigeria</title>
		
        <!-- All Plugins Css -->
        <link rel="stylesheet" href="<?php echo e(asset('css/plugins.css')); ?>">
		 
		
        <!-- Custom CSS -->
        <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
		
		<!-- Custom Color Option -->
		<link href="<?php echo e(asset('css/colors.css')); ?>" rel="stylesheet">
		
		<style type="text/css">
		  .layout-cart-link{
			  cursor: pointer;
		  }
		</style>
		
		<?php echo $__env->yieldContent('styles'); ?>
		
		<link rel="icon" type="image/png" href="<?php echo e(asset('img/favicon.png')); ?>" sizes="16x16">
		
		
<!-- DO NOT EDIT!! start of plugins -->
<?php $__currentLoopData = $plugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php echo $p['value']; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- DO NOT EDIT!! end of plugins -->
		
		<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
		
		<!--AutoComplete.js--> 
    <link href="<?php echo e(asset('lib/autocomplete/css/autoComplete.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('lib/autocomplete/js/autoComplete.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/autocomplete/js/index.js')); ?>"></script>
		
		<script src="<?php echo e(asset('js/helpers.js').'?ver='.rand(23,999)); ?>"></script>
		<script src="<?php echo e(asset('js/mmm.js').'?ver='.rand(23,999)); ?>"></script>
		
		<?php echo $__env->yieldContent('scripts'); ?>
		 <!--Simeditor--> 
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/simeditor/css/simditor.css')); ?>" />
        <script type="text/javascript" src="<?php echo e(asset('lib/simeditor/js/module.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('lib/simeditor/js/hotkeys.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('lib/simeditor/js/uploader.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('lib/simeditor/js/simditor.js')); ?>"></script>		
		
		
	
	<!--SweetAlert--> 
    <link href="<?php echo e(asset('lib/sweet-alert/sweetalert2.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('lib/sweet-alert/sweetalert2.js')); ?>"></script>
		
    </head>
	
    <body class="orange-skin">
	
		 <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
		
		<div id="main-wrapper">
		 <?php echo $__env->yieldContent('top-header'); ?>
		 
		 <div class="header header-light">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="<?php echo e(url('/')); ?>">
								<img src="<?php echo e(asset('img/etukng.png')); ?>" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							
								<li class="active">
								   <a href="<?php echo e(url('/')); ?>">Home</a>
								</li>
								
								<li>
								   <a href="<?php echo e(url('about')); ?>">About</a>
								</li>	
								
								<li>
								   <a href="<?php echo e(url('apartments')); ?>">Apartments</a>
								</li>	
								
								<li>
								   <a href="<?php echo e(url('faq')); ?>">FAQ</a>
								</li>									
								
								<li>
									<a href="<?php echo e(url('contact')); ?>">Contact</a>                                 
								</li>
								
							</ul>
							<?php
							 $x = 3;
							?>
							<ul class="nav-menu nav-menu-social align-to-right">
							  <?php if(!isset($user) || $user == null): ?>
								<li><a href="#" data-toggle="modal" data-target="#login"><i class="fas fa-user-circle text-info mr-1"></i>Log In</a></li>
								<li><a href="#" data-toggle="modal" data-target="#signup"><i class="fas fa-arrow-alt-circle-right text-warning mr-1"></i>Sign Up</a></li>
							  <?php else: ?>
								  <li><a href="javascript:void(0);">Hello, <em><?php echo e($user->fname); ?></em><span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>                              
										<li><a href="<?php echo e(url('reservations')); ?>">My Reservations</a></li>
										<li><a href="<?php echo e(url('bye')); ?>">Sign out</a></li>  
									</ul>
								</li>
                              <?php endif; ?>							  
							
							<?php
							 $cartt = $cart['data'];
							 $subtotal = $cart['subtotal'];
													
							?>
								<li class="login-attri">
									<div class="btn-group account-drop">
										<button type="button" class="btn btn-order-by-filt theme-cl" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="ti-shopping-cart-full"></i>
											<span class="cart-count"><?php echo e(count($cartt)); ?></span>
										</button>
										<div class="dropdown-menu p-0 dm-lg pull-right animated flipInX">
											<div class="cart-card">
												<div class="cart-card-header">
													<h4>Your Cart</h4>
												</div>
												
												<div class="cart-card-body">
												  <?php
												  	 
												   if(count($cartt) > 0)
												   {
													 foreach($cartt as $c)
													 {
														 $xf = $user->id;
														 $axf = $c['apartment_id'];
														 $apartment = $c['apartment'];
														 $au = $apartment['url'];
														 $cmedia = $apartment['cmedia'];
														 $imgs = $cmedia['images'];
														 $adata = $apartment['data'];
														 $amount = $adata['amount'];
														 $address = $apartment['address'];
														 $location = $address['city'].", ".$address['state'];
														 
														 $ru = "remove-from-cart?xf=".$xf."&id=".rand(99,99999)."&axf=".$axf;
												  ?>
													<!-- Single Cart Wrap -->
													<div class="single-cart-wrap">
														<a href="<?php echo e($ru); ?>" class="cart-close"><i class="ti-close"></i></a>
														<div class="single-cart-thumb">
															<img src="<?php echo e($imgs[0]); ?>" class="layout-cart-link" alt="<?php echo e(ucwords($apartment['name'])); ?>" onclick="goToApartment('<?php echo e($au); ?>')"/>
														</div>
														<div class="single-cart-detail">
															<h3 class="sc-title layout-cart-link" onclick="goToApartment('<?php echo e($au); ?>')"><?php echo e(ucwords($apartment['name'])); ?></h3>
															<span class="layout-cart-link" onclick="goToApartment('<?php echo e($au); ?>')"><i class="ti-location-pin mr-1"></i><?php echo e(ucwords($location)); ?></span>
															<h4 class="sc-price theme-cl">&#8358;<?php echo e(number_format($amount,2)); ?></h4>
														</div>
													</div>
													<?php
													 }
												   }
													?>
													
													
												</div>
												
												<div class="cart-card-footer">
													<a href="<?php echo e(url('checkout')); ?>" class="btn btn-theme">Checkout</a>
													<h4 class="totla-prc">&#8358;<?php echo e(number_format($subtotal,2)); ?></h4>
												</div>
												
											</div>
										</div>
									</div>
								</li>
								
								
								<?php
								if(isset($user) && $user != null)
								{
								$mode = $user->mode; $mu = "";
								
							      if($mode == "guest")
								  {
									$mu = "Switch to Host";
								  }
								  elseif($mode == "host")
								  {
									$mu = "Switch to Guest";
								  }
								?>
							    <li><a href="javascript:void(0)"><i class="fas fa-user mr-1"></i>Mode: <span class="label label-info"><?php echo e(strtoupper($mode)); ?></span></a></li>
								<?php
								if($user->mode_type == "both")
								{
								?>
								<li class="add-listing theme-bg"><a href="javascript:void(0)" onclick="switchMode({mode:'<?php echo e($mode); ?>'})"><?php echo e($mu); ?></a></li>
								<?php
								}
								}
								?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			  <!--------- Session notifications-------------->
        	<?php
               $pop = ""; $val = "";
               
               if(isset($signals))
               {
                  foreach($signals['okays'] as $key => $value)
                  {
                    if(session()->has($key))
                    {
                  	$pop = $key; $val = session()->get($key);
                    }
                 }
              }
              
             ?> 

                 <?php if($pop != "" && $val != ""): ?>
                   <?php echo $__env->make('session-status',['pop' => $pop, 'val' => $val], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 <?php endif; ?>
        	<!--------- Input errors -------------->
                    <?php if(count($errors) > 0): ?>
                          <?php echo $__env->make('input-errors', ['errors'=>$errors], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     <?php endif; ?> 
			
			<?php echo $__env->yieldContent('content'); ?>
			
						<!-- ============================ Newsletter Start ================================== -->			
			
			<?php
			 if(!isset($noFooter))
			 {
			?>
			<!-- ============================ Footer Start ================================== -->
			<footer class="dark-footer skin-dark-footer">
				<div>
					<div class="container">
						<div class="row">
							
							<div class="col-lg-3 col-md-4">
								<div class="footer-widget">
									<img src="<?php echo e(asset('img/etukng.png')); ?>" class="img-footer" alt="" />
									<div class="footer-add">
										<p><strong>Email:</strong></br><a href="javascript:void(0)">hello@etuk.ng</a></p>
										<p><strong>Call:</strong></br>(234) 801 234 5678</p>
										<ul class="footer-bottom-social mt-2">
											<li><a href="javascript:void(0)"><i class="ti-facebook"></i></a></li>
											<li><a href="javascript:void(0)"><i class="ti-twitter"></i></a></li>
											<li><a href="javascript:void(0)"><i class="ti-instagram"></i></a></li>
											<li><a href="javascript:void(0)"><i class="ti-linkedin"></i></a></li>
										</ul>
									</div>
									
								</div>
							</div>		
							<div class="col-lg-3 col-md-4">
								<div class="footer-widget">
									<h4 class="widget-title">Navigate</h4>
									<ul class="footer-menu">
										<li><a href="<?php echo e(url('about')); ?>">About Us</a></li>
										<li><a href="<?php echo e(url('terms')); ?>">Terms & Conditions</a></li>
										<li><a href="<?php echo e(url('privacy')); ?>">Privacy Policy</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-3 col-md-4">
								<div class="footer-widget">
									<h4 class="widget-title">Learn More</h4>
									<ul class="footer-menu">
										<li><a href="<?php echo e(url('blog')); ?>">Blog</a></li>
										<li><a href="<?php echo e(url('faq')); ?>">FAQ</a></li>
										</ul>
								</div>
							</div>
							
							<div class="col-lg-3 col-md-12">
								<div class="footer-widget">
									<h4 class="widget-title">Download Apps</h4>
									<a href="javascript:void(0)" class="other-store-link">
										<div class="other-store-app">
											<div class="os-app-icon">
												<i class="ti-android theme-cl"></i>
											</div>
											<div class="os-app-caps">
												Google Play
												<span>Get It Now</span>
											</div>
										</div>
									</a>
									<a href="javascript:void(0)" class="other-store-link">
										<div class="other-store-app">
											<div class="os-app-icon">
												<i class="ti-apple theme-cl"></i>
											</div>
											<div class="os-app-caps">
												App Store
												<span>Now it Available</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="footer-bottom">
					<div class="container">
						<div class="row align-items-center">
							
							<div class="col-lg-6 col-md-6">
								<p class="mb-0">&copy; <script>document.write((new Date()).getFullYear())</script> Etuk NG, All Rights Reserved</p>
							</div>
							
							<div class="col-lg-6 col-md-6 text-right">
								<img src="<?php echo e(asset('img/payment.svg')); ?>" class="img-fluid" alt="" />
							</div>
							
						</div>
					</div>
				</div>
			</footer>
			<!-- ============================ Footer End ================================== -->
			<?php
			 }
			?>
			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="registermodal">
						<span class="mod-close" data-dismiss="modal"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Log <span class="theme-cl">In</span></h4>
							<div class="login-form">
								<form id="l-form">
								   <input id="tk-login" type="hidden" value="<?php echo e(csrf_token()); ?>">
									<div class="form-group">
										<label>User Name</label>
										<div class="input-with-icon">
											<input type="text" id="l-id" class="form-control" placeholder="Email or phone number">
										</div>
										<span class="text-danger text-bold input-error" id="l-id-error">This field is required</span>
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<div class="input-with-icon">
											<input type="password" id="l-pass" class="form-control" placeholder="*******">
										</div>
										<span class="text-danger text-bold input-error" id="l-pass-error">This field is required</span>
									</div>
									
									<div class="form-group">
										<button type="submit" id="login-submit" class="btn btn-md full-width pop-login">Submit</button>
										<h4 class="text-primary" id="login-loading">Signing you in.. <img alt="Loading.." src="<?php echo e(asset('img/loading.gif')); ?>"></h4>
										<h4 class="text-primary" id="login-finish"><b>Signin successful!</b><p class='text-primary'>Redirecting..</p></h4>
									</div>
								
								</form>
							</div>
							<div class="modal-divider"><span>Or login via</span></div>
							<div class="social-login mb-3">
							<?php
							$fbLogin = url('oauth')."?type=facebook";
							$twLogin = url('oauth')."?type=twitter";
							$gLogin = url('oauth')."?type=google";
							?>
								<ul>
									<li><a href="<?php echo e($fbLogin); ?>" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="<?php echo e($twLogin); ?>" class="btn connect-twitter"><i class="ti-twitter"></i>Twitter</a></li>
									<li><a href="<?php echo e($gLogin); ?>" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
								</ul>
							</div>
							<div class="text-center">
								<p class="mt-5"><a href="<?php echo e(url('forgot-password')); ?>" class="link">Forgot password?</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<!-- Sign Up Modal -->
			<div class="modal fade signup" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="sign-up">
						<span class="mod-close" data-dismiss="modal"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Sign <span class="theme-cl">Up</span></h4>
							<div class="login-form">
								<form id="s-form">
									<input id="tk-signup" type="hidden" value="<?php echo e(csrf_token()); ?>">
									<div class="row">
										<?php
										 $modes = ['guest' => "Sign up as a Guest",'host' => "Sign up as a Host",'both' => "Switch between Guest and Host"];
										?>
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<div class="input-with-icon">
													<select id="s-mode" class="form-control">
													  <option value="none">Select mode</option>
													  <?php
													    foreach($modes as $k => $v)
														{
													  ?>
													   <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
													  <?php
														}
													  ?>
													</select>												
												</div>
												<span class="text-danger text-bold input-error" id="s-mode-error">This field is required</span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" id="s-fname" class="form-control" placeholder="First name">												
												</div>
												<span class="text-danger text-bold input-error" id="s-fname-error">This field is required</span>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" id="s-lname" class="form-control" placeholder="Last name">
													<!--<i class="ti-user"></i>-->
												</div>
												<span class="text-danger text-bold input-error" id="s-lname-error">This field is required</span>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" id="s-phone" class="form-control" placeholder="Phone number">
													<!--<i class="ti-user"></i>-->
												</div>
												<span class="text-danger text-bold input-error" id="s-phone-error">This field is required</span>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="email" id="s-email" class="form-control" placeholder="Email">
													<!--<i class="ti-user"></i>-->
												</div>
												<span class="text-danger text-bold input-error" id="s-email-error">This field is required</span>
											</div>
										</div>
	
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="password" id="s-pass" class="form-control" placeholder="Password">
													<!--<i class="ti-user"></i>-->
												</div>
												<span class="text-danger text-bold input-error" id="s-pass-error">This field is required</span>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="password" id="s-pass2" class="form-control" placeholder="Confirm Password">
													<!--<i class="ti-user"></i>-->
												</div>
												<span class="text-danger text-bold input-error" id="s-pass2-error">This field is required and passwords must match</span>
											</div>
										</div>
										
									</div>
									
									<div class="form-group">
										<button type="submit" id="signup-submit" class="btn btn-md full-width pop-login">Submit</button>
										<h4 class="text-primary" id="signup-loading">Processing your registration: <img alt="Loading.." src="<?php echo e(asset('img/loading.gif')); ?>"></h4>
										<h4 class="text-primary" id="signup-finish"><b>Signup successful!</b><p class='text-primary'>Redirecting you to the home page.</p></h4>
										<h4 class="text-primary" id="signup-error"><b>We couldn't sign you up. Reason: </b> <p class='text-danger' id="signup-error-msg"></p></h4>
									</div>
								
								</form>
							</div>
							<div class="modal-divider"><span>Or signup via</span></div>
							<div class="social-login mb-3">
							<?php
							$fbSignup = url('oauth')."?type=facebook";
							$twSignup = url('oauth')."?type=twitter";
							$gSignup = url('oauth')."?type=google";
							?>
								<ul>
									<li><a href="javascript:void(0)" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
									<li><a href="<?php echo e($twSignup); ?>" class="btn connect-twitter"><i class="ti-twitter"></i>Twitter</a></li>
									<li><a href="<?php echo e($gSignup); ?>" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
								</ul>
							</div>
							<div class="text-center">
								<p class="mt-5"><i class="ti-user mr-1"></i>Already Have An Account? <a href="javascript:void(0)" class="link" data-toggle="modal" data-target="#login">Log in</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<!-- Booking Pay Now Modal -->
			<div class="modal fade" id="booking-pay-now" tabindex="-1" role="dialog" aria-labelledby="label-booking-pay-now">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="label-booking-pay-now">
						<span class="mod-close" data-dismiss="modal"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Pay <span class="theme-cl">Now</span></h4>
							<div class="login-form">
								<form id="booking-pay-now-form" action="<?php echo e(url('pay-for-booking')); ?>" method="post">
								<?php echo csrf_field(); ?>

								<input type="hidden" name="xf" id="booking-pay-now-xf" value="">
									<div class="row">
										
										<div class="col-lg-6 col-md-6">
										<?php
										 if(isset($sps) && count($sps) > 0)
										 {
										?>
											<div class="form-group">
												<div class="input-with-icon">
													<select class="form-control" name="pt" id="booking-pay-now-payment-type">
												  <option value="none">Select a card to pay with</option>
												  <?php
												   foreach($sps as $s)
												   {
													   $dt = $s['data'];
													   $n = $dt->bank." | **** ".$dt->last4." | Expires: ".$dt->exp_month."/".$dt->exp_year;
												  ?>
												    <option value="<?php echo e($s['id']); ?>"><?php echo e($n); ?></option>
												  <?php
												   }
												  ?>
												  <option value="card">Use a different card</option>
												  </select>											
												</div>
											  </div>
												<?php
										 }
										 else
										 {
										?>
										<div class="form-group">
												<div class="input-with-icon">
													<label>Payment type</label>
												<select class="form-control" name="pt" id="booking-pay-now-payment-type">
												  <option value="none">Select payment type</option>
												  <option value="card" selected="selected">Card</option>
												</select>									
												</div>
											  </div>
										<?php
										 }
										?>
												<span class="text-danger text-bold input-error" id="booking-pay-now-payment-type-error">This field is required</span>
											
										</div>
										<div class="col-lg-6 col-md-6">
										  <div class="form-group">
												<div class="input-with-icon">
													<label>Save payment info?</label>
												<select class="form-control" name="sps" id="booking-pay-now-sps">
												  <option value="yes" selected="selected">Yes</option>
												  <option value="no">No</option>
												</select>											
												</div>
											  </div>
																					  
										</div>
									</div>
									
									<div class="form-group">
										<button  id="booking-pay-now-submit" class="btn btn-md full-width pop-login">Submit</button>
									</div>
								
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<!-- Booking Send Message Modal -->
			<div class="modal fade" id="booking-send-message" tabindex="-1" role="dialog" aria-labelledby="label-booking-pay-now">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="label-booking-pay-now">
						<span class="mod-close" data-dismiss="modal"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Send <span class="theme-cl">Message</span></h4>
							<div class="login-form">
								<form id="booking-send-message-form" action="<?php echo e(url('message-host')); ?>" method="post">
								<?php echo csrf_field(); ?>

								<input type="hidden" name="xf" id="booking-send-message-xf" value="">
								<input type="hidden" name="gh" id="booking-send-message-gh" value="">
									<div class="row">
										
										<div class="col-lg-12 col-md-12">
										  <h4>Need something? Send a message <span class="theme-cl" id="booking-send-message-a"></span></h4>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<div class="input-with-icon">
													<select class="form-control" name="type" id="booking-send-message-type">
												      <option value="none">Select message type</option>
												    <option value="sms">Text message</option>
												    <option value="email">Email</option>
												  </select>											
												</div>
											  </div>
											
												<span class="text-danger text-bold input-error" id="booking-send-message-type-error">This field is required</span>
											
										</div>
										<div class="col-lg-12 col-md-12" id="booking-send-message-email-div">
										  <div class="form-group">
												<div class="input-with-icon">
													<label>Subject</label>
												<input type="text" class="form-control" name="subject" id="booking-send-message-subject" placeholder="Subject">											
												</div>
											  </div>
											  <span class="text-danger text-bold input-error" id="booking-send-message-subject-error">This field is required</span>						  
										</div>
										<div class="col-lg-12 col-md-12">
										  <div class="form-group">
												<div class="input-with-icon">
													<label>Message</label>
												<textarea rows="10" class="form-control" name="message" id="booking-send-message-msg" placeholder="Your message"></textarea>											
												</div>
											  </div>
											  <span class="text-danger text-bold input-error" id="booking-send-message-msg-error">This field is required</span>						  
										</div>
										
									</div>
									
									<div class="form-group">
										<button  id="booking-send-message-submit" class="btn btn-md full-width pop-login">Submit</button>
									</div>
								
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="javascript:void(0)"><i class="ti-arrow-up"></i></a>
			
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->

		
		<script src="<?php echo e(asset('js/circleMagic.min.js')); ?>"></script>
		
		<script src="<?php echo e(asset('js/rangeslider.js')); ?>"></script>
		<script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/aos.js')); ?>"></script>
		<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/slick.js')); ?>"></script>
		<script src="<?php echo e(asset('js/slider-bg.js')); ?>"></script>
		<script src="<?php echo e(asset('js/lightbox.js')); ?>"></script> 
		<script src="<?php echo e(asset('js/imagesloaded.js')); ?>"></script>
		<script src="<?php echo e(asset('js/isotope.min.js')); ?>"></script>
		
		<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
		
		<?php
		 $unreadMessages = 0;
		 
		 foreach($messages as $m)
		 {
			 if($m['status'] == "unread") ++$unreadMessages;
		 }
		 $umt = $unreadMessages == 1 ? "message" : "messages";
		 if($unreadMessages > 0 && !isset($isMessageView))
			 
		 {
		?>
		<script>
		/**
		let interval = 1000 * 25;
		 $(document).ready(() => {
			 Swal.fire({
			 icon: 'info',
             title: "You've got <?php echo e($unreadMessages); ?> unread <?php echo e($umt); ?>!",
			 showCancelButton: true,
             confirmButtonText: 'Go to messages',
           }).then((result) => {
              if (result.value) {
				  window.location = "messages";
	          }
           });
		   
		    
		   	//check for new messages every 1 minute
			setInterval(() => {
			  checkForMessages();
			},interval);
	        
		 });
		 **/
		</script>
		<?php
		 }
		?>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->
		
		<!-- Date Booking Script -->
		<script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/daterangepicker.js')); ?>"></script>


	</body>
</html>
<?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/layout.blade.php ENDPATH**/ ?>