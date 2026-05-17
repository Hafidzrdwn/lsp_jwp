@extends('layouts.app')

@section('title', 'Tambah Data Pegawai')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface">Tambah Data Pegawai</h2>
        <p class="font-body-md text-body-lg text-on-surface-variant mt-1">Masukkan data pegawai baru ke dalam sistem.</p>
    </div>
    <a href="{{ route('employees.index') }}" class="bg-surface text-on-surface border border-outline-variant h-10 px-4 rounded-lg font-label-md flex items-center justify-center hover:bg-surface-container-low transition-colors shadow-sm">
        <span class="material-symbols-outlined mr-2 text-[18px]">arrow_back</span>
        Kembali
    </a>
</div>

<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-8 shadow-[0_1px_3px_rgba(0,0,0,0.1)]">
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        @include('employees._form')

        <div class="mt-8 pt-6 border-t border-outline-variant flex justify-end gap-3">
            <a href="{{ route('employees.index') }}" class="h-10 px-6 rounded-lg font-label-md border border-outline-variant text-on-surface-variant hover:bg-surface-container-low transition-colors flex items-center">Batal</a>
            <button type="submit" class="bg-primary text-on-primary h-10 px-6 rounded-lg font-label-md hover:opacity-90 transition-opacity focus:ring-2 focus:ring-primary focus:ring-offset-2 cursor-pointer flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">save</span>
                Simpan Pegawai
            </button>
        </div>
    </form>
</div>
@endsection
