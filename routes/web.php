<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaiController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('siswa', SiswaiController::class);