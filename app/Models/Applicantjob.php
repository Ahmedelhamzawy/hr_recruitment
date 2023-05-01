<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Applicantjob extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant_id',
        'job_id',
        'latest_company',
        'latest_title',
        'work_field',
        'experience',
        'education_level',
    ];
    public function skills(): HasMany
    {
        return $this->hasMany(Cvskill::class);
    }

}
