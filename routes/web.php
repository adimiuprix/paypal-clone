<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Account;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/signin', [AuthController::class, 'signin_form'])->name('signin_form');
Route::post('/auth-check', [AuthController::class, 'check'])->name('auth_check');
Route::get('/signup', [AuthController::class, 'signup_form'])->name('signup_form');
Route::post('/signup-check', [AuthController::class, 'signup_check'])->name('signup_check');
Route::get('/signout', [AuthController::class, 'logout'])->name('signout');

Route::get('/myaccount', [Account::class, 'index'])->name('account');
Route::get('/myaccount/summary', [Account::class, 'index'])->name('account');
Route::get('/myaccount/money', [Account::class, 'money'])->name('money');