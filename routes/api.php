<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubmissionController;

Route::get('/submissions', [SubmissionController::class, 'index']);
Route::post('/submissions', [SubmissionController::class, 'store']);
