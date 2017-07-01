<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function startup()
    {
        return $this->belongsTo('App\Startup');
    }

}
