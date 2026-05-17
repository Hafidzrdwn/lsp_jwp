@extends('layouts.app')

@section('content')
<h3 class="text-3xl font-medium text-gray-700 mb-6">Dashboard</h3>

<!-- Stats Cards -->
<div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm border border-gray-100">
        <div class="p-3 bg-blue-600 bg-opacity-10 rounded-full">
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <div class="mx-5">
            <h4 class="text-2xl font-semibold text-gray-700">{{ $totalEmployees }}</h4>
            <div class="text-gray-500">Total Employees</div>
        </div>
    </div>

    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm border border-gray-100">
        <div class="p-3 bg-green-600 bg-opacity-10 rounded-full">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div class="mx-5">
            <h4 class="text-2xl font-semibold text-gray-700">{{ $activeEmployees }}</h4>
            <div class="text-gray-500">Active Employees</div>
        </div>
    </div>

    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm border border-gray-100">
        <div class="p-3 bg-red-600 bg-opacity-10 rounded-full">
            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div class="mx-5">
            <h4 class="text-2xl font-semibold text-gray-700">{{ $inactiveEmployees }}</h4>
            <div class="text-gray-500">Inactive Employees</div>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="grid grid-cols-1 gap-6 lg:grid-cols-2 xl:grid-cols-3">
    <!-- Gender Chart -->
    <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100">
        <h4 class="text-lg font-semibold text-gray-700 mb-4">Gender Distribution</h4>
        <canvas id="genderChart"></canvas>
    </div>

    <!-- Age Chart -->
    <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100">
        <h4 class="text-lg font-semibold text-gray-700 mb-4">Age Distribution</h4>
        <canvas id="ageChart"></canvas>
    </div>

    <!-- Education Chart -->
    <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100 xl:col-span-1 lg:col-span-2">
        <h4 class="text-lg font-semibold text-gray-700 mb-4">Education Level</h4>
        <canvas id="educationChart"></canvas>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Gender Chart (Bar)
        const ctxGender = document.getElementById('genderChart').getContext('2d');
        const genderData = @json($genderData);
        new Chart(ctxGender, {
            type: 'bar',
            data: {
                labels: Object.keys(genderData),
                datasets: [{
                    label: 'Total',
                    data: Object.values(genderData),
                    backgroundColor: ['#3b82f6', '#ec4899'],
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
        });

        // Age Chart (Doughnut)
        const ctxAge = document.getElementById('ageChart').getContext('2d');
        const ageData = @json($ageDistribution);
        new Chart(ctxAge, {
            type: 'doughnut',
            data: {
                labels: Object.keys(ageData),
                datasets: [{
                    data: Object.values(ageData),
                    backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                }]
            },
            options: { responsive: true }
        });

        // Education Chart (Bar)
        const ctxEdu = document.getElementById('educationChart').getContext('2d');
        const eduData = @json($educationData);
        new Chart(ctxEdu, {
            type: 'bar',
            data: {
                labels: Object.keys(eduData),
                datasets: [{
                    label: 'Total',
                    data: Object.values(eduData),
                    backgroundColor: '#8b5cf6',
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
        });
    });
</script>
@endsection
