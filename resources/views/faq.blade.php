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
@extends('layout')

@section('title',$title)

@section('top-header')
@include('top-header')
@stop


@section('content')
@include('banner-2',['title' => $subtitle,'subtitle' => $subtitle])

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
								
								
								<h4>{{$ct['designation']}}</h4>
								{{$ct['name']}}<br>
								<i class="ti-email"></i> <a style="margin-bottom: 10px;" href="mailto:{{$ct['email']}}">{{$ct['email']}}</a><br>
								<i class="ti-headphone"></i> <a style="margin-bottom: 10px;" href="tel:{{$ct['phone']}}">{{$ct['phone']}}</a>
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

									<a class="nav-link{{$at}}" id="{{$t['tag']}}-tab" data-toggle="tab" href="#{{$t['tag']}}" role="tab" aria-controls="{{$t['tag']}}" aria-selected="true">{{$t['name']}}</a>

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
								<!-- {{$k}} Query -->

								<div class="tab-pane fade {{$at}}" id="{{$k}}" role="tabpanel" aria-labelledby="{{$k}}-tab">

									

									<div class="accordion" id="{{$k}}ac">
                                     <?php
                                  for($i = 0; $i < count($v); $i++)
                                  {
                                  	$f = $v[$i];
                                      
                                      $ax = $i == 0 ? "true" : "false";
                                      $cs = $i == 0 ? "show" : "";
                                  ?>
										<div class="card">

											<div class="card-header" id="heading-{{$k}}">

											  <h2 class="mb-0">

												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$k}}" aria-expanded="{{$ax}}" aria-controls="collapse-{{$k}}">

												  {{$f['question']}}

												</button>

											  </h2>

											</div>



											<div id="collapse-{{$k}}" class="collapse {{$cs}}" aria-labelledby="heading-{{$k}}" data-parent="#{{$k}}ac">

											  <div class="card-body">

												<p class="ac-para">{{$f['answer']}}</p>

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
@stop
