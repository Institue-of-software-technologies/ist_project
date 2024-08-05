<nav x-data="{ navOpen: false, notifOpen: false, msgOpen: false }" class="bg-white border-b border-gray-400 shadow-lg sticky top-0 z-10">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-2 py-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-blue-500" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    {{-- super-admin|admin routes --}}
                    <x-nav-link class="flex flex-col" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                            viewBox="0 0 50 50">
                            <path
                                d="M 25 1.0507812 C 24.7825 1.0507812 24.565859 1.1197656 24.380859 1.2597656 L 1.3808594 19.210938 C 0.95085938 19.550938 0.8709375 20.179141 1.2109375 20.619141 C 1.5509375 21.049141 2.1791406 21.129062 2.6191406 20.789062 L 4 19.710938 L 4 46 C 4 46.55 4.45 47 5 47 L 19 47 L 19 29 L 31 29 L 31 47 L 45 47 C 45.55 47 46 46.55 46 46 L 46 19.710938 L 47.380859 20.789062 C 47.570859 20.929063 47.78 21 48 21 C 48.3 21 48.589063 20.869141 48.789062 20.619141 C 49.129063 20.179141 49.049141 19.550938 48.619141 19.210938 L 25.619141 1.2597656 C 25.434141 1.1197656 25.2175 1.0507812 25 1.0507812 z M 35 5 L 35 6.0507812 L 41 10.730469 L 41 5 L 35 5 z"
                                fill="currentColor">
                            </path>
                        </svg>
                        {{ __('Dashboard') }}

                    </x-nav-link>

                    @can('view job')
                        <x-nav-link class="flex flex-col" :href="route('role-permission.job.index')" :active="request()->routeIs('role-permission.job.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 20 3 C 18.355469 3 17 4.355469 17 6 L 17 9 L 3 9 C 1.347656 9 0 10.347656 0 12 L 0 25 C 0 26.652344 1.347656 28 3 28 L 47 28 C 48.652344 28 50 26.652344 50 25 L 50 12 C 50 10.347656 48.652344 9 47 9 L 33 9 L 33 6 C 33 4.355469 31.644531 3 30 3 Z M 20 5 L 30 5 C 30.5625 5 31 5.4375 31 6 L 31 9 L 19 9 L 19 6 C 19 5.4375 19.4375 5 20 5 Z M 25 22 C 26.105469 22 27 22.894531 27 24 C 27 25.105469 26.105469 26 25 26 C 23.894531 26 23 25.105469 23 24 C 23 22.894531 23.894531 22 25 22 Z M 0 27 L 0 44 C 0 45.652344 1.347656 47 3 47 L 47 47 C 48.652344 47 50 45.652344 50 44 L 50 27 C 50 28.652344 48.652344 30 47 30 L 3 30 C 1.347656 30 0 28.652344 0 27 Z"
                                    fill="currentColor">
                                </path>
                            </svg>
                            {{ __('Jobs') }}
                        </x-nav-link>
                    @endcan
                    @can('view applications')
                        <x-nav-link class="flex flex-col" :href="route('job-application.list')" :active="request()->routeIs('job-application.list')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19ZM5 6V5H19V6H5Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('Job Applicants') }}
                        </x-nav-link>
                    @endcan
                    @can('view alumni profile')
                        <x-nav-link class="flex flex-col" :href="route('profiles.index')" :active="request()->routeIs('profiles.index')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('Alumni Profiles') }}
                        </x-nav-link>
                    @endcan
                    @can('view user')
                        <x-nav-link class="flex flex-col" :href="route('users.index')" :active="request()->routeIs('users.index')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('Users') }}
                        </x-nav-link>
                    @endcan
                    @can('view role')
                        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
                            {{ __('Roles') }}
                        </x-nav-link>
                    @endcan
                    @can('view permission')
                        <x-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')">
                            {{ __('Permissions') }}
                        </x-nav-link>
                    @endcan

                    {{-- Alumni routes --}}
                    @can('view alumni job')
                        <x-nav-link class="flex flex-col" :href="route('alumni.job.index')" :active="request()->routeIs('alumni.job.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 20 3 C 18.355469 3 17 4.355469 17 6 L 17 9 L 3 9 C 1.347656 9 0 10.347656 0 12 L 0 25 C 0 26.652344 1.347656 28 3 28 L 47 28 C 48.652344 28 50 26.652344 50 25 L 50 12 C 50 10.347656 48.652344 9 47 9 L 33 9 L 33 6 C 33 4.355469 31.644531 3 30 3 Z M 20 5 L 30 5 C 30.5625 5 31 5.4375 31 6 L 31 9 L 19 9 L 19 6 C 19 5.4375 19.4375 5 20 5 Z M 25 22 C 26.105469 22 27 22.894531 27 24 C 27 25.105469 26.105469 26 25 26 C 23.894531 26 23 25.105469 23 24 C 23 22.894531 23.894531 22 25 22 Z M 0 27 L 0 44 C 0 45.652344 1.347656 47 3 47 L 47 47 C 48.652344 47 50 45.652344 50 44 L 50 27 C 50 28.652344 48.652344 30 47 30 L 3 30 C 1.347656 30 0 28.652344 0 27 Z"
                                    fill="currentColor">
                                </path>
                            </svg>
                            {{ __('Jobs') }}
                        </x-nav-link>
                    @endcan

                    @can('view own applications')
                        <x-nav-link class="flex flex-col" :href="route('job-applications.index')" :active="request()->routeIs('job-applications.index')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19ZM5 6V5H19V6H5Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('My Applications') }}
                        </x-nav-link>
                    @endcan

                    {{-- Employer routes --}}
                    @can('view project')
                        <x-nav-link class="flex flex-col" :href="route('project.index')" :active="request()->routeIs('project.index')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 4H4C3.45 4 3 4.45 3 5V19C3 19.55 3.45 20 4 20H20C20.55 20 21 19.55 21 19V8C21 7.45 20.55 7 20 7H12L10 4ZM4 6H10.59L12.59 8H20V18H4V6Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('My Projects') }}
                        </x-nav-link>
                    @endcan


                    @can('view notification')
                        <!-- Notification Icon -->
                        <div class="relative p-3">
                            <button @click="notifOpen = !notifOpen"
                                class="relative flex items-center text-gray-900 text-3xl">
                                <i class="fa-solid fa-bell"></i>
                                <span
                                    class="absolute top-0 right-0 w-5 h-5 bg-red-600 rounded-full text-sm text-white flex items-center justify-center">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            </button>

                            <!-- Dropdown Content -->
                            <div x-show="notifOpen" @click.away="notifOpen = false"
                                class="origin-top-right absolute right-0 mt-10 lg:w-96 w-72 rounded-md shadow-lg bg-white ring-4 ring-red-400 ring-opacity-20">
                                <div class="py-1 p-10">
                                    @forelse (auth()->user()->unreadNotifications as $notification)
                                        <x-dropdown-link class="text-4xl font-bold text-red-600"
                                            href="{{ route('notifications.show', $notification->id) }}">
                                            {{ $notification->data['message'] }}
                                        </x-dropdown-link>
                                    @empty
                                        <x-dropdown-link>
                                            No new notifications
                                        </x-dropdown-link>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @endcan

                    {{-- @can('view profile')
                        <x-nav-link class="flex flex-col" :href="route('alumni.profile.view')" :active="request()->routeIs('alumni.profile.view')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('Me') }}
                        </x-nav-link>
                    @endcan --}}

                    <x-dropdown align="left" width="48">
                        <!-- Trigger Button -->
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-xl leading-4 font-medium rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                                        fill="currentColor" />
                                </svg>
                                {{ __('Me') }}
                                <svg class="fill-current h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <!-- Dropdown Content -->
                        <x-slot name="content">
                            <!-- View Profile Link -->
                            <x-dropdown-link :href="route('alumni.profile.view')">
                                {{ __('View Profile') }}
                            </x-dropdown-link>

                            <!-- Sign Out Form -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Sign Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>


                </div>
            </div>

            <div class="flex items-center">
                <!-- Hamburger -->
                <div class="sm:hidden md:hidden">
                    <button @click="navOpen = !navOpen"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': navOpen, 'inline-flex': !navOpen }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !navOpen, 'inline-flex': navOpen }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Notification Icon -->
                @can('view notification')
                    <div class="relative p-1 sm:hidden">
                        <button @click="notifOpen = !notifOpen" class="relative flex items-center text-gray-900 text-2xl">
                            <i class="fa-solid fa-bell"></i>
                            <span
                                class="absolute top-0 right-0 w-3 h-3 bg-red-600 rounded-full text-xs text-white flex items-center justify-center">
                                {{ auth()->user()->unreadNotifications->where('type', '!=', 'App\Notifications\NewMessageNotification')->count() }}
                            </span>
                        </button>

                        <!-- Dropdown Content -->
                        <div x-show="notifOpen" @click.away="notifOpen = false"
                            class="origin-top-right absolute right-0 mt-10 lg:w-96 w-72 rounded-md shadow-lg bg-white ring-4 ring-red-400 ring-opacity-20">
                            <div class="py-1 p-10">
                                @forelse (auth()->user()->unreadNotifications->where('type', '!=', 'App\Notifications\NewMessageNotification') as $notification)
                                    <x-dropdown-link class="text-4xl font-bold text-red-600"
                                        href="{{ route('notifications.show', $notification->id) }}">
                                        {{ $notification->data['message'] }}
                                    </x-dropdown-link>
                                @empty
                                    <x-dropdown-link>
                                        No new notifications
                                    </x-dropdown-link>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endcan


                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6 sm:order-3">


                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': navOpen, 'hidden': !navOpen }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @can('view role')
                <x-responsive-nav-link :href="route('roles.index')" :active="request()->routeIs('roles')">
                    {{ __('Roles') }}
                </x-responsive-nav-link>
            @endcan
            @can('view permission')
                <x-responsive-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions')">
                    {{ __('Permissions') }}
                </x-responsive-nav-link>
            @endcan
            @can('view user')
                <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users')">
                    {{ __('Users') }}
                </x-responsive-nav-link>
            @endcan
            @can('view job')
                <x-responsive-nav-link :href="route('role-permission.job.index')" :active="request()->routeIs('role-permission.job.index')">
                    {{ __('Jobs') }}
                </x-responsive-nav-link>
            @endcan

            @can('view applications')
                <x-responsive-nav-link :href="route('job-application.list')" :active="request()->routeIs('job-application.list')">
                    {{ __('Job Applicants') }}
                </x-responsive-nav-link>
            @endcan

            {{-- Alumni routes --}}
            @can('view profile')
                <x-responsive-nav-link :href="route('alumni.profile.view')" :active="request()->routeIs('alumni.profile.view')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
            @endcan
            @can('view alumni job')
                <x-responsive-nav-link :href="route('alumni.job.index')" :active="request()->routeIs('alumni.job.index')">
                    {{ __('Alumni Jobs') }}
                </x-responsive-nav-link>
            @endcan

            @can('view own applications')
                <x-responsive-nav-link :href="route('job-applications.index')" :active="request()->routeIs('job-applications.index')">
                    {{ __('My Applications') }}
                </x-responsive-nav-link>
            @endcan

            {{-- Employer routes --}}
            @can('view alumni profile')
                <x-responsive-nav-link :href="route('profiles.index')" :active="request()->routeIs('profiles.index')">
                    {{ __('Alumni Profiles') }}
                </x-responsive-nav-link>
            @endcan
            @can('view project')
                <x-responsive-nav-link :href="route('project.index')" :active="request()->routeIs('project.index')">
                    {{ __('Alumni Projects') }}
                </x-responsive-nav-link>
            @endcan
            @can('publish project')
                <x-responsive-nav-link :href="route('projects.create')" :active="request()->routeIs('projects.create')">
                    {{ __('Publish Projects') }}
                </x-responsive-nav-link>
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ \Illuminate\Support\Facades\Auth::user()->name }}
                </div>
                <div class="font-medium text-sm text-gray-500">{{ \Illuminate\Support\Facades\Auth::user()->email }}
                </div>
            </div>

            <div class="mt-3 space-y-1">
                {{-- <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link> --}}

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
