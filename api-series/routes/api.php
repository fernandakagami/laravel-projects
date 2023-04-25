<?php

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

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/series', \App\Http\Controllers\Api\SeriesController::class);
});

Route::post('/login', function(Request $request) {
    $credentials = $request->only(['email', 'password']);
    if (\Illuminate\Support\Facades\Auth::attempt($credentials) === false) {
        return response()->json('Unauthorized', 401);
    }

    $user = \Illuminate\Support\Facades\Auth::user();
    $user->tokens()->delete();
    $token = $user->createToken('token');

    return response()->json($token->plainTextToken);
});