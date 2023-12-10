<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentSolutionView extends Controller
{
    public function show_solution_view($user_id, $teacher_id,$problem_id){

      $solution = DB::select("select * FROM problems WHERE student_id = ? AND teacher_id=? AND problem_id=? ", [$user_id, $teacher_id,$problem_id]);
       return  $solution;
    // return redirect()->route('teacher_request', ['user_id' => $user_id]);



    }
}
