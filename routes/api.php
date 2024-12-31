<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/Tests',[TestController::class, 'index']);
Route::get('/Tests/{id}',[TestController::class, 'show']);
Route::post('/Tests',[TestController::class, 'store']);
Route::put('/Tests/{id}',[TestController::class, 'update']);
Route::delete('/Tests{id}',[TestController::class, 'destroy']);

