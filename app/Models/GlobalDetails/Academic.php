<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{

    protected $table = 'academic';
    protected $fillable = ['title','status'];

}