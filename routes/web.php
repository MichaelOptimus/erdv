<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');    
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/welcome', 'App\Http\Controllers\WelcomeController@index');
});


Route::prefix('admin')->group(function () {
    Route::get('/', 'App\Http\Controllers\AdminControler@index');


    Route::get('/users', 'App\Http\Controllers\AdminControler@getAdmins')->name('listeAdmin');
    Route::get('/new-user', 'App\Http\Controllers\AdminControler@newUser');
    Route::get('/edit-user/{id}', 'App\Http\Controllers\AdminControler@editUser');
    Route::post('/saveAdmin', 'App\Http\Controllers\AdminControler@setAdmin')->name('saveAdmin');
    
    Route::get('/cliniques', 'App\Http\Controllers\CliniqueController@index')->name('cliniques');
    Route::get('/clinique/{id}', 'App\Http\Controllers\CliniqueController@show')->name('clinique');
    Route::get('/new-clinqiue', 'App\Http\Controllers\CliniqueController@create');
    Route::post('/saveClinique', 'App\Http\Controllers\CliniqueController@store')->name('saveClinique');

});



Route::prefix('gestion')->group(function () {
   Route::get('/', function () {
        return view('gestion.dashboard');
    });
});


require __DIR__.'/auth.php';
