<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\Education;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $employees = Employee::with(['department', 'position', 'education'])
            ->when($search, function ($query, $search) {
                return $query->where('full_name', 'like', "%{$search}%")
                             ->orWhere('nip', 'like', "%{$search}%");
            })
            ->paginate(10);
            
        return view('employees.index', compact('employees', 'search'));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        $educations = Education::all();
        return view('employees.create', compact('departments', 'positions', 'educations'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        $employee->load(['department', 'position', 'education']);
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = Position::all();
        $educations = Education::all();
        return view('employees.edit', compact('employee', 'departments', 'positions', 'educations'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
