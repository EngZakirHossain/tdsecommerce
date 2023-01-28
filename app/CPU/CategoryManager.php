<?php

namespace App\CPU;

use App\Models\Category;
use App\Models\SubCategory;

class CategoryManager
{
    public static function parents()
    {
        $categoryName = Category::where('is_active', 1)->latest('id')->limit(3)->get();
        return $categoryName;
    }

    public static function child($parent_id)
    {
        $subCategoryName = SubCategory::where(['category_id' => $parent_id])->get();
        return $subCategoryName;
    }
}
