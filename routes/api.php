<?php

use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;

Route::post('/consultations', [
    ConsultationController::class,
    'store',
])->name('consultations.store');