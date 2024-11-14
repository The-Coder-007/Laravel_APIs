<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function list(){
        return Student::all();
    }

    function addStudent(Request $request){

        $student = new Student();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;

        if($student->save()){
            return ["result" => "Student added", "status" => "true"];
        }
        else{
            return ["result" => "Operation Failled", "status" => "false"];
        }
    }

    function updateStudent(Request $request){
        // return "updated";
        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        if($student->save()){
            return ["result" => "Student Updated", "status" => "true"];
        }else{
            return ["result" => "Student Not update", "status" => "false"];
        }
    }

    function deleteStudent($id ){
        // return $id;
        $student = Student::destroy($id);

        if($student){
            return ['result' => "Student record deleted", "status" => 'True'];
        }else{
            return ['result' => "Student record not Found", "status" => 'False'];
        }
    }

    function searchStudent($name){
        // return $name;
        $student = Student::where('name', 'like', "%$name%")->get();
        if($student){
            return ["result" => $student, "status" => "true"];
        }else{
            return ["result" => "student not found!", "status" => "false"];
        }
    }
}
