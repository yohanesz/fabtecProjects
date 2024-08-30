<?php

use App\Http\Controllers\Funcao_usuariosController;
use App\Http\Controllers\FuncaoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UsuarioController;
use App\Models\Perfil;
use Illuminate\Support\Facades\Route;

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
    return redirect('/usuario');
});


Route::resource('/usuario', UsuarioController::class);
Route::resource('/setor', SetorController::class);
Route::resource('/perfil', PerfilController::class);
Route::resource('/funcao', FuncaoController::class);
// Route::resource('/funcao_usuarios', Funcao_usuariosController::class);


Route::get('/funcao_usuarios/{id}/add', [Funcao_usuariosController::class, 'addFunctioToUser'])->name('funcao_usuarios.addFunctionToUser');

Route::get('funcao_usuarios/{id}', [Funcao_usuariosController::class, 'show'])->name('funcao_usuarios.show');
// Route::delete('funcao_usuarios/{id}', [Funcao_usuariosController::class, 'destroy'])->name('funcao_usuarios.destroy');
Route::post('funcao_usuarios', [Funcao_usuariosController::class, 'store'])->name('funcao_usuarios.store');
Route::delete('/funcao_usuarios/{id}/{funcao_id}', [Funcao_usuariosController::class, 'destroy'])->name('funcao_usuarios.destroy');















