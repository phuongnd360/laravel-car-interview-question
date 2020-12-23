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
        @if ($message = Session::get('success'))
        <div class="alert alert-{{Session::get('alert-type')}} alert-bordered fade show">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            <strong>{{$message}}</strong>
        </div>
        @endif
        <div class="ibox">
            <div class="ibox-head">
                <div class="form-ws">
                    <label class="form-control-label">Workshop: </label>
                    <select class="form-control select2_demo_1" name="workshop" id="workshop">
                        <option value="">All</option>
                        @if(count($workshops) >  0)
                            @foreach($workshops as $workshop_id => $workshop_name)
                            <option value="{{$workshop_id}}">{{$workshop_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <button class="btn btn-default btn-sm" onclick="location.href='{{route('admin.appointment.add')}}'"><i class="fa fa-plus"></i> Add</button>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Car</th>
                            <th>Workshop</th>
                            <th>Distance (Km)</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th class="txt-center">Actions</th>
                        </tr>
                    </thead>
                    @if(count($appoints) > 8)
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Car</th>
                            <th>Workshop</th>
                            <th>Distance (Km)</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th class="txt-center">Actions</th>
                        </tr>
                    </tfoot>
                    @endif
                    <tbody>
                        @if(count($appoints) > 0)
                        @foreach($appoints as $appoint)
                            <tr>
                                <td>{{ formatDate($appoint->start_time, 'D, M d, Y') }}</td>
                                <td><a class="border-bottom" href="{{route('admin.car.show', $appoint->car_id)}}">{{$appoint->car_name}}</a></td>
                                <td><a class="border-bottom" href="{{route('admin.workshop.show', $appoint->workshop_id)}}">{{$appoint->workshop_name}}</a></td>
                                <td>{{distance($appoint->car_latitude, $appoint->car_longitude, $appoint->workshop_latitude, $appoint->workshop_longitude, "K")}}</td>
                                <td>{{ formatDate($appoint->start_time, 'H:i') }}</td>
                                <td>{{ formatDate($appoint->end_time, 'H:i') }}</td>
                                <td class="txt-center">
                                    <button onclick="location.href='{{route('admin.appointment.edit', $appoint->id)}}'" class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i></button>
                                    <button id="btnDel" class="btn btn-danger btn-sm" data-original-title="Delete" data-toggle="modal" data-target="#myModal" data-id="{{$appoint->id}}">
                                    <i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Deleting a appointment...</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <strong>Are you sure you want to delete this item?</strong>
        </div>
        <!-- Modal footer -->
            <form action="{{route('admin.appointment.delete')}}" method="post" id="frm-appoint" accept-charset="utf-8">
                @csrf
                <input type="hidden" name="appointment_id" id="appointment_id" value="">
                <div class="modal-footer">
                    <button id="btnDelete" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash-o"></i> Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- End modal -->

<script>
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null) {
        return null;
        }
        return decodeURI(results[1]) || 0;
    }

    $('#workshop').change(function(){
        var workshop_id = $(this).val();
        if(workshop_id == "" || workshop_id == null){ location.href = "{{route('admin.appointment.index')}}"; }
        else{ location.href = "{{route('admin.appointment.index')}}"+"?ws="+workshop_id; }
    });
    $('#workshop').find('option').each(function(i,e){ if($(e).val() == $.urlParam('ws')){ $('#workshop').prop('selectedIndex',i); }});
</script>
<script>
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            $('#appointment_id').val($('#btnDel').data('id'));
        });
        $('#btnDelete').click(function() {
            $('#frm-appoint').submit();
        });
    });
</script>
@endsection
