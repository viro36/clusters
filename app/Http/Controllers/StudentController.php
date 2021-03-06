<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index($id)
    {
        $schedule = Schedule::where('id', $id)->first();

        return view('student', compact('schedule'));
    }

    public function add(Request $request, $id)
    {
        if($request->hasFile('students')) {
            $file = $request->file('students');
            $file_name = $id . time() . '.' . $request->students->extension();
            $file->move(public_path() . '/files/students/', $file_name);

            $student = new Student([
                'filename' => $file_name,
                'schedule_id' => $id,
                'students_amount' => $request->post('student'),
            ]);

            $student->status = 1;

            $student->save();

            return redirect('/')->with('success', 'Ученики добавлены!');
        }
    }

    public function delete(Student $student)
    {
        $student->delete();

        return redirect('/');
    }

    // public function approve(Student $student)
    // {
    //     $student->status = 1;
    //     $student->save();

    //     return redirect('/');
    // }
}
