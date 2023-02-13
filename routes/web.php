<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestDBController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('first_run');
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::post('/login', function () {
    return response()->json("aaaaaa");
});

Route::controller(TestDBController::class)->group(function () {
    // Route::get('/orders/{id}', 'show');
    Route::get('/list', 'list');
});

Route::post('/register', [AuthController::class, 'register']);
