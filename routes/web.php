<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccuraMemberController;
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

Route::get('/', [AccuraMemberController::class, 'index']);
Route::get('/create', [AccuraMemberController::class, 'create']);
Route::post('/store', [AccuraMemberController::class, 'store']);
Route::get('/{id}', [AccuraMemberController::class, 'show']);
Route::post('/update', [AccuraMemberController::class, 'update']);
Route::post('/search',[AccuraMemberController::class, 'search']);
Route::post('/delete/{id}',[AccuraMemberController::class, 'destroy']);