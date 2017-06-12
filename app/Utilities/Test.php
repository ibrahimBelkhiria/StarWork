<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Auth;

class Test
{

    /// this method test if the current user is a client or normal one !


    /**
     * @return bool
     */
    public function isClient()
    {
        return Auth('client')->check();

    }



}