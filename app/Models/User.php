<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\GlobalDetails\TeachmeCurriculumRelationship;
use App\Models\GlobalDetails\TeachmeLanguagesRelationship;
use App\Models\GlobalDetails\TeachmeSubjectRelationship;
use App\Models\GlobalDetails\TeachmeGradeRelationship;
use App\Models\GlobalDetails\TeachmeCheckProfile;
use App\Models\GlobalDetails\TeachmeTutorDocument;
use App\Models\GlobalDetails\TeachmeTutorEducation;
use App\Models\GlobalDetails\TeachmeTutorExperience;
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'name',
        'lname',
        'email',
        'profile_pic',
        'blur_profile_pic',
        'phone',
        'billing_address_en',
        'billing_address_ar',
        'shipping_address_en',
        'shipping_address_ar',
        'password',
        'description',
        'video_url',
        'embedUrl',
        'type',
        'askforapproval',
        'role',
        'theme',
        'zip_code',
        'lang',
        'policiescheck',
        'lock_status',
        'approval_status',
        'verification_status',
        'reject_status',
        'virtual_mode',
        'in_person_mode',
        'student_school',
        'student_curriculum',
        'student_grade',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
