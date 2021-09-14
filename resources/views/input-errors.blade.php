<?php
$nl = "<ul class='error-list'>";
foreach($errors->all() as $error){
	$nl .= "<li>";
	
   if($error == "The g-recaptcha-response field is required."){
		$nl .= "You must fill the captcha to continue";
   }
   elseif($error == "The selected sz is invalid." || $error == "The sz field is required."){
		$nl .= "You must select a size to continue";
   }
   elseif($error == "The selected bname is invalid." || $error == "The bname field is required."){
		$nl .= "Select a bank to continue";
   }
   else{
		$nl .= $error;
   }
   
   $nl .= "</li>";
}

$nl .= "</ul>";
?>
 
<script>
Swal.fire({
  icon: 'error',
  title: 'Oops, something went wrong',
  html: `{!! $nl !!}`,
});
</script>
	