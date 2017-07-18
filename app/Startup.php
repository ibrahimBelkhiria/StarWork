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


    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }



}
