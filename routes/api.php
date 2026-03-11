<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesaController;

// M-Pesa Callback (API routes are CSRF exempt automatically)
Route::post('/mpesa/callback', [MpesaController::class, 'callback']);