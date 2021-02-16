<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'painel', 'middleware' => ['auth']],function(){
    Route::get('/', [DashboardController::class, 'index']);
});

Route::group(['prefix' => 'auth'],function(){
    Route::get('/registrar', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/registrar', [AuthController::class, 'do_register']);
    Route::post('/login', [AuthController::class, 'do_login']);
});

