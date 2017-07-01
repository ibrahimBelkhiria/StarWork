<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{


    /**
     * Get the user that owns the Startup.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }



    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    public function startupProjects()
    {
        return $this->hasMany('App\StartupProject');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

}
