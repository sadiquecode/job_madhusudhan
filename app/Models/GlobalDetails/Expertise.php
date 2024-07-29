<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\GlobalDetails\Datatypes;

class Expertise extends Model
{

    protected $table = 'expertise';
    protected $fillable = ['title','status','data_types_id'];

    
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'expertise_application');
    }

        // Define the relationship
        public function dataType()
        {
            return $this->belongsTo(Datatypes::class, 'data_types_id');
        }

}