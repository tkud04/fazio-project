<?php
$title = "Analytics";
$subtitle = "View your apartment performances over the months";

$months = [
  'january','february','march','april','may','june','july','august','september','october','november','december'
];
$month = date("F");
$year = date("Y");

?>
@extends('layout')

@section('title',$title)

@section('scripts')
<!-- Morris Charts -->
<link href="{{asset('lib/morris-bundle/morris.css')}}" rel="stylesheet">
<script src="{{asset('lib/morris-bundle/raphael.min.js')}}"></script>
<script src="{{asset('lib/morris-bundle/morris.js')}}"></script>
<script src="{{asset('lib/morris-bundle/morris-init.js')}}"></script>
@stop

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle])
<script>
let transactionsData1 = [
<?php
											 if(count($revenueData) > 0)
											 {
											   for($i = 0; $i < count($revenueData); $i++)
											   { 
										       $t = $revenueData[$i];
											   $item = $t['item'];
											   $date = new DateTime($t['date']);
											?>
{x: '{{$date->format("d M")}}',y: {{$item['amount']}}}@if($i != count($revenueData) - 1),@endif
											<?php
											   }
											 }
											?>
],bsaData1 = [
<?php
											 if(count($bsa) > 0)
											 {
											   for($i = 0; $i < count($bsa); $i++)
											   { 
										       $t = $bsa[$i];
											?>
{value: "{{$t['value']}}",label: "{{$t['label']}}"}@if($i != count($bsa) - 1),@endif
											<?php
											   }
											 }
											?>
];
</script>
	<!-- ============================ Dashboard Start ================================== -->
			<section class="gray">
				<div class="container-fluid">
					<div class="row">
						@include('host-dashboard-sidebar',['user' => $user])
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wrapers">
								
								<!-- Row -->
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<div class="dashboard-gravity-list with-icons">
											<h4 style="">Total Revenue</h4>
											<div class="form-group">
											  <select class="form-control form-control-sm" id="host-total-revenue-month">
											    <option value="none">Select month</option>
												<?php
												 foreach($months as $m)
												 {
													 $mdd = new DateTime($m);
													$mm = ucwords($m);
													$ss = $month == $mm ? " selected='selected'" : "";
												?>
												 <option value="{{$mdd->format('m')}}"{{$ss}}>{{$mm}}</option>
												<?php
												 }
												?>
											  </select>
											  <input class="form-control" type="number" value="{{$year}}" id="host-total-revenue-year"/>
											  <center>
											    <a class="btn btn-theme btn-sm mt-2" id="host-total-revenue-btn">Submit</a>
												<img id="host-total-revenue-loading" alt="Loading.." src="{{asset('img/loading.gif')}}">
											  </center>
											</div>
											  
											<?php
											 if(count($transactions) > 0)
											 {
											?>
											 <div id="host-transactions-bar"></div>
											<?php
											 }
											 else
											 {
											?>
											<ul>
											<li>No transactions yet.</li>
											</ul>
											<?php
											 }
											?>
										</div>
									</div>
									
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="dashboard-gravity-list with-icons">
											<h4>Best selling Apartments</h4>
											<div class="form-group">
											  <select class="form-control form-control-sm" id="host-best-selling-apartments-month">
											    <option value="none">Select month</option>
												<?php
												 foreach($months as $m)
												 {
													 $mdd = new DateTime($m);
													$mm = ucwords($m);
													$ss = $month == $mm ? " selected='selected'" : "";
												?>
												 <option value="{{$mdd->format('m')}}"{{$ss}}>{{$mm}}</option>
												<?php
												 }
												?>
											  </select>
											  <input class="form-control" type="number" value="{{$year}}" id="host-best-selling-apartments-year"/>
											  <center>
											    <a class="btn btn-theme btn-sm mt-2" id="host-best-selling-apartments-btn">Submit</a>
												<img id="host-best-selling-apartments-loading" alt="Loading.." src="{{asset('img/loading.gif')}}">
											  </center>
											</div>
											  
											<?php
											 if(count($transactions) > 0)
											 {
											?>
											 <div id="host-best-selling-apartments-donut"></div>
											<?php
											 }
											 else
											 {
											?>
											<ul>
											<li>No transactions yet.</li>
											</ul>
											<?php
											 }
											?>
										</div>
									</div>	
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Dashboard End ================================== -->

@stop