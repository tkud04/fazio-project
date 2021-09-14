<?php
$cart = ['data' => [],'subtotal' => 0];
$messages = [];
$plugins = [];
$title = "Page Not Found";
$subtitle = "We checked very hard but could not find what you were looking for";
?>
@extends('layout')

@section('title',$title)

@section('content')
<!-- ============================ 404 Dashboard ================================== -->
			<section class="error-wrap">
				<div class="container">
					<div class="row justify-content-center">
						
						<div class="col-lg-6 col-md-10">
							<div class="text-center">
								
								<img src="{{asset('img/404.png')}}" class="img-fluid" alt="">
								<p>{{$subtitle}}</p>
								<a class="btn btn-theme" href="{{url('/')}}">Back To Home</a>
								
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ 404 End ================================== -->

@stop