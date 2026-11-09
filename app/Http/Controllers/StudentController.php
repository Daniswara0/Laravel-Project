<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('classroom')->get();
        $classrooms = Classroom::all(); // Tambahkan ini agar dropdown kelas di modal tidak error/kosong

        return view('admin.students.index', [
            "title"      => "Student",
            "content"    => "Selamat datang di halaman student",
            "students"   => $students,
            "classrooms" => $classrooms
        ]);
    }

    public function create()
    {
        $classrooms = Classroom::all();
        return view('admin.students.create', [
            "title"      => "Tambah Siswa",
            "content"    => "Form untuk menambahkan data siswa baru.",
            "classrooms" => $classrooms
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis',
            'nama' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        return view('admin.students.edit', [
            "title"      => "Edit Siswa",
            "content"    => "Ubah informasi data siswa.",
            "student"    => $student,
            "classrooms" => $classrooms
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis,' . $student->id,
            'nama' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'address' => 'required|string',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
