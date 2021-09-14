<?php
$title = "Post";
$subtitle = "View Post";

$name = "";
$em = "";

if($user != null)
{
	$name = $user->fname." ".$user->lname;
	$em = $user->email;
}
?>
@extends('layout')

@section('title',$title)

@section('top-header')
@include('top-header')
@stop

@section('content')
@include('banner-2',['title' => $subtitle,'subtitle' => $subtitle])
<!-- ============================ Agency List Start ================================== -->
			<section>
			
				<div class="container">
				
					<!-- row Start -->
					<div class="row">
					
						<!-- Blog Detail -->
						<div class="col-lg-8 col-md-12 col-sm-12 col-12">
							<div class="blog-details single-post-item format-standard">
								<div class="post-details">
								
									<div class="post-featured-img">
										<img class="img-fluid" src="assets/img/g-2.jpg" alt="">
									</div>
									
									<div class="post-top-meta">
										<ul class="meta-comment-tag">
											<li><a href="#"><span class="icons"><i class="ti-user"></i></span>by Rosalina Doe</a></li>
											<li><a href="#"><span class="icons"><i class="ti-comment-alt"></i></span>45 Comments</a></li>
										</ul>
									</div>
									<h2 class="post-title">Lorem ipsum dolor sit amet, cons pisicing elit, sed do.</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
										labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem. <br><br> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem.</p>
									<blockquote>
										<span class="icon"><i class="fas fa-quote-left"></i></span>
										<p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tem
										ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud ullamco laboris nisi ut aliquip ex ea commodo onsequat.</p>
										<h5 class="name">- Rosalina Pong</h5>
									</blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
										exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
										dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
										Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
										mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit
										voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
										inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
										ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
										magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
										dolorem. <br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
										dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
										culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis
										iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
										eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
										explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
										sed quia consequuntur magni dolores eos qui ratione voluptatem.</p>
									<div class="post-bottom-meta">
										<div class="post-tags">
											<h4 class="pbm-title">Related Tags</h4>
											<ul class="list">
												<li><a href="#">organic</a></li>
												<li><a href="#">Foods</a></li>
												<li><a href="#">tasty</a></li>
											</ul>
										</div>
										<div class="post-share">
											<h4 class="pbm-title">Social Share</h4>
											<ul class="list">
												<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
												<li><a href="#"><i class="fab fa-twitter"></i></a></li>
												<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
												<li><a href="#"><i class="fab fa-vk"></i></a></li>
												<li><a href="#"><i class="fab fa-tumblr"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="single-post-pagination">
										<div class="prev-post">
											<a href="#">
												<div class="title-with-link">
													<span class="intro">Prev Post</span>
													<h3 class="title">Tips on Minimalist</h3>
												</div>
											</a>
										</div>
										<div class="post-pagination-center-grid">
											<a href="#"><i class="ti-layout-grid3"></i></a>
										</div>
										<div class="next-post">
											<a href="#">
												<div class="title-with-link">
													<span class="intro">Next Post</span>
													<h3 class="title">Less Is More</h3>
												</div>
											</a>
										</div>
									</div>
									
								</div>
							</div>
							
							<!-- Author Detail -->
							<div class="blog-details single-post-item format-standard">
								
								<div class="posts-author">
									<span class="img"><img class="img-fluid" src="assets/img/user-3.jpg" alt=""></span>
									<h3 class="pa-name">Rosalina William</h3>
									<ul class="social-links">
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-behance"></i></a></li>
										<li><a href="#"><i class="fab fa-youtube"></i></a></li>
										<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
									<p class="pa-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
									aliqua. Ut enim ad minim veniam, quis nostrud
									exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
								</div>
								
							</div>
							
							<!-- Blog Comment -->
							<div class="blog-details single-post-item format-standard">
								
								<div class="comment-area">
									<div class="all-comments">
										<h3 class="comments-title">05 Comments</h3>
										<div class="comment-list">
											<ul>
												<li class="single-comment">
													<article>
														<div class="comment-author">
															<img src="assets/img/user-1.jpg" alt="">
														</div>
														<div class="comment-details">
															<div class="comment-meta">
																<div class="comment-left-meta">
																	<h4 class="author-name">Rosalina Kelian <span class="selected"><i class="fas fa-bookmark"></i></span></h4>
																	<div class="comment-date">19th May 2018</div>
																</div>
																<div class="comment-reply">
																	<a href="#" class="reply"><span class="icona"><i class="ti-back-left"></i></span> Reply</a>
																</div>
															</div>
															<div class="comment-text">
																<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim laborumab.
																	perspiciatis unde omnis iste natus error.</p>
															</div>
														</div>
													</article>
													<ul class="children">
														<li class="single-comment">
															<article>
																<div class="comment-author">
																	<img src="assets/img/user-3.jpg" alt="">
																</div>
																<div class="comment-details">
																	<div class="comment-meta">
																		<div class="comment-left-meta">
																			<h4 class="author-name">Rosalina Kelian</h4>
																			<div class="comment-date">19th May 2018</div>
																		</div>
																		<div class="comment-reply">
																			<a href="#" class="reply"><span class="icons"><i class="ti-back-left"></i></span> Reply</a>
																		</div>
																	</div>
																	<div class="comment-text">
																		<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim laborumab.
																			perspiciatis unde omnis iste natus error.</p>
																	</div>
																</div>
															</article>
															<ul class="children">
																<li class="single-comment">
																	<article>
																		<div class="comment-author">
																			<img src="assets/img/user-4.jpg" alt="">
																		</div>
																		<div class="comment-details">
																			<div class="comment-meta">
																				<div class="comment-left-meta">
																					<h4 class="author-name">Rosalina Kelian</h4>
																					<div class="comment-date">19th May 2018</div>
																				</div>
																				<div class="comment-reply">
																					<a href="#" class="reply"><span class="icons"><i class="ti-back-left"></i></span> Reply</a>
																				</div>
																			</div>
																			<div class="comment-text">
																				<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim laborumab.
																					perspiciatis unde omnis iste natus error.</p>
																			</div>
																		</div>
																	</article>
																</li>
															</ul>
														</li>
													</ul>
												</li>
												<li class="single-comment">
													<article>
														<div class="comment-author">
															<img src="assets/img/user-3.jpg" alt="">
														</div>
														<div class="comment-details">
															<div class="comment-meta">
																<div class="comment-left-meta">
																	<h4 class="author-name">Rosalina Kelian</h4>
																	<div class="comment-date">19th May 2018</div>
																</div>
																<div class="comment-reply">
																	<a href="#" class="reply"><span class="icons"><i class="ti-back-left"></i></span> Reply</a>
																</div>
															</div>
															<div class="comment-text">
																<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim laborumab.
																	perspiciatis unde omnis iste natus error.</p>
															</div>
														</div>
													</article>
												</li>
											</ul>
										</div>
									</div>
									<div class="comment-box submit-form">
										<h3 class="reply-title">Post Comment</h3>
										<div class="comment-form">
											<form action="#">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-12">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Your Name">
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-12">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Your Email">
														</div>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12">
														<div class="form-group">
															<textarea name="comment" class="form-control" cols="30" rows="6" placeholder="Type your comments...."></textarea>
														</div>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12">
														<div class="form-group">
															<a href="#" class="btn search-btn">Submit Now</a>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								
							</div>
							
							
						</div>
						
						<!-- Single blog Grid -->
						<div class="col-lg-4 col-md-12 col-sm-12 col-12">
							
							<!-- Searchbard -->
							<div class="single-widgets widget_search">
								<h4 class="title">Search</h4>
								<form action="#" class="sidebar-search-form">
									<input type="search" name="search" placeholder="Search..">
									<button type="submit"><i class="ti-search"></i></button>
								</form>
							</div>

							<!-- Categories -->
							<div class="single-widgets widget_category">
								<h4 class="title">Categories</h4>
								<ul>
									<li><a href="#">Lifestyle <span>09</span></a></li>
									<li><a href="#">Travel <span>12</span></a></li>
									<li><a href="#">Fashion <span>19</span></a>
									</li><li><a href="#">Branding <span>17</span></a></li>
									<li><a href="#">Music <span>10</span></a></li>
								</ul>
							</div>
							
							<!-- Trending Posts -->
							<div class="single-widgets widget_thumb_post">
								<h4 class="title">Trending Posts</h4>
								<ul>
									<li>
										<span class="left">
											<img src="assets/img/g-1.jpg" alt="" class="">
										</span>
										<span class="right">
											<a class="feed-title" href="#">Alonso Kelina Falao Asiano Pero</a> 
											<span class="post-date"><i class="ti-calendar"></i>10 Min ago</span>
										</span>
									</li>
									<li>
										<span class="left">
											<img src="assets/img/g-2.jpg" alt="" class="">
										</span>
										<span class="right">
											<a class="feed-title" href="#">It is a long established fact that a reader</a> 
											<span class="post-date"><i class="ti-calendar"></i>2 Hours ago</span>
										</span>
									</li>
									<li>
										<span class="left">
											<img src="assets/img/g-3.jpg" alt="" class="">
										</span>
										<span class="right">
											<a class="feed-title" href="#">Many desktop publish packages and web</a> 
											<span class="post-date"><i class="ti-calendar"></i>4 Hours ago</span>
										</span>
									</li>
									<li>
										<span class="left">
											<img src="assets/img/g-4.jpg" alt="" class="">
										</span>
										<span class="right">
											<a class="feed-title" href="#">Various versions have evolved over the years</a> 
											<span class="post-date"><i class="ti-calendar"></i>7 Hours ago</span>
										</span>
									</li>
									<li>
										<span class="left">
											<img src="assets/img/g-5.jpg" alt="" class="">
										</span>
										<span class="right">
											<a class="feed-title" href="#">Photo booth anim 8-bit PBR 3 wolf moon.</a> 
											<span class="post-date"><i class="ti-calendar"></i>3 Days ago</span>
										</span>
									</li>
								</ul>
							</div>
							
							<!-- Tags Cloud -->
							<div class="single-widgets widget_tags">
								<h4 class="title">Tags Cloud</h4>
								<ul>
									<li><a href="#">Lifestyle</a></li>
									<li><a href="#">Travel</a></li>
									<li><a href="#">Fashion</a></li>
									<li><a href="#">Branding</a></li>
									<li><a href="#">Music</a></li>
								</ul>
							</div>
							
						</div>
						
					</div>
					<!-- /row -->					
					
				</div>
						
			</section>
			<!-- ============================ Agency List End ================================== -->
@stop