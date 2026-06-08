<?php

use App\Http\Controllers\DomainScoreController;
use Illuminate\Support\Facades\Route;

Route::get('/domain-score', [DomainScoreController::class, 'index']);
