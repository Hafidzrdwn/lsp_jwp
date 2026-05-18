@extends('layouts.app')

@section('title', 'Master Pegawai')

@section('content')
<!-- Header -->
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface">Master Pegawai</h2>
        <p class="font-body-md text-body-lg text-on-surface-variant mt-1">Kelola seluruh data pegawai perusahaan.</p>
    </div>
    <a href="{{ route('employees.create') }}" class="bg-primary text-on-primary h-10 px-5 rounded-lg font-label-md flex items-center justify-center hover:opacity-90 transition-opacity shadow-sm shrink-0">
        <span class="material-symbols-outlined mr-2 text-[20px]">person_add</span>
        Tambah Pegawai
    </a>
</div>

<!-- Kartu Tabel -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-[0_1px_3px_rgba(0,0,0,0.1)]">

    <!-- Toolbar: Pencarian & Filter -->
    <div class="p-4 border-b border-outline-variant" x-data="{ showFilter: false }">
        <form action="{{ route('employees.index') }}" method="GET">
            <div class="flex flex-col lg:flex-row lg:items-center gap-3">
                <!-- Input Pencarian -->
                <div class="relative flex-1 max-w-md">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px]">search</span>
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari NIK, nama, atau email..." class="w-full h-10 pl-10 pr-4 bg-surface border border-outline-variant rounded-lg text-on-surface font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-offset-2 hover:bg-surface-container-low transition-colors">
                </div>

                <!-- Tombol Toggle Filter & Submit -->
                <div class="flex items-center gap-2">
                    <button type="button" @click="showFilter = !showFilter" class="h-10 px-4 rounded-lg border border-outline-variant bg-surface text-on-surface-variant font-label-md hover:bg-surface-container-low transition-colors cursor-pointer flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">filter_list</span>
                        Filter
                    </button>
                    <button type="submit" class="h-10 px-5 rounded-lg bg-primary text-on-primary font-label-md hover:opacity-90 transition-opacity cursor-pointer flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">search</span>
                        Cari
                    </button>
                    @if($search || $departmentFilter || $positionFilter || $statusFilter || ($activeFilter !== null && $activeFilter !== ''))
                        <a href="{{ route('employees.index') }}" class="h-10 px-4 rounded-lg border border-error text-error font-label-md hover:bg-error-container transition-colors flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">close</span>
                            Reset
                        </a>
                    @endif
                </div>
            </div>

            <!-- Panel Filter (Collapsible) -->
            <div x-show="showFilter" x-transition class="mt-4 pt-4 border-t border-outline-variant grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <div>
                    <label class="block font-label-md text-[12px] text-on-surface-variant mb-1">Departemen</label>
                    <select name="department_id" class="w-full h-10 px-3 bg-surface border border-outline-variant rounded-lg text-on-surface font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        <option value="">Semua Departemen</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}" {{ $departmentFilter == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-label-md text-[12px] text-on-surface-variant mb-1">Jabatan</label>
                    <select name="position_id" class="w-full h-10 px-3 bg-surface border border-outline-variant rounded-lg text-on-surface font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        <option value="">Semua Jabatan</option>
                        @foreach($positions as $pos)
                            <option value="{{ $pos->id }}" {{ $positionFilter == $pos->id ? 'selected' : '' }}>{{ $pos->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-label-md text-[12px] text-on-surface-variant mb-1">Status Kerja</label>
                    <select name="employment_status" class="w-full h-10 px-3 bg-surface border border-outline-variant rounded-lg text-on-surface font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        <option value="">Semua Status</option>
                        <option value="Tetap" {{ $statusFilter == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                        <option value="Kontrak" {{ $statusFilter == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                        <option value="Magang" {{ $statusFilter == 'Magang' ? 'selected' : '' }}>Magang</option>
                    </select>
                </div>
                <div>
                    <label class="block font-label-md text-[12px] text-on-surface-variant mb-1">Status Aktif</label>
                    <select name="is_active" class="w-full h-10 px-3 bg-surface border border-outline-variant rounded-lg text-on-surface font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        <option value="">Semua</option>
                        <option value="1" {{ $activeFilter === '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $activeFilter === '0' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <!-- Tabel Data Pegawai -->
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="border-b border-outline-variant">
                    @php
                        // Helper untuk membuat URL sort
                        $sortParams = request()->query();
                        function sortUrl($column, $currentSort, $currentDir, $params) {
                            $dir = ($currentSort === $column && $currentDir === 'asc') ? 'desc' : 'asc';
                            return request()->url() . '?' . http_build_query(array_merge($params, ['sort_by' => $column, 'sort_dir' => $dir]));
                        }
                        function sortIcon($column, $currentSort, $currentDir) {
                            if ($currentSort !== $column) return 'unfold_more';
                            return $currentDir === 'asc' ? 'arrow_upward' : 'arrow_downward';
                        }
                    @endphp
                    <th class="px-4 py-3 bg-surface-container-low text-left font-label-md text-[12px] text-on-surface-variant uppercase tracking-wider">
                        <a href="{{ sortUrl('nik', $sortBy, $sortDir, $sortParams) }}" class="inline-flex items-center gap-1 hover:text-primary transition-colors">
                            NIK <span class="material-symbols-outlined text-[14px]">{{ sortIcon('nik', $sortBy, $sortDir) }}</span>
                        </a>
                    </th>
                    <th class="px-4 py-3 bg-surface-container-low text-left font-label-md text-[12px] text-on-surface-variant uppercase tracking-wider">
                        <a href="{{ sortUrl('full_name', $sortBy, $sortDir, $sortParams) }}" class="inline-flex items-center gap-1 hover:text-primary transition-colors">
                            Nama Pegawai <span class="material-symbols-outlined text-[14px]">{{ sortIcon('full_name', $sortBy, $sortDir) }}</span>
                        </a>
                    </th>
                    <th class="px-4 py-3 bg-surface-container-low text-left font-label-md text-[12px] text-on-surface-variant uppercase tracking-wider">Departemen</th>
                    <th class="px-4 py-3 bg-surface-container-low text-left font-label-md text-[12px] text-on-surface-variant uppercase tracking-wider">Jabatan</th>
                    <th class="px-4 py-3 bg-surface-container-low text-left font-label-md text-[12px] text-on-surface-variant uppercase tracking-wider">
                        <a href="{{ sortUrl('employment_status', $sortBy, $sortDir, $sortParams) }}" class="inline-flex items-center gap-1 hover:text-primary transition-colors">
                            Status Kerja <span class="material-symbols-outlined text-[14px]">{{ sortIcon('employment_status', $sortBy, $sortDir) }}</span>
                        </a>
                    </th>
                    <th class="px-4 py-3 bg-surface-container-low text-left font-label-md text-[12px] text-on-surface-variant uppercase tracking-wider">
                        <a href="{{ sortUrl('is_active', $sortBy, $sortDir, $sortParams) }}" class="inline-flex items-center gap-1 hover:text-primary transition-colors">
                            Status Aktif <span class="material-symbols-outlined text-[14px]">{{ sortIcon('is_active', $sortBy, $sortDir) }}</span>
                        </a>
                    </th>
                    <th class="px-4 py-3 bg-surface-container-low text-center font-label-md text-[12px] text-on-surface-variant uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>

            <tbody class="bg-surface-container-lowest divide-y divide-outline-variant">
                @forelse($employees as $employee)
                <tr class="hover:bg-surface-container-low transition-colors">
                    <td class="px-4 py-3 whitespace-nowrap font-body-md text-[13px] text-on-surface font-mono">{{ $employee->nik }}</td>

                    <td class="px-4 py-3 whitespace-nowrap">
                        <div class="font-label-md text-[13px] text-on-surface">{{ $employee->full_name }}</div>
                        <div class="font-body-md text-[12px] text-on-surface-variant">{{ $employee->email }}</div>
                    </td>

                    <td class="px-4 py-3 whitespace-nowrap font-body-md text-[13px] text-on-surface">{{ '(' . $employee->department->code . ') ' . $employee->department->name ?? '-' }}</td>

                    <td class="px-4 py-3 whitespace-nowrap font-body-md text-[13px] text-on-surface">{{ $employee->position->name ?? '-' }}</td>

                    <!-- Badge Status Kerja -->
                    <td class="px-4 py-3 whitespace-nowrap">
                        @if($employee->employment_status === 'Tetap')
                            <span class="px-2.5 py-0.5 inline-flex text-[11px] font-semibold rounded-full bg-primary-fixed text-on-primary-fixed">Tetap</span>
                        @elseif($employee->employment_status === 'Kontrak')
                            <span class="px-2.5 py-0.5 inline-flex text-[11px] font-semibold rounded-full bg-tertiary-fixed text-on-tertiary-fixed">Kontrak</span>
                        @else
                            <span class="px-2.5 py-0.5 inline-flex text-[11px] font-semibold rounded-full bg-secondary-container text-on-secondary-container">Magang</span>
                        @endif
                    </td>

                    <!-- Badge Status Aktif -->
                    <td class="px-4 py-3 whitespace-nowrap">
                        @if($employee->is_active)
                            <span class="px-2.5 py-0.5 inline-flex text-[11px] font-semibold rounded-full bg-secondary-container text-primary">Aktif</span>
                        @else
                            <span class="px-2.5 py-0.5 inline-flex text-[11px] font-semibold rounded-full bg-error-container text-on-error-container">Nonaktif</span>
                        @endif
                    </td>

                    <!-- Aksi -->
                    <td class="px-4 py-3 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route('employees.show', $employee) }}" class="p-1.5 rounded-lg hover:bg-surface-container transition-colors text-on-surface-variant" title="Lihat Detail">
                                <span class="material-symbols-outlined text-[20px]">visibility</span>
                            </a>
                            <a href="{{ route('employees.edit', $employee) }}" class="p-1.5 rounded-lg hover:bg-surface-container transition-colors text-primary" title="Edit">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </a>
                            <button type="button" onclick="confirmDelete({{ $employee->id }})" class="p-1.5 rounded-lg hover:bg-error-container transition-colors text-error cursor-pointer" title="Hapus">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                            <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-16 text-center">
                        <div class="flex flex-col items-center">
                            <div class="h-16 w-16 bg-surface-container rounded-full flex items-center justify-center mb-4 border border-outline-variant border-dashed">
                                <span class="material-symbols-outlined text-outline text-[32px]">person_off</span>
                            </div>
                            <h4 class="font-headline-sm text-[16px] text-on-surface mb-1">Data Tidak Ditemukan</h4>
                            <p class="font-body-md text-[13px] text-on-surface-variant max-w-sm">Belum ada data pegawai yang cocok dengan kriteria pencarian atau filter Anda. Coba ubah kata kunci atau reset filter.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginasi -->
    @if($employees->hasPages())
    <div class="p-4 border-t border-outline-variant">
        {{ $employees->links() }}
    </div>
    @endif
</div>

<!-- SweetAlert2 Konfirmasi Hapus -->
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Data pegawai yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ba1a1a',
            cancelButtonColor: '#777587',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
@endsection
