<?php

use App\Http\Controllers\Callback_api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API For Client
Route::post("rekening", [Callback_api::class, "user_cek_data_rekening"]);
Route::post("mutasi", [Callback_api::class, "cek_mutasi"]);
