<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;

class Speciality extends Model
{

    protected $table = 'speciality';
    protected $fillable = ['title','status'];

    
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'specialities_application');
    }

}