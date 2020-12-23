<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/appointment', ['as' => 'admin.appointment.index', 'uses' => 'AppointmentController@index']);
    Route::get('/appointment/add', ['as' => 'admin.appointment.add', 'uses' => 'AppointmentController@create']);
    Route::post('/appointment/add', ['as' => 'admin.appointment.add', 'uses' => 'AppointmentController@store']);
    Route::get('/appointment/edit/{id}', ['as' => 'admin.appointment.edit', 'uses' => 'AppointmentController@edit']);
    Route::post('/appointment/edit/{id}', ['as' => 'admin.appointment.edit', 'uses' => 'AppointmentController@update']);
    Route::post('/appointment/delete', ['as' => 'admin.appointment.delete', 'uses' => 'AppointmentController@destroy']);

    //Car
    Route::get('/car', ['as' => 'admin.car.index', 'uses' => 'CarController@index']);
    Route::get('/car/{id}', ['as' => 'admin.car.show', 'uses' => 'CarController@show']);

     //Workshop
     Route::get('/workshop', ['as' => 'admin.workshop.index', 'uses' => 'WorkshopController@index']);
     Route::get('/workshop/{id}', ['as' => 'admin.workshop.show', 'uses' => 'WorkshopController@show']);

     //Contact
     Route::get('/contact', ['as' => 'admin.contact.index', 'uses' => 'ContactController@index']);
     Route::get('/contact/{id}', ['as' => 'admin.contact.show', 'uses' => 'ContactController@show']);
});

