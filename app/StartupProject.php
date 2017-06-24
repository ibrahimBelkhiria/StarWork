<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StartupProject extends Model
{


    public function startup()
    {
        return $this->belongsTo('App\Startup');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }


}
