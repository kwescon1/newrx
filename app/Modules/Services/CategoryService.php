<?php

namespace App\Modules\Services;

use App\Models\Category;
use App\Exceptions\NotFoundException;

class CategoryService
{

    public function allCategories()
    {
        return Category::all();
    }

    // public function store(array $data)
    // {
    //     return Category::create($data);
    // }

    public function show($id): ?object
    {
        $category = Category::with('products')->where('id', $id)->first();

        if (!$category) {
            throw new NotFoundException("Category Not Found");
        }

        return $category;
    }
}
