<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Department\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::prefix('department')->middleware('auth:sanctum')->group(function () {
    Route::post('/create', [DepartmentController::class, 'create']);
    Route::put('/update/{department}', [DepartmentController::class, 'update']);
    Route::delete('/delete/{department}', [DepartmentController::class, 'delete']);
});
Route::prefix('department')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::get('/{department}', [DepartmentController::class, 'show']);
});
