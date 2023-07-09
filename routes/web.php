<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DelitoController;
use App\Http\Controllers\CategoriaDelitoController;
use App\Http\Controllers\AlertaController;

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

// USUARIOS *****************************************************************
Route::get("usuarios/mostrar", [UsuarioController::class, "index"])
    ->name("umostrarusuario")
    ->middleware('auth'); 

Route::get("usuarios/registrar", [UsuarioController::class, "registrar"])
    ->name("uregistrarusuario")
    ->middleware("auth");
          
Route::post("usuarios/guardar", [UsuarioController::class, "guardar"]);

Route::put('usuarios/actualizar/{id}', [UsuarioController::class, 'actualizar'])
    ->name('uactualizarusuario')
    ->middleware("auth");

Route::delete("usuarios/eliminar/{id}", [UsuarioController::class, "eliminar"])
    ->name("ueliminarusuario")
    ->middleware("auth");

// DELITOS *****************************************************************
Route::get("delitos/mostrar", [DelitoController::class, "index"])
    ->name("dmostrardelito")
    ->middleware('auth');

Route::get("delitos/registrar", [DelitoController::class, "registrar"])
    ->name("dregistrardelito")
    ->middleware("auth");

Route::post("delitos/guardar", [DelitoController::class, "guardar"]);

Route::put('delitos/actualizar/{id}', [DelitoController::class, 'actualizar'])
    ->name('dactualizardelito')
    ->middleware("auth");

Route::delete("delitos/eliminar/{id}", [DelitoController::class, "eliminar"])
    ->name("deliminardelito")
    ->middleware("auth");

// CATEGORIA DE DELITOS *****************************************************************
Route::get("categorias/mostrar", [CategoriaDelitoController::class, "index"])
    ->name("cmostrarcategoria")
    ->middleware('auth');

Route::get("categorias/registrar", [CategoriaDelitoController::class, "registrar"])
    ->name("cregistrarcategoria")
    ->middleware("auth");

Route::post("categorias/guardar", [CategoriaDelitoController::class, "guardar"]);

Route::put('categorias/actualizar/{id}', [CategoriaDelitoController::class, 'actualizar'])
    ->name('cactualizarcategoria')
    ->middleware("auth");

Route::delete("categorias/eliminar/{id}", [CategoriaDelitoController::class, "eliminar"])
    ->name("celiminarcategoria")
    ->middleware("auth");

// ALERTAS
Route::get('alertas/mostrar', [AlertaController::class, 'index'])
    ->name('amostraralerta')
    ->middleware('auth');

Route::post('alertas/guardar', [AlertaController::class, 'guardar']);

Route::delete("alerta/eliminar/{id}", [AlertaController::class, "eliminar"])
    ->name("aeliminaralerta")
    ->middleware("auth");
