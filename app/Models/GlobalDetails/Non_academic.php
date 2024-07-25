<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;

class Non_academic extends Model
{

    protected $table = 'non_academic';
    protected $fillable = ['title','status'];

}