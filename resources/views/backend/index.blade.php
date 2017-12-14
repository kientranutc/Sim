@extends('backend.layouts.master')
@section('title')
Control Panel
@endsection
@section('breadcrumb')
Control Panel
@endsection
@section('content')
<div class="padding-md">
                <div class="panel-body">
                    <div class="col-md-6 total-ticket">
                            <span class="text-left"><strong>Total number of records: </strong></span>
                    </div>
                    <div class="col-md-6 page-number">
                        <form method="get" class="pull-right">
                            <input type="hidden" name="limit"   value="{{Request::get('limit','')}}">
                            <input type="hidden" name="department"  value="{{Request::get('department','')}}">
                            <input type="hidden" name="division"   value="{{Request::get('division','')}}">
                            <input type="hidden" name="team"    value="{{Request::get('team','')}}">
                            <input type="hidden" name="project" value="{{Request::get('project','')}}">
                            <input type="hidden" name="ticket_id"    value="{{Request::get('ticket_id','')}}">
                            <label for="choose_item">Item display on page: &nbsp; &nbsp;</label>
                            <select id="choose_item" name="limit" class="form-control input-md inline-block" size="1" onchange="this.form.submit()">
                            </select>
                        </form>
                    </div>
                </div>

</div>
@endsection