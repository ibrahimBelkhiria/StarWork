<?php

namespace App;


class Project extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client');
    }



}
