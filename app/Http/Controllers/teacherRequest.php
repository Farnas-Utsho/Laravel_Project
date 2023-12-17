<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class teacherRequest extends Controller
{    //show all reqst list for the teacher
     public function show_reqlist($user_id){
        //return $user_id;

        $list=DB::select('select *

        from problems

        join Courses ON problems.course_id=Courses.course_id


        where teacher_id = ?', [$user_id]);
        $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND teacher_id=:id",[$user_id]);
       //  return $list;
        return view('teacher_request')->with(['data' => $list, 'user_id' => $user_id,'count'=>$count]);


    }
    //Shows individual reqst list
  public function show_req($user_id, $student_id,$problem_id){
     $list = DB::select('SELECT problems.*, Courses.*,
                        DATE_FORMAT(problems.date_requested, "%Y-%m-%d") AS formatted_requested_date,
                        TIME_FORMAT(problems.time_requested, "%h:%i %p") AS formatted_requested_time
                        FROM problems
                        JOIN Courses ON problems.course_id = Courses.course_id
                        WHERE teacher_id = ? AND student_id = ? AND problem_id = ?',
                        [$user_id, $student_id, $problem_id]);
      //  return $list;


       $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND teacher_id=:id",[$user_id]);
       // return $list;
        return view('teacher_solution')->with(['data' => $list, 'user_id' => $user_id,'count'=>$count]);



  }
  //Teacher can delete reqst

 public function delete($user_id, $student_id,$problem_id) {
     $list=DB::select('select *

        from problems

        join Courses ON problems.course_id=Courses.course_id


        where teacher_id = ?', [$user_id]);
        $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND teacher_id=:id",[$user_id]);
       // return $list;
     

    $user = DB::delete("DELETE FROM problems WHERE teacher_id = ? And student_id=?  AND problem_id=? ", [$user_id, $student_id,$problem_id]);
    Session::flash('success', 'Request  has been deleted ');
     $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND teacher_id=:id",[$user_id]);
     return view('teacher_request')->with([ 'data' => $list,'user_id' => $user_id,'student_id'=> $student_id,'problem_id'=>$problem_id,'count'=>$count]);
}



//Teacher can add solution at this section
public function sol_view($user_id, $student_id,$problem_id){
    $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND teacher_id=?",[$user_id]);
   return view('teacher_probcol')->with([ 'user_id' => $user_id,'student_id'=> $student_id,'problem_id'=>$problem_id,'count'=>$count]);
}
public function solution(Request $req){

//return $req;
$update=DB::table('problems')
    ->where('teacher_id', $req->user_id)
    ->where('student_id', $req->student_id)
    ->where('problem_id', $req->problem_id)
     ->update(
        [
            'response_text'=>$req->des,
            'teacher_time'=>$req->time,
            'teacher_date'=>$req->date,
            'solve_path'=>$req->doc,
            'meet_link'=>$req->meet,
            'solved'=>0,

        ]
);
Session::flash('success', 'Solution has been added .');
  $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND teacher_id=:id",[$req->user_id]);
return view('teacher_probcol')->with([ 'user_id' => $req->user_id,'student_id'=> $req->student_id,'problem_id'=>$req->problem_id,'count'=>$count]);


}

public function show_meetlist($user_id){

     $list=DB::select('select *

        from problems

        join Courses ON problems.course_id=Courses.course_id


        where teacher_id = ?', [$user_id]);
        $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND teacher_id=:id",[$user_id]);
       // return $list;
       $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND teacher_id=:id",[$user_id]);

       return view('teacher_meet')->with(['data' => $list, 'user_id' => $user_id,'count'=>$count]);

}


}
