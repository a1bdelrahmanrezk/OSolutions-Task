<?php

use App\Modules\Category\Controllers\CategoryController;
use App\Modules\Task\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::controller(TaskController::class)->prefix('tasks')->group(function () {
    Route::get('', 'listAllTasks');
    Route::get('{task_id}', 'getTaskById');
    Route::post('', 'storeTask');
    Route::patch('{task_id}/toggle', 'updateTaskStatus');
});
Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('', 'listAllCategories');
});
