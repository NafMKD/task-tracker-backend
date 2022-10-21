<?php

use App\Http\Controllers\Api\V1\AccountController;
use App\Http\Controllers\Api\V1\UserController;
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

/** Account Routes */
Route::post('/login', [AccountController::class, 'login']);
Route::middleware(['auth:sanctum'])->post('/logout', [AccountController::class, 'logout']);

Route::prefix('/users')->middleware(['auth:sanctum', 'abilities:'.ROLES[1]])->group(function(){
    // TO BE CHECKED
    Route::post('/add-superuser', [UserController::class, 'storeSuperUser']);
});

/** USers API start*/
/** USers API end*/
