<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', [TodoController::class, 'index']);

Route::get('/find', [TodoController::class, 'find']);
Route::post('/find',[TodoController::class, 'seach']);

Route::get('/add', [TodoController::class, 'add']);
Route::post('/', [TodoController::class, 'create']);

Route::post('/edit',[TodoController::class, 'update']);

Route::post('/delete',[TodoController::class, 'remove']);