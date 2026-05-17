<header :class="sidebarOpen ? 'w-[calc(100%-256px)]' : 'w-full'" class="bg-surface dark:bg-on-surface fixed top-0 right-0 h-[64px] border-b border-outline-variant dark:border-outline z-30 transition-all duration-300">
    <div class="flex justify-between items-center px-6 h-full">
        <!-- Left: Toggle & Breadcrumbs -->
        <div class="flex items-center gap-4 h-full">
            <!-- Sidebar Toggle Button -->
            <button @click="sidebarOpen = !sidebarOpen" class="flex items-center justify-center p-2 rounded-lg hover:bg-surface-container-low transition-colors duration-200 text-on-surface hover:text-primary focus:ring-2 focus:ring-primary focus:ring-offset-2 outline-none cursor-pointer">
                <span
                    class="material-symbols-outlined text-[24px]"
                    x-text="sidebarOpen ? 'left_panel_close' : 'left_panel_open'">
                </span>
            </button>

            <!-- Breadcrumbs -->
            <nav aria-label="Breadcrumb" class="flex items-center text-on-surface-variant font-label-md text-[14px]">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a class="inline-flex items-center hover:text-primary transition-colors" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    @if(request()->routeIs('employees.*'))
                    <li>
                        <div class="flex items-center">
                            <span class="material-symbols-outlined text-[16px] text-outline mx-1">chevron_right</span>
                            <span class="text-on-surface ml-1 font-medium">Master Pegawai</span>
                        </div>
                    </li>
                    @endif
                </ol>
            </nav>
        </div>

        <!-- User Profile -->
        <div class="flex items-center gap-4 h-full">
            <div class="text-right hidden sm:flex flex-col justify-center h-full">
                <div class="font-headline-sm text-[14px] text-on-surface font-semibold leading-tight">{{ strtoupper(Auth::user()->name) }}</div>
                <div class="font-body-md text-[12px] text-on-surface-variant">{{ Auth::user()->email }}</div>
            </div>

            <div aria-label="User Avatar" class="h-10 w-10 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold text-[16px] border border-outline-variant shadow-sm shrink-0">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
        </div>
    </div>
</header>