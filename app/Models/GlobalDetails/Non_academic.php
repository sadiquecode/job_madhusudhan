<?php

namespace App\Models\GlobalDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\GlobalDetails\Datatypes;
class Non_academic extends Model
{

    protected $table = 'non_academic';
    protected $fillable = ['title','status','data_types_id'];

    
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'non_academic');
    }

        // Define the relationship
        public function dataType()
        {
            return $this->belongsTo(Datatypes::class, 'data_types_id');
        }

}