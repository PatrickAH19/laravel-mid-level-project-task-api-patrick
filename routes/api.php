<?
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Api\ProjectController;
Use App\Http\Controllers\Api\TaskController;

Route::prefix('v1')->group(function () {
    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('tasks', TaskController::class);
});

Route::get('test-projects', [ProjectController::class, 'index']);