<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class issue_table extends Controller
{
    public function problem(Request $req)

    {

       // return $req ;
//          $req->validate([
//     'des' => 'required|string|max:50',
//     'doc' => 'required|file|mimes:jpeg,png,pdf,doc,docx,xls,xlsx,csv|max:10240',
// ]);

        $teacher=$req->teacher_id;
        $student=$req->student_id;

        $user = DB::insert('INSERT INTO problems (student_id,teacher_id,t_name ,course_id,section_id,s_name ,problem_text,time_requested, date_requested,problem_path,solved ) VALUES (?, ?,?, ?,?,?,?,?,?,?,?)', [

            $req->student_id,
            $req->teacher_id,
            $req->teacher_name,
            $req->course_id,
            $req->section_id,
            $req->section_name,
            $req->des,
            $req->time,
            $req->date,
            $req->doc,
            1
        ]);
        // return $user;

     return redirect()->route('pro', ['teacher_id' => $teacher, 'user_id' => $student,])->withInput();



    }

public function teacher_routine($t_id,$student_id){


      $teacher_routine = DB::select("
     SELECT schedule.*, courses.course_name, sections.section_name ,sections.section_id,teachers.teacher_name
     FROM schedule
     JOIN courses ON schedule.course_id = courses.course_id
     JOIN sections ON schedule.section_id = sections.section_id
     JOIN teachers ON teachers.teacher_id = schedule.teacher_id
     WHERE schedule.teacher_id = :teacherId
     ", ['teacherId' =>$t_id]);
   // return $teacher_routine;
   $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND student_id=:id",[$student_id]);
   return view('/st_time')->with(['data'=>$teacher_routine,'student_id'=>$student_id,'count'=>$count]);


}

}
