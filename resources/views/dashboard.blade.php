@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Header -->
<div class="mb-6">
    <h2 class="font-headline-lg text-headline-lg text-on-surface">Dashboard</h2>
    <p class="font-body-md text-body-lg text-on-surface-variant mt-1">
        Selamat datang kembali, {{ Auth::user()->name }}. Berikut ringkasan data pegawai.
    </p>
</div>

<!-- Statistik Kartu -->
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
            <div class="font-body-md text-on-surface-variant">Pegawai Nonaktif</div>
        </div>
    </div>
</div>

@if($totalEmployees > 0)
<!-- Grid 6 Chart: 2 Kolom x 3 Baris -->
<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
    <!-- CHART 1: Tingkat Pendidikan (Horizontal Bar) -->
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)]">
        <h4 class="font-headline-sm text-[16px] text-on-surface mb-1">Tingkat Pendidikan</h4>
        <p class="font-body-md text-[12px] text-on-surface-variant mb-4">Distribusi jenjang pendidikan pegawai</p>
        @if(count($educationData) > 0)
            <canvas id="educationChart" height="220"></canvas>
        @else
            @include('components._chart_empty')
        @endif
    </div>

    <!-- CHART 2: Demografi Umur (Doughnut) -->
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)]">
        <h4 class="font-headline-sm text-[16px] text-on-surface mb-1">Demografi Umur</h4>
        <p class="font-body-md text-[12px] text-on-surface-variant mb-4">Distribusi usia pegawai</p>
        @if(array_sum($ageDistribution) > 0)
            <canvas id="ageChart" height="220"></canvas>
        @else
            @include('components._chart_empty')
        @endif
    </div>

    <!-- CHART 3: Rasio Jenis Kelamin (Pie) -->
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)]">
        <h4 class="font-headline-sm text-[16px] text-on-surface mb-1">Rasio Jenis Kelamin</h4>
        <p class="font-body-md text-[12px] text-on-surface-variant mb-4">Perbandingan laki-laki dan perempuan</p>
        @if(count($genderData) > 0)
            <canvas id="genderChart" height="220"></canvas>
        @else
            @include('components._chart_empty')
        @endif
    </div>

    <!-- CHART 4: Status Kepegawaian (Doughnut) -->
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)]">
        <h4 class="font-headline-sm text-[16px] text-on-surface mb-1">Status Kepegawaian</h4>
        <p class="font-body-md text-[12px] text-on-surface-variant mb-4">Tetap, Kontrak, dan Magang</p>
        @if(count($employmentStatusData) > 0)
            <canvas id="employmentChart" height="220"></canvas>
        @else
            @include('components._chart_empty')
        @endif
    </div>

    <!-- CHART 5: Komposisi Departemen (Bar) -->
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)]">
        <h4 class="font-headline-sm text-[16px] text-on-surface mb-1">Komposisi Departemen</h4>
        <p class="font-body-md text-[12px] text-on-surface-variant mb-4">Jumlah pegawai per departemen</p>
        @if(count($departmentData) > 0)
            <canvas id="departmentChart" height="220"></canvas>
        @else
            @include('components._chart_empty')
        @endif
    </div>

    <!-- CHART 6: Rata-rata Gaji per Departemen (Bar) -->
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0px_1px_3px_rgba(0,0,0,0.1)]">
        <h4 class="font-headline-sm text-[16px] text-on-surface mb-1">Rata-rata Gaji per Departemen</h4>
        <p class="font-body-md text-[12px] text-on-surface-variant mb-4">Beban gaji rata-rata (Rp)</p>
        @if(count($avgSalaryData) > 0)
            <canvas id="salaryChart" height="220"></canvas>
        @else
            @include('components._chart_empty')
        @endif
    </div>
</div>

<!-- Chart.js Scripts with Datalabels -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    Chart.register(ChartDataLabels);

    const barDatalabels = {
        anchor: 'end',
        align: 'end',
        color: '#0b1c30',
        font: { weight: '600', size: 12 },
        formatter: (value) => value > 0 ? value : ''
    };

    const pieDatalabels = {
        color: '#ffffff',
        font: { weight: '700', size: 12 },
        formatter: (value, ctx) => {
            const total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
            if (total === 0 || value === 0) return '';
            const pct = ((value / total) * 100).toFixed(1);
            return pct + '%';
        }
    };

    const palette = ['#4f46e5','#3525cd','#c3c0ff','#a44100','#ffb695','#565e74','#dae2fd','#4d44e3','#ba1a1a'];

    // CHART 1: Tingkat Pendidikan
    @if(count($educationData) > 0)
    const eduData = @json($educationData);
    new Chart(document.getElementById('educationChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(eduData),
            datasets: [{ label: 'Jumlah', data: Object.values(eduData), backgroundColor: '#4f46e5', borderRadius: 6 }]
        },
        options: {
            indexAxis: 'y', responsive: true,
            plugins: { legend: { display: false }, datalabels: barDatalabels },
            scales: { x: { beginAtZero: true, ticks: { stepSize: 1 } } }
        }
    });
    @endif

    // CHART 2: Demografi Umur
    @if(array_sum($ageDistribution) > 0)
    const ageData = @json($ageDistribution);
    new Chart(document.getElementById('ageChart'), {
        type: 'doughnut',
        data: {
            labels: Object.keys(ageData),
            datasets: [{ data: Object.values(ageData), backgroundColor: ['#c3c0ff','#4f46e5','#3525cd','#0f0069'] }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' }, datalabels: pieDatalabels } }
    });
    @endif

    // CHART 3: Rasio Jenis Kelamin
    @if(count($genderData) > 0)
    const genderData = @json($genderData);
    new Chart(document.getElementById('genderChart'), {
        type: 'pie',
        data: {
            labels: Object.keys(genderData),
            datasets: [{ data: Object.values(genderData), backgroundColor: ['#4f46e5','#ffb695'] }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' }, datalabels: pieDatalabels } }
    });
    @endif

    // CHART 4: Status Kepegawaian
    @if(count($employmentStatusData) > 0)
    const empStatusData = @json($employmentStatusData);
    new Chart(document.getElementById('employmentChart'), {
        type: 'doughnut',
        data: {
            labels: Object.keys(empStatusData),
            datasets: [{ data: Object.values(empStatusData), backgroundColor: ['#3525cd','#a44100','#bec6e0'] }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' }, datalabels: pieDatalabels } }
    });
    @endif

    // CHART 5: Komposisi Departemen
    @if(count($departmentData) > 0)
    const deptData = @json($departmentData);
    new Chart(document.getElementById('departmentChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(deptData),
            datasets: [{ label: 'Jumlah Pegawai', data: Object.values(deptData), backgroundColor: palette.slice(0, Object.keys(deptData).length), borderRadius: 6 }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false }, datalabels: barDatalabels },
            scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
        }
    });
    @endif

    // CHART 6: Rata-rata Gaji
    @if(count($avgSalaryData) > 0)
    const salaryData = @json($avgSalaryData);
    new Chart(document.getElementById('salaryChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(salaryData),
            datasets: [{ label: 'Rata-rata Gaji (Rp)', data: Object.values(salaryData), backgroundColor: '#3525cd', borderRadius: 6 }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                datalabels: {
                    anchor: 'end', align: 'end', color: '#0b1c30',
                    font: { weight: '600', size: 11 },
                    formatter: (value) => value === 0 ? '' : 'Rp ' + Number(value).toLocaleString('id-ID')
                }
            },
            scales: {
                y: { beginAtZero: true, ticks: { callback: (v) => 'Rp ' + v.toLocaleString('id-ID') } }
            }
        }
    });
    @endif
});
</script>

@else
<!-- Empty State: Belum ada data pegawai sama sekali -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-12 shadow-[0_1px_3px_rgba(0,0,0,0.1)]">
    <div class="flex flex-col items-center justify-center text-center">
        <div class="h-20 w-20 bg-surface-container rounded-full flex items-center justify-center mb-5 border border-outline-variant border-dashed">
            <span class="material-symbols-outlined text-outline text-[40px]">bar_chart</span>
        </div>
        <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">Belum Ada Data Pegawai</h3>
        <p class="font-body-md text-body-lg text-on-surface-variant max-w-md mb-6">
            Grafik dan statistik akan muncul setelah Anda menambahkan data pegawai ke dalam sistem. Mulai dengan menambahkan pegawai pertama.
        </p>
        <a href="{{ route('employees.create') }}" class="bg-primary text-on-primary h-10 px-6 rounded-lg font-label-md flex items-center justify-center hover:opacity-90 transition-opacity shadow-sm">
            <span class="material-symbols-outlined mr-2 text-[18px]">person_add</span>
            Tambah Pegawai Pertama
        </a>
    </div>
</div>
@endif
@endsection
