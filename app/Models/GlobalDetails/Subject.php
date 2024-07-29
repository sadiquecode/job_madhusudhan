<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\GlobalDetails\Datatypes;
use App\Models\GlobalDetails\Speciality;

class Subject extends Model
{

    protected $table = 'subjects';
    protected $fillable = ['title','status','speciality_id'];

    
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'subject_application');
    }


    // Define the relationship with Speciality
    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }
        

}