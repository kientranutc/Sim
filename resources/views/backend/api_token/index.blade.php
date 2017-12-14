@extends('backend.layouts.master')
@section('title')
Generate Api Token
@endsection
@section('breadcrumb')
Generate Api Token
@endsection
@section('style')
    <link href="{{ asset('backend/css/api_token/style.css') }}" rel="stylesheet">
@endsection
@section('content')
 <div class="ajax-loader" style="display:none">
        <img src="{{ asset('backend/img/ajax_loader.gif') }}" class="img-responsive" />
    </div>
<div class="padding-md">
 <div class="panel-body">
    <div class="panel-body">
     <div class="panel panel-default">
            <div class="panel-heading" id="form_heading">List Ticket</div>
                <div class="panel-body">
    				<button class="btn btn-success" id="generate-key"><i class="fa fa-refresh fa-lg" aria-hidden="true"></i> Api Token</button>
    			</div>
               <div class="col-md-6 total-ticket">
                    <span class="text-left"><strong>Total number of records: </strong></span>
               </div>
           <div class="col-md-6 page-number">
              <form method="get" class="pull-right">
                  <label for="choose_item">Item display on page: &nbsp; &nbsp;</label>
                     <select id="choose_item" name="limit" class="form-control input-md inline-block" size="1" onchange="this.form.submit()">
                     </select>
              </form>
           </div>
         </div>
    </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('backend/js/api_token/main.js')}}"></script>
@endsection