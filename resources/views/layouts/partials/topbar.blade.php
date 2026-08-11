<header class="sticky top-0 z-30 flex h-16 shrink-0 items-center gap-4 border-b border-gray-200 bg-white px-4 sm:px-6 lg:px-8 dark:border-gray-700 dark:bg-gray-800">
    <!-- Hamburger (mobile) -->
    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-gray-700 lg:hidden dark:text-gray-400 dark:hover:text-gray-200">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </button>

    <!-- Page title -->
    <div class="min-w-0 flex-1">
        {{ $header ?? '' }}
    </div>

    <!-- Profile dropdown -->
    <div class="flex items-center gap-4">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center gap-2 rounded-full text-sm focus:outline-none">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-100 text-sm font-semibold text-indigo-700 dark:bg-indigo-900 dark:text-indigo-200">
                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <span class="hidden text-sm font-medium text-gray-700 sm:block dark:text-gray-200">{{ Auth::user()->name ?? '' }}</span>
                    <svg class="hidden h-4 w-4 text-gray-400 sm:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</header>
