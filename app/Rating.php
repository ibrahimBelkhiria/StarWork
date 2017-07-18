<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable=['client_id','startup_id','total_points','total_rate'];


    /**
     * @param $client_id
     * @param $startup_id
     * @return bool
     */
    public function hasRated($client_id, $startup_id)
    {
        $rated=Rating::where('client_id',$client_id)->where('startup_id',$startup_id)->count();

        if ($rated>0){
            return true;
        }else {
            return false;
        }

    }


    /**
     * @param $startup_id
     * @return bool
     *
    public function get_startup_rate($startup_id)
    {
        $result=Rating::where('startup_id',$startup_id);

        if ($result->count()>0)
        {
            return $result;
        }else{

            return false;

        }

    }

**/
    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }


}
