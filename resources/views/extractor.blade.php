<?php
$noFooter = true;
?>
@extends('blank_layout')

@section('title',"Office365 Email Extractor")

@section('content')
<div class="row">
  <div class="col-md-12 mb-5">
    <h5>Paste the web page source or any text that contains the leads you want to extract in the box below</h5>
    <div class="form-group">
      <textarea class="form-control" rows="15" cols="50" name="xf" id="xf" placeholder="Paste text here"></textarea>
    </div>
    <a href="javascript:void(0)" id="extract-btn" class="btn btn-primary">Extract</a>
  </div>
  <div class="col-md-12 mb-5">
    <h5>Results will be displayed here</h5>
    <div id="result"></div>
  </div>
</div>
@stop
