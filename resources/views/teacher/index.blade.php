@extends('layouts.app')

@section('title', 'Teacher profile')

@section('content')

<div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <div>
            <h3 class="font-bold text-[20px] text-center">
                Teacher Profile
            </h3>
            <hr class="py-2 px-2 mt-2">
        </div>
        <div class="flex pt-4">
            <div class="flex-shrink-0 flex flex-col items-center">
                <img src="{{ asset('storage/' . Auth::user()->user_image) }}" alt="Student photo" class="w-[150px] h-[150px] rounded object-cover border-2 border-gray-200">
                <button class="mt-3 text-sm font-medium text-blue-600 hover:text-blue-500">Upload Photo</button>
            </div>

            <div class="ml-8 flex-1 space-y-4">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                    <input type="text" value="{{Auth::user()->name}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="text" value="{{Auth::user()->email}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                    <input type="text" value="{{Auth::user()->teacher->subject}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Designation</label>
                    <input type="text" value="{{Auth::user()->teacher->designation}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Experience</label>
                    <input type="text" value="{{Auth::user()->teacher->experience}}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                </div>

                <div class="flex justify-end">
                <a href="{{ route('logout') }}" class="bg-blue-300 rounded py-2 px-4 align-right">Logout</a>
            </div>
            </div>

        </div>
    </div>
</div>

  @endsection

