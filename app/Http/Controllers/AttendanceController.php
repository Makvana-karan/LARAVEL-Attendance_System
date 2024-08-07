<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;

class AttendanceController extends Controller
{
    public function store(Request $request, Attendance $attendance)
    {
        // Fix typo in input data key
        $data = $request->input('attendance');

        foreach ($data as $std_id => $dates) {
            foreach ($dates as $date => $status) {
                // Convert date to the correct format
                $attendance_date = \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');

                // Store or update the attendance
                Attendance::updateOrCreate(
                    ['std_id' => $std_id, 'date' => $attendance_date],
                    ['status' => $status]
                );
            }
        }

        return redirect()->back()->with('status', 'Attendance saved successfully');
    }

    public function index()
    {
        // Fetch all students
        $students = Student::all();

        // Fetch attendance data
        $attendanceData = Attendance::all()->groupBy('date');

        return view('pages.show_table', compact('students', 'attendanceData'));
    }
}
