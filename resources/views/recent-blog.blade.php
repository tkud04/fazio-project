			<!-- ================= Recent Blog start ========================= -->
			<section class="min">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<p>Recent Blogs</p>
								<h2>Recent Blog & Articles</h2>
							</div>
						</div>
					</div>
					
					<div class="row align-items-center">
					
						<div class="col-lg-7 col-md-12">
							<div class="featured-hm-post">
								<figure class="featured-hm-post-wrap">
									<a href="javascript:void(0)">
										<img class="cover" src="{{asset('img/featured/blog-1.jpeg')}}" alt="room">
									</a>
								</figure>
								<div class="hm-post-caption">
									<span class="cat theme-bg bg-1">Admin</span>
									<h2 class="title"><a class="title-ln" href="javascript:void(0)">Best Places to live in the UK</a></h2>
									<p>When it comes to deciding which city to live and work in, within the UK, it’s important to find a city that works best for your needs. </p>
									<a class="fmp-readmore theme-cl" href="https://www.thehomelike.com/blog/best-cities-to-live-in-the-uk/" target="_blank">Read More<i class="ti-arrow-right"></i></a>
								</div>
							</div>
						</div>
						
						<div class="col-lg-5 col-md-12">
						<?php
						 $posts = [
						   ['img' => asset('img/featured/blog-2.jpeg'),'href' => "javascript:void(0)",'tag' => "Apartments",'title' => "The Best Apartments in London Sept 2020",'date' => "Sept 7, 2020"],
						   ['img' => asset('img/featured/blog-1.jpeg'),'href' => "javascript:void(0)",'tag' => "Apartments",'title' => "The Best Apartments in Cambridge Sept 2020",'date' => "Sept 12, 2020"],
						   ['img' => asset('img/featured/blog-2.jpeg'),'href' => "javascript:void(0)",'tag' => "Apartments",'title' => "How To Get An Apartment",'date' => "Sept 14, 2020"]
						 ];
						 foreach($posts as $p)
						 {
						?>
							<article class="small-hm-post">
								<div class="small-hm-post-outer">
									<div class="small-hm-inner">
										<div class="small-hm-post-thumb">
											<a href="#"><img src="{{$p['img']}}" class="img-responsive" alt="{{$p['title']}}" /></a>
										</div>
									</div>
									
									<div class="small-hm-inner">
										<div class="small-hm-post-caption">
											<ul class="post-categories">
												<li><a href="javascript:void(0)" class="theme-cl">{{$p['tag']}}</a>
												</li>
											</ul>
											<h2 class="entry-title"><a href="{{$p['href']}}">{{$p['title']}}</a></h2>
											<ul class="post-meta">
												<li class="meta-author"><span class="author"><a class="url fn n" href="javascript:void(0)">Admin</a></span></li>
												<li class="meta-date"><a href="javascript:void(0)" rel="bookmark">{{$p['date']}}</a></li>
											</ul>
										</div>
									</div>
									
								</div>
							</article>
						 <?php
						 }
						 ?>
						</div>
					
					</div>
					
				</div>
			</section>
			<!-- ========================= End Recent Blog Section ============================ -->
