<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Manajemen Pegawai - @yield('title')</title>
    
    <!-- Material Symbols Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    
    <!-- Tailwind CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- CSS Custom -->
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    
    <!-- External Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body x-data="{ sidebarOpen: true }" class="bg-background font-body-md text-body-md text-on-background min-h-screen selection:bg-primary-container selection:text-on-primary-container relative">
    
    @include('components.sidebar')
    @include('components.topbar')

    <!-- Main Content Area -->
    <main :class="sidebarOpen ? 'ml-[256px]' : 'ml-0'" class="pt-[64px] min-h-screen transition-all duration-300">
        <div class="px-8 pt-6 pb-8 max-w-7xl mx-auto">
            @yield('content')
        </div>
    </main>

    <!-- SweetAlert flash messages -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: true,
                confirmButtonText: 'OK',
                confirmButtonColor: '#4f46e5'
            });
        </script>
    @endif
</body>
</html>
