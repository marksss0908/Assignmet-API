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
        try {
            return Student::create(
                $request->all()
            );
        } catch (\Exception $ex){
            return [
                'status' => 'Error',
                'message' => $ex->getMessage(),
            ];
        }
    }
}
