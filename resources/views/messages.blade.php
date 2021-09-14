<?php
$title = "Messages";
$subtitle = "View your messages";
$isMessageView = true;

//get unique list of contacts
$contacts = [];
$uniqueGuests = [];

foreach($messages as $m)
{
	$guest = $m['guest']; $host = $m['host'];
	$img = $guest['avatar'] == ""  ? asset("img/avatar.png") : $guest['avatar'][0];
	$himg = $host['avatar'] == ""  ? asset("img/avatar.png") : $host['avatar'][0];
	
	$temp = [
	          'name' => $guest['fname']." ".substr($guest['lname'],0,1).".",
			  'date' => $m['date'],
			  'id' => $guest['id'],
			  'img' => $img
			  
			];
	$isInArray = false;
	foreach($uniqueGuests as $ug)
	{
		if($ug == $guest['id']) $isInArray = true;
	}
	if(!$isInArray)
	{
		array_push($uniqueGuests,$guest['id']);
		array_push($contacts,$temp);
	}
	
}
?>
@extends('layout')

@section('title',"Messages")

@section('top-header')
@include('top-header')
@stop

@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('lib/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/messages.css')}}">
@stop

@section('scripts')
<script src="{{asset('lib/mCustomScrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
<script>
	$(document).ready(() => {
      $('#action_menu_btn').click(() => {
	     $('.action_menu').toggle();
      });
    });
</script>
@stop

@section('content')
@include('banner-2',['title' => $title,'subtitle' => $subtitle])
<script>
let msgs = [
<?php
$firstContact = ""; $ctr = 0;
$himg = asset("img/avatar.png");
if(count($messages) > 0)
{
foreach($messages as $m)
{
	$guest = $m['guest'];
	$host = $m['host'];
	$img = $guest['avatar'] == ""  ? asset("img/avatar.png") : $guest['avatar'][0];
	
	if($ctr == 0) $firstContact = $guest['id'];
?>
{gxf:"{{$guest['id']}}",gsb:"{{$m['sent_by']}}",apt_id:"{{$m['apartment_id']}}",d:"{{$m['date']}}",m:"{{$m['msg']}}",a:"{{$img}}"},
<?php
}
}
?>
], hhxf = {{$user->id}}, aapt = "", ggxf = "", ha = "{{$himg}}";

$(document).ready(() => {
      showChat({{$firstContact}});
    });
</script>
<!-- ============================ Messages Start ================================== -->
			<section>
			
				<div class="container">
				
					<!-- row Start -->
					<div class="row align-items-center">
					  <div class="col-md-4 col-lg-4 chat">
					  <div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-append">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="card-body contacts_body">
						<ul class="contacts" id="contacts-ul">
						<?php
						 for($i = 0; $i < count($contacts); $i++)
						 {
							 $c = $contacts[$i];
							 $liClass = $i == 0 ? "class='active'" : "";
							 
						?>
						<li {{$liClass}} onclick="showChat({{$c['id']}})">
							<div class="d-flex bd-highlight">
							 
								<div class="img_cont">
									<img src="{{$c['img']}}" class="rounded-circle user_img">
									
								</div>
								
								<div class="user_info">
									<span>{{$c['name']}}</span>
									<p>{{$c['date']}}</p>
								</div>
							</div>
						</li>
						<?php
						}
						?>
						
						</ul>
					</div>
					<div class="card-footer"></div>
				  </div>
				</div>
				<div class="col-md-8 col-lg-8 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span>Chat with Khalid</span>
									<p>{{count($messages)}} Messages</p>
								</div>
								<div class="video_cam">
									<span><i class="fas fa-video"></i></span>
									<span><i class="fas fa-phone"></i></span>
								</div>
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-plus"></i> Add to group</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div>
						</div>
						<div class="card-body msg_card_body" id="chat-body">
							
						</div>
						<div class="card-footer">
						 <input type="hidden" id="tk-message" value="{{csrf_token()}}"/>
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
								</div>
								<textarea id="message-reply-msg" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append" id="message-reply-btn">
									<span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
								</div>
								<div class="input-group-append" id="message-reply-loading">
									<span class="input-group-text send_btn"><img alt="Loading.." src="{{asset('img/loading.gif')}}"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
					</div>
					
			    </div>
				
			</section>
@stop