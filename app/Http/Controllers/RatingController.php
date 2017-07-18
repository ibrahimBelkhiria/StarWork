<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{

    public function create_rate(Request $request)
    {

            $startup_id=$request->pid;
            $rate=$request->score;
            $client_id=auth('client')->user()->id;

            $rated=new Rating();
            $check=$rated->hasRated($client_id,$startup_id);

            if ($check==false)
            {
                $rated->startup_id=$startup_id;
                $rated->client_id=$client_id;
                $rated->rate=$rate;
                $rated->save();
            }

        $result= DB::table('ratings')
            ->where('startup_id', $startup_id)
            ->avg('rate');

            $final=intval($result);



            return $final;


    }



}
