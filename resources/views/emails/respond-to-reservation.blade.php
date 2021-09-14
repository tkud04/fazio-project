<?php

$name = $a['name'];
$address = $a['address'];
$reviews = $a['reviews'];
$host = $a['host'];
$au = url('apartments');
$uu = url('apartment')."?xf=".$a['url'];
$imgs = $a['cmedia']['images'];

$n = $u['fname'];

if(isset($admin) && $admin)
{
	$n = "admin";
	}



?>
 
<center><img src="http://etukng.tobi-demos.tk/img/etukng.png" width="150" height="100"/></center>
<h3 style="background: #be831d; color: #fff; padding: 10px 15px;">{{$subject}}</h3>
<p><b>Hello {{$n}},</b></p>
<p><b>{{$name}}</b> just responded to a reservation request from <em>{{$u['fname']." ".$u['lname']}}</em>. Below are the details:</p><br><br>

<center><img src="{{$imgs[0]}}" alt="{{$name}}" style="width: 150px; height: 150px; border-radius: 50%;"/><br></center>
<p>Guest: <b>{{$u['fname']." ".$u['lname']}}</b> | {{$u['email']}}</p>
<p>Reservation time: <b>{{$l->created_at->format("jS F, Y h:i A")}}</b></p>
<p>Status: <b>{{strtoupper($l->status)}}</b></p><br><br>

<?php
if(!isset($admin))
{
?>
<h3 style="background: #be831d; color: #fff; padding: 10px 15px;">Next Steps</h3>
<?php
  if($l->status == "approved")
  {
?>
<p>You can go ahead and book this apartment right away! <a href="{{$uu}}">Click here</a> or copy and paste this link: <a href="{{$uu}}">{{$uu}}</a></p>
<?php
  }
  else if($l->status == "declined")
  {

?>
  <p>Not to worry, we've got other amazing apartments available for you! <a href="{{$au}}">View apartments now</a> or copy and paste this link: <a href="{{$au}}">{{$au}}</a></p>
<?php	  
  }
}
?>
