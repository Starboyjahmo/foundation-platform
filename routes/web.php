<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MpesaController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// About
Route::view('/about', 'about');

// Live Chat
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');

// Donations
Route::get('/donate', [DonationController::class, 'index'])->name('donate.index');
Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');
Route::patch('/donate/{donation}/mark-paid', [DonationController::class, 'markPaid'])->name('donation.markPaid');

// M-Pesa STK Push
Route::post('/donate/stk', [MpesaController::class, 'stkPush'])->name('donate.stk');