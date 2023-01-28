<?php

namespace App\CPU;

use App\Models\Category;

class CategoryManager
{
    public static function parents()
    {
        $x = Category::with('category')->where('position', 0)->priority()->get();
        return $x;
    }

    public static function child($parent_id)
    {
        $x = Category::where(['parent_id' => $parent_id])->get();
        return $x;
    }
}
