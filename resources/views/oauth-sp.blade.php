<?php
$title = "Set Password";
$subtitle = "Set your account password here";
?>
@extends('layout')

@section('title',$title)

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle])

	<!-- ============================ Reset Password Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="dashboard-wraper">
							 <form method="post" action="oauth-sp" id="osp-form">
							 {!! csrf_field() !!}
							 <input type="hidden" name="acsrf" value="{{$xf}}"/>
								<!-- Basic Information -->
								<div class="form-submit">	
									<h4>Set your account mode and password</h4>
									<div class="submit-section">
										<div class="form-row">
											<?php
										 $modes = ['guest' => "Sign up as a Guest",'host' => "Sign up as a Host",'both' => "Switch between Guest and Host"];
										?>
											<div class="form-group col-md-12">
												<div class="input-with-icon">
													<select id="osp-mode" name="mode" class="form-control">
													  <option value="none">Select mode</option>
													  <?php
													    foreach($modes as $k => $v)
														{
													  ?>
													   <option value="{{$k}}">{{$v}}</option>
													  <?php
														}
													  ?>
													</select>												
												</div>
												<span class="text-danger text-bold input-error" id="osp-mode-error">This field is required</span>
											</div>
											<div class="form-group col-md-12">
												<label>New password</label>
												<input type="password" class="form-control" id="osp-pass" name="pass" placeholder="Your new password">
												<span class="text-danger text-bold input-error" id="osp-pass-error">This field is required</span>
											</div>
											<div class="form-group col-md-12">
												<label>Confirm password</label>
												<input type="password" class="form-control" id="osp-pass2" name="pass_confirmation" placeholder="Confirm your new password">
												<span class="text-danger text-bold input-error" id="osp-pass2-error">This field is required and passwords must match</span>
											</div>
											<div class="form-group col-md-12">
											  <button class="btn btn-theme" id="osp-submit">Submit</button>											 
											</div>
										</div>
									</div>
								</div>
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Forgot Password End ================================== -->
@stop