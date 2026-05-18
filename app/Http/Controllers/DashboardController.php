<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // =============================================
        // STATISTIK KARTU UTAMA
        // =============================================
        $totalEmployees = Employee::count();
        $activeEmployees = Employee::where('is_active', true)->count();
        $inactiveEmployees = Employee::where('is_active', false)->count();

        // =============================================
        // CHART 1: Komposisi Departemen (Bar Chart)
        // Menghitung jumlah pegawai per departemen
        // =============================================
        $departmentData = Department::withCount('employees')
            ->orderBy('name')
            ->get()
            ->pluck('employees_count', 'name')
            ->toArray();

        // =============================================
        // CHART 2: Demografi Umur (Doughnut Chart)
        // Kategori: <25, 25-35, 36-45, >45
        // =============================================
        $ageDistribution = [
            '<25' => 0,
            '25-35' => 0,
            '36-45' => 0,
            '>45' => 0,
        ];

        $employeesAge = Employee::select('birth_date')->get();
        foreach ($employeesAge as $emp) {
            $age = Carbon::parse($emp->birth_date)->age;
            if ($age < 25) {
                $ageDistribution['<25']++;
            } elseif ($age <= 35) {
                $ageDistribution['25-35']++;
            } elseif ($age <= 45) {
                $ageDistribution['36-45']++;
            } else {
                $ageDistribution['>45']++;
            }
        }

        // =============================================
        // CHART 3: Rasio Jenis Kelamin (Pie Chart)
        // =============================================
        $genderData = Employee::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->pluck('total', 'gender')
            ->toArray();

        // =============================================
        // CHART 4: Status Kepegawaian (Doughnut Chart)
        // Tetap, Kontrak, Magang
        // =============================================
        $employmentStatusData = Employee::select('employment_status', DB::raw('count(*) as total'))
            ->groupBy('employment_status')
            ->pluck('total', 'employment_status')
            ->toArray();

        // =============================================
        // CHART 5: Tingkat Pendidikan (Horizontal Bar)
        // =============================================
        $educationData = Employee::join('educations', 'employees.education_id', '=', 'educations.id')
            ->select('educations.degree', DB::raw('count(*) as total'))
            ->groupBy('educations.degree')
            ->pluck('total', 'degree')
            ->toArray();

        // =============================================
        // CHART 6: Rata-rata Gaji per Departemen (Bar/Line)
        // =============================================
        $avgSalaryData = Employee::join('departments', 'employees.department_id', '=', 'departments.id')
            ->select('departments.name', DB::raw('ROUND(AVG(employees.basic_salary), 0) as avg_salary'))
            ->groupBy('departments.name')
            ->orderBy('departments.name')
            ->pluck('avg_salary', 'name')
            ->toArray();

        return view('dashboard', compact(
            'totalEmployees',
            'activeEmployees',
            'inactiveEmployees',
            'departmentData',
            'ageDistribution',
            'genderData',
            'employmentStatusData',
            'educationData',
            'avgSalaryData'
        ));
    }
}
