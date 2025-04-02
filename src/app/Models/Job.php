<?php

namespace App\Models;

use App\Enums\JobStatus;
use App\Enums\JobType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
 
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'description',
        'type',
        'recruiter_id'
    ];

    protected $casts = [
        'type' => JobType::class,
        'status' => JobStatus::class
    ];

    public function Type(): Attribute
    {
        return Attribute::make(
            get: fn ( $value) => $value,
        );
    }

    public function Status(): Attribute
    {
        return Attribute::make(
            get: fn ( $value) => match($value){
                JobStatus::STOPPED->value => 'Pausado',
                JobStatus::OPENED->value => 'Aberto',
                JobStatus::CLOSED->value => 'Concluido',
            },
        );
    }
    public function isUserApplied():Bool
    {
        return Application::where('user_id',Auth::user()->id)->where('job_id', $this->id)->exists();
    }
}
