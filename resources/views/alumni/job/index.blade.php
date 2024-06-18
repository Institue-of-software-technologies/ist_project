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
                    @if ($jobs->isEmpty())
                        <p class="text-gray-600">No job opportunities available at the moment.</p>
                    @else
                        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6">
                            @foreach ($jobs as $job)
                                <div class="bg-gradient-to-r from-gray-300 to-gray-400 shadow-md rounded-lg p-5 border border-blue-200">
                                    <h1 class="text-4xl font-bold text-gray-900 text-center">{{ $job->title }}</h1>
                                    
                                    <p class="mt-2 text-gray-900 text-3xl"><strong>Company:</strong> {{ $job->company_name }}</p>
                                    <p class="mt-2 text-gray-900 text-3xl"><strong>Location:</strong> {{ $job->location }}</p>
                                    <p class="mt-2 text-gray-900 text-3xl"><strong>Job Type:</strong> {{ $job->job_type }}</p>
                                    <p class="mt-2 text-gray-600">Posted on: {{ $job->created_at->format('M d, Y') }}</p>

                                    <button onclick="toggleDetails({{ $job->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">View More Details</button>
                                    
                                    <!-- Hidden Details Section -->
                                    <div id="details-{{ $job->id }}" class="hidden mt-4">
                                        {{-- <section class="mb-4">
                                            <h3 class="text-3xl font-bold">Company</h3>
                                            <ul class="list-disc list-inside text-gray-750">
                                                <li class="mb-2 text-2xl">{{ $job->company_name }}</li>
                                            </ul>
                                        </section>

                                        <section class="mb-4">
                                            <h3 class="text-3xl font-bold">Location</h3>
                                            <ul class="list-disc list-inside text-gray-750">
                                                <li class="mb-2 text-2xl">{{ $job->location }}</li>
                                            </ul>
                                        </section> --}}

                                        <section class="mb-4">
                                            <h3 class="text-3xl font-bold">Salary</h3>
                                            <ul class="list-disc list-inside text-gray-750">
                                                <li class="mb-2 text-2xl">{{ $job->salary }}</li>
                                            </ul>
                                        </section>
                                        
                                        <section class="mb-4">
                                            <h3 class="text-3xl font-bold">Employment Type</h3>
                                            <ul class="list-disc list-inside text-gray-750">
                                                <li class="mb-2 text-2xl">{{ $job->job_type }}</li>
                                            </ul>
                                        </section>
                                            
                                        <section class="mb-4">
                                            <h3 class="text-3xl font-bold">Experience</h3>
                                            <ul class="list-disc list-inside text-gray-750">
                                                <li class="mb-2 text-2xl">{{ $job->experience_level }}</li>
                                            </ul>
                                        </section>

                                        <section class="mb-4">
                                            <h3 class="text-3xl font-bold">Education</h3>
                                            <ul class="list-disc list-inside text-gray-750">
                                                <li class="mb-2 text-2xl">{{ $job->education_level }}</li>
                                            </ul>
                                        </section>

                                        <section class="mb-4">
                                            <h3 class="text-3xl font-bold">Skills</h3>
                                            <ul class="list-disc list-inside text-gray-750">
                                                <li class="mb-2 text-2xl">{{ $job->skills }}</li>
                                            </ul>
                                        </section>

                                        <section class="mb-4">
                                            <h3 class="text-3xl font-bold">Job Description</h3>
                                            <ul class="list-disc list-inside text-gray-750">
                                                @foreach (explode("\n", $job->description) as $point)
                                                    <li class="mb-2 text-2xl">{{ $point }}</li>
                                                @endforeach
                                            </ul>
                                        </section>

                                        <a href="#" class="inline-flex items-center px-6 py-3 mt-4 bg-blue-500 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                                            Apply
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDetails(jobId) {
            const detailsElement = document.getElementById('details-' + jobId);
            if (detailsElement.classList.contains('hidden')) {
                detailsElement.classList.remove('hidden');
            } else {
                detailsElement.classList.add('hidden');
            }
        }
    </script>

</x-app-layout>
