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

                <div class="mt-3 flex justify-between items-center">
                    <h4 class="text-lg font-semibold">
                        Jobs
                    </h4>
                    @can('create job')
                        <a href="{{ url('jobs/create') }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i
                                class="fas fa-add"></i> Add Jobs</a>
                    @endcan
                </div>

                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                    @foreach ($jobs as $job)
                        <div
                            class="bg-white shadow-md rounded-lg overflow-hidden transition transform hover:bg-red-100 hover:-translate-y-1">
                            <a href="{{ url('jobs/' . $job->id) }}" class="flex items-center p-4">
                                <!-- Job Details -->
                                <div class="flex-grow">
                                    <h5 class="text-2xl font-extrabold text-red-500">{{ $job->title }}</h5>
                                    <p class="text-2xl text-red-400">{{ $job->company_name }}</p>
                                    <div class="grid grid-cols-3  justify-between underline underline-offset-4">
                                        <span class="">{{ $job->location }}</span>
                                        <span class="">{{ $job->job_type }} </span>
                                        <span class="">Salary : {{ $job->salary }}</span>
                                    </div>
                                    <span class="">Posted {{ $job->created_at->diffForHumans() }} </span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    <h4 class="text-lg font-semibold">
                        Trashed Jobs
                    </h4>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($trashedJobs as $job)
                            <div
                                class="bg-white shadow-md rounded-lg overflow-hidden transition duration-300 ease-in-out hover:bg-red-100 hover:text-dark-900">
                                <a href="{{ url('jobs/' . $job->id) }}" class="flex items-center p-4">
                                    <!-- Job Details -->
                                    <div class="flex-grow">
                                        <h5 class="text-xl font-bold">{{ $job->title }}</h5>
                                        <p class="text-sm text-gray-900">{{ $job->company_name }}</p>
                                        <p class="text-sm text-gray-900">{{ $job->location }}</p>
                                        <p class="text-sm text-gray-900">{{ ucfirst($job->job_type) }} Deadline:
                                            {{ \Carbon\Carbon::parse($job->created_at)->format('D, M jS Y') }}</p>
                                    </div>
                                </a>
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
