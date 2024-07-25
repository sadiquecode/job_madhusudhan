<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{

    protected $table = 'expertise';
    protected $fillable = ['title','status'];

}