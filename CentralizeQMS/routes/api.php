<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;

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

Route::get('queueApi',[QueueController::class,'index']);
Route::post('postCats',[QueueController::class,'postCats']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
