<x-app-layout>
    <style>
        .transition {
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
    </style>
    <div class="container mx-auto mt-2 px-4">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mt-3 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between text-center">
                    <h4 class="text-lg font-semibold">
                        Jobs
                    </h4>
                    <form action="{{ route('jobs.search') }}" method="GET" class="mb-3 lg:mb-0">
                        <input type="text" name="find"
                            class="py-2 px-4 text-gray-900 font-semibold border rounded-lg w-48 lg:w-64"
                            placeholder="Search by Title">
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">Search</button>
                    </form>
                    @can('create job')
                        <button class="">
                            <a href="{{ url('jobs/create') }}"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i
                                    class="fas fa-add"></i> Add Jobs</a>
                        </button>
                    @endcan
                </div>

                @if ($jobs->isEmpty())
                    <div
                        class="flex mt-5 items-center ml-20 justify-center p-6 bg-red-100 border border-solid border-red-600 text-red-700 text-center font-bold rounded-lg shadow-lg">
                        <p class="text-xl">{{ __('No Jobs found.') }}</p>
                    </div>
                @else
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($jobs as $job)
                            <div
                                class="bg-white shadow-md rounded-lg overflow-hidden transition transform hover:bg-gray-300 hover:-translate-y-1">

                                <a href="{{ url('jobs/' . $job->id) }}" class="flex items-center p-4">
                                    <!-- Job Details -->
                                    <div class="flex-grow">
                                        <h1 class="float-right text-xl flex">{{ $job->job_type }} </h1>
                                        @if ($job->company_logo)
                                            <div class="flex justify-center mt-8">
                                                <div class="rounded-xl p-1">
                                                    <img src="{{ asset('storage/' . $job->company_logo) }}"
                                                        alt="Company Logo"
                                                        class="w-32 h-32 lg:w-32 lg:h-32 rounded-xl mx-auto">
                                                </div>
                                            </div>
                                        @endif
                                        <h1 class="text-2xl font-extrabold text-red-500 text-center">{{ $job->title }}
                                        </h1>
                                        <hr>
                                        <hr>
                                        <hr>
                                        <hr>
                                        <h1 class="text-xl text-center text-red-400">{{ $job->company_name }}</h1>
                                        <h1 class="text-center"><i class="fas fa-location-dot"></i> {{ $job->location }}
                                        </h1>
                                        <div class="grid grid-cols-2">
                                            <span><i class="fas fa-dollar-sign"></i>{{ $job->salary }}</span>
                                            <h3 class="border border-solid rounded-xl border-gray-900 text-center">
                                                Posted {{ $job->created_at->diffForHumans() }}
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                @endif
            </div>

            <div class="mt-6">
                    <h4 class="text-lg font-semibold">
                        Trashed Jobs
                    </h4>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($trashedJobs as $job)
                            <div class="bg-white shadow-md rounded-lg overflow-hidden transition duration-300 ease-in-out hover:bg-red-100 hover:text-dark-900">
                                    <!-- Job Details -->
                                    <div class="flex-grow p-5">
                                        <h5 class="text-xl font-bold">{{ $job->title }}</h5>
                                        <p class="text-sm text-gray-900">{{ $job->company_name }}</p>
                                        <p class="text-sm text-gray-900">{{ $job->location }}</p>
                                        <p class="text-sm text-gray-900">{{ ucfirst($job->job_type) }} Deadline:
                                            {{ \Carbon\Carbon::parse($job->created_at)->format('D, M jS Y') }}</p>
                                    </div>
                                <!-- Actions -->
                                <div class="p-4 flex items-center justify-end space-x-2">
                                    @if (!empty($jobs))
                                        @can('restore job')
                                            <form action="{{ route('role-permissions.job.restore', $job->id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Restore</button>
                                            </form>
                                        @endcan
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

        </div>
    </div>
    </div>
</x-app-layout>
