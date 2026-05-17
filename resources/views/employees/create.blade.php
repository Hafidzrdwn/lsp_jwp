@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h3 class="text-3xl font-medium text-gray-700">Add Employee</h3>
    <a href="{{ route('employees.index') }}" class="px-4 py-2 font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform bg-white border rounded-md hover:bg-gray-50 shadow-sm">
        Back
    </a>
</div>

<div class="p-6 bg-white rounded-md shadow-sm border border-gray-100">
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        @include('employees._form')
        
        <div class="mt-6">
            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition-colors shadow-sm">Save Employee</button>
        </div>
    </form>
</div>
@endsection
