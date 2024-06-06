<!-- resources/views/alumni/jobs/index.blade.php -->

<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 border-b border-gray-200">
                    <div class="mt-8 text-2xl font-bold text-gray-900">
                        Job Opportunities
                    </div>

                    <div class="mt-6 text-gray-700">
                        <p class="mt-2 text-sm text-gray-600">
                            Browse the latest job opportunities posted by the admin.
                        </p>
                    </div>
                </div>

                <div class="p-6 bg-white sm:px-20">
                    @if($jobs->isEmpty())
                        <p class="text-gray-600">No job opportunities available at the moment.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6 font-serif">
                            @foreach($jobs as $job)
                                <div class="bg-gradient-to-r from-gray-300 to-gray-400 shadow-md rounded-lg p-5 border border-blue-200">
                                    <h3 class="text-4xl font-bold text-gray-900">{{ $job->title }}</h3>

                                    <p class="mt-2 text-gray-900 text-3xl"><strong>Company:</strong> {{ $job->company_name }}</p>

                                    <p class="mt-2 text-gray-900 text-3xl"><strong>Location:</strong> {{ $job->location }}</p>

                                    <p class="mt-2 text-gray-900 text-3xl"><strong>Salary:</strong> {{ $job->salary }}</p>

                                    <p class="mt-2 text-gray-900 text-3xl"><strong>Job Type:</strong> {{ $job->job_type }}</p>

                                    <p class="mt-2 text-gray-900 text-3xl"><strong>Experience Level:</strong> {{ $job->experience_level }}</p>

                                    <p class="mt-2 text-gray-900 text-3xl"><strong>Education Level:</strong> {{ $job->education_level }}</p>

                                    <p class="mt-2 text-gray-900 text-3xl"><strong>Skills:</strong> {{ $job->skills }}</p>

                                    <p class="text-3xl"><strong class="text-3xl">Job Description</strong> <br><strong>{{$job->description}}</strong></p>
                                    <p class="mt-2 text-gray-600">Posted on: {{ $job->created_at->format('M d, Y') }}</p>
                                    <a href="#" class="inline-flex items-center px-6 py-3 mt-4 bg-blue-500 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                                        Apply
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
