<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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


   public function login(Request $request){

    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
        'role' => 'required',
    ]);


    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if($user->role === $credentials['role']){
            if($user->role === 'student'){
                return redirect()->route('student.index');
            }elseif($user->role === 'teacher'){
                return redirect()->route('teacher.index');
            }

        }

    }
    return back()->withErrors(['email' => 'The provided credentials do not match our records.']);



        // $user = User::where('email', $request->email )->first();

        // if (!$user || !password_verify($credentials['password'], $user->password)){

        //     return back()->withErrors(['email' => 'The provided credentials do not match our records.']);

        // }

        // //dd($user);

        //     if ($user ->role === $credentials['role']){
        //         if($user->role === 'student'){
        //             return redirect()->route('student.index');
        //         }
        //     }






   }

   public function logout(){

    Auth::logout();

    return redirect()->route('login');
   }

}
