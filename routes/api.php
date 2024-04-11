<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\StatusController;

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

/* Job */
Route::get('/jobs/{id}', [JobController::class, 'getJob']);
Route::get('/jobs', [JobController::class, 'getJobs']);
Route::post('/jobs/create-job', [JobController::class, 'create']);
Route::put('/jobs/{id}', [JobController::class, 'update']);
Route::delete('/jobs/{id}', [JobController::class, 'delete']);

/* Status */
Route::get('/statuses/{id}', [StatusController::class, 'show']);
Route::get('/statuses', [StatusController::class, 'index']);
Route::post('/statuses', [StatusController::class, 'store']);
Route::put('/statuses/{id}', [StatusController::class, 'update']);
Route::delete('/statuses/{id}', [StatusController::class, 'destroy']);