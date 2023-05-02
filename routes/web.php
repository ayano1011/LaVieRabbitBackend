<?php

use App\Http\Controllers\LineMessengerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return ['Laravel' => app()->version()];
});

// Route::get('/line/message', 'LineMessengerController@message');
Route::get("/line/message", [LineMessengerController::class, "message"])->name("message");
Route::post("/line/message", [LineMessengerController::class, "testMessage"])->name("testMessage");


require __DIR__ . '/auth.php';
