<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController; //referencia al controlador dentro de app/http


Route::get('/', function () {
    return view('auth.login');
});

/**/
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () { 

    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});