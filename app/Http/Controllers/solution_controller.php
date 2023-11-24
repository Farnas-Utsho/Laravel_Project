<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class solution_controller extends Controller
{
    public function profile()
    {
        $user = DB::select('SELECT * FROM user_details Where user_id=?', [1]);
        return view('/home', ['data' => $user]);
    }
}
