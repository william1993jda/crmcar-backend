<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\VehiclesController;
use App\Http\Controllers\webservice\WebserviceController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::apiResources([
    'vehicles' => VehiclesController::class
]);

Route::get('vehicles/{vehicle_type}/brand', [VehiclesController::class, 'brand']);

Route::get('vehicles/{vehicle_type}/{vehicle_brand}/model', [VehiclesController::class, 'model']);

Route::get('vehicles/{vehicle_brand}/{vehicle_model}/version', [VehiclesController::class, 'version']);

Route::group(['prefix' => 'webservice'], function () {
   Route::post('cep', [WebserviceController::class, 'cep']);
});
