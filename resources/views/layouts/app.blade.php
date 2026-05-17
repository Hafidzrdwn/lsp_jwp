<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Employee Management') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts and CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- CDNs for SweetAlert2 and Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- AlpineJS for interactive UI -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto bg-white border-r"
               :class="{'hidden': !sidebarOpen, 'block': sidebarOpen, 'md:block': true}">
            <h2 class="text-3xl font-bold text-center text-blue-600">EmpManage</h2>
            
            <div class="flex flex-col justify-between flex-1 mt-6">
                <nav>
                    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors transform rounded-md hover:bg-gray-100 hover:text-gray-700" 
                       href="{{ route('dashboard') }}">
                        <span class="mx-4 font-medium">Dashboard</span>
                    </a>

                    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors transform rounded-md hover:bg-gray-100 hover:text-gray-700" 
                       href="{{ route('employees.index') }}">
                        <span class="mx-4 font-medium">Employees</span>
                    </a>
                </nav>

                <div class="flex items-center px-4 -mx-2">
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-80">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex flex-col flex-1 overflow-hidden bg-gray-50">
            <!-- Topbar -->
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b shadow-sm">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none md:hidden">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="flex items-center">
                    <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
                <div class="container px-6 py-8 mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- SweetAlert flash messages -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
</body>
</html>
