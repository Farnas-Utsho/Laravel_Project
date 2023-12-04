<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class User_controller extends Controller
{
    public function show($id)
    {


        $result = DB::select('
        SELECT
        Courses.course_id,
        Courses.course_name,
        Sections.section_name,
        Schedule.day_of_week,
        Schedule.start_time,
        Schedule.end_time,
        Teachers.teacher_name,
        Teachers.teacher_id
    FROM
        StudentCourses
    JOIN
        Schedule ON StudentCourses.course_id = Schedule.course_id AND StudentCourses.section_id = Schedule.section_id
    JOIN
        Courses ON Schedule.course_id = Courses.course_id
    JOIN
        Sections ON Schedule.section_id = Sections.section_id
    JOIN
        Teachers ON Schedule.teacher_id = Teachers.teacher_id
    WHERE
        StudentCourses.student_id = ?

', [$id]);

$count = DB::select("SELECT COUNT(*) AS count FROM problems WHERE solved = 1 AND student_id=:id",[$id]);
      // return view('home')->with('data'=>$result,'id'=>$id);
        return view('home')->with(['data' => $result, 'id' => $id,'count'=>$count]);






}
}
