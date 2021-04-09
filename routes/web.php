<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\ProjectsController;
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

        Route::group(['prefix' => 'equipes'], function(){
            Route::get('/',[TeamsController::class, 'index']);
            Route::get('/criar',[TeamsController::class, 'create']);
            Route::get('/editar/{team}',[TeamsController::class, 'edit']);
    
        });
        Route::resource('equipes',TeamsController::class);

        Route::group(['prefix' => 'projetos'], function(){
            Route::get('/',[ProjectsController::class, 'index']);
            Route::get('/{project}/kanban',[ProjectsController::class, 'kanban']);
            Route::get('/{project}/kanban/store_task',[ProjectsController::class, 'store_task']);

            Route::get('/criar',[ProjectsController::class, 'create']);
            Route::get('/editar/{project}',[ProjectsController::class, 'edit']);
    
        });
        Route::resource('projetos',ProjectsController::class);

    });

});

Route::group(['prefix' => 'auth'],function(){
    Route::get('/registrar', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/do_register', [AuthController::class, 'do_register']);
    Route::post('/do_login', [AuthController::class, 'do_login']);
});

