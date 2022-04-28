<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\CommentController;



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

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::post('/update/{id}', [PassportAuthController::class, 'update']);
Route::get('/show/{id}', [PassportAuthController::class, 'show']);

Route::post('annonces', [AnnoncesController::class, 'store']);
Route::get('annonces', [AnnoncesController::class, 'index']);
Route::get('/show_annonces/{id}', [AnnoncesController::class, 'show']);
Route::get('/update_annonces/{id}', [AnnoncesController::class, 'update']);


Route::post('comment', [CommentController::class, 'store']);
Route::post('/show_comment/{id}', [CommentController::class, 'show']);
Route::post('/update_comment/{id}', [CommentController::class, 'update']);
Route::post('/destroy_comment/{id}', [CommentController::class, 'destroy']);

Route::post('/uploadImage/{id}', [PassportAuthController::class, 'uploadImage']);


Route::middleware('auth:api')->group(function () {
Route::resource('posts', PostController::class);
});
