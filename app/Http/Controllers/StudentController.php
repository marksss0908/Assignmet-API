<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Student;

class StudentController extends Controller{

    public function index(){
        //$students = Student::all();

        $students = json_decode(Http::get('https://intechtestapi.herokuapp.com/api/getStudents')->body(),true);
        return view('welcome', compact('students'));
    }

    public function store(Request $request){
            // Student::create(
            //     $request->all()
            // );
            // return redirect(route('student.index'))->with('success', sprintf("%s added to database", $response['name']));

        $response = Http::post('https://intechtestapi.herokuapp.com/api/addNewStudent', $request->all())->body();
        $response = json_decode($response, true);

        return redirect(route('student.index'))->with('success', sprintf("%s added to database via API.", $response['name']));
    }

    public function edit(Request $request){

        //get the student from view and format as Json then use in another view edit view

        $std_edit = ([
             "id" => $request->id,
             "name" => $request->name,
             "grade" => $request->grade
         ]);
  

        return view('update', compact('std_edit'));    
    }

    public function update(Request $request){

        $std_updt = ([
            "id" => $request->id,
            "name" => $request->name,
            "grade" => $request->grade
        ]);

        $response = Http::put('https://intechtestapi.herokuapp.com/api/updateStudent', $std_updt)->body();
        $response = json_decode($response, true);
        
        return redirect(route('student.index'));
    }

    public function destroy(Request $request){
            //$request catch the whole student object


        //$student is in json format contaning the $request->id
        $std_dlt = ([
                "id" => $request->id 
            ]);

        // code in sending to API delete function
        $response = Http::delete('https://intechtestapi.herokuapp.com/api/deleteStudent', $std_dlt)->body();
        $response = json_decode($response, true);

        return redirect(route('student.index'))->with('deleted', sprintf("%s deleted to database via API.", $response['message']));
    }
}
