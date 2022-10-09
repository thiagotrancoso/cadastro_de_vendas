<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

# ------------------------------------------------------------------------------------------
# Rotas de autenticação
# ------------------------------------------------------------------------------------------
// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Password Confirmation
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

# ------------------------------------------------------------------------------------------
# Rotas da aplicação
# ------------------------------------------------------------------------------------------
Route::prefix('/app')
    ->middleware(['auth'])
    ->group(function () {
        // Dashboard
        Route::get('/', function () { return view('dashboard'); })->name('app.dashboard');

        // Usuários
        Route::get('/usuarios', [UserController::class, 'list'])->name('app.users.list');
        Route::get('/usuarios/cadastrar', [UserController::class, 'create'])->name('app.users.create');
        Route::post('/usuarios', [UserController::class, 'store'])->name('app.users.store');
        Route::get('/usuarios/{id}/editar', [UserController::class, 'edit'])->name('app.users.edit');
        Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('app.users.update');
        Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('app.users.destroy');

        // Produtos
        Route::get('/produtos', function () { return view('app.products.all'); })->name('app.products.all');

        // Vendas
        Route::get('/vendas', function () { return view('app.sales.all'); })->name('app.sales.all');

        // Relatórios
        Route::get('/relatorios', function () { return view('app.reports.all'); })->name('app.reports.all');

        // Meu perfil
        Route::get('/meu-perfil', function () { return view('app.profile.index'); })->name('app.profile.index');

        // Configurações
        Route::get('/configuracoes', function () { return view('app.settings.index'); })->name('app.settings.index');
    });

# ------------------------------------------------------------------------------------------
# Outras rotas
# ------------------------------------------------------------------------------------------
Route::get('/', function () { return view('welcome'); });
Route::get('/home', 'HomeController@index')->name('home');
