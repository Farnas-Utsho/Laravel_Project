<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolutionController extends Controller
{
    public function show_reqlist($user_id){

        $list=DB::select('select *

        from problems

        join Courses ON problems.course_id=Courses.course_id


        where student_id = ?', [$user_id]);
        $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 0 AND student_id=:id",[$user_id]);
         //return $list;
        return view('solution')->with(['data' => $list, 'user_id' => $user_id,'count'=>$count]);


    }

 public function delete($user_id, $teacher_id,$problem_id) {
     $list=DB::select('select *

        from problems

        join Courses ON problems.course_id=Courses.course_id


        where student_id = ?', [$user_id]);
    $user = DB::delete("DELETE FROM problems WHERE student_id = ? AND teacher_id = ? AND problem_id=?", [$user_id, $teacher_id,$problem_id]);
     Session::flash('success', 'Problem has been deleted successfully.');
    $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 0 AND student_id=:id",[$user_id]);
         //return $list;
        return view('solution')->with(['data' => $list,'user_id' => $user_id,'count'=>$count]);

}


public function show_student_meetlist($user_id){

     $list=DB::select('select *,
      DATE_FORMAT(problems.teacher_date, "%Y-%m-%d") AS formatted_requested_date,
                        TIME_FORMAT(problems.teacher_time, "%h:%i %p") AS formatted_requested_time


        from problems

        join Courses ON problems.course_id=Courses.course_id


        where student_id = ?', [$user_id]);

        // return $list;
        $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 0 AND student_id=?",[$user_id]);



       return view('student_meet')->with(['data' => $list, 'user_id' => $user_id,'count'=>$count]);

}

}
