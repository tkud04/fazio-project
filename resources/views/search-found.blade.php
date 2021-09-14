@extends('layout')

@section('title',"Results")

@section('content')
   <!--start of middle sec-->
<div class="middle-sec wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
    <div class="page-header">
      <div class="container text-center">
        <h2 class="text-primary text-uppercase">search results</h2>
        <p>we found some products based on your search.</p>
      </div>
    </div>
    <section class="container">
      <div class="row">
        <div class="col-sm-12 ">
          <div class="inner-ad">
            <figure><img class="img-responsive" src="{{$ad}}" width="1170" height="100" alt=""></figure>
          </div>
        </div>
        
        <!--main sec start-->
        
        <div class="col-sm-12 main-sec">
          <div class="row">
            <div class="col-sm-12">
              <ol class="breadcrumb  dashed-border">
                <li><a href="#">Home</a></li>
                <li class="active">search results</li>
              </ol>
            </div>
			 <?php
			$rc = (isset($results)) ? count($results) : 0;
		   ?>
            <div class="col-sm-12">
              <h4 class="sub-title text-primary text-uppercase">results found: <span class="text-info">({{$rc}}) </span></h4>
              <ul class="item-list list-group">
			  <?php
			    for($i = 0; $i < $rc; $i++)
				{
					$p = $results[$i]['product'];
					$r = $results[$i]['rating'];
					$pd = $p['pd']; $imggs = $p['imggs'];
					$pu = url('product')."?sku=".$p['sku'];
					$sqty = "search-qty-".$p['sku'];
			  ?>
                <li class="item list-group-item  clearfix">
                  <div class="item-information">
                    <div class="row">
                      <div class="item-image col-sm-2"> <img class="img-responsive" src="{{$imggs[0]}}" width="126" height="144" alt=""> </div>
                      <div class="item-body col-sm-8">
                        <h5 class="item-title text-primary text-uppercase text-primary text-uppercase"><a href="{{$pu}}">{{$p['name']}}</a></h5>
                        <p class="item-description">{!! $pd['description'] !!} </p>
                      </div>
                      <div class="item-price js-item-price col-sm-2 text-info text-center"> <strong>&#8358;{{number_format($pd['amount'],2)}}</strong> </div>
                    </div>
                  </div>
                  <div class="item-interactions">
                    <div class="row">
                      <div class="col-sm-2 text-info text-center right-bordered">
					   <?php
					   $iclass="";
					   for($j = 0; $j < 5; $j++)
					   {
						  $iclass = "ion-android-star-outline";
						  if($j < $r) $iclass = "ion-android-star";
					   ?>
					    <i class="{{$iclass}}"></i>
					   <?php
					   }
					   ?>
					  </div>
                      <div class="col-sm-8">
                        <div class="qty-btngroup clearfix pull-left">
                          <button class="minus" type="button">-</button>
                          <input type="text" value="1" id="{{$sqty}}">
                          <button class="plus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-sm-2 text-center left-bordered"> <a href="javascript:void(0)" onclick="searchToCart('{{$p['sku']}}')" class="search-add-to-cart btn btn-primary hvr-underline-from-center-primary">add to cart</a> </div>
                    </div>
                  </div>
                </li>
                <?php
				}
				?>
              </ul>
            </div>
            
            <!--start of pagination-->
            
            <div class="col-sm-12">
              <nav role="navigation">
                <ul class="cd-pagination">
                  <li class="button"><a href="#0">Prev</a> </li>
                  <li><a href="#0">1</a> </li>
                  <li><a href="#0">2</a> </li>
                  <li><a class="current" href="#0">3</a> </li>
                  <li><a href="#0">4</a> </li>
                  <li><span>...</span> </li>
                  <li><a href="#0">20</a> </li>
                  <li class="button"><a href="#0">Next</a></li>
                </ul>
              </nav>
            </div>
            <!--end of pagination--> 
          </div>
        </div>
        
        <!--main sec end--> 
        
      </div>
    </section>
  </div>
  <!--end of middle sec--> 
    
@stop