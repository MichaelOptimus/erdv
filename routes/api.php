<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdvController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\APIController;

Route::get('/cliniques','App\Http\Controllers\APIController@getCliniques');
Route::post('/new-patient','App\Http\Controllers\APIController@registerPatient');


Route::post('/login', 'App\Http\Controllers\APIController@login');
Route::post('/set-rendez-vous', 'App\Http\Controllers\APIController@setRendezvous');





