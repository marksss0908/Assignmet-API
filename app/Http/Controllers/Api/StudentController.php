<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Student;
use http\Message;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getStudents()
    {
        return Student::all();
    }

    public function addNewStudent(Request $request)
    {
        return Student::create(
            $request->all()
        );
    }

    public function updateStudent(Request $request)
    {
        $student = Student::find($request->id);
        $student->update([
            'name' => $request->name ? $request->name : $student->name,
            'grade' => $request->grade ? $request->grade : $student->grade,
        ]);
        return $student;
    }

    public function deleteStudent(Request $request)
    {
        $student = Student::find($request->id);
        $student->destroy($request->id);
        return $student;
    }
}
