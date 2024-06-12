<x-app-layout>
    <x-slot name="header">
        @include('role-permission.nav-links')
    </x-slot>

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
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Job</a>
                    @endcan
                </div>

                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($jobs as $job)
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <a href="{{ url('jobs/' . $job->id) }}"
                                class="block flex items-center p-4 transition duration-300 ease-in-out hover:bg-blue-300">
                                <!-- Job Image -->
                                {{-- <div class="w-20 h-20 mr-4">
                                    <img src="{{ $job->image_url ?? 'default-image-url.png' }}" alt="Job Image" class="w-full h-full object-cover">
                                </div> --}}
                                <!-- Job Details -->
                                <div class="flex-grow">
                                    <h5 class="text-3xl font-bold">{{ $job->title }}</h5>
                                    <p class="text-2xl text-gray-600">{{ $job->company_name }}</p>
                                    <p class="text-2xl text-gray-600">{{ $job->location }}</p>
                                    <p class="text-2xl text-gray-600">{{ $job->job_type }} </p>
                                </div>
                            </a>
                            <!-- Actions -->

                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    <h4 class="text-lg font-semibold">
                        Trashed Jobs
                    </h4>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($trashedJobs as $job)
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <a href="{{ url('jobs/' . $job->id) }}" class="block flex items-center p-4">
                                    <!-- Job Image -->
                                    <div class="w-20 h-20 mr-4">
                                        <img src="{{ $job->image_url ?? 'default-image-url.png' }}" alt="Job Image"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <!-- Job Details -->
                                    <div class="flex-grow">
                                        <h5 class="text-xl font-bold">{{ $job->title }}</h5>
                                        <p class="text-sm text-gray-600">{{ $job->company_name }}</p>
                                        <p class="text-sm text-gray-600">{{ $job->location }}</p>
                                        <p class="text-sm text-gray-600">{{ ucfirst($job->job_type) }} Deadline:
                                            {{ \Carbon\Carbon::parse($job->deadline)->format('D, M jS Y') }}</p>
                                    </div>
                                </a>
                                <!-- Actions -->
                                <div class="p-4 flex items-center justify-end space-x-2">
                                    @can('restore job')
                                        <form action="{{ route('role-permissions.job.restore', $job->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Restore</button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
