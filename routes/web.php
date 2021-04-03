<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrganizationController;
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

    Route::group(['prefix' => 'organizacoes'], function(){
        Route::get('/',[OrganizationController::class, 'index']);
        Route::get('/criar',[OrganizationController::class, 'create']);
        Route::get('/editar/{organization}',[OrganizationController::class, 'edit']);

    });
    Route::resource('organizacoes',OrganizationController::class);

    Route::group(['prefix' => '{slug}'],function(){
        Route::get('/', [DashboardController::class, 'organization']);
    });

});

Route::group(['prefix' => 'auth'],function(){
    Route::get('/registrar', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/do_register', [AuthController::class, 'do_register']);
    Route::post('/do_login', [AuthController::class, 'do_login']);
});

