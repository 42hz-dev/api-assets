<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Position\PositionController;
use Illuminate\Support\Facades\Route;

// 계정
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// 부서
Route::prefix('department')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [DepartmentController::class, 'create']);
    Route::put('/{department}', [DepartmentController::class, 'update']);
    Route::delete('/{department}', [DepartmentController::class, 'delete']);
});
Route::prefix('department')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::get('/{department}', [DepartmentController::class, 'show']);
});

// 직무
Route::prefix('position')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [PositionController::class, 'create']);
    Route::put('/{position}', [PositionController::class, 'update']);
    Route::delete('/{position}', [PositionController::class, 'delete']);
});
Route::prefix('position')->group(function () {
    Route::get('/', [PositionController::class, 'index']);
    Route::get('/{position}', [PositionController::class, 'show']);
});

// 직원
Route::prefix('employee')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [EmployeeController::class, 'create']);
    Route::put('/{employee}', [EmployeeController::class, 'update']);
    Route::delete('/{employee}', [EmployeeController::class, 'delete']);
});
Route::prefix('employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('/{employee}', [EmployeeController::class, 'show']);
});

// 브랜드
Route::prefix('brand')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [BrandController::class, 'create']);
    Route::put('/{brand}', [BrandController::class, 'update']);
    Route::delete('/{brand}', [BrandController::class, 'delete']);
});
Route::prefix('brand')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::get('/{brand}', [BrandController::class, 'show']);
});
