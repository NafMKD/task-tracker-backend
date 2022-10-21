<?php

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

/**
 * version 1 API resources
 */
Route::group([
    'middleware' => ['api'],
    'namespace'  => "App\Http\Controllers\Api\V1",
    'prefix'     => '/v1',
], function ($router) {
    require base_path('routes/api.v1.php');
});
