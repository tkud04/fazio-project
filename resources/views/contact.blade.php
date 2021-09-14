<?php
$title = "Contact Us";
$subtitle = "We'd like to hear from you";

$name = "";
$em = "";

if($user != null)
{
	$name = $user->fname." ".$user->lname;
	$em = $user->email;
}
?>
@extends('layout')

@section('title',"Contact Us")

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle])

	<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Who We Are Start ================================== -->
			<section>
				<div class="container">
				
					<div class="row mb-4">
						
						<div class="col-lg-12 col-md-12">
							<div class="contact-box">
								<i class="ti-map-alt"></i>
								<h4>Head Office</h4>
								Abuja,<br>
								Nigeria
							</div>
						</div>
						
						<?php
								
								foreach($contacts as $ct)
								{
								?>
						    <div class="col-lg-4 col-md-4">
							<div class="contact-box">
								
								
								<h4>{{$ct['designation']}}</h4>
								{{$ct['name']}}<br>
								<i class="ti-email"></i> <a style="margin-bottom: 10px;" href="mailto:{{$ct['email']}}">{{$ct['email']}}</a><br>
								<i class="ti-headphone"></i> <a style="margin-bottom: 10px;" href="tel:{{$ct['phone']}}">{{$ct['phone']}}</a>
							</div>
						</div>
						  <?php
								}
						  ?>
						
						
					</div>
					
					<div class="row mt-5 row align-items-center">
						
						<div class="col-lg-5 col-md-5">
							<img src="assets/img/about.png" class="img-fluid" alt="" />
						</div>
						<div class="col-lg-7 col-md-7">
							<div class="contact-form">
								<form method="post" id="contact-form">
									{!! csrf_field() !!}
									<div class="row">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
											  <label>Name</label>
											  <input type="text" id="contact-name" value="{{$name}}" name="name" class="form-control" placeholder="Your name">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
											  <label>Email</label>
											  <input type="email" id="contact-em" value="{{$em}}" name="email" class="form-control" placeholder="Email">
											</div>
										</div>
									</div>
									
									<div class="row">
									    <div class="col-lg-6 col-md-6">
											<div class="form-group">
											  <label>Department</label>
											  <select id="contact-dept" name="dept" class="form-control">
											    <option value="none">Select department</option>
												<?php
												 foreach($contacts as $c)
												 {
												?>
												 <option value="{{$c['tag']}}">{{$c['designation']}}</option>
												<?php
												 }
												?>
											  </select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Subject</label>
												<input type="text" id="contact-subject" name="subject" class="form-control" placeholder="Subject">
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<label>Message</label>
												<textarea id="contact-msg" name="msg" class="form-control" placeholder="Type Here..."></textarea>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-12 col-md-12">
											<button type="submit" id="contact-btn" class="btn btn-primary">Submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						
					</div>
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ Who We Are End ================================== -->

@stop