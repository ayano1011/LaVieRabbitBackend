<?php

use App\Http\Controllers\Api\WeightController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix("weight")
    ->name("weight.")
    ->group(function () {
        Route::get("", [WeightController::class, "index"])->name("index");
        Route::post("", [WeightController::class, "store"])->name("store");

        Route::get("/selectDate/{date}", [WeightController::class, "dateSelect"])->name("dateSelect");
    });
