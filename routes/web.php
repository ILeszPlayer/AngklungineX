<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AngklungController;

Route::post('/play/{note}', [AngklungController::class, 'play']);

Route::get('/', function () {
    return view('welcome');
});
