@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-semibold text-center mb-6">Register Account</h2>

    <!-- Role Selection -->
    <div class="mb-4">

      @if ($errors->any)
      <div class="alert alert-danger">
      <ul class="text-red-500">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach

      </ul>
      </div>
      @endif

@if (@session('success'))
    <p>{{ session('success') }}</p>

@endif
    </div>

    <!-- Common Fields -->
    <form id="registerForm" class="space-y-4" method="post" action="{{ route('auth.register') }}" enctype="multipart/form-data">
        @csrf
        <label class="block mb-2 text-gray-700 font-medium">Select Role</label>
        <select id="roleSelect" name="role" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300">
            <option value="">-- Choose Role --</option>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
          </select>
      <div>
        <input type="text" name="name" placeholder="Full Name" class="w-full border rounded-lg p-2" >
      </div>
      <div>
        <input type="email" name="email" placeholder="Email Address" class="w-full border rounded-lg p-2" >
      </div>
      <div>
        <input type="password" name="password" placeholder="Password" class="w-full border rounded-lg p-2" >
      </div>
      <div>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full border rounded-lg p-2" >
      </div>
      <div>
        <input type="file" name="user_image" placeholder="Photo" class="w-full border rounded-lg p-2 mt-2">
      </div>

      <!-- Student Fields -->
      <div id="studentFields" class="hidden">
        <input type="text" name="department" placeholder="Department" class="w-full border rounded-lg p-2 mt-2">
        <input type="text" name="roll" placeholder="Roll Number" class="w-full border rounded-lg p-2 mt-2">
        <input type="text" name="semester" placeholder="Semester" class="w-full border rounded-lg p-2 mt-2">

      </div>

      <!-- Teacher Fields -->
      <div id="teacherFields" class="hidden">
        <input type="text" name="subject" placeholder="Subject" class="w-full border rounded-lg p-2 mt-2">
        <input type="text" name="designation" placeholder="Designation" class="w-full border rounded-lg p-2 mt-2">
        <input type="number" name="experience" placeholder="Experience (Years)" class="w-full border rounded-lg p-2 mt-2">

      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg">Register</button>

      <p class="text-center mt-3 text-sm text-gray-600">
        Already have an account? <a href="{{route('auth.showLogin')}}" class="text-blue-500">Login here</a>
      </p>
    </form>
  </div>

  <script>
    const roleSelect = document.getElementById('roleSelect');
    const studentFields = document.getElementById('studentFields');
    const teacherFields = document.getElementById('teacherFields');

    roleSelect.addEventListener('change', () => {
      const role = roleSelect.value;
      studentFields.classList.add('hidden');
      teacherFields.classList.add('hidden');

      if (role === 'student') studentFields.classList.remove('hidden');
      if (role === 'teacher') teacherFields.classList.remove('hidden');
    });
  </script>

@endsection
