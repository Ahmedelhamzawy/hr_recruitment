<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'job_title',
        'job_field',
        'experience',
        'job_description',
        'education_level'
    ];
    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(Recruiter::class);
    }
    public function applicants()
    {
        return $this->belongsToMany(Applicant::class, 'applicantjobs')->withTimestamps()
        ->withPivot('latest_company','latest_title','work_field','experience','education_level');
    }
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }
}
