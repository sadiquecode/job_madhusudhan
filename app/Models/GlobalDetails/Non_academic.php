<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
class Non_academic extends Model
{

    protected $table = 'non_academic';
    protected $fillable = ['title','status'];

    
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'non_academic');
    }

}