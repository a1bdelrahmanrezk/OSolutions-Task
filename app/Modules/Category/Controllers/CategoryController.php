<?php

namespace App\Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Services\CategoryService;
use App\Modules\Category\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService) {}
    public function listAllCategories()
    {
        $categories = $this->categoryService->listAllCategories();
        return successResponse(CategoryResource::collection($categories), 'Catgories retrieved successfully');
    }
}
