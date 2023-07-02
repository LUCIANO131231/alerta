<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DelitoController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// USUARIOS

Route::get("usuarios/mostrar", [UsuarioController::class, "index"])
    ->name("umostrarusuario")
    ->middleware('auth'); 

Route::get("usuarios/registrar", [UsuarioController::class, "registrar"])
    ->name("uregistrarusuario")
    ->middleware("auth");
          
Route::post("usuarios/guardar", [UsuarioController::class, "guardar"]);

// DELITOS

Route::get("delitos/mostrar", [DelitoController::class, "index"])
    ->name("dmostrardelito")
    ->middleware('auth');

Route::get("delitos/registrar", [DelitoController::class, "registrar"])
    ->name("dregistrardelito")
    ->middleware("auth");

Route::post("delitos/guardar", [DelitoController::class, "guardar"]);
