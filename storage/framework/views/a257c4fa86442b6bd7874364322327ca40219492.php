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


<?php $__env->startSection('title',"Messages"); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/mCustomScrollbar/jquery.mCustomScrollbar.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/messages.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('lib/mCustomScrollbar/jquery.mCustomScrollbar.min.js')); ?>"></script>
<script>
	$(document).ready(() => {
      $('#action_menu_btn').click(() => {
	     $('.action_menu').toggle();
      });
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $title,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
{gxf:"<?php echo e($guest['id']); ?>",gsb:"<?php echo e($m['sent_by']); ?>",apt_id:"<?php echo e($m['apartment_id']); ?>",d:"<?php echo e($m['date']); ?>",m:"<?php echo e($m['msg']); ?>",a:"<?php echo e($img); ?>"},
<?php
}
}
?>
], hhxf = <?php echo e($user->id); ?>, aapt = "", ggxf = "", ha = "<?php echo e($himg); ?>";

$(document).ready(() => {
      showChat(<?php echo e($firstContact); ?>);
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
						<li <?php echo e($liClass); ?> onclick="showChat(<?php echo e($c['id']); ?>)">
							<div class="d-flex bd-highlight">
							 
								<div class="img_cont">
									<img src="<?php echo e($c['img']); ?>" class="rounded-circle user_img">
									
								</div>
								
								<div class="user_info">
									<span><?php echo e($c['name']); ?></span>
									<p><?php echo e($c['date']); ?></p>
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
									<p><?php echo e(count($messages)); ?> Messages</p>
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
						 <input type="hidden" id="tk-message" value="<?php echo e(csrf_token()); ?>"/>
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
								</div>
								<textarea id="message-reply-msg" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append" id="message-reply-btn">
									<span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
								</div>
								<div class="input-group-append" id="message-reply-loading">
									<span class="input-group-text send_btn"><img alt="Loading.." src="<?php echo e(asset('img/loading.gif')); ?>"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
					</div>
					
			    </div>
				
			</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/messages.blade.php ENDPATH**/ ?>