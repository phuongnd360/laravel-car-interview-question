@extends('admin.layouts.app', ['title'=>'Car'])
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Car Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            </li>
        </ol>
    </div>

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Car Detail</div>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Contact Name:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$car->contact_name}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Make:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$car->make}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Model:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$car->model}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Engine Number:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$car->engine_number}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Chassis Number:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$car->chassis_number}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Latitude:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$car->latitude}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Longitude:</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$car->longitude}}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <button class="btn btn-default" type="button" onclick="window.history.back();"><i class="fa fa-reply"></i> Go Back</button>
                        <button class="btn btn-info" type="button" onclick="location.href='{{route('admin.car.index')}}'"><i class="fa fa-list"></i> Car List</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

