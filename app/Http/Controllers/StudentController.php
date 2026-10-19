<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.studentctrl', [
            "title"    => "Student",
            "content"  => "Selamat datang di halaman student :p",
            "students" => $students
        ]);
    }
}
