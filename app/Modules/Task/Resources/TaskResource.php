<?php

namespace App\Modules\Task\Resources;

use App\Modules\Category\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'taskId' => $this->id,
            'taskTitle' => $this->title,
            'taskDescription' => $this->description,
            'taskPriority' => $this->priority,
            'taskCompleted' => $this->completed,
            'taskImageUrl' => $this->image_url,
            'category' => $this->whenLoaded('category', function () {
                return CategoryResource::make($this->category) ?? null;
            }),
        ];
    }
}
