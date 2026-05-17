<nav :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="bg-surface dark:bg-on-surface h-screen w-[256px] fixed left-0 top-0 border-r border-outline-variant dark:border-outline z-20 transition-transform duration-300">
    <div class="flex flex-col h-full py-6">
        <!-- Header -->
        <div class="px-6 mb-8 flex items-center gap-3">
            <img alt="Web Logo" class="w-14 h-14 object-contain" src="{{ asset('images/logo.png') }}"/>
            <div>
                <h1 class="text-headline-sm font-headline-sm font-bold text-primary dark:text-inverse-primary">EmpManage</h1>
                <span class="font-label-sm text-label-md text-on-surface-variant block mt-0.5">Admin Panel</span>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="flex flex-col flex-1 px-4 gap-y-3 font-body-md text-body-md text-on-surface-variant dark:text-outline-variant">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded hover:bg-surface-container-low text-on-surface-variant transition-colors duration-200 ml-1 {{ request()->routeIs('dashboard') ? 'bg-secondary-container text-primary border-l-4 border-primary font-bold ml-0' : 'border-l-4 border-transparent' }}">
                <span class="material-symbols-outlined text-[20px]" data-icon="dashboard">dashboard</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('employees.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded hover:bg-surface-container-low text-on-surface-variant transition-colors duration-200 ml-1 {{ request()->routeIs('employees.*') ? 'bg-secondary-container text-primary border-l-4 border-primary font-bold ml-0' : 'border-l-4 border-transparent' }}">
                <span class="material-symbols-outlined text-[20px]" data-icon="group">group</span>
                <span>Employees</span>
            </a>
            
            <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded hover:bg-error-container text-on-surface-variant hover:text-on-error-container transition-colors duration-200 ml-1 border-l-4 border-transparent cursor-pointer">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</nav>
