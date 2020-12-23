<?php

namespace App\Http\Controllers\Admin;

use App\Workshop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $workshops = Workshop::whereNull('deleted_at')->get();
        return view('admin.workshop.index', compact('workshops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workshop = Workshop::whereNull('deleted_at')->findOrfail($id);
        return view('admin.workshop.show', compact('workshop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function edit(workshop $workshop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, workshop $workshop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(workshop $workshop)
    {
        //
    }
}
