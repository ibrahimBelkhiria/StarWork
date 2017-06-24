<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{


    public function startupProject()
    {
        return $this->belongsTo('App\StartupProject','startupproject_id');
    }



}
