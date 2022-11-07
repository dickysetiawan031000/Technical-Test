<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
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

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

//Protected Route
Route::middleware('auth:api', 'checkRole:1')->group(function () {
    Route::resource('comment', CommentController::class);
    Route::resource('news', NewsController::class);
});
Route::middleware('auth:api', 'checkRole:2')->group(function () {
    Route::resource('comment', CommentController::class);
    Route::get('/news', [NewsController::class, 'index']);
    // Route::resource('news', NewsController::class);
});
