<?php

namespace App\Modules\Task\Services;

use App\Models\Task;

class TaskService
{
    public function __construct(private Task $model) {}
    public function listAllTasks()
    {
        return $this->model->with($this->model->relations())->get();
    }
    public function getTaskById($task_id)
    {
        return $this->model->with($this->model->relations())->firstWhere('id', $task_id) ?? false;
    }
    public function storeTask($request)
    {
        return $this->model->create($request);
    }
    public function updateTaskStatus($task_id)
    {
        $task = $this->model->firstWhere('id', $task_id);
        if ($task === null) {
            return false;
        }
        $task->update([
            'completed' => !$task->completed,
        ]);
        return $task->fresh();
    }
}
