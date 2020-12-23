@extends('admin.layouts.app', ['title'=>'Appointment'])
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Appointment Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"><i class="la la-home font-20"></i></a>
            </li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Appointment Edit</div>
            </div>
            <div class="ibox-body">
                <form class="form-horizontal" id="form-appoint-add" method="post" novalidate="novalidate" action="{{route('admin.appointment.edit', $appointment->id)}}" accept-charset="utf-8">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Car</label>
                        <div class="col-sm-10">
                            <select class="form-control dropdown" name="car" id="car">
                                <option value="">----- Select Car -----</option>
                                @if(count($cars) >  0)
                                    @foreach($cars as $car)
                                    <option value="{{$car->id}}" @if($car->id == $appointment->car_id) selected @endif>{{$car->make}} - {{$car->model}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Workshop</label>
                        <div class="col-sm-10">
                            <select class="form-control dropdown" name="workshop" id="workshop">
                                <option value="">----- Select Workshop -----</option>
                                @if(count($workshops) >  0)
                                    @foreach($workshops as $workshop_id => $workshop_name)
                                    <option value="{{$workshop_id}}" @if($workshop_id == $appointment->workshop_id) selected @endif>{{$workshop_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Start Time</label>
                        <div class="col-sm-3">
                            <input type="text" data-id="{{$appointment->id}}" class="form-control" name="start_time" id="start_time" value="{{$appointment->start_time}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">End Time</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="end_time" id="end_time" value="{{$appointment->end_time}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <button class="btn btn-info" type="submit"><i class="fa fa-save"></i> Update</button>
                            <button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <div>
    <script src="{{url('admin')}}/assets/js/datetimepicker/jquery.datetimepicker.full.min.js" type="text/javascript"></script>
    <script src="{{url('admin')}}/assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function () {
            'use strict';
            jQuery('#start_time, #end_time').datetimepicker();
        });
    </script>
    <script type="text/javascript">
        $.validator.addMethod("chkStartTtime", function(value, element) {
            var flag = true;
            var dateNow = Date.parse(new Date());
            var startTime = Date.parse($('#start_time').val());
            var arrDateTime = "{{$datetime}}";
            var objDt = JSON.parse(arrDateTime.replace(/&quot;/g,'"'));
            var oldStarTime = "{{$appointment->start_time}}";

            if ( Date.parse(oldStarTime) ==  startTime ) {
                flag = true;
                return flag;
            }

            if( objDt.length > 0 ) {
                $.each(objDt, function( index, value ) {
                    var start_time = Date.parse(value.start_time);
                    var end_time = Date.parse(value.end_time);

                    if( (startTime >= start_time && startTime <= end_time) || (startTime < dateNow) ) {
                        flag = false;
                        return flag;
                    } else {
                        flag = true;
                    }
                });
            } else {
                flag = true;
            }

            return flag;

        }, "* Start time has been overlapping.");

        $.validator.addMethod("chkEndTime", function(value, element) {
            var startTime = $('#start_time').val();
            return Date.parse(startTime) < Date.parse(value) || value == "";
        }, "* End time must be after start time");

        $("#form-appoint-add").validate({
            rules: {
                car: {
                    required: !0
                },
                workshop: {
                    required: !0
                },
                start_time: {
                    required: !0,
                    chkStartTtime: !0
                },
                end_time: {
                    required: !0,
                    chkEndTime: !0
                }
            },
            messages: {
                car: {
                    required: "Please choose a car."
                },
                workshop: {
                    required: "Please choose a workshop."
                },
                start_time: {
                    required: "Please enter start time.",
                    chkStartTtime: "Start time has been overlapping."
                },
                end_time: {
                    required: "Please enter end time.",
                    chkEndTime: "End time must be after start time."
                }
            },
            errorClass: "help-block error",
            highlight: function(e) {
                $(e).closest(".form-group.row").addClass("has-error")
            },
            unhighlight: function(e) {
                $(e).closest(".form-group.row").removeClass("has-error")
            },
        });
    </script>
@endsection
