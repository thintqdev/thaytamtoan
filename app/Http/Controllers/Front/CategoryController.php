<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private function buildCategoryTree($parentId = null)
    {
        $categories = Category::where('parent_id', $parentId)->get();
        $tree = [];

        foreach ($categories as $category) {
            $childCategories = $this->buildCategoryTree($category->id);
            $tree[] = [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'children' => empty($childCategories) ? null : $childCategories,
            ];
        }

        return $tree;
    }

    public function getCategories()
    {
        $categories = $this->buildCategoryTree();
        return $this->apiSuccess($categories, 'Success');
    }
}
