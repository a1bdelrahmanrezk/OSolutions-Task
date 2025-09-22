<?php

namespace App\Modules\Task\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Shared\Enums\HttpStatusCodeEnum;
use App\Modules\Task\Requests\StoreTaskRequest;
use App\Modules\Task\Resources\TaskResource;
use App\Modules\Task\Services\TaskService;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService) {}
    public function listAllTasks()
    {
        $tasks = $this->taskService->listAllTasks();
        return successResponse(TaskResource::collection($tasks), 'Tasks retrieved successfully');
    }
    public function getTaskById($task_id)
    {
        $task = $this->taskService->getTaskById($task_id);
        if (!$task) {
            return errorResponse('Task Not Found', HttpStatusCodeEnum::NOT_FOUND->value);
        }
        return successResponse(TaskResource::make($task), 'Task retrieved successfully');
    }
    public function storeTask(StoreTaskRequest $request)
    {
        $task = $this->taskService->storeTask($request->validated());
        return successResponse(TaskResource::make($task), 'Task Created successfully', HttpStatusCodeEnum::CREATED->value);
    }
    public function updateTaskStatus($task_id)
    {
        $task = $this->taskService->updateTaskStatus($task_id);
        if (!$task) {
            return errorResponse('Task Not Found', HttpStatusCodeEnum::NOT_FOUND->value);
        }
        return successResponse(TaskResource::make($task), 'Task Status Updated successfully', HttpStatusCodeEnum::SUCCESS->value);
    }
}
