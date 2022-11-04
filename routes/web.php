<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

Route::resource('todos', TodoController::class)->except('create', 'show', 'edit');
Route::resource('categories', CategoryController::class)->except('index', 'create', 'show', 'edit');
Route::post('/todos/update-status/{id}', [TodoController::class, 'updateStatus']);
