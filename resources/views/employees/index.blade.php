@extends('layouts.app')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface">Employees</h2>
        <p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage all your company personnel.</p>
    </div>
    <a href="{{ route('employees.create') }}" class="bg-primary text-on-primary h-10 px-4 rounded-lg font-label-md flex items-center justify-center hover:opacity-90 transition-opacity shadow-sm">
        <span class="material-symbols-outlined mr-2 text-[20px]">add</span>
        Add Employee
    </a>
</div>

<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-6 shadow-[0_1px_3px_rgba(0,0,0,0.1)]">
    <!-- Search bar -->
    <div class="mb-6 flex">
        <form action="{{ route('employees.index') }}" method="GET" class="flex w-full max-w-md relative focus-within:ring-2 focus-within:ring-primary rounded-lg overflow-hidden border border-outline-variant">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px]">search</span>
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search by Name or NIP..." class="w-full h-10 pl-10 pr-4 bg-surface hover:bg-surface-container-low focus:outline-none focus:ring-0 text-on-surface font-body-md">
            <button type="submit" class="px-4 bg-surface-container hover:bg-surface-variant text-on-surface-variant font-label-md border-l border-outline-variant transition-colors cursor-pointer">Search</button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-outline-variant">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-surface text-left font-label-sm text-on-surface-variant uppercase tracking-wider">NIP</th>
                    <th class="px-6 py-3 bg-surface text-left font-label-sm text-on-surface-variant uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 bg-surface text-left font-label-sm text-on-surface-variant uppercase tracking-wider">Department/Position</th>
                    <th class="px-6 py-3 bg-surface text-left font-label-sm text-on-surface-variant uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 bg-surface text-left font-label-sm text-on-surface-variant uppercase tracking-wider">Actions</th>
                </tr>
            </thead>

            <tbody class="bg-surface-container-lowest divide-y divide-outline-variant">
                @forelse($employees as $employee)
                <tr class="hover:bg-surface-container-low transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap font-body-md text-on-surface">{{ $employee->nip }}</td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-label-md text-on-surface">{{ $employee->full_name }}</div>
                        <div class="font-body-md text-on-surface-variant text-sm">{{ $employee->email }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-body-md text-on-surface">{{ $employee->department->name ?? '-' }}</div>
                        <div class="font-body-md text-on-surface-variant text-sm">{{ $employee->position->name ?? '-' }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($employee->is_active)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-secondary-container text-on-secondary-container">Active</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-error-container text-on-error-container">Inactive</span>
                        @endif
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap font-label-md">
                        <a href="{{ route('employees.edit', $employee) }}" class="text-primary hover:text-primary-fixed-variant mr-3">Edit</a>
                        
                        <button type="button" onclick="confirmDelete({{ $employee->id }})" class="text-error hover:opacity-80 focus:outline-none cursor-pointer">Delete</button>

                        <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center font-body-md text-on-surface-variant">No employees found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-6">
        {{ $employees->appends(['search' => $search ?? ''])->links() }}
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--color-error)',
            cancelButtonColor: 'var(--color-outline)',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
@endsection
