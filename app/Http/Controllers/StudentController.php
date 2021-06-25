<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        // $students = Student::all();
        $students = json_decode(Http::get('https://intechtestapi.herokuapp.com/api/getStudents')->body(),true);
        return view('welcome', compact('students'));
    }

    public function store(Request $request)
    {
        Student::create(
            $request->all()
        );

        // return redirect(route('student.index'))->with('success', sprintf("%s added to database", $response['name']));
        $response = Http::post('https://intechtestapi.herokuapp.com/api/addNewStudent', $request->all())->body();
        $response = json_decode($response, true);

        return redirect(route('student.index'))->with('success', sprintf("%s added to database via API.", $response['name']));
    }
}
