@extends('layouts.app')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface">Edit Employee</h2>
        <p class="font-body-md text-body-md text-on-surface-variant mt-1">Update details for <span class="font-bold text-primary">{{ $employee->full_name }}</span>.</p>
    </div>
    <a href="{{ route('employees.index') }}" class="bg-surface text-on-surface border border-outline-variant h-10 px-4 rounded-lg font-label-md flex items-center justify-center hover:bg-surface-container-low transition-colors shadow-sm">
        Back
    </a>
</div>

<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-8 shadow-[0_1px_3px_rgba(0,0,0,0.1)]">
    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')
        @include('employees._form', ['employee' => $employee])
        
        <div class="mt-8 flex justify-end">
            <button type="submit" class="bg-primary text-on-primary h-10 px-6 rounded-lg font-label-md hover:opacity-90 transition-opacity focus:ring-2 focus:ring-primary focus:ring-offset-2 cursor-pointer">Update Employee</button>
        </div>
    </form>
</div>
@endsection
