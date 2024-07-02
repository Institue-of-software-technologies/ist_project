<x-app-layout>
    {{-- @include('layouts.navigation') --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot> --}}
    @role('super-user|admin')
        <div class="lg:py-12">
            <div class="max-w-7x mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div
                        class="p-6 sm:px-20 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 border-b border-gray-200">
                        <div class="mt-8 text-2xl font-bold text-gray-900">
                            Welcome to your Dashboard!
                        </div>

                        <div class="mt-6 text-gray-700">
                            <p class="mt-2 text-sm text-gray-600">
                                You are logged in as <strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong>.
                            </p>
                        </div>

                        <div class="mt-8">
                            <a href=""
                                class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                Create Admin Profile
                            </a>
                        </div>
                    </div>

                    <!-- Additional sections for Super Admin and Admin -->
                    <div class="p-6 bg-white sm:px-20">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Users Management -->
                            {{-- @can('view user') --}}
                            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800">Manage Users</h3>
                                <p class="mt-2 text-gray-600">Create, edit, and delete user accounts.</p>
                                <a href="{{ url('users') }}"
                                    class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                    Go to Users
                                </a>
                            </div>
                            {{-- @endcan --}}

                            <!-- Roles Management -->
                            {{-- @can('view role') --}}
                            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800">Manage Roles</h3>
                                <p class="mt-2 text-gray-600">Create, edit, and delete user roles.</p>
                                <a href="{{ url('roles') }}"
                                    class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                    Go to Roles
                                </a>
                            </div>
                            {{-- @endcan --}}

                            <!-- Permissions Management -->
                            {{-- @can('view permission') --}}
                            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800">Manage Permissions</h3>
                                <p class="mt-2 text-gray-600">Create, edit, and delete user permissions.</p>
                                <a href="{{ url('permissions') }}"
                                    class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition ease-in-out duration-150">
                                    Go to Permissions
                                </a>
                            </div>
                            {{-- @endcan --}}


                            <!-- Jobs Management -->
                            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800">Manage Jobs</h3>
                                <p class="mt-2 text-gray-600">View and apply job opportunities for alumni.</p>
                                <a href="{{ url('jobs') }}"
                                    class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                    Go to Jobs
                                </a>
                            </div>

                            <!-- Profile Management -->
                            {{-- <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800">Manage Profiles</h3>
                                <p class="mt-2 text-gray-600">View and edit user profiles.</p>
                                <a href="{{ url('alumni/profile/index') }}"
                                    class="inline-flex items-center px-6 py-3 mt-8 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                    Go to Profiles
                                </a>
                            </div> --}}




                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    {{-- alumni routes --}}

    @role('alumni')
        <div class="max-w-7x lg:py-12 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 border-b border-gray-200">
                    <div class="mt-8 text-2xl font-bold text-gray-900">
                        Welcome to Your Alumni Dashboard!
                    </div>

                    <div class="mt-6 text-gray-700">
                        <p class="mt-2 text-sm text-gray-600">
                            You are logged in as <strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong>.
                        </p>
                    </div>

                    <div class="mt-8">
                        <a href="{{ url('alumni/profile/index') }}"
                            class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                            View Your Profile
                        </a>
                    </div>
                </div>

                <!-- Additional sections for Alumni -->
                <div class="p-6 bg-white sm:px-20">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Jobs Management -->
                        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Jobs Opportunities</h3>
                            <p class="mt-2 text-gray-600">View and apply for job opportunities posted by the admin.</p>
                            <a href="{{ url('alumni/jobs') }}"
                                class="inline-flex items-center px-6 py-3 mt-16 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                Go to Jobs
                            </a>
                        </div>

                        <!-- Projects Management -->
                        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Publish Your Project</h3>
                            <p class="mt-2 text-gray-600">Share your projects with other alumnis from IST.</p>
                            <a href="{{ route('projects.create') }}"
                                class="inline-flex items-center px-6 py-3 mt-16 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                Publish Project
                            </a>
                        </div>

                        <!-- User Projects Management -->
                        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Your Projects</h3>
                            <p class="mt-2 text-gray-600">View edit and manage your published projects.</p>
                            <a href="{{ route('projects.index') }}"
                                class="inline-flex items-center px-6 py-3 mt-16 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                View Projects
                            </a>
                        </div>

                        <!-- Alumni Profile Management -->
                        {{-- <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Alumni Profile</h3>
                            <p class="mt-2 text-gray-600">Create your alumni profile.</p>
                            <a href="{{ url('alumni/profile') }}" class="inline-flex items-center px-6 py-3 mt-16 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                Go to Profile
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    @endrole

    @role('employer')
        <div class="max-w-7x lg:py-12 mx-auto my-auto  sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 border-b border-gray-200">
                    <div class="mt-8 text-2xl font-bold text-gray-900">
                        Welcome to Your Employer Dashboard!
                    </div>

                    <div class="mt-6 text-gray-700">
                        <p class="mt-2 text-sm text-gray-600">
                            You are logged in as <strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong>.
                        </p>
                    </div>
                </div>

                <!-- Additional sections for Alumni -->
                <div class="p-6 bg-white sm:px-20">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Jobs Management -->
                        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Create Jobs</h3>
                            <p class="mt-2 text-gray-600">Create job opportunities for alumni.</p>
                            <a href="{{ url('jobs/create') }}"
                                class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                Go to Jobs
                            </a>
                        </div>

                        {{-- view alumni projects --}}
                                <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200 ">
                                    <h3 class="text-lg font-semibold text-gray-800">View Alumni Projects</h3>
                                    <p class="mt-2 text-gray-600">Find potential employees</p>
                                    <a href="{{ url('/alumni') }}"
                                        class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                        Go to Projects
                                    </a>
                                </div>
                        {{-- view alumni profiles --}}
                        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">View Alumni Profiles</h3>
                            <p class="mt-2 text-gray-600">See the Profiles</p>
                            <a href="{{ url('profiles/index') }}"
                                class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                Go to Profiles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
</x-app-layout>
