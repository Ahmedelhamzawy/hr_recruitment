<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Recruiter extends Authenticatable
{ /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'username', 'password'
   ];


   /**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
   protected $hidden = [
       'password', 'remember_token',
   ];
   public function jobs(): HasMany
   {
       return $this->hasMany(Job::class);
   }
}
