<x-app-layout>
    <div class="py-12">
        <div class="max-w-7x mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 border-b border-gray-200">
                    <div class="mt-8 text-2xl font-bold text-gray-900">
                        Welcome to Your Alumni Dashboard!
                    </div>

                    <div class="mt-6 text-gray-700">
                        <p class="mt-2 text-sm text-gray-600">
                            You are logged in as <strong>{{ Auth::user()->name }}</strong>.
                        </p>
                    </div>

                    <div class="mt-8">
                        <a href="{{ url('alumni/profile/index') }}" class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
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
                            <a href="{{ url('alumni/jobs') }}" class="inline-flex items-center px-6 py-3 mt-16 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">
                                Go to Jobs
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
    </div>
</x-app-layout>
