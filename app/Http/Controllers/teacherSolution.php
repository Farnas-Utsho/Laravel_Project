<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class teacherSolution extends Controller
{
        public function store(Request $request)
    {
        $request->validate([
            'problem' => 'required',
            'problemDoc' => 'required',
            'solution' => 'required',
            'solFile' => 'required|mimes:pdf',
            'date_time' => 'required|date_format:Y-m-d\TH:i',
            'meet' => 'required',
        ]);

        // Uploading files
        $file = $request->file('solFile');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('files'), $fileName);

        // Formatting date and time
        $dateTime = \DateTime::createFromFormat('Y-m-d\TH:i', $request->input('date_time'));
        $time = $dateTime->format('h:i A');

        // Insert data into the database using Eloquent
        $info=DB::create([
            'problem_description' => $request->input('problem'),
            'problem_document' => $request->input('problemDoc'),
            'solution' => $request->input('solution'),
            'doc_path' => $fileName,
            'date' => $dateTime->format('Y-m-d'),
            'time' => $time,
            'meet_link' => $request->input('meet'),
        ]);
        return $info;
        return redirect()->route('project_info.index'); // Assuming a route named project_info.index exists
    }
}
