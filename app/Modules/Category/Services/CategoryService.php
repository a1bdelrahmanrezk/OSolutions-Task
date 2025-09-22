<?php

namespace App\Modules\Category\Services;

use App\Models\Category;

class CategoryService
{
    public function __construct(private Category $model) {}
    public function listAllCategories()
    {
        return $this->model->with($this->model->relations())->get();
    }
}
