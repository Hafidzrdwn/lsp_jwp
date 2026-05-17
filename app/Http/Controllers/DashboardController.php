<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $activeEmployees = Employee::where('is_active', true)->count();
        $inactiveEmployees = Employee::where('is_active', false)->count();

        // Data for Gender Chart (Bar Chart)
        $genderData = Employee::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->pluck('total', 'gender')
            ->toArray();

        // Data for Age Distribution (Doughnut Chart)
        $ageDistribution = [
            '<25' => 0,
            '25-35' => 0,
            '>35' => 0,
        ];
        
        $employeesAge = Employee::select('birth_date')->get();
        foreach ($employeesAge as $emp) {
            $age = \Carbon\Carbon::parse($emp->birth_date)->age;
            if ($age < 25) {
                $ageDistribution['<25']++;
            } elseif ($age >= 25 && $age <= 35) {
                $ageDistribution['25-35']++;
            } else {
                $ageDistribution['>35']++;
            }
        }

        // Data for Education Level (Bar Chart)
        $educationData = Employee::join('educations', 'employees.education_id', '=', 'educations.id')
            ->select('educations.degree', DB::raw('count(*) as total'))
            ->groupBy('educations.degree')
            ->pluck('total', 'degree')
            ->toArray();

        return view('dashboard', compact(
            'totalEmployees', 
            'activeEmployees', 
            'inactiveEmployees', 
            'genderData', 
            'ageDistribution', 
            'educationData'
        ));
    }
}
