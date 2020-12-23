<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Car;
use App\Workshop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //get workshop list
        $workshops = Workshop::pluck('name', 'id');

        //get appointment list
        $appoints = Appointment::join('cars', 'cars.id', '=', 'appointments.car_id')
                                ->join('workshops', 'workshops.id', '=', 'appointments.workshop_id')
                                ->select('appointments.*', 'cars.make AS car_name', 'cars.latitude AS car_latitude', 'cars.longitude AS car_longitude', 'workshops.name AS workshop_name', 'workshops.latitude AS workshop_latitude', 'workshops.longitude AS workshop_longitude')
                                ->whereNull('cars.deleted_at')
                                ->whereNull('workshops.deleted_at')
                                ->orderBy('updated_at', 'desc')
                                ->get();
        if ($request->ws) {
            $appoints = $appoints->whereIn('workshop_id', $request->ws);
        }

        return view('admin.appointment.index', compact('appoints', 'workshops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get date time
        $datetime = Appointment::select('start_time', 'end_time')->get();

        //get car list
        $cars = Car::select('id', 'make', 'model')->whereNull('deleted_at')->get();

        //get workshop list
        $workshops = Workshop::pluck('name', 'id');

        return view('admin.appointment.add', compact('cars', 'workshops', 'datetime'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['car_id']         = $request->get('car');
        $data['workshop_id']    = $request->get('workshop');
        $data['start_time']     = $request->get('start_time');
        $data['end_time']       = $request->get('end_time');
        $data['created_at']     = date('Y-m-d H:i:s');
        $data['updated_at']     = date('Y-m-d H:i:s');

        if( Appointment::create($data) ) {
            Session::flash('success', 'Appointment created successfully.');
        }

        return redirect()->route('admin.appointment.index')->with('alert-type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get date time
        $datetime = Appointment::select('id', 'start_time', 'end_time')->get();

        //get car list
        $cars = Car::select('id', 'make', 'model')->whereNull('deleted_at')->get();

        //get workshop list
        $workshops = Workshop::pluck('name', 'id');

        $appointment = Appointment::findOrfail($id);

        return view('admin.appointment.edit', compact('appointment', 'cars', 'workshops', 'datetime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['car_id']         = $request->get('car');
        $data['workshop_id']    = $request->get('workshop');
        $data['start_time']     = $request->get('start_time');
        $data['end_time']       = $request->get('end_time');
        $data['updated_at']     = date('Y-m-d H:i:s');

        if( Appointment::where('id', $id)->update($data) ) {
            Session::flash('success', 'Appointment updated successfully.');
            return redirect()->route('admin.appointment.index')->with('alert-type', 'success');
        } else {
            Session::flash('danger', 'Appointment updated failed.');
            return redirect()->route('admin.appointment.index')->with('alert-type', 'danger');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('appointment_id');
        if( Appointment::where('id', $id)->delete()) {
            Session::flash('success', 'Appointment delete successfully.');
            return redirect()->route('admin.appointment.index')->with('alert-type', 'success');
        } else {
            Session::flash('danger', 'Appointment delete failed.');
            return redirect()->route('admin.appointment.index')->with('alert-type', 'danger');
        }
    }
}
