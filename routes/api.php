<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdvController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CliniqueController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Publics routes

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//Protected Routes
Route::group(['middleware'=>['auth:sanctum']],function()
{
    //User

    Route::get('/user',[AuthController::class,'user']);
    Route::post('/logout',[AuthController::class,'logout']);

    //Rendez-vous
    Route::get('/rendezvous',[RdvController::class,'index']); // all rendezvous
    Route::post('/rendezvous',[RdvController::class,'store']); //create rendezvous
    //Route::get('/rendezvous/{id}',[RdvController::class,'show']); // get single rendezvous
    //Route::put('/rendezvous/{id}',[RdvController::class,'update']); // update rendezvous
    Route::delete('/rendezvous/{id}',[RdvController::class,'destroy']); // delete rendezvous

    //Clinique
    Route::get('/clinique',[CliniqueController::class,'index']); // all clinique
   // Route::post('/clinique',[CliniqueController::class,'store']); //create rendezvous
    //Route::get('/rendezvous/{id}',[RdvController::class,'show']); // get single rendezvous
    //Route::put('/rendezvous/{id}',[RdvController::class,'update']); // update rendezvous
    //Route::delete('/clinique/{id}',[CliniqueController::class,'destroy']); // delete rendezvous

}
);
