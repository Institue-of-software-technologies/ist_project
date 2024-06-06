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
                            <div class="p-4 border-b border-gray-200">
                                <h5 class="text-xl font-bold">{{ $job->title }}</h5>
                                <p class="text-sm text-gray-600">{{ $job->company_name }}</p>
                            </div>
                            <div class="p-4">
                                <p><strong>Job Type:</strong> {{ ucfirst($job->job_type) }}</p>
                                <p><strong>Location:</strong> {{ $job->location }}</p>
                                <p><strong>Salary:</strong> {{ $job->salary }}</p>
                                <p><strong>Experience Level:</strong> {{ $job->experience_level }}</p>
                                <p><strong>Education Level:</strong> {{ $job->education_level }}</p>
                                <p><strong>Skills:</strong> {{ $job->skills }}</p>
                                <p><strong>Description:</strong> {{ $job->description }}</p>
                            </div>
                            <div class="p-4 border-t border-gray-200 flex items-center justify-between">
                                @can('edit job')
                                    <a href="{{ url('jobs/' . $job->id . '/edit') }}"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                @endcan
                                @can('delete job')
                                {{-- <a href="{{ url('jobs/'.$job->id.'/delete') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a> --}}

                                <form action="{{ route('role-permission.job.destroy', $job->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form> 
                                @endcan
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
