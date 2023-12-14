<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
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


Route::get('/alltask', [TodosController::class, 'index']);
Route::get('/task/{id}', [TodosController::class, 'show']);

Route::post('/createtask', [TodosController::class, 'store']);
Route::put('/updatetask/{id}', [TodosController::class, 'update']);
Route::delete('/deletetask/{id}', [TodosController::class, 'destroy']);
Route::patch('/taskdone/{id}/complete', [TodosController::class, 'Markcomplete']);
Route::patch('/tasks-incomplete/{id}/incomplete', [TodosController::class, 'markAsIncomplete']);

