<?php

use App\Http\Controllers\OrganizationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

$groupData = [
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'organization',
];

Route::group($groupData, function () {
    Route::get('', [OrganizationController::class, 'index']);
    Route::get('get-by-building/{id}', [OrganizationController::class, 'getByBuildingId']);
    Route::get('get-by-id/{id}', [OrganizationController::class, 'getById']);
    Route::get('get-by-activity/{id}', [OrganizationController::class, 'getByActivityId']);
    Route::get('get-by-activities/{id}', [OrganizationController::class, 'getByActivityIds']);
    Route::post('get-by-name', [OrganizationController::class, 'getByName']);
});
