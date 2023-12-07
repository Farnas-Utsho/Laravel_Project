<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class teacherHome extends Controller
{
    public function teacher_routine( $t_id){

// $t_id,$student_id;

      $teacher_routine = DB::select("
     SELECT schedule.*, courses.course_name, sections.section_name ,sections.section_id,teachers.teacher_name
     FROM schedule
     JOIN courses ON schedule.course_id = courses.course_id
     JOIN sections ON schedule.section_id = sections.section_id
     JOIN teachers ON teachers.teacher_id = schedule.teacher_id
     WHERE schedule.teacher_id = :teacherId
     ", ['teacherId' =>$t_id]);
   // return $teacher_routine;
    $count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND teacher_id=:id",[$t_id]);
   // return $count;
  //  return view('/st_time')->with(['data'=>$teacher_routine,'student_id'=>$student_id,'count'=>$count]);
      return view('teacher_home')->with(['data' => $teacher_routine,'count'=>$count,'id'=>$t_id]);
    //    return view('teacher_home')->with(['data' => $teacher_routine,'t_id'=>$t_id]);

    }
}

