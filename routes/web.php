<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Services\EmailService;

// Rotas de autenticação
Route::get('/cadastro', [AuthController::class, 'showRegisterForm']);
Route::post('/cadastro', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas de recuperação de senha
Route::get('/recuperacao-senha', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/recuperacao-senha', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/resetar-senha/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/resetar-senha', [ResetPasswordController::class, 'reset'])->name('password.update');

// Rota da página inicial
Route::get('/home', [UsuarioController::class, 'index'])->name('home');

// routes/web.php
use Illuminate\Support\Facades\Mail;

Route::get('/enviar-email-teste', function (EmailService $emailService) {
    $to = 'gabrielmaracciniprofissional@gmail.com';
    $subject = 'Teste de Envio de Email';
    $body = 'Este é um email de teste';

    $emailService->sendEmail($to, $subject, $body);

    return 'Email enviado com sucesso (verifique os logs para mais detalhes)';
});
