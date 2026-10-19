<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.aboutctrl', [
            "title" => "About",
            "content" => "Selamat datang di halaman about :p",
            "nama" => "Daniswara Choirun Nesa Arifin",
            "umur" => 16,
            "hobby" => "Memasak, menonton film, mendengarkan musik, tidur, dan bermain game",
            "github" => "https://github.com/Daniswara0",
            "emote" => "😝🥩🥩"
        ]);
    }
}
