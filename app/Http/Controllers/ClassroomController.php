<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('admin.classrooms',  [
            "title"    => "Classroom",
            "content"  => "Selamat datang di halaman classroom :p",
            "classrooms" => $classrooms
        ]);
    }
}
