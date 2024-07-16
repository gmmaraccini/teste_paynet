<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

// Rotas de autenticação
Route::get('/cadastro', [AuthController::class, 'showRegisterForm']);
Route::post('/cadastro', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas de recuperação de senha
Route::get('/recuperacao-senha', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/recuperacao-senha', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/resetar-senha/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/resetar-senha', [PasswordResetController::class, 'reset'])->name('password.update');

// Rota da página inicial
Route::get('/home', [UsuarioController::class, 'index'])->name('home');
