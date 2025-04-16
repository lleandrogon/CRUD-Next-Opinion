<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfirmacaoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('principal')->middleware(AuthMiddleware::class);

Route::get('/editar/{id}', [UserController::class, 'edit'])->name('usuario.editar')->middleware(AuthMiddleware::class);

Route::put('/editar/{id}', [UserController::class, 'update'])->name('usuario.update')->middleware(AuthMiddleware::class);

Route::delete('/excluir/{id}', [UserController::class, 'destroy'])->name('usuario.excluir')->middleware(AuthMiddleware::class);

Route::get('/entrar', [AuthController::class, 'index'])->name('login.index');

Route::post('/entrar', [AuthController::class, 'autenticar'])->name('login.autenticar');

Route::get('/cadastrar', [AuthController::class, 'cadastro'])->name('cadastro.index');

Route::post('/cadastrar', [AuthController::class, 'store'])->name('cadastro.adicionar');

Route::post('/sair', [AuthController::class, 'logout'])->name('login.logout')->middleware(AuthMiddleware::class);

Route::get('/confirmar', [ConfirmacaoController::class, 'index'])->name('confirmacao.index');

Route::post('/confirmar', [ConfirmacaoController::class, 'verificar'])->name('confirmacao.verificar');

Route::post('/reenviar', [ConfirmacaoController::class, 'reenviar'])->name('confirmacao.reenviar');


