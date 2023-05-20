<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlayListController;
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

// Login get api token
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');


Route::middleware(['auth:sanctum'])->group(function () {
   
    Route::get('creators', [CreatorController::class, 'index']);
    Route::get('musics', [MusicController::class, 'index']);

    // playlist
    Route::get('playlists', [PlayListController::class, 'index']);
    Route::post('playlists/create', [PlayListController::class, 'create']);
    Route::get('playlists/{id}/show', [PlayListController::class, 'show']);
    Route::put('playlists/{id}/update', [PlayListController::class, 'update']);
    Route::post('playlists/{id}/delete', [PlayListController::class, 'destroy']);    

});


