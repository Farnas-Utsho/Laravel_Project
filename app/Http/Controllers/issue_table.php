<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class issue_table extends Controller
{
    public function problem(Request $req)
    {
        $req->validate([
            'des' => 'required|string|max:50',
        ]);

        $user = DB::insert('INSERT IGNORE INTO issue_table (problem_description,time_requested, date_requested,problem_document,status ) VALUES (?, ?,?, ?,?)', [


            $req->des,
            $req->time,
            $req->date,
            $req->doc,
            1
        ]);
        return redirect('/student_time')->withInput()->with('success', 'Record created successfully');
    }

public function teacher_routine($t_id){

      $teacher_routine = DB::select("
     SELECT schedule.*, courses.course_name, sections.section_name
     FROM schedule
     JOIN courses ON schedule.course_id = courses.course_id
     JOIN sections ON schedule.section_id = sections.section_id
     WHERE schedule.teacher_id = :teacherId
     ", ['teacherId' =>$t_id]);
// return $teacher_routine;
  return view('/st_time')->with('data', $teacher_routine);


}

}
