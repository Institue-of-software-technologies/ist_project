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
                    </div>

                    <!-- Additional sections for Super Admin and Admin -->
                    <div class="p-6 bg-white sm:px-20">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Users Management -->
                            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800">Manage Users</h3>
                                <p class="mt-2 text-gray-600">Create, edit, and delete user accounts.</p>
                                <a href="{{ url('users') }}"
                                    class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                    Go to Users
                                </a>
                            </div>

                            <!-- Roles Management -->

                            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800">Manage Roles</h3>
                                <p class="mt-2 text-gray-600">Create, edit, and delete user roles.</p>
                                <a href="{{ url('roles') }}"
                                    class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                    Go to Roles
                                </a>
                            </div>

                            <!-- Permissions Management -->
                            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800">Manage Permissions</h3>
                                <p class="mt-2 text-gray-600">Create, edit, and delete user permissions.</p>
                                <a href="{{ url('permissions') }}"
                                    class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition ease-in-out duration-150">
                                    Go to Permissions
                                </a>
                            </div>

                            <!-- Jobs Management -->

                            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800">Manage Jobs</h3>
                                <p class="mt-2 text-gray-600">View and Post job opportunities for alumni.</p>
                                <a href="{{ url('jobs') }}"
                                    class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                    Go to Jobs
                                </a>
                            </div>

                            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800">Your Appplications</h3>
                                <p class="mt-2 text-gray-600">View applications made by alumnus applied in different
                                    companies.
                                </p>
                                <a href="{{ url('/job-application/list') }}"
                                    class="inline-flex items-center px-6 py-3  bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                    View application
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Job Analytics -->
                    <div class="bg-white max-w-7xl mx-auto shadow-md rounded-lg p-5 mt-10 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">Job Analytics</h3>
                        <p class="mt-2 text-gray-600">View analytics for your job postings.</p>
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full mt-4 font-extrabold text-lg">
                                <thead class="text-red-500">
                                    <tr>
                                        <th class="px-4 py-2">Job Title</th>
                                        <th class="px-4 py-2">Total Views</th>
                                        <th class="px-4 py-2">Unique Views</th>
                                        <th class="px-4 py-2">Applications</th>
                                        <th class="px-4 py-2">Application Rate (%)</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php
                                        $jobs = \App\Models\Job::with('views', 'applications')->get();
                                    @endphp
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td class="border">
                                                {{ $job->title }}
                                                <div class="mx-auto">
                                                    @if ($job->company_logo)
                                                        <div class="flex justify-center">
                                                            <div class="rounded-xl p-1">
                                                                <img src="{{ asset('storage/' . $job->company_logo) }}"
                                                                    alt="Company Logo"
                                                                    class="w-auto h-auto lg:w-20 lg:h-20 rounded-xl m">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="border px-4 py-2">{{ $job->views->count() }}</td>
                                            <td class="border px-4 py-2">{{ $job->views->unique('user_id')->count() }}</td>
                                            <td class="border px-4 py-2">{{ $job->applications->count() }}</td>
                                            <td class="border px-4 py-2">{{ $job->applicationRate() }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                        <a href="{{ url('alumni/profile/view') }}"
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
                            <p class="mt-2 text-gray-600">View, edit, and manage your published projects.</p>
                            <a href="{{ route('project.index') }}"
                                class="inline-flex items-center px-6 py-3 mt-16 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                View Projects
                            </a>
                        </div>




                        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Your Appplications</h3>
                            <p class="mt-2 text-gray-600">View your own applications you applied in different companies.</p>
                            <a href="{{ route('job-applications.index') }}"
                                class="inline-flex items-center px-6 py-3 mt-16 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                View application
                            </a>
                        </div>

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

                        @can('view job')
                            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800">View and Create Jobs</h3>
                                <p class="mt-2 text-gray-600">View and Create job opportunities for alumnus.</p>
                                <a href="{{ url('jobs') }}"
                                    class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                    Go to Jobs
                                </a>
                            </div>
                        @endcan
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
                <!-- Job Analytics -->
                <div class="bg-white max-w-7xl mx-auto shadow-md rounded-lg p-5 mt-10 border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Job Analytics</h3>
                    <p class="mt-2 text-gray-600">View analytics for your job postings.</p>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full mt-4 font-extrabold text-lg">
                            <thead class="text-red-500">
                                <tr>
                                    <th class="px-4 py-2">Job Title</th>
                                    <th class="px-4 py-2">Total Views</th>
                                    <th class="px-4 py-2">Unique Views</th>
                                    <th class="px-4 py-2">Applications</th>
                                    <th class="px-4 py-2">Application Rate (%)</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php
                                    $jobs = \App\Models\Job::with('views', 'applications')->get();
                                @endphp
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td class="border">
                                            {{ $job->title }}
                                            <div class="mx-auto">
                                                @if ($job->company_logo)
                                                    <div class="flex justify-center">
                                                        <div class="rounded-xl p-1">
                                                            <img src="{{ asset('storage/' . $job->company_logo) }}"
                                                                alt="Company Logo"
                                                                class="w-auto h-auto lg:w-20 lg:h-20 rounded-xl m">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="border px-4 py-2">{{ $job->views->count() }}</td>
                                        <td class="border px-4 py-2">{{ $job->views->unique('user_id')->count() }}</td>
                                        <td class="border px-4 py-2">{{ $job->applications->count() }}</td>
                                        <td class="border px-4 py-2">{{ $job->applicationRate() }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
        </div>
    @endrole
</x-app-layout>
