<?php

use App\Http\Controllers\Admin\{
    AuthController as AdminAuthController,
    DashboardController,
    RoleController,
    PermissionController,
    UserController
};

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::controller(AdminAuthController::class)->group(function () {
        Route::match(['GET', 'POST'], 'login', 'adminLogin')->name('login');
    });

    /************************ For Auth Users ******************************/
    Route::middleware(['auth:web', 'role:admin'])->group(function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('logout', 'logout')->name('logout');
            Route::match(['GET', 'POST'], 'dashboard', 'adminDashboard')->name('dashboard');
            Route::post('change-status', 'changeStatus')->name('status.change');

            Route::match(['GET', 'POST'], 'reset-password', 'adminResetPasswordSubmit')->name('reset.password');
        });

        Route::controller(UserController::class)->group(function () {
            Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
                Route::get('/', 'index')->name('list')->middleware('permission:user_mgmt_view');
                Route::get('/details/{id}', 'userDetails')->name('details')->middleware('permission:user_mgmt_canViewDetails');

                Route::get('/queries', 'queryList')->name('queries.list')->middleware('permission:query_mgmt_view');

            });
        });

        Route::controller(RoleController::class)->group(function () {
            Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
                Route::get('/', 'index')->name('list');
                Route::match(['get', 'post'], 'add', 'addRole')->name('store');
                Route::match(['GET', 'POST'], '/edit/{id}', 'editRole')->name('edit');
                Route::post('/delete', 'destroy')->name('destroy');
            });
        });

        Route::controller(PermissionController::class)->group(function () {
            Route::match(['get', 'post'], 'list-user-role', 'listUserWithRole')->name('list.user.role');
            Route::match(['get', 'post'], 'user-role', 'addUserWithRole')->name('user.role');

            Route::match(['get', 'post'], 'edit-user-role/{id}', 'editUserWithRole')->name('edit.user.role');
            Route::post('/delete', 'destroy')->name('assign.user.destroy');
        });

    });
});
