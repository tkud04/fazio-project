<?php
$title = "FAQ";
$subtitle = "Frequently Asked Questions";

$name = "";
$em = "";

if($user != null)
{
	$name = $user->fname." ".$user->lname;
	$em = $user->email;
}
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('banner-2',['title' => $subtitle,'subtitle' => $subtitle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- ================= FAQ ================= -->

			<section>

				<div class="container">

				

					<div class="row">

						

						<?php
								
								foreach($contacts as $ct)
								{
								?>
						    <div class="col-lg-4 col-md-4">
							<div class="contact-box">
								
								
								<h4><?php echo e($ct['designation']); ?></h4>
								<?php echo e($ct['name']); ?><br>
								<i class="ti-email"></i> <a style="margin-bottom: 10px;" href="mailto:<?php echo e($ct['email']); ?>"><?php echo e($ct['email']); ?></a><br>
								<i class="ti-headphone"></i> <a style="margin-bottom: 10px;" href="tel:<?php echo e($ct['phone']); ?>"><?php echo e($ct['phone']); ?></a>
							</div>
						</div>
						  <?php
								}
						  ?>
						

					</div>

					

					<div class="row">

						

						<div class="col-lg-10 col-md-12 col-sm-12">

							

							<div class="block-header">

								<ul class="nav nav-tabs customize-tab" id="myTab" role="tablist">
                                  <?php
                                  for($i = 0; $i < count($tags); $i++)
                                  {
                                  	$t = $tags[$i];
                                      $at = $i == 0 ? " active" : "";
                                  ?>
								  <li class="nav-item">

									<a class="nav-link<?php echo e($at); ?>" id="<?php echo e($t['tag']); ?>-tab" data-toggle="tab" href="#<?php echo e($t['tag']); ?>" role="tab" aria-controls="<?php echo e($t['tag']); ?>" aria-selected="true"><?php echo e($t['name']); ?></a>

								  </li>
                                  <?php
                                   }
                                  ?>
								
								</ul>

							</div>

							

							<div class="tab-content" id="myTabContent">

								
                              <?php
                                $x = 0;
                                foreach($faqs as $k => $v)
                                  {
                                      $at = $x == 0 ? " show active" : "";
                                      ++$x;
                                ?>
								<!-- <?php echo e($k); ?> Query -->

								<div class="tab-pane fade <?php echo e($at); ?>" id="<?php echo e($k); ?>" role="tabpanel" aria-labelledby="<?php echo e($k); ?>-tab">

									

									<div class="accordion" id="<?php echo e($k); ?>ac">
                                     <?php
                                  for($i = 0; $i < count($v); $i++)
                                  {
                                  	$f = $v[$i];
                                      
                                      $ax = $i == 0 ? "true" : "false";
                                      $cs = $i == 0 ? "show" : "";
                                  ?>
										<div class="card">

											<div class="card-header" id="heading-<?php echo e($k); ?>">

											  <h2 class="mb-0">

												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?php echo e($k); ?>" aria-expanded="<?php echo e($ax); ?>" aria-controls="collapse-<?php echo e($k); ?>">

												  <?php echo e($f['question']); ?>


												</button>

											  </h2>

											</div>



											<div id="collapse-<?php echo e($k); ?>" class="collapse <?php echo e($cs); ?>" aria-labelledby="heading-<?php echo e($k); ?>" data-parent="#<?php echo e($k); ?>ac">

											  <div class="card-body">

												<p class="ac-para"><?php echo e($f['answer']); ?></p>

											  </div>

											</div>

										</div>
									</div>
                                  <?php
                                   } //end for
                                  ?>

								</div>
                                <?php
                                   } //end foreach
                                  ?>
								
							</div>

							

						</div>

						

					</div>

				</div>

			</section>

			<!-- ================= FAQ ================= -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/faq.blade.php ENDPATH**/ ?>