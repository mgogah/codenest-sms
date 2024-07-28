<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SMSController;

Route::get('/', function () {
    return view('send');
});

Route::post('/send-sms', [SMSController::class, 'send'])->name('send.sms');
