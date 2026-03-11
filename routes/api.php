<?php

use App\Http\Controllers\MpesaController;

Route::post('/mpesa/callback', [MpesaController::class,'callback']);