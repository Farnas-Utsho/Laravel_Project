<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;



class loginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


         $user = DB::select('SELECT * FROM users WHERE email = ? LIMIT 1', [$credentials['email']]);
        //   return $user;
          if(!empty($user) && ($credentials['password']=$user[0]->password))
          {
                //return $user;
                 return redirect()->intended('/home/'.$user[0]->id)->with('success', 'Login successful');

          }

    }


}







