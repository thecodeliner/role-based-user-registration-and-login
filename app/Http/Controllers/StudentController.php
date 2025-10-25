<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;

class StudentController extends Controller
{
   public function index(Request $request){

    $users = User::with('student')->get();

       return view('student.index', compact('users'));
   }
}
