<?php

namespace App\Modules\Category\Resources;

use Illuminate\Http\Request;
use App\Modules\Task\Resources\TaskResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'categoryId' => $this->id,
            'categoryName' => $this->name,
            'categoryColor' => $this->color,
            'tasks' => $this->whenLoaded('tasks', function () {
                return TaskResource::collection($this->tasks) ?? null;
            }),
        ];
    }
}
