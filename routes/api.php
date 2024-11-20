<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiContactFormController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/contact', [ApiContactFormController::class, 'showForm'])->name('api.contact.show');
Route::post('/contact', [ApiContactFormController::class, 'submit'])->name('api.contact.submit');
