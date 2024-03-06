<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'job_category_id',
        'job_type_id',
        'status',
        'features_at',
        'vacancy',
        'salary',
        'location',
        'description',
        'benefits',
        'responsibility',
        'qualifications',
        'keywords',
        'experience',
        'website',
        'image',
        'job_image',
        'name',
        'apply_before',
    ];
    public function JobCategory(){
        return $this->belongsTo(JobCategory::class);
    }
    public function applications(){
        return $this->hasMany(JobApplication::class);
    }
    public function SaveJob(){
        return $this->hasMany(SaveJob::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function jobType(){
        return $this->belongsTo(JobType::class);
    }
}
