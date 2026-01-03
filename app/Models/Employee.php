<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable

{
  use HasRoles, HasApiTokens;


  protected $guard_name = 'web';
  protected $fillable = ['email', 'password', 'is_admin'];
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
}
