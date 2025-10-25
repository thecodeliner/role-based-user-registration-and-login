@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-semibold text-center mb-6">Login Account</h2>

    <div class="error" >
        @if ($errors->any)
        <ul>
        @foreach ($errors->all() as $error)
            <li class="text-red-500 rounded bg-yellow-100 px-3 py-1">&#10007; {{ $error }}</li>
        @endforeach
        </ul>
        @endif
    </div>

    <form id="loginForm" class="space-y-4" method="POST" action="{{ route('login') }}">
        @csrf
      <div>
        <label class="block mb-2 text-gray-700 font-medium">Select Role</label>
        <select name="role" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300" >
          <option value="">-- Choose Role --</option>
          <option value="student">Student</option>
          <option value="teacher">Teacher</option>
        </select>
      </div>

      <div>
        <input type="email" name="email" placeholder="Email" class="w-full border rounded-lg p-2" >
      </div>
      <div>
        <input type="password" name="password" placeholder="Password" class="w-full border rounded-lg p-2" >
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg">Login</button>

      <p class="text-center mt-3 text-sm text-gray-600">
        Don’t have an account? <a href="{{route('auth.showRegister')}}" class="text-blue-500">Register now</a>
      </p>
    </form>
  </div>

@endsection
