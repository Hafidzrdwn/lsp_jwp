@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h3 class="text-3xl font-medium text-gray-700">Employees</h3>
    <a href="{{ route('employees.create') }}" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 shadow-sm">
        Add Employee
    </a>
</div>

<div class="flex flex-col mt-8">
    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        
        <!-- Search bar -->
        <div class="mb-4">
            <form action="{{ route('employees.index') }}" method="GET" class="flex">
                <input type="text" name="search" value="{{ $search }}" placeholder="Search by Name or NIP..." class="w-full max-w-md px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 border-gray-300 shadow-sm">
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 border border-blue-600 rounded-r-md hover:bg-blue-700 shadow-sm">Search</button>
            </form>
        </div>

        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow-sm sm:rounded-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">NIP</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Department/Position</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Status</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @forelse($employees as $employee)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">{{ $employee->nip }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900 font-medium">{{ $employee->full_name }}</div>
                            <div class="text-sm leading-5 text-gray-500">{{ $employee->email }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">{{ $employee->department->name ?? '-' }}</div>
                            <div class="text-sm leading-5 text-gray-500">{{ $employee->position->name ?? '-' }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            @if($employee->is_active)
                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                            @else
                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">Inactive</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                            <a href="{{ route('employees.edit', $employee) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                            
                            <!-- Delete button triggering SweetAlert -->
                            <button type="button" onclick="confirmDelete({{ $employee->id }})" class="text-red-600 hover:text-red-900 focus:outline-none">Delete</button>

                            <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center border-b border-gray-200 text-gray-500">No employees found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mt-4">
            {{ $employees->appends(['search' => $search])->links() }}
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#3b82f6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
@endsection
