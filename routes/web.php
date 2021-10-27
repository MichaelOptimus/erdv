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
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::get('/users', function () {
        return view('admin.user.users');
    });
    Route::get('/new-user', function () {
        return view('admin.user.newuser');
    });
    Route::get('/edit-user', function () {
        return view('admin.user.edituser');
    });
});

Route::prefix('gestion')->group(function () {
   Route::get('/', function () {
        return view('gestion.dashboard');
    });
});


require __DIR__.'/auth.php';
