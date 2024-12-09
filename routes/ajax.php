<?php

use App\Http\Controllers\Ajax\AjaxController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {
    Route::controller(AjaxController::class)->group(function () {
        Route::get('/roles/data', 'getData')->name('role.data');
        Route::get('/assign/data', 'assignUserData')->name('assign.data');
    });
});
