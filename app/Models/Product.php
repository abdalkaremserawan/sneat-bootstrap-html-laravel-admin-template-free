<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
  use HasTranslations;
     protected $fillable = ['sub_category_id', 'name', 'description', 'price'];
     public array $translatable = ['name', 'description'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
