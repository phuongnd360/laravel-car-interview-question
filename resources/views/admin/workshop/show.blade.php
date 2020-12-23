@extends('admin.layouts.app', ['title'=>'Workshop'])
@section('content')
 <div class="page-heading">
        <h1 class="page-title">Workshop Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            </li>
        </ol>
    </div>

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Workshop Detail</div>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$workshop->name}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$workshop->phone}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Latitude:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$workshop->latitude}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Longitude:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$workshop->longitude}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Opening Time:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$workshop->opening_time}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Closing Time:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$workshop->closing_time}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <button class="btn btn-default" type="button" onclick="window.history.back();"><i class="fa fa-reply"></i> Go Back</button>
                        <button class="btn btn-info" type="button" onclick="location.href='{{route('admin.workshop.index')}}'"><i class="fa fa-list"></i> Workshop List</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

