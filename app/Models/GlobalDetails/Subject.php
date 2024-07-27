<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;

class Subject extends Model
{

    protected $table = 'subjects';
    protected $fillable = ['title','nick_name','status'];

    
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'subject_application');
    }

}