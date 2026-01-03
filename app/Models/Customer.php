<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Customer extends Model implements HasMedia
{
    use InteractsWithMedia;
 protected $fillable = ['phone', 'password', 'photo'];
  protected function casts(): array
  {
    return [

      'password' => 'hashed',
    ];
  }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
  }
