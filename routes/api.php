<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthenticationController;
use App\Http\Controllers\API\Admin\ResidentManagementAPIController;


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



Route::middleware(['auth:sanctum'])->group(function() {
    
    // Resident management API Calls
    Route::apiResource('resident-management',ResidentManagementAPIController::class);

    
    Route::get('/user',function(Request $request) {
        return $request->user();
    });
    Route::get('sign-out',[AuthenticationController::class,'SignOut']);



});

Route::post('authenticate',[AuthenticationController::class,'Authenticate']);

