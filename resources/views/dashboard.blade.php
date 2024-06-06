<x-app-layout>
    {{-- @include('layouts.navigation') --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 border-b border-gray-200">
                    <div class="mt-8 text-2xl font-bold text-gray-900">
                        Welcome to your Dashboard!
                    </div>

                    <div class="mt-6 text-gray-700">
                        <p class="mt-2 text-sm text-gray-600">
                            You are logged in as <strong>{{ Auth::user()->name }}</strong>.
                        </p>
                    </div>

                    <div class="mt-8">
                        <a href="" class="inline-flex items-center px-6 py-3 bg-blue-500 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                            Create Admin Profile
                        </a>
                    </div>
                </div>

                <!-- Additional sections for Super Admin and Admin -->
                <div class="p-6 bg-white sm:px-20">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Users Management -->
                        @can('view user')
                        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Manage Users</h3>
                            <p class="mt-2 text-gray-600">Create, edit, and delete user accounts.</p>
                            <a href="{{ url('users') }}" class="inline-flex items-center px-6 py-3 bg-yellow-400 text-white text-sm font-medium rounded-lg shadow hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition ease-in-out duration-150">
                                Go to Users
                            </a>
                        </div>
                        @endcan
                        <!-- Roles Management -->
                        @can('view role')
                        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Manage Roles</h3>
                            <p class="mt-2 text-gray-600">Create, edit, and delete user roles.</p>
                            <a href="{{ url('roles') }}" class="inline-flex items-center px-6 py-3 bg-blue-500 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                                Go to Roles
                            </a>
                        </div>
                        @endcan
                        <!-- Permissions Management -->
                        @can('view permission')
                        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Manage Permissions</h3>
                            <p class="mt-2 text-gray-600">Create, edit, and delete user permissions.</p>
                            <a href="{{ url('permissions') }}" class="inline-flex items-center px-6 py-3 bg-green-500 text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition ease-in-out duration-150">
                                Go to Permissions
                            </a>
                        </div>
                        @endcan
                        <!-- Jobs Management -->
                        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Manage Jobs</h3>
                            <p class="mt-2 text-gray-600">View and apply job opportunities for alumni.</p>
                            <a href="{{ url('jobs') }}" class="inline-flex items-center px-6 py-3 bg-blue-500 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                                Go to Jobs
                            </a>
                        </div>

                        <!-- Profile Management -->
                        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Manage Profiles</h3>
                            <p class="mt-2 text-gray-600">View and edit user profiles.</p>
                            <a href="{{ url('profiles') }}" class="inline-flex items-center px-6 py-3 mt-8 bg-blue-500 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                                Go to Profiles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
