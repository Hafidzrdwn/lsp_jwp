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
    /**
     * Menampilkan daftar pegawai dengan fitur pencarian, filter, sorting, dan paginasi.
     */
    public function index(Request $request)
    {
        // Tangkap parameter query string
        $search = $request->input('search');
        $departmentFilter = $request->input('department_id');
        $positionFilter = $request->input('position_id');
        $statusFilter = $request->input('employment_status');
        $activeFilter = $request->input('is_active');
        $sortBy = $request->input('sort_by', 'created_at');
        $sortDir = $request->input('sort_dir', 'desc');

        // Whitelist kolom yang bisa di-sort untuk keamanan
        $allowedSorts = ['nik', 'full_name', 'email', 'employment_status', 'is_active', 'created_at'];
        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'created_at';
        }
        $sortDir = in_array($sortDir, ['asc', 'desc']) ? $sortDir : 'desc';

        $employees = Employee::with(['department', 'position', 'education'])
            // Pencarian berdasarkan NIK, Nama, atau Email
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('full_name', 'like', "%{$search}%")
                      ->orWhere('nik', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            // Filter berdasarkan Departemen
            ->when($departmentFilter, function ($query, $departmentFilter) {
                return $query->where('department_id', $departmentFilter);
            })
            // Filter berdasarkan Jabatan
            ->when($positionFilter, function ($query, $positionFilter) {
                return $query->where('position_id', $positionFilter);
            })
            // Filter berdasarkan Status Kepegawaian
            ->when($statusFilter, function ($query, $statusFilter) {
                return $query->where('employment_status', $statusFilter);
            })
            // Filter berdasarkan Status Aktif (perlu penanganan khusus karena '0' falsy)
            ->when($activeFilter !== null && $activeFilter !== '', function ($query) use ($activeFilter) {
                return $query->where('is_active', $activeFilter);
            })
            ->orderBy($sortBy, $sortDir)
            ->paginate(10)
            // Pertahankan semua parameter query saat berpindah halaman
            ->appends($request->query());

        // Data untuk dropdown filter
        $departments = Department::orderBy('name')->get();
        $positions = Position::orderBy('name')->get();

        return view('employees.index', compact(
            'employees',
            'search',
            'departments',
            'positions',
            'departmentFilter',
            'positionFilter',
            'statusFilter',
            'activeFilter',
            'sortBy',
            'sortDir'
        ));
    }

    /**
     * Menampilkan form tambah pegawai baru.
     */
    public function create()
    {
        $departments = Department::orderBy('name')->get();
        $positions = Position::orderBy('name')->get();
        $educations = Education::orderBy('id')->get();
        return view('employees.create', compact('departments', 'positions', 'educations'));
    }

    /**
     * Menyimpan data pegawai baru ke database.
     */
    public function store(StoreEmployeeRequest $request)
    {
        // Normalisasi checkbox is_active
        $data = $request->validated();
        $data['is_active'] = $request->is_active ? 1 : 0;

        Employee::create($data);
        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail lengkap data pegawai.
     */
    public function show(Employee $employee)
    {
        $employee->load(['department', 'position', 'education']);
        return view('employees.show', compact('employee'));
    }

    /**
     * Menampilkan form edit data pegawai.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::orderBy('name')->get();
        $positions = Position::orderBy('name')->get();
        $educations = Education::orderBy('id')->get();
        return view('employees.edit', compact('employee', 'departments', 'positions', 'educations'));
    }

    /**
     * Memperbarui data pegawai yang ada di database.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();
        $data['is_active'] = $request->is_active ? 1 : 0;
        $employee->update($data);
        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Menghapus data pegawai dari database.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
