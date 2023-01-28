<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

     protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];

    //Every Category HasMany sub category
    public function subCategories(){
        return $this->hasMany(SubCategory::class)->orderBy('priority','desc');
    }
}
