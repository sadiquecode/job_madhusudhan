<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;

class Expertise extends Model
{

    protected $table = 'expertise';
    protected $fillable = ['title','status'];

    
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'expertise_application');
    }

}