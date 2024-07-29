<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;

class Datatypes extends Model
{

    protected $table = 'data_types';
    protected $fillable = ['title','status'];


    public function applications()
    {
        return $this->belongsToMany(Application::class, 'datat_ypes');
    }

    // Define the relationship with Speciality
    public function specialities()
    {
        return $this->hasMany(Speciality::class, 'data_types_id');
    }

}