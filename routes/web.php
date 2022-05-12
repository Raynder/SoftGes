<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/home', [App\Http\Controllers\HomeController::class, 'update'])->name('home.update');

    Route::get('/projetos', [App\Http\Controllers\ProjetosController::class, 'index'])->name('projetos.create');
    Route::get('/projetos/lista', [App\Http\Controllers\ProjetosController::class, 'list'])->name('projetos.list');
    Route::get('/projetos/ver', [App\Http\Controllers\ProjetosController::class, 'show'])->name('projetos.show');
    Route::post('/projetos/editar', [App\Http\Controllers\ProjetosController::class, 'update'])->name('projetos.update');
    // route para apagar projeto
    Route::get('/projetos/apagar/{id}', [App\Http\Controllers\ProjetosController::class, 'destroy'])->name('projetos.destroy');

    Route::post('/projetos', [App\Http\Controllers\ProjetosController::class, 'create'])->name('projetos.create');

    // tarefas
    Route::get('/tarefas/{projeto?}', [App\Http\Controllers\TarefasController::class, 'index'])->name('tarefas');
    Route::post('/tarefas', [App\Http\Controllers\TarefasController::class, 'store'])->name('tarefas.store');
    Route::put('/tarefas/{id}', [App\Http\Controllers\TarefasController::class, 'update'])->name('tarefas.update');

    Route::put('/subtarefas/{id}', [App\Http\Controllers\TarefasController::class, 'updateSub'])->name('subtarefas.update');

    Route::get('/modals/{modal}', [App\Http\Controllers\ModalsController::class, 'index'])->name('modals');	
});

Route::get('/login', function () {
    echo('teste');
})->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\LoginController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\LoginController::class, 'register'])->name('register');
