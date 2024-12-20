<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getActive()
    {
        return Category::active()->get();
    }

    public function getAll()
    {
        return Category::get();
        // return Category::withTrashed()->get();
    }

    public function create(array $data): Category
    {
        $category = Category::create($data);
        return $category;
    }
    
    public function update(Category $category, array $data): Category
    {
        $category->update($data);
        return $category;
    }

    public function updateStatus(Category $category)
    {
        $category->status = $category->status == 1 ? 0 : 1;
        return $category->save();
    }
}