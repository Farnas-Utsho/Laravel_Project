<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentSolutionView extends Controller
{
    public function show_solution_view($user_id, $teacher_id,$problem_id){

      $solution = DB::select('select *,
      DATE_FORMAT(problems.date_requested, "%Y-%m-%d") AS formatted_requested_date,
                        TIME_FORMAT(problems.time_requested, "%h:%i %p") AS formatted_requested_time

      FROM problems WHERE student_id = ? AND teacher_id=? AND problem_id=? ', [$user_id, $teacher_id,$problem_id]);
       //return  $solution;
        $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND student_id=:id",[$user_id]);
 
       // return redirect()->route('show_solution', ['user_id' => $user_id,'teacher_id'=>$teacher_id,'problem_id'=>$problem_id]);
      return view('student_solution')->with(['data' => $solution,'user_id' => $user_id,'teacher_id'=>$teacher_id,'problem_id'=>$problem_id,'count'=>$count]);



    }
}
