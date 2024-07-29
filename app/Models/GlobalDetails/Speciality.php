<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\GlobalDetails\Datatypes;

class Speciality extends Model
{

    protected $table = 'specialities';
    protected $fillable = ['title','status','data_types_id'];

    
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'specialities_application');
    }

        // Define the relationship
        public function dataType()
        {
            return $this->belongsTo(Datatypes::class, 'data_types_id');
        }


    // Define the relationship with Subject
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'speciality_id');
    }

}