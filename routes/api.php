<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReplyController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('/question',QuestionController::class);
Route::resource('/category',CategoryController::class);
Route::resource('/question/{question}/reply', ReplyController::class);

Route::post('/like/{reply}', [LikeController::class, 'like']);
Route::delete('/like/{reply}', [LikeController::class, 'unlike']);

// Route::resource('/like/{reply}', LikeController::class, [ 'only'=>['index','update'] ]);