<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function showLogin(){

       return view('auth.login');

   }

   public function showRegister(){

       return view('auth.register');

   }

   public function register(Request $request){

      $validated = $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:5|confirmed',
          'role' => 'in:student,teacher',
          'subject' => 'nullable|string|max:255',
          'department' => 'nullable|string|max:255',
          'designation' => 'nullable|string|max:255',
          'experience' => 'nullable|integer|min:0',
          'roll' => 'nullable|string|max:50|unique:students',
          'semester' => 'nullable|string|max:50',
          'user_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
      ]);
      $validated['password'] = bcrypt($validated['password']);
      if($request->hasFile('user_image')){
        $filePath =$request->file('user_image')->store('user_images', 'public');
        $validated['user_image'] = $filePath;
      }

            //create user
                $user = User::create(

                    [
                        'name'      => $validated['name'],
                        'email'     => $validated['email'],
                        'password'  => Hash::make($validated['password']),
                        'role'      => $validated['role'],
                        'user_image'=> $validated['user_image'],
                    ]


                );
            //create teacher
            if($request->role == 'teacher'){

                $user->teacher()->create([
                       'subject'    => $validated['subject'],
                       'designation'=> $validated['designation'],
                       'experience' => $validated['experience'],

                    ]);
                }

                //create student
            if($request->role == 'student'){

                $user->student()->create([
                       'department'    => $validated['department'],
                       'roll'=> $validated['roll'],
                       'semester' => $validated['semester'],

                    ]);
                }


        //dd($validated);
      return redirect()->back()->with('success', 'Registration successful. Please login.');

   }

}
