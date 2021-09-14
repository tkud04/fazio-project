<?php

$contacts = [
								  ['tag' => "admin",'designation' => "Administrative/IT"],
								  ['tag' => "marketing",'designation' => "Sales & Marketing"],
								  ['tag' => "pro",'designation' => "Customer & Communications"]
								];
                
  $name = $data['name'];
  $em = $data['email'];
  $subject = $data['subject'];
  $msg = $data['msg'];
  $dept = "Unspecified";
  
  foreach($contacts as $c)
  {
    if($c['tag'] == $data['dept'])
    {
      $dept = $c['designation'];
      break;
    }
  }
?>

<center><img src="http://etukng.tobi-demos.tk/img/etukng.png" width="150" height="100"/></center>
<h3 style="background: #be831d; color: #fff; padding: 10px 15px;">{{$subject}}</h3>
Hello admin,<br><br> you have a new message from <em>{{$name}}</em>:<br><br>
Customer: <a href="mailto:{{$em}}">{{$em}}</a><br><br>
Dept: <b>{{$dept}}</b><br><br>
Message: <blockquote><em>{{$msg}}</em></blockquote><br>

<h5 style="background: #be831d; color: #fff; padding: 10px 15px;">Next steps</h5>

<p>Kindly forward the message to the appropriate department and get back to the customer</p><br>
<p style="color:red;"><b>NOTE:</b> This is a test email and not the final version.</p><br><br>
