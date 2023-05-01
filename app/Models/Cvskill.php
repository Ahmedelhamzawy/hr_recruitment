<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cvskill extends Model
{
    use HasFactory;
    protected $fillable = [
        'skill'
     ];
     public function Applicantjob(): BelongsTo
     {
         return $this->belongsTo(Applicantjob::class);
     }
}
