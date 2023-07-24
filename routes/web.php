<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RequisiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WithdrawMethodController;
use App\Http\Controllers\Auth\LoginController;
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


Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('auth');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

    Route::get('/admin/users', [UserController::class, 'index'])->name('users');
    Route::get('/admin/users/list', [UserController::class, 'getUsers'])->name('getUsers');
    Route::post('/admin/users/{user}', [UserController::class, 'updateUser'])->name('updateUser');

    Route::get('/admin/requisites', [RequisiteController::class, 'index'])->name('requisites');
    Route::get('/admin/requisites/list', [RequisiteController::class, 'getRequisites'])->name('getRequisites');
    Route::post('/admin/requisites/{requisite}', [RequisiteController::class, 'updateRequisite'])->name('getRequisites');
    Route::post('/admin/requisites', [RequisiteController::class, 'createRequisite'])->name('createRequisite');

    Route::get('/admin/withdraw-methods', [WithdrawMethodController::class, 'index'])->name('withdraw_methods');
    Route::get('/admin/withdraw-methods/list', [WithdrawMethodController::class, 'getWithdrawMethods'])->name('getWithdrawMethods');
    Route::post('/admin/withdraw-methods/{method}', [WithdrawMethodController::class, 'updateMethod'])->name('getWithdrawMethods');
    Route::post('/admin/withdraw-methods', [WithdrawMethodController::class, 'createMethod'])->name('createWithdrawMethod');


});

