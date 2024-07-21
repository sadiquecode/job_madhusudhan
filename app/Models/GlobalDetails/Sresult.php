<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;

class Sresult extends Model
{

    protected $table = 'student_result';
    protected $fillable = [
        's_registration_number',
        's_name',
        's_mobile_number',
        's_class_section',
        's_subject_1',
        's_subject_2',
        's_subject_3',
        's_subject_4',
        's_subject_5',
        's_subject_6',
        's_percentage',
        's_other_message',
        'status',
    ];

}