@extends('admin.layouts.app', ['title'=>'Car'])
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Car Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"><i class="la la-home font-20"></i></a>
            </li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                Car List
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Contact Name</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Engine Number</th>
                            <th>Chassis Number</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                        </tr>
                    </thead>
                    @if(count($cars) > 8)
                    <tfoot>
                        <tr>
                            <th>Contact Name</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Engine Number</th>
                            <th>Chassis Number</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                        </tr>
                    </tfoot>
                    @endif
                    <tbody>
                        @if(count($cars) > 0)
                        @foreach($cars as $car)
                            <tr>
                                <td>{{$car->contact_name}}</td>
                                <td>{{$car->make}}</td>
                                <td>{{$car->model }}</td>
                                <td>{{$car->engine_number }}</td>
                                <td>{{$car->chassis_number }}</td>
                                <td>{{$car->latitude}}</td>
                                <td>{{$car->longitude}}</td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
@endsection
