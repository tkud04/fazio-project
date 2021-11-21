
<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
        <title>@yield('title') | My Project - Apartments for International Students Anywhere In the UK</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous/>
		
		@yield('styles')
		
		<link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}" sizes="16x16">
		
		
<!-- DO NOT EDIT!! start of plugins -->
@foreach($plugins as $p)
  {!! $p['value'] !!}
@endforeach
<!-- DO NOT EDIT!! end of plugins -->
		
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/popper.min.js')}}"></script>
		
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		
		<!--AutoComplete --> 
    <link href="{{asset('css/flexselect.css')}}" rel="stylesheet">
    <script src="{{asset('js/liquidmetal.js')}}"></script>
    <script src="{{asset('js/jquery.flexselect.js')}}"></script>
		
		<script src="{{asset('js/helpers.js').'?ver='.rand(23,999)}}"></script>
		<script src="{{asset('js/mmm.js').'?ver='.rand(23,999)}}"></script>
		
		@yield('scripts')
		 <!--Simeditor--> 
        <link rel="stylesheet" type="text/css" href="{{asset('lib/simeditor/css/simditor.css')}}" />
        <script type="text/javascript" src="{{asset('lib/simeditor/js/module.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/simeditor/js/hotkeys.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/simeditor/js/uploader.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/simeditor/js/simditor.js')}}"></script>		
		
		
	
	<!--SweetAlert--> 
    <link href="{{asset('lib/sweet-alert/sweetalert2.css')}}" rel="stylesheet">
    <script src="{{asset('lib/sweet-alert/sweetalert2.js')}}"></script>
		
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

                 @if($pop != "" && $val != "")
                   @include('session-status',['pop' => $pop, 'val' => $val])
                 @endif
        	<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ['errors'=>$errors])
                     @endif 
			
			@yield('content')
			
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
									<img src="{{asset('img/etukng.png')}}" class="img-footer" alt="" />
									<div class="footer-add">
										<p><strong>Email:</strong></br><a href="javascript:void(0)">hello@myproject.co.uk</a></p>
										<p><strong>Call:</strong></br>(+44) 123 234 5678</p>
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
										<li><a href="javascript:void(0)">About Us</a></li>
										<li><a href="javascript:void(0)">Terms & Conditions</a></li>
										<li><a href="javascript:void(0)">Privacy Policy</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-3 col-md-4">
								<div class="footer-widget">
									<h4 class="widget-title">Learn More</h4>
									<ul class="footer-menu">
										<li><a href="javascript:void(0)">Blog</a></li>
										<li><a href="javascript:void(0)">FAQ</a></li>
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
								<p class="mb-0">&copy; <script>document.write((new Date()).getFullYear())</script> My Project, All Rights Reserved</p>
							</div>
							
							<div class="col-lg-6 col-md-6 text-right">
								<img src="{{asset('img/payment.svg')}}" class="img-fluid" alt="" />
							</div>
							  
						</div>
					</div>
				</div>
			</footer>
			<!-- ============================ Footer End ================================== -->
			<?php
			 }
			?>
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="javascript:void(0)"><i class="ti-arrow-up"></i></a>
			
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->

		
		<script src="{{asset('js/circleMagic.min.js')}}"></script>
		
		<script src="{{asset('js/rangeslider.js')}}"></script>
		<script src="{{asset('js/select2.min.js')}}"></script>
		<script src="{{asset('js/aos.js')}}"></script>
		<script src="{{asset('js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('js/slick.js')}}"></script>
		<script src="{{asset('js/slider-bg.js')}}"></script>
		<script src="{{asset('js/lightbox.js')}}"></script> 
		<script src="{{asset('js/imagesloaded.js')}}"></script>
		<script src="{{asset('js/isotope.min.js')}}"></script>
		
		<script src="{{asset('js/custom.js')}}"></script>
		
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
             title: "You've got {{$unreadMessages}} unread {{$umt}}!",
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
		<!-- This page must have plugins -->
		<!-- ============================================================== -->
		
		<!-- Date Booking Script -->
		<script src="{{asset('js/moment.min.js')}}"></script>
		<script src="{{asset('js/daterangepicker.js')}}"></script>


	</body>
</html>
