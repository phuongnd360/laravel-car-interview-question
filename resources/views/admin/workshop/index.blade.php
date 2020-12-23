@extends('admin.layouts.app', ['title'=>'Workshop'])
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Workshop Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"><i class="la la-home font-20"></i></a>
            </li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                Workshop List
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Opening Time</th>
                            <th>Closing Time</th>
                            <th class="txt-center">Appointment</th>
                        </tr>
                    </thead>
                    @if(count($workshops) > 8)
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Opening Time</th>
                            <th>Closing Time</th>
                            <th class="txt-center">Appointment</th>
                        </tr>
                    </tfoot>
                    @endif
                    <tbody>
                        @if(count($workshops) > 0)
                        @foreach($workshops as $workshop)
                            <tr>
                                <td>{{$workshop->name}}</td>
                                <td>{{$workshop->phone}}</td>
                                <td>{{$workshop->latitude}}</td>
                                <td>{{$workshop->longitude}}</td>
                                <td>{{$workshop->opening_time}}</td>
                                <td>{{$workshop->closing_time}}</td>
                                <td><button onclick="location.href='{{route('admin.appointment.index', ['ws'=>$workshop->id])}}'">Appointment</button></td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

@endsection
