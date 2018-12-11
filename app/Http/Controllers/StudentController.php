<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function save(Request $request)
    {
     Student::create($request->all());

     return "Created";

    }
    //git reset --hard HEAD
    //git pull

    public function fetch($names)
    {
        $student=Student::where(['names'=>$names])->first();
        return $student;
    }
    public function search(Request $request)
    {
        $search=$request->input('search');
        $student=Student::where('names', 'like',"%$search%")
            ->orWhere('email', 'like',"%$search%")
            ->orWhere('age', 'like',"%$search%");
        if ($student->exists())
        return $student->first();
        else
            return"No Item Found";
    }
}
