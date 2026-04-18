<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller

   
{
        const students = [
            ["name" => "Radhe", "marks" => 85],
            ["name" => "Sham", "marks" => 50],
            ["name" => "Raman", "marks" => 40]
        ];
    function index()
    {
        $students = self::students; 
        return view('students', compact('students'));
    
}
}