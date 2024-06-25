<?php

use App\Http\Controllers\ThirdPartyApiController;
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

Route::middleware('auth:twins')->prefix('apirequest')->group(function () {
    Route::post('/send_message', [ThirdPartyApiController::class, 'sendMessage']);
    Route::any('/{endpoint}', [ThirdPartyApiController::class, 'proxy'])->where('endpoint', '.+');

});


Route::post('/recive_messages', [ThirdPartyApiController::class, 'reciveMessages']);

Route::get('/recived_messages', [ThirdPartyApiController::class, 'listTempMessages']);
