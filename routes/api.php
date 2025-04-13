<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Position\PositionController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::prefix('department')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [DepartmentController::class, 'create']);
    Route::put('/{department}', [DepartmentController::class, 'update']);
    Route::delete('/{department}', [DepartmentController::class, 'delete']);
});
Route::prefix('department')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::get('/{department}', [DepartmentController::class, 'show']);
});

Route::prefix('position')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [PositionController::class, 'create']);
    Route::put('/{position}', [PositionController::class, 'update']);
    Route::delete('/{position}', [PositionController::class, 'delete']);
});
Route::prefix('position')->group(function () {
    Route::get('/', [PositionController::class, 'index']);
    Route::get('/{position}', [PositionController::class, 'show']);
});
