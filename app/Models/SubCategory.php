<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SubCategory extends Model
{
  use HasTranslations;

  protected $fillable = ['category_id', 'name', 'description'];
  public array $translatable = ['name', 'description'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function products()
  {
    return $this->hasMany(Product::class);
  }
}
