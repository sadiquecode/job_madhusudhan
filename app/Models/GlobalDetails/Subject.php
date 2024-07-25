<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $table = 'subjects';
    protected $fillable = ['title','nick_name','status'];

}