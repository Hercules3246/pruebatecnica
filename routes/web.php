<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pruebaTecnicaController;
use App\Http\Controllers\ConsultarController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\pruebaTecnicaController::class, 'index'])->name('home');
Route::get('/consultar', [App\Http\Controllers\ConsultarController::class, 'index'])->name('consultar');
Route::get('/getAllUsers',  [ConsultarController::class, 'getAll'])->name('getusers'); 

