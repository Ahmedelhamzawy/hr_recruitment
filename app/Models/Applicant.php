<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Applicant extends Authenticatable
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
   public function jobs()
   {
       return $this->belongsToMany(Job::class, 'applicantjobs')->withTimestamps();
   }

}