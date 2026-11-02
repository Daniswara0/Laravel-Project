<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subjects', [
            "title"   => "Subjects",
            "content" => "Selamat datang di halaman subjects :p",
            "subjects" => $subjects
        ]);
    }
}
