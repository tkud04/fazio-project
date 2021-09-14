@extends('layout')

@section('title',"Return Policy")

@section('content')
   <!--start of middle sec-->
<div class="middle-sec wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
    <div class="page-header">
      <div class="container text-center">
        <h2 class="text-primary text-uppercase">Return Policy</h2>
        <p></p>
      </div>
    </div>
    <section class="container">
      <div class="row">
        <div class="col-sm-12 ">
          <div class="inner-ad">
            <figure><img class="img-responsive" src="{{$ad}}" width="1170" height="100" alt=""></figure>
          </div>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb  dashed-border">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active">Return Policy</li>
          </ol>
        </div>
        <div class="col-sm-12">
		  <p><a href="{{url('/')}}">Ace Luxury Stores</a> is committed to ensuring that our products are delivered as advertised. In other words, <b>what you see is what you get</b>. This page outlines our rules for returning items back to us:</p><br>
          <h4 class="sub-title text-primary text-uppercase">Returns and Exchanges</h4>
         <p>All Sales are <b>FINAL</b>.</p><br>
         <p>There will be NO REFUND, NO EXCHANGES on merchandises that are not defective.</p><br>
         <p>Only unused defective merchandise may be returned with pre-authorization and a copy of the original receipt and invoice.</p><br>
         <p>Items may not be returned for any other reason.</p><br>

        </div>
      </div>
    </section>
  </div>
  <!--end of middle sec--> 
    
@stop