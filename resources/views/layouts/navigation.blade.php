<nav x-data="{ navOpen: false, notifOpen: false }" class="bg-white border-b border-gray-400 shadow-lg sticky top-0 z-10">
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
                    <x-nav-link class="text-gray-900" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

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
                    @can('view user')
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                            {{ __('Users') }}
                        </x-nav-link>
                    @endcan
                    @can('view job')
                        <x-nav-link :href="route('role-permission.job.index')" :active="request()->routeIs('role-permission.job.index')">
                            {{ __('Jobs') }}
                        </x-nav-link>
                    @endcan
                    @can('view applications')
                        <x-nav-link :href="route('job-application.list')" :active="request()->routeIs('job-application.list')">
                            {{ __('Job Applicants') }}
                        </x-nav-link>
                    @endcan

                    {{-- Alumni routes --}}
                    @can('view profile')
                        <x-nav-link :href="route('alumni.profile.view')" :active="request()->routeIs('alumni.profile.view')">
                            {{ __('Profile') }}
                        </x-nav-link>
                    @endcan
                    @can('view alumni job')
                        <x-nav-link :href="route('alumni.job.index')" :active="request()->routeIs('alumni.job.index')">
                            {{ __('Jobs') }}
                        </x-nav-link>
                    @endcan
                    @can('view own applications')
                        <x-nav-link :href="route('job-applications.index')" :active="request()->routeIs('job-applications.index')">
                            {{ __('My Applications') }}
                        </x-nav-link>
                    @endcan

                    {{-- Employer routes --}}
                    @can('view alumni profile')
                        <x-nav-link :href="route('profiles.index')" :active="request()->routeIs('profiles.index')">
                            {{ __('Alumni Profiles') }}
                        </x-nav-link>
                    @endcan
                    @can('view alumni projects')
                        <x-nav-link :href="url('/alumni')" :active="request()->routeIs('projects.index')">
                            {{ __('Alumni Projects') }}
                        </x-nav-link>
                    @endcan
                    @can('view project')
                        <x-nav-link :href="route('project.index')" :active="request()->routeIs('project.index')">
                            {{ __('My Projects') }}
                        </x-nav-link>
                    @endcan
                    @can('publish project')
                        <x-nav-link :href="route('projects.create')" :active="request()->routeIs('projects.create')">
                            {{ __('Publish Projects') }}
                        </x-nav-link>
                    @endcan
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

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6 sm:order-3">
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

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-xl leading-4 font-medium rounded-md text-white bg-gray-900 hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
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
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

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
