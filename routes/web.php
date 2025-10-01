<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Account;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/signin', [AuthController::class, 'signin_form'])->name('signin_form');
Route::post('/auth-check', [AuthController::class, 'check'])->name('auth_check');

Route::get('/myaccount', [Account::class, 'index'])->name('account');