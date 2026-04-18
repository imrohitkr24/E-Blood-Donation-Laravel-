<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index']);