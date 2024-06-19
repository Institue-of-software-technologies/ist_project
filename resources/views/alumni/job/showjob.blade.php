<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div
                    class="p-6 sm:px-20 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 border-b border-gray-200">
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
                    @if ($jobs->isEmpty())
                        <p class="text-gray-600">No job opportunities available at the moment.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-6">
                            @foreach ($jobs as $job)
                                <div
                                    class="bg-gradient-to-r from-gray-300 to-gray-400 shadow-md rounded-lg p-5 border border-red-200">
                                    <h1 class="text-4xl font-bold text-gray-900 text-center">{{ $job->title }}</h1>

                                    
                                    <section class="mb-4">
                                        <h3 class="text-3xl font-bold">Company</h3>
                                        <ul class="list-disc list-inside text-gray-750">
                                            @foreach (explode("\n", $job->company_name) as $point)
                                                <li class="mb-2 text-2xl">{{ $point }}</li>
                                            @endforeach
                                        </ul>
                                    </section>

                                    
                                    <section class="mb-4">
                                        <h3 class="text-3xl font-bold">Location</h3>
                                        <ul class="list-disc list-inside text-gray-750">
                                            @foreach (explode("\n", $job->location) as $point)
                                                <li class="mb-2 text-2xl">{{ $point }}</li>
                                            @endforeach
                                        </ul>
                                    </section>

                                    
                                    <section class="mb-4">
                                        <h3 class="text-3xl font-bold">Salary</h3>
                                        <ul class="list-disc list-inside text-gray-750">
                                            @foreach (explode("\n", $job->salary) as $point)
                                                <li class="mb-2 text-2xl">{{ $point }}</li>
                                            @endforeach
                                        </ul>
                                    </section>
                                   
                                    <section class="mb-4">
                                        <h3 class="text-3xl font-bold">Emploment Type</h3>
                                        <ul class="list-disc list-inside text-gray-750">
                                            @foreach (explode("\n", $job->job_type) as $point)
                                                <li class="mb-2 text-2xl">{{ $point }}</li>
                                            @endforeach
                                        </ul>
                                    </section>

                                        
                                    <section class="mb-4">
                                        <h3 class="text-3xl font-bold">Experience</h3>
                                        <ul class="list-disc list-inside text-gray-750">
                                            @foreach (explode("\n", $job->experience_level) as $point)
                                                <li class="mb-2 text-2xl">{{ $point }}</li>
                                            @endforeach
                                        </ul>
                                    </section>

                                    <section class="mb-4">
                                        <h3 class="text-3xl font-bold">Education</h3>
                                        <ul class="list-disc list-inside text-gray-750">
                                            @foreach (explode("\n", $job->education_level) as $point)
                                                <li class="mb-2 text-2xl">{{ $point }}</li>
                                            @endforeach
                                        </ul>
                                    </section>

                                    <section class="mb-4">
                                        <h3 class="text-3xl font-bold ">Skills</h3>
                                        <ul class="list-disc list-inside text-gray-750">
                                            @foreach (explode("\n", $job->skills) as $point)
                                                <li class="mb-2 text-2xl">{{ $point }}</li>
                                            @endforeach
                                        </ul>
                                    </section>

                                    <section class="mb-4">
                                        <h3 class="text-3xl font-bold">Job Description</h3>
                                        <ul class="list-disc list-inside text-gray-750">
                                            @foreach (explode("\n", $job->description) as $point)
                                                <li
                                                    class="mb-2
                                                text-2xl">
                                                    {{ $point }}</li>
                                            @endforeach
                                        </ul>
                                    </section>

                                    <p class="mt-2 text-gray-600">Posted on: {{ $job->created_at->format('M d, Y') }}
                                    </p>
                                    <a href="#"
                                        class="inline-flex items-center px-6 py-3 mt-4 bg-red-500 text-white text-sm font-medium rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition ease-in-out duration-150">
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
