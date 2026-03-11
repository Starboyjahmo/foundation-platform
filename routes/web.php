<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MpesaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard (admin)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Events page (list all events)
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Donate page (show donation form)
Route::get('/donate', [DonationController::class, 'index'])->name('donate.index');

// Store donation
Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');

// Optional: mark donation as paid (admin)
Route::patch('/donate/{donation}/mark-paid', [DonationController::class, 'markPaid'])->name('donation.markPaid');

// Live chat page
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');

Route::view('/about', 'about');


Route::post('/donate/stk', [MpesaController::class,'stkPush'])->name('donate.stk');