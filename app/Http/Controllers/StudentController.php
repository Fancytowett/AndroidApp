<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function save(Request $request)
    {
     Student::create($request->all());
     echo "submitted";
     return back()->with("success");

    }

    public function fetch($names)
    {
        $student=Student::where(['names'=>$names])->first();
        return $student;

    }
}