<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

Route::get('/', function () {
    return view('certificate.create');
});


Route::post('/certificate', [CertificateController::class, 'store']);
Route::get('/certificates/{certificate}', [CertificateController::class, 'show']);
