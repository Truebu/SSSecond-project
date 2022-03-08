<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AdminController extends Controller
{

    public function index(){
        return view('admin');
    }

    public function toCreateStudent(){
        return view('createStudent');
    }

    public function createStudent(){
        $this->validate(request(), [
            'name' => 'required',
            'program' => 'required'
        ]);
        Student::create(request(['name', 'program']));
        return redirect()->route('admin.index');
    }

    public function toReport(){
        return view('createReport');
    }
}
