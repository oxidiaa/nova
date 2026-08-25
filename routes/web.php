<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/system/saturnus', function () {
    $saturnusUrl = env('SATURNUS_URL', 'http://127.0.0.1:8001');
    return redirect()->away($saturnusUrl);
})->name('system.saturnus');

