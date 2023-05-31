<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FormularioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   return view('registro');
});

Route::view('/ingreso', "ingreso")->name('ingreso');
Route::view('/registro', "registro")->name('registro');
Route::view('/privada', "home")->middleware('auth')->name('privada');
Route::view('/form', "forms2")->name('form');
//Route::view('/contesta', "contesta")->name('contesta');

Route::post('/validar-registro',[LoginController::class,'registro'])->name('validar-registro');
Route::post('/inicia-sesion',[LoginController::class,'ingreso'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/formulario', [FormularioController::class,'create'])->name('nuevoform');

Route::post('/guardar-form',[FormularioController::class,'store'])->name('guardaform');

Route::get('/formss',[FormularioController::class,'show'])->name('contestaform');
