@extends('layouts.app')

@section('title', 'Tambah Data Pegawai')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface">Tambah Data Pegawai</h2>
        <p class="font-body-md text-body-lg text-on-surface-variant mt-1">Masukkan data pegawai baru.</p>
    </div>
    <a href="{{ route('employees.index') }}" class="bg-surface text-on-surface border border-outline-variant h-10 px-4 rounded-lg font-label-md flex items-center justify-center hover:bg-surface-container-low transition-colors shadow-sm">
        Kembali
    </a>
</div>

<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-8 shadow-[0_1px_3px_rgba(0,0,0,0.1)]">
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        @include('employees._form')
        
        <div class="mt-8 flex justify-end">
            <button type="submit" class="bg-primary text-on-primary h-10 px-6 rounded-lg font-label-md hover:opacity-90 transition-opacity focus:ring-2 focus:ring-primary focus:ring-offset-2 cursor-pointer">Save Employee</button>
        </div>
    </form>
</div>
@endsection
