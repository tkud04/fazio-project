<?php
$title = "Blog";
$subtitle = "Recent Posts";

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

<!-- ================= Blog ========================= -->
			<section>
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<p>Recent Posts</p>
								<h2>Featured News</h2>
							</div>
						</div>
					</div>
					
					<div class="row">
					<?php
                                  for($i = 0; $i < count($posts); $i++)
                                  {
                                  	$p = $posts[$i];
                                      
                                      $ax = $i == 0 ? "true" : "false";
                                      $cs = $i == 0 ? "show" : "";
                                  ?>
						<!-- Single Blog -->
						<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
							<article class="post-grid-layout">
								<a href="blog-detail.html">
									<div class="post-article-header">
										<img src="assets/img/c-1.jpg" class="img-fluid mx-auto" alt="">
										<span class="post-article-cat">Sport & Football</span>
									</div>
								</a>
								<div class="post-article box-inner">
									<div class="post-grid-caption-header">
										<h4 class="entry-title"><a href="blog-detail.html">Whay Work with Bookly</a></h4>
										<div class="post-short-des">
											simply dummy text of the printing and typesetting industry.
										</div>
									</div>
								</div>
								<div class="post-article-footer">
									<div class="post-author">
										
										By <img src="assets/img/user-2.jpg" class="img-fluid" alt="">
										<a href="#">
											Admam Kushar
										</a>
									</div>
									<span><i class="ti-eye"></i>320</span>
								</div>
							</article>
						</div>
					<?php
                       }
                    ?>
						
					</div>
					
				</div>
			</section>
			
			<!-- ================= /Blog ================= -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/posts.blade.php ENDPATH**/ ?>