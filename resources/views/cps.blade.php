<?php
$title = "Payment Successful";
$subtitle = "Your payment was sucessful!";
?>
@extends('layout')

@section('title',$title)

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle])

<script>
$(document).ready(() => {
	setTimeout(() => {
		window.location = "{{url('bookings')}}";
	},4000);
});
</script>
<!-- ============================ CPS Start ================================== -->
			<section>
				<div class="container">
				
					
					<div class="row align-items-center">

						<div class="col-lg-12 col-md-12">
							<div class="row">
							  <div class="col-lg-12 col-md-12">
							   <h3>Your Payment was Successful. Have a lovely stay in your apartment!</h3><br>
							   <h4>Redirecting in a few seconds..</h4><br>
							  </div><br>
                              
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ Checkout End ================================== -->
@stop