<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\CallsController;
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
            Route::post('/{project}/kanban/store_task',[TasksController::class, 'store']);
            Route::post('/{project}/kanban/update_task/{id}',[TasksController::class, 'update']);
            Route::post('/{project}/kanban/update_status_task',[TasksController::class, 'update_status']);
            Route::delete('/{project}/kanban/delete_task/{user_id}',[TasksController::class, 'destroy']);

            Route::get('/criar',[ProjectsController::class, 'create']);
            Route::get('/editar/{project}',[ProjectsController::class, 'edit']);
    
        });
        Route::resource('projetos',ProjectsController::class);

        Route::group(['prefix' => 'membros'], function(){
            Route::get('/',[MembersController::class, 'index']);
            Route::post('/store',[MembersController::class, 'store']);
            Route::post('/update_member',[MembersController::class, 'update_member']);
            Route::delete('/{user_id}',[MembersController::class, 'destroy']);
        });

        Route::get('/seus-chamados',[CallsController::class, 'show_user_calls']);
        
        Route::group(['prefix' => 'chamados'], function(){
            Route::get('/',[MembersController::class, 'index']);
            Route::get('/criar',[CallsController::class, 'create']);
   
        });
        Route::resource('chamados',CallsController::class);


    });

});

Route::group(['prefix' => 'auth'],function(){
    Route::get('/registrar', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/do_register', [AuthController::class, 'do_register']);
    Route::post('/do_login', [AuthController::class, 'do_login']);
});

