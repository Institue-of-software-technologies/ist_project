<x-app-layout>
    <div class="container mx-auto mt-2 px-4">
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <!-- Job Details Section -->
        <div class="mx-auto">
            @if ($job->company_logo)
                <div class="flex justify-center  mt-8">
                    <div class="rounded-xl p-1">
                        <img src="{{ asset('storage/' . $job->company_logo) }}" alt="Company Logo"
                            class="w-52 h-52 lg:w-52 lg:h-36 rounded-xl mx-auto">
                    </div>
                </div>
            @endif
        </div>

        <div class="gap-4">

            <div>
                <div class="bg-white mx-auto border border-lg border-gray-500 rounded-lg overflow-hidden mt-4 p-4">
                    <a class="bg-red-500 hover:bg-red-700 text-white font-bold my-auto px-4 rounded float-right"
                        href="{{ route('role-permission.job.index') }}">Back</a>
                    <div class="p-4 border-b border-gray-200">
                        <h5 class="text-2xl font-bold">{{ $job->title }}</h5>
                        <p class="text-xl text-gray-600">{{ $job->company_name }}</p>
                    </div>

                    <!-- Job Details -->
                    <div class="p-4">
                        <section class="mb-4">
                            <h3 class="text-3xl font-bold">Job Details</h3>
                            <ul class="list-none mb-4">
                                <li><strong>Job Type:</strong> {{ ucfirst($job->job_type) }}</li>
                                <li><strong>Location:</strong> {{ $job->location }}</li>
                                <li><strong>Salary:</strong> {{ $job->salary }}</li>
                            </ul>
                        </section>

                        <!-- Requirements -->
                        <section class="mb-4">
                            <h3 class="text-3xl font-bold">Requirements</h3>
                            <ul class="list-none mb-4">
                                <li><strong>Experience Level:</strong> {{ $job->experience_level }}</li>
                                <li><strong>Education Level:</strong> {{ $job->education_level }}</li>
                                <li><strong>Skills:</strong> {{ $job->skills }}</li>
                            </ul>
                        </section>

                        <!-- Job Description -->
                        <section class="mb-4 text-pretty">
                            <h3 class="text-3xl font-bold">Job Description</h3>
                            <ul class="list-disc list-inside text-gray-600">
                                @foreach (explode("\n", $job->description) as $point)
                                    <li class="mb-2">{{ $point }}</li>
                                @endforeach
                            </ul>
                        </section>

                        <div class="float-right">
                            @can('edit job')
                                <a href="{{ url('jobs/' . $job->id . '/edit') }}">
                                    <i class="fas fa-edit text-xl p-3 rounded-lg bg-green-500 text-white"></i>
                                </a>
                            @endcan
                            @can('delete job')
                                <a href="{{ url('jobs/' . $job->id . '/delete') }}">
                                    <i class="fas fa-trash text-xl p-3 rounded-lg bg-red-500 text-white"></i>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
