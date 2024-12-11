<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::get('/privacy-policy', function () {
    return view('common.privacy-policy');
})->name('privacy.policy');
