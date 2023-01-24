<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthenticationController;
use App\Http\Controllers\API\Admin\ResidentManagementAPIController;
use App\Http\Controllers\API\PHAddressAPIController;
use App\Http\Controllers\API\PWDController;

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


    // Resident management API Calls
    Route::apiResource('resident-management',ResidentManagementAPIController::class);

Route::middleware(['auth:sanctum'])->group(function() {
    

    
    Route::get('/user',function(Request $request) {
        return $request->user();
    });
    Route::get('sign-out',[AuthenticationController::class,'SignOut']);


});

Route::post('authenticate',[AuthenticationController::class,'Authenticate']);

// temporary here
Route::apiResource('disabilities',PWDController::class);


// address API
Route::get('region-list',[PHAddressAPIController::class,'getRegionList']);
Route::get('province-list/{id}',[PHAddressAPIController::class,'getProvince']);
Route::get('citymunicipality-list/{id}',[PHAddressAPIController::class,'getCityOrMunicipality']);
Route::get('barangay-list/{id}',[PHAddressAPIController::class,'getBarangay']);


