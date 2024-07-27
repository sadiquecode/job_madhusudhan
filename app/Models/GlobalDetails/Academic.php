<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;

class Academic extends Model
{

    protected $table = 'academic';
    protected $fillable = ['title','status'];


    public function applications()
    {
        return $this->belongsToMany(Application::class, 'academic_application');
    }

}