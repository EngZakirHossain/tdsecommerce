<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];

    //Every Sub Cat belogns to category
    public function category()
    {
       return $this->belongsTo(Category::class)->orderBy('priority','desc');
    }
}
