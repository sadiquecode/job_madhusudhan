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
        'data_types_id',
        'academic_id',
        'non_academic_id',
        'speciality_id',
        'expertise_id',
        'subject_id'
    ];

    // Relationships
    public function academic()
    {
        return $this->belongsTo(Academic::class, 'academic_id');
    }

    public function nonAcademic()
    {
        return $this->belongsTo(Non_academic::class, 'non_academic_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }

    public function expertise()
    {
        return $this->belongsTo(Expertise::class, 'expertise_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}