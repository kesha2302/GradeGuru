<?php

use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminClassNameController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

 Route::get('/Admin', [AdminPanelController::class, 'index']);
