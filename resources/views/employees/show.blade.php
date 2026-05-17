@extends('layouts.app')

@section('title', 'Detail Pegawai')

@section('content')
<!-- Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface">Detail Pegawai</h2>
        <p class="font-body-md text-body-lg text-on-surface-variant mt-1">Informasi lengkap untuk <span class="font-bold text-primary">{{ $employee->full_name }}</span>.</p>
    </div>
    <div class="flex items-center gap-3">
        <a href="{{ route('employees.edit', $employee) }}" class="bg-primary text-on-primary h-10 px-4 rounded-lg font-label-md flex items-center justify-center hover:opacity-90 transition-opacity shadow-sm">
            <span class="material-symbols-outlined mr-2 text-[18px]">edit</span>
            Edit
        </a>
        <a href="{{ route('employees.index') }}" class="bg-surface text-on-surface border border-outline-variant h-10 px-4 rounded-lg font-label-md flex items-center justify-center hover:bg-surface-container-low transition-colors shadow-sm">
            <span class="material-symbols-outlined mr-2 text-[18px]">arrow_back</span>
            Kembali
        </a>
    </div>
</div>

@php
    // Helper untuk menampilkan item detail
    $detailItem = function($label, $value) {
        return '<div class="space-y-1"><dt class="font-label-md text-[12px] text-on-surface-variant uppercase tracking-wider">' . e($label) . '</dt><dd class="font-body-md text-[14px] text-on-surface">' . e($value ?: '-') . '</dd></div>';
    };
@endphp

<!-- Kartu Informasi Pribadi -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-[0_1px_3px_rgba(0,0,0,0.1)] mb-6">
    <div class="px-6 py-4 border-b border-outline-variant flex items-center gap-3">
        <span class="material-symbols-outlined text-primary text-[22px]">person</span>
        <h3 class="font-headline-sm text-[16px] text-on-surface">Data Pribadi</h3>
    </div>
    <div class="p-6">
        <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-5">
            {!! $detailItem('NIK', $employee->nik) !!}
            {!! $detailItem('Nama Lengkap', $employee->full_name) !!}
            {!! $detailItem('Email', $employee->email) !!}
            {!! $detailItem('Nomor HP', $employee->phone_number) !!}
            {!! $detailItem('Jenis Kelamin', $employee->gender) !!}
            {!! $detailItem('Agama', $employee->religion) !!}
            {!! $detailItem('Tempat Lahir', $employee->birth_place) !!}
            {!! $detailItem('Tanggal Lahir', $employee->birth_date?->format('d F Y')) !!}
            {!! $detailItem('Status Pernikahan', $employee->marital_status) !!}
        </dl>
    </div>
</div>

<!-- Kartu Alamat -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-[0_1px_3px_rgba(0,0,0,0.1)] mb-6">
    <div class="px-6 py-4 border-b border-outline-variant flex items-center gap-3">
        <span class="material-symbols-outlined text-primary text-[22px]">location_on</span>
        <h3 class="font-headline-sm text-[16px] text-on-surface">Alamat</h3>
    </div>
    <div class="p-6">
        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-5">
            {!! $detailItem('Alamat Lengkap', $employee->address) !!}
            {!! $detailItem('Kota', $employee->city) !!}
        </dl>
    </div>
</div>

<!-- Kartu Data Kepegawaian -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-[0_1px_3px_rgba(0,0,0,0.1)]">
    <div class="px-6 py-4 border-b border-outline-variant flex items-center gap-3">
        <span class="material-symbols-outlined text-primary text-[22px]">badge</span>
        <h3 class="font-headline-sm text-[16px] text-on-surface">Data Kepegawaian</h3>
    </div>
    <div class="p-6">
        <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-5">
            {!! $detailItem('Departemen', $employee->department->name ?? '-') !!}
            {!! $detailItem('Jabatan', $employee->position ? $employee->position->name . ' (' . $employee->position->level . ')' : '-') !!}
            {!! $detailItem('Pendidikan Terakhir', $employee->education->degree ?? '-') !!}
            {!! $detailItem('Tanggal Bergabung', $employee->join_date?->format('d F Y')) !!}

            <div class="space-y-1">
                <dt class="font-label-md text-[12px] text-on-surface-variant uppercase tracking-wider">Status Kepegawaian</dt>
                <dd>
                    @if($employee->employment_status === 'Tetap')
                        <span class="px-2.5 py-0.5 inline-flex text-[11px] font-semibold rounded-full bg-primary-fixed text-on-primary-fixed">Tetap</span>
                    @elseif($employee->employment_status === 'Kontrak')
                        <span class="px-2.5 py-0.5 inline-flex text-[11px] font-semibold rounded-full bg-tertiary-fixed text-on-tertiary-fixed">Kontrak</span>
                    @else
                        <span class="px-2.5 py-0.5 inline-flex text-[11px] font-semibold rounded-full bg-secondary-container text-on-secondary-container">Magang</span>
                    @endif
                </dd>
            </div>

            {!! $detailItem('Gaji Pokok', 'Rp ' . number_format($employee->basic_salary, 0, ',', '.')) !!}

            <div class="space-y-1">
                <dt class="font-label-md text-[12px] text-on-surface-variant uppercase tracking-wider">Status Aktif</dt>
                <dd>
                    @if($employee->is_active)
                        <span class="px-2.5 py-0.5 inline-flex text-[11px] font-semibold rounded-full bg-secondary-container text-primary">Aktif</span>
                    @else
                        <span class="px-2.5 py-0.5 inline-flex text-[11px] font-semibold rounded-full bg-error-container text-on-error-container">Nonaktif</span>
                    @endif
                </dd>
            </div>
        </dl>
    </div>
</div>
@endsection
