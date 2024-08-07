<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;

class HomeController extends Controller
{
    public function Student(){
        $student = Student::all();
        return view('pages.students',compact('student'));
    }
    public function Attendance(){
        $grades = Grade::all();
        $student = Student::all();
        return view('pages.attendance',compact('student', 'grades'));
    }

    public function Show(){
        return view('pages.show_table');
    }
}
