<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientLoginController extends Controller
{

    function __construct()
    {
        $this->middleware('guest:client');

    }


    public function showLoginForm(){

           return view('auth.client_login');
    }



    public function login(Request $request)
    {
       $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required|min:6',

    ]);

    if (Auth::guard('client')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
     {
        return redirect()->intended(route('client.dashboard'));

     }

    return redirect()->back()->withInput($request->only('email','remember'));


    }


}
