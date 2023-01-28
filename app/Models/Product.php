<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded =['id'];

    // public function category(){
    //     return $this->belongsTo(Category::class,'category_id','id');
    // }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'subCategory_id','id');
    }
}
