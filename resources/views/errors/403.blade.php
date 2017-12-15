@extends('layouts.master')
@section('title', '403-Measurement tool')
@section('breadcrumbs','403')
@section('style')
    <link href="{{ asset('css/custom/date-form.css') }}" rel="stylesheet">
@stop
@section('content')
<div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong><i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i> You are not authorized to access this page</strong>
</div>
<div class="row">
   <div class="col-md-12">
      <a href="{{ URL::to('rank') }}" class="text-primary"><strong>Back</strong></a>
  </div>
</div>
@stop