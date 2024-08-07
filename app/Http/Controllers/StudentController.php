<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Grade;


class StudentController extends Controller
{

    public function show_add(){

        $grades = Grade::all();
        return view("manage.create",compact("grades"));
    }

    public function student_add(Request $request){
        $request->validate([
            'name'=>'required',
            'grade'=>'required',
            'address'=>'required',
            'contact'=>'required',
        ]);

        $data = new Student;
        $data->name = $request->name;
        $data->grade = $request->grade;
        $data->address = $request->address;
        $data->contact = $request->contact;

        $data->save();

        return redirect('/student')->with('status','Student added successfully');

    }

    public function showdata($id){
        $grades = Grade::all();
      $student = Student::find($id);
        return view('manage.edit',['student'=>$student, 'grades'=>$grades]);
    }
    public function student_edit(Request $request){

        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->grade = $request->grade;
        $student->address = $request->address;
        $student->contact = $request->contact;
        $student->save();

        return redirect('/student')->with('status','Student updated successfully');
    }

    public function student_delete($id){
        $student = Student::find($id);
        $student->delete();
        return redirect('/student')->with('status','Student deleted successfully');
    }
}

