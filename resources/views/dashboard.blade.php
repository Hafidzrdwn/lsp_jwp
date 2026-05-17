@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Page Header -->
<div class="mb-6">
    <h2 class="font-headline-lg text-headline-lg text-on-surface">Dashboard</h2>
    <p class="font-body-md text-body-lg text-on-surface-variant mt-1">
        Selamat datang kembali, {{ Auth::user()->name }}. Berikut adalah ringkasan data pegawai Anda.
    </p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)] flex items-center">
        <div class="p-3 flex items-center justify-center bg-primary-container text-on-primary-container rounded-lg mr-5">
            <span class="material-symbols-outlined">group</span>
        </div>
        <div>
            <h4 class="font-headline-md text-headline-md text-on-surface">{{ $totalEmployees }}</h4>
            <div class="font-body-md text-on-surface-variant">Total Pegawai</div>
        </div>
    </div>

    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)] flex items-center">
        <div class="p-3 flex items-center justify-center bg-surface-container-highest text-primary rounded-lg mr-5">
            <span class="material-symbols-outlined">check_circle</span>
        </div>
        <div>
            <h4 class="font-headline-md text-headline-md text-on-surface">{{ $activeEmployees }}</h4>
            <div class="font-body-md text-on-surface-variant">Pegawai Aktif</div>
        </div>
    </div>

    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)] flex items-center">
        <div class="p-3 flex items-center justify-center bg-error-container text-on-error-container rounded-lg mr-5">
            <span class="material-symbols-outlined">cancel</span>
        </div>
        <div>
            <h4 class="font-headline-md text-headline-md text-on-surface">{{ $inactiveEmployees }}</h4>
            <div class="font-body-md text-on-surface-variant">Pegawai Non Aktif</div>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="grid grid-cols-1 gap-6 lg:grid-cols-2 xl:grid-cols-3">
    <!-- Gender Chart -->
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)]">
        <h4 class="font-headline-sm text-headline-sm text-on-surface mb-4">Distribusi Jenis Kelamin</h4>
        <canvas id="genderChart"></canvas>
    </div>

    <!-- Age Chart -->
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)]">
        <h4 class="font-headline-sm text-headline-sm text-on-surface mb-4">Distribusi Usia</h4>
        <canvas id="ageChart"></canvas>
    </div>

    <!-- Education Chart -->
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)] xl:col-span-1 lg:col-span-2">
        <h4 class="font-headline-sm text-headline-sm text-on-surface mb-4">Tingkat Pendidikan</h4>
        <canvas id="educationChart"></canvas>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctxGender = document.getElementById('genderChart').getContext('2d');
        const genderData = @json($genderData);
        new Chart(ctxGender, {
            type: 'bar',
            data: {
                labels: Object.keys(genderData),
                datasets: [{
                    label: 'Total',
                    data: Object.values(genderData),
                    backgroundColor: ['#4f46e5', '#ffb695'],
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
        });

        const ctxAge = document.getElementById('ageChart').getContext('2d');
        const ageData = @json($ageDistribution);
        new Chart(ctxAge, {
            type: 'doughnut',
            data: {
                labels: Object.keys(ageData),
                datasets: [{
                    data: Object.values(ageData),
                    backgroundColor: ['#c3c0ff', '#4f46e5', '#3525cd'],
                }]
            },
            options: { responsive: true }
        });

        const ctxEdu = document.getElementById('educationChart').getContext('2d');
        const eduData = @json($educationData);
        new Chart(ctxEdu, {
            type: 'bar',
            data: {
                labels: Object.keys(eduData),
                datasets: [{
                    label: 'Total',
                    data: Object.values(eduData),
                    backgroundColor: '#4d44e3',
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
        });
    });
</script>
@endsection
