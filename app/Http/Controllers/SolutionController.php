<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolutionController extends Controller
{
    public function show_reqlist($user_id){

        $list=DB::select('select *

        from problems

        join Courses ON problems.course_id=Courses.course_id


        where student_id = ?', [$user_id]);
        $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND student_id=:id",[$user_id]);
         //return $list;
        return view('solution')->with(['data' => $list, 'user_id' => $user_id,'count'=>$count]);


    }

 public function delete($user_id, $teacher_id,$problem_id) {
    $user = DB::delete("DELETE FROM problems WHERE student_id = ? AND teacher_id = ? AND problem_id=?", [$user_id, $teacher_id,$problem_id]);

    return redirect()->route('solution', ['user_id' => $user_id]);
}

}
