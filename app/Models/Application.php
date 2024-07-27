<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GlobalDetails\Academic;
use App\Models\GlobalDetails\Non_academic;
use App\Models\GlobalDetails\Expertise;
use App\Models\GlobalDetails\Speciality;
use App\Models\GlobalDetails\Subject;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_name',
        'father_name',
        'date',
        'caste',
        'martial_status',
        'language',
        'qualification',
        'address',
        'working_exp',
        'experience_years',
        'salary_expected',
        'salary_drawn',
        'email',
        'number',
        'democlass',
        'referredBy',
        'profile_img',
        'cv',
    ];


    public function academics()
    {
        return $this->belongsToMany(Academic::class, 'academic_application');
    }

    public function nonAcademics()
    {
        return $this->belongsToMany(Non_academic::class, 'non_academic_application');
    }

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class, 'specialities_application');
    }

    public function expertises()
    {
        return $this->belongsToMany(Expertise::class, 'expertise_application');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_application');
    }

    protected $casts = [
        'date' => 'date',
    ];
}
